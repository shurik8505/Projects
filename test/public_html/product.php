<?php
require_once 'config/connect.php';
$product_id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);

$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id` = '$product_id'");
$comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Product</title>
</head>
<body>
    <h2>Title: <?= $product['title'] ?></h2>
    <h4>Price: <?= $product['price'] ?></h4>
    <p>Description: <?= $product['description'] ?></p>

    <form action="vendor/create_comment.php" method="post">
    <input type="hidden" name="id" value= "<?= $product['id'] ?>">
    <textarea name="body"></textarea><br>
    <button type="submit">Add comment</button>
    </form>

    <h3>Comments</h3>
    <?php
    foreach ($comments as $comment) {
        ?>
    <ul>
        <li><?= $comment[2] ?></li>

    </ul>
<?php
}
?>
</body>
</html>
