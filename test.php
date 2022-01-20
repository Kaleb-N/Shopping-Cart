<?php
session_start();
    print_r($_SESSION['cart']);

    if(isset($_POST['quantity'])){
        
        foreach($_SESSION['cart'] as $value){
           
            if($value['id'] == $_POST['product_id']){
                $value['quantity'] = $_POST['quantity'];
                print_r($value);
                
            } 
        }
    }
    

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <br>
    <br><br>
    <form action="test.php" method="post">
    <select name="quantity" onchange="this.form.submit()">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
    </form>
    </body>
    </html>