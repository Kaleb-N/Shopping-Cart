<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">Shopping Cart</h3>
        </a>
          <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>  
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item active nav-link">
                    <h5 class="px-5 cart">
                    
                        Cart 
                        <?php
                            if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo "<span class='cart-count text-warning'><img src = \"cart-icon.png\" class='logo'>$count </span>";
                            }else{
                                echo "<span class='cart-count text-warning'><img src = \"cart-icon.png\" class='logo'>0  </span>";
                            }
                        ?>
                       
                     </h5>
                </a>
            </div>
        </div>
    </nav>
</header>