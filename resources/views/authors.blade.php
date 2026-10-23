
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Author Buku</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #198754; color: white; }
    </style>
</head>
<body>
    <h2>Daftar Author Buku</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Author</th>
            <th>Negara</th>
        </tr>

        @foreach ($authors as $author)
            <tr>
                <td>{{ $author['id'] }}</td>
                <td>{{ $author['name'] }}</td>
                <td>{{ $author['country'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
