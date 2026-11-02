<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    // Read All: khusus Admin
    public function index()
    {
        $transactions = Transaction::with(['user', 'book'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Get all transactions',
            'data' => $transactions
        ], 200);
    }

    // Create: khusus Customer
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 422);
        }

        $user = auth('api')->user();

        try {
            $transaction = DB::transaction(function () use ($request, $user) {
                $book = Book::whereKey($request->book_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($book->stock < $request->quantity) {
                    throw new \RuntimeException('Stok barang tidak cukup!');
                }

                $totalAmount = $book->price * $request->quantity;

                $book->decrement('stock', $request->quantity);

                return Transaction::create([
                    'order_number' => 'ORD-' . strtoupper(uniqid()),
                    'customer_id' => $user->id,
                    'book_id' => $book->id,
                    'quantity' => $request->quantity,
                    'total_amount' => $totalAmount
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Transaction created successfully!',
                'data' => $transaction->load(['user', 'book'])
            ], 201);

        } catch (\RuntimeException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    // Show: khusus Customer (transaksi miliknya)
    public function show($id)
    {
        $transaction = Transaction::with(['user', 'book'])
            ->where('id', $id)
            ->where('customer_id', auth('api')->id())
            ->first();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get transaction detail',
            'data' => $transaction
        ], 200);
    }

    // Update: khusus Customer (transaksi miliknya)
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'sometimes|required|exists:books,id',
            'quantity' => 'sometimes|required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 422);
        }

        $transaction = Transaction::where('id', $id)
            ->where('customer_id', auth('api')->id())
            ->first();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        if (!$request->has('book_id') && !$request->has('quantity')) {
            return response()->json([
                'success' => false,
                'message' => 'Book ID or quantity must be provided!'
            ], 422);
        }

        try {
            DB::transaction(function () use ($request, $transaction) {
                $oldBook = Book::whereKey($transaction->book_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $oldBook->increment('stock', $transaction->quantity);

                $newBookId = $request->input('book_id', $transaction->book_id);
                $newQuantity = $request->input('quantity', $transaction->quantity);

                $newBook = Book::whereKey($newBookId)
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($newBook->stock < $newQuantity) {
                    throw new \RuntimeException('Stok barang tidak cukup!');
                }

                $newBook->decrement('stock', $newQuantity);

                $transaction->update([
                    'book_id' => $newBook->id,
                    'quantity' => $newQuantity,
                    'total_amount' => $newBook->price * $newQuantity
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Transaction updated successfully!',
                'data' => $transaction->fresh()->load(['user', 'book'])
            ], 200);

        } catch (\RuntimeException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    // Destroy: khusus Admin
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully!'
        ], 200);
    }
}
