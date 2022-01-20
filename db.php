<?php

    $conn = mysqli_connect('localhost', 'root', '', 'cart');

    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);

   
    $query1 = "SELECT price FROM products ";
    $result1 = mysqli_query($conn, $query1);
     


    