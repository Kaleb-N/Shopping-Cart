<?php
    session_start();
    include('component.php');
    include('db.php');
    
   





    // $val = $_POST['qty'];
    // remove item
    if(isset($_POST['remove'])){
        if($_GET['action'] == 'remove'){
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['product_id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    echo "<script>window.location('cart.php')</script>";
                }
            }
        }
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="script.js"></script>
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
   <?php require_once('header.php') ?>
   <div class="container-fluid mt-3">
       <div class="row px-5 carts">
           <div class="col-md-7">
               <div>
                   <h6>My Cart</h6>
                   <hr>
                   <?php 
                        
                      
                        $total = 0;
                        
                        if(isset($_SESSION['cart'])){
                            $product_id = array_column($_SESSION['cart'],'product_id');
                            while($row = mysqli_fetch_assoc($result)){
                                foreach($product_id as $id){
                                    if($row['id'] == $id){
                                        cartElement($row['image'], $row['name'],$row['price'], $row['id']);
                                          $total =$total +$row['price'] ;

                                    }
                                }
                            }
                        }else{
                            echo 'Cart is empty';
                        }     
                    
                        
                        
                        
                        


                    ?>   
               </div>
           </div>
           <div class="col-md-5">
                <div class="">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php 
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<h6>Price ($count items)</h6>";
                                }else{
                                    echo '<h6>Price (0 items)</h6>';
                                }
                            ?>
                            <hr>
                            <h6>Amount Payable</h6>
                            <h6>Delivery Fee</h6>
                            <h6>Total</h6>
                        </div>
                    <div class="col-md-6 pt-5">
                        <h6 class="sub-total">
                            <?php 
                                echo "$total";
                            ?>
                        </h6>
                        <h6>Free</h6>
                        <h6 class="total">
                            <?php 
                                 echo "$total";
                                
                            ?>
                        </h6>
                    </div>
                    </div>
                </div>
           </div>
       </div>
   </div>

   <script>
        let deductBtnArr = document.getElementsByClassName('sub')
        let addBtnArr = document.getElementsByClassName('add')
        for(let deductBtn of deductBtnArr){
            deductBtn.onclick = function(){
                let currentInputBox = deductBtn.nextElementSibling;
                currentInputBox.value = currentInputBox.value - 1
                if(isNaN(currentInputBox.value) || currentInputBox.value<=0){
                    currentInputBox.value = 1
                }
                updateTotal()
            }
        }
        for(let addBtn of addBtnArr){
            addBtn.onclick = () => {
                let currentInputBox1 = addBtn.previousElementSibling;
                currentInputBox1.value = parseInt(currentInputBox1.value) + 1
                updateTotal();
            }
        }

        function updateTotal(){
            let rows = document.querySelectorAll('form')
            let total = 0

            for(i = 0; i<rows.length; i++){
                let row = rows[i]
                let priceElement = row.querySelector('.price')
                let qtyInput = row.querySelector('.inp')
                
                let price = parseFloat(priceElement.innerText.replace('#', ''))
                let quantity =  qtyInput.value
                total = total + (price * quantity)
                console.log(total)
            }
            total = Math.round(total * 100)/100
            document.querySelector('.total').innerText = '#' + total
            document.querySelector('.sub-total').innerText = '#' + total
        }
   </script>
</body>
</html>