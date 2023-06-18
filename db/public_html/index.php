<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Обработка формы</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form">
        <form action="add.php" method="post">
            <label class="name">Имя:</label><br>
            <input type="text" name="name" placeholder="Ведите имя"><br>
            <label class="name">Возраст:</label><br>
            <input type="text" name="age" placeholder="Ведите возраст"><br>
            <label class="name">Город:</label><br>
            <input type="text" name="city" placeholder="Ведите город"><br><br>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>