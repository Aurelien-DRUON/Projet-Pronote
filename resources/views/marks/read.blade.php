<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bonjour</title>
</head>

<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Note</th>
            <th>Commentaire</th>
            <th>Date</th>
        </tr>
        @foreach ($marks as $mark)
            <tr>
                <td>{{ $mark->id }}</td>
                <td>{{ $mark->mark }}/20</td>
                <td>{{ $mark->description }}</td>
                <td>{{ $mark->date }}</td>
            </tr>
        @endforeach
</body>

</html>
