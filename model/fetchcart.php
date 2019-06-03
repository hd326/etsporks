<?php
session_start();

$total_price = 0;
$total_item = 0;

$output = '';

// this happens for each action basically
// if the shopping cart is not empty, we show its contents
if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
     $output .= '
        <div class="shopping_cart_item" id="shopping_cart_item'.$values['product_id'].'">
        
        <!-- thinking if this is needed, i think it was a test, and I dont actually need it -->
        
            <div class="shopping_cart_img"><img src="image/'.$values['product_code'].'.jpg"></div>
            
            <div class="shopping_cart_desc">
            
                <div class="shopping_cart_delete"><p>ET SPORK<span class="dash"> - </span>PREORDER<span class="dash"> -</span> 31%</p><div class="delete" id='.$values['product_id'].'>x</div></div>
            
                
                <p class="finish"><span>Finish:</span> <span>'.$values['product_name'].'</span></p>
                
                <!-- old
                
                <div class="shopping_cart_number">
                    <input type="text" value='.$values['product_quantity'].'><span>x</span><span>$'.$values['product_price'].'</span>
                </div>
                
                old -->
                
                <!-- initial checkout changer integration input button button -->
                <div class="shopping_cart_number">
                    <div class="shopping_cart_value"><input type="text" value='.$values['product_quantity'].'>
                        <button class="add" id='.$values['product_id'].'><span></span></button>
                        <button class="subtract" id='.$values['product_id'].'><span></span></button>
                    </div>

                    <div class="shopping_cart_price"><span>x</span><span>'.$values['product_price'].'</span></div>

                </div>
                <!-- initial checkout changer integration input button button -->
                
                
            </div>
        </div>
     ';
     $total_price = $total_price + ($values['product_quantity'] * $values['product_price']);
     $total_item = $total_item + $values['product_quantity'];
 }
$output .= '
<div id="shopping_cart_instructions">
            <p>Special instructions for seller</p>
            <textarea></textarea>
        </div>
        <hr>

        <div id="shopping_cart_price">
            <p>SUBTOTAL:</p>
            <p class="total_price"></p>
        </div>
        <hr>


        <a href="index.php?action=cart_page"><div class="shopping_cart_checkout">VIEW CART</div></a>
        <a href="index.php?action=checkout"><div class="shopping_cart_checkout">CHECKOUT
        </div></a>
';
}
    else
    {
        $output .= '
        <div id="empty_cart">
        No products in the cart
        </div>
        ';
    }
    $data = array(
    'cart_details' => $output,
    'total_price' => number_format($total_price, 2),
    'total_item' => $total_item
    );

echo json_encode($data);

?>

