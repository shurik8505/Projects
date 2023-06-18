<?php require_once 'config/connect.php' ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Products</title>
</head>

<style>
    th, td {
        padding: 10px;
    }
    th{
        background: #606060;
        color: white;
    }
    td{
        background: #b5b5b5;
    }
</style>

<body>

<?php require "Blocks/header.php"?>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Discription</th>
        <th>Price,$</th>
    </tr>

    <?php

    $products = mysqli_query($connect, "SELECT * FROM `products`");
    $products = mysqli_fetch_all($products);
    foreach ($products as $product){

      ?>

    <tr>
        <td><?= $product['0'] ?></td>
        <td><?= $product['1'] ?></td>
        <td><?= $product['2'] ?></td>
        <td><?= $product['3'] ?></td>
        <td><a href="product.php?id=<?= $product['0'] ?>">View</a></td>
        <td><a href="update.php?id=<?= $product['0'] ?>">Update</a></td>
        <td><a style="color: red;" href="vendor/delete.php?id=<?= $product['0'] ?>">Delete</a></td>
    </tr>

    <?php
    }

    ?>
</table>



<div class="container mt-5">
    <h1 class="container mb-5">Add new products</h1>

    <form action="vendor/create.php" method="post">
        <p>Title</p>
        <input type="text" name="title" placeholder="Title" class="form-control"> <br/> <br/>
        <p>Description</p><br/>
        <textarea name="description" placeholder="Description" class="form-control"></textarea>  <br/>
        <p>Price,$</p>
        <input type="number" name="price" placeholder="Price" class="form-control" <br/> <br/>
        <button type="submit" name="send" class="btn btn-success">Add new product</button>
    </form>
</div>

<?php require "Blocks/footer.php"?>

</body>
</html>

