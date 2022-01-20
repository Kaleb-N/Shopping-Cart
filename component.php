<?php

    // $qty = $_POST['quantity'];
    function component($name, $img, $price, $product_id){
        $element = "<div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"index.php\" method=\"POST\" class=\"\">
            <div class=\"card shadow py-3\">
                <div>
                    <img src=\"$img\"  class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$name</h5>
                    <h6>Star goes here</h6>
                    <p class=\"card-text\">
                        Lorem ipsum dolor sit amet consectetur.
                    </p>
                    <h5>
                        <small><s>2100</s></small>
                        <span class=\"price\">#$price</span>
                    </h5>
                    <button class=\"btn btn-warning my-3\" name=\"add\">Add to cart <img src = \"cart-icon.png\" class='logo'></button>
                    <input type=\"hidden\" name = \"product_id\" value=\"$product_id\">
                </div>
            </div>
        </form>
    </div>";

    echo $element;
    }

    
    

    // ?action=add&qty=$qty\
    function cartElement($img, $name, $price,$product_id){
        // $qty = $_POST['quantity'];
        $element = "<form action=\"cart.php?action=remove&id=$product_id\" method=\"post\">
        <div class=\"row bg-white pb-2\">
            <div class=\"col-md-3\">
                <img src=\"$img\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-5\">
                 <h5 class=\"pt-2\">$name</h5>
                 <h5 class=\"pt-2 price\">#$price </h5>
                 <button class=\"btn btn-danger\" name=\"remove\">Remove</button>
            </div>
            <div class=\"col-md-3 pt-5\">
                <button type=\"button\" class=\"btn bg-light border rounded-circle sub\" id=\"sub\">-</button>
                <input type=\"number\" class=\"w-25 form-control d-inline p-1 inp\" value=\"1\" id=\"inp\" name = \"qty\" readonly>
                <button type=\"button\" class=\"btn bg-light border rounded-circle add\" id=\"add\" >+</button>
                
                
                    <!--<select name=\"quantity\" onchanage=\"this.form.submit()\" id = \"quantity\">
                        <option value='1'>1</option>
                        <option value=\"2\">2</option>
                        <option value=\"3\">3</option>
                        <option value=\"4\">4</option>
                        <option value=\"5\">5</option>
                </select>-->
                
                
            </div>

            <input type=\"text\" name = \"product_id\" value=\"$product_id\" class=\"mt-1\" readonly>

        </div>
    </form>";

    echo $element;

  
}
?>