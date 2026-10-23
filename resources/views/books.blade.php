
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - BookSales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Daftar Buku</h2>
    <p>Selamat Datang di toko BookSales!</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['author'] }}</td>
                    <td>{{ $item['genre'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
