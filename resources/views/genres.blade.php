
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Genre Buku</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #007bff; color: white; }
    </style>
</head>
<body>
    <h2>Daftar Genre Buku</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Genre</th>
            <th>Deskripsi</th>
        </tr>

        @foreach ($genres as $genre)
            <tr>
                <td>{{ $genre['id'] }}</td>
                <td>{{ $genre['name'] }}</td>
                <td>{{ $genre['description'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
