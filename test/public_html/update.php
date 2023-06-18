<?php

require_once 'config/connect.php';

$product_id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <title>Update product</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="container mb-5">Update Products</h1>

    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <p>Title</p>
        <input type="text" name="title" placeholder="Title" value="<?= $product['title']?>" class="form-control" <br/> <br/>
        <p>Description</p><br/>
        <textarea name="description" placeholder="Description"class="form-control"> <?= $product['description']?> </textarea>  <br/>
        <p>Price,$</p>
        <input type="number" name="price" placeholder="Price" value="<?= $product['price']?>" class="form-control" <br/> <br/>
        <button type="submit" name="send" class="btn btn-success">Update</button>
    </form>
</div>
</body>
</html>