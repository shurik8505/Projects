<?php

    $connect = mysqli_connect('localhost', 'shurik', '1', 'test');

    if(!$connect) {
        die('Error connect to DataBase!');
    }