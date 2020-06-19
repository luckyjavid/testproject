<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todos</title>
</head>
<body>

  <form action="/todos/create" method="post">
    @csrf
    <input type="text" name="title" id="title">
    <input type="submit" value="Create">
  </form>
</body>
</html>