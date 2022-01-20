<?php
    session_start();
    include('component.php');
    include('db.php');

    if(isset($_POST['add'])){
        if(isset($_SESSION['cart'])){
            $items_array_id = array_column($_SESSION['cart'], 'product_id');
            if(in_array($_POST['product_id'], $items_array_id)){
                echo '<script>alert("Product already in cart")</script>';
               
            }else{
                $count = count($_SESSION['cart']);
                $items_array = array('product_id' => $_POST['product_id']);
                $_SESSION['cart'][$count] = $items_array;
            }

        }else{
            $items_array = array(
                'product_id' => $_POST['product_id'],
            );
            $_SESSION['cart'][0] = $items_array;
        }
    }
   
   
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        .cart-count{
            text-align: center;
            padding: 0 0.9rem 0.1rem 0.9rem;
            border-radius: 3rem;
            background: white;
            color: #333;
        }
        .logo{
            width: 18px;
            height: 18px;
            margin-top: -7px;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <?php include('header.php')?>
    <div class="container">
        <div class="row text-center py-5">
            <?php
                if(mysqli_num_rows($result)>0){
                    
                    while($row = mysqli_fetch_assoc($result)){
                        component($row['name'], $row['image'], $row['price'], $row['id']);
                    }
                }

                
            ?>
        </div>
    </div>
</body>
</html>
