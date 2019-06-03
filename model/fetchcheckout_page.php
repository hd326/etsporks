<?php
session_start();
$total_price = 0;
$total_item = 0;
$output = '';
$items = array();
if(isset($_SESSION['shipping'])) 
{
    $shipping_price = $_SESSION['shipping'];
}
else
{
    $_SESSION['shipping'] = "0.00";
    $shipping_price = $_SESSION['shipping'];
}



if(!empty($_SESSION["shopping_cart"]))
{
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
        $output .= '
        
        
            <div class="customer_2_item_line">
                
                <div class="customer_2_item_line_cell"><img src="image/'.$values['product_code'].'.jpg"><span class="customer_2_line_cell_amt">'.$values['product_quantity'].'</span></div>
                
                <div class="customer_2_item_line_cell"><p>ET Spork</p><p><span></span><span class="customer_2_line_cell_name">'.$values['product_name'].'</span<</p></div>
                
                <div class="customer_2_item_line_cell"><p><span>$</span><span class="customer_2_line_cell_total">'.$values['product_total'].'</span></p></div>
                
            </div>
            
            <hr>
        ';
        $total_price = number_format($total_price + ($values['product_quantity'] * $values['product_price']), 2);
        $total_item = $total_item + $values['product_quantity'];
        $total_price_shipping = number_format($total_price + $shipping_price, 2);
        $qty[$keys] = $values['product_quantity'];
        
    }
    $qty[0] = (isset($qty[0])) ? $qty[0] : "0";
    $qty[1] = (isset($qty[1])) ? $qty[1] : "0";
    
    $output .= '
            
            <input type="hidden" id="subtotal_cost" name="subtotal_cost" value='.$total_price.'>
            <input type="hidden" id="shipping_total_cost" name="shipping_total_cost" value='.$shipping_price.'>
            <input type="hidden" id="total_cost" name="total_cost" value='.$total_price_shipping.'>
            <input type="hidden" id="item_qty1" name="item_qty1" value='.$qty[0].'>
            <input type="hidden" id="item_qty2" name="item_qty2" value='.$qty[1].'>
            <div id="customer_2_subtotal_shipping">
            
            <div class="customer_2_ss_line"><p>Subtotal</p><p><span>$</span><span></span></p></div>
            <div class="customer_2_ss_line"><p>Shipping</p><p><span>$</span><span></span></p></div>
            </div>
            <hr>
            
            <div id="customer_2_total">
            <p>Total</p>
                <p><span>USD</span><span><span>$</span><span></span></span></p>
            </div>
    ';
}

/*$cart_item_line = $_SESSION['shopping_cart'];
foreach ($cart_item_line as $key => $values) {
    $item_qty[] += $values['product_quantity'];
    echo $item_qty[0];
    echo $item_qty[1];
}*/



// got this to work by removing the $_SESSION = ""; on a cart page

$data = array(
'cart_details' => $output,
'total_price' => number_format($total_price, 2),
'shipping_price' => $shipping_price,
'total_price_shipping' => $total_price_shipping
);

echo json_encode($data);

?>

