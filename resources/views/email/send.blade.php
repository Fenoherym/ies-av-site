<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IES-AV | Administration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
</head>

<body>

    <h1>Bonjour </h1>
    <p>{{ $request->message }}</p>

</body>

</html>
