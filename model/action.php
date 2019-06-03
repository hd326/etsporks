<?php
//action.php
session_start();

require('database.php');

if(isset($_POST["action"]))
{
 if($_POST["action"] == "add")
 {
  if(isset($_SESSION["shopping_cart"]))
  {
   $is_available = 0;
   foreach($_SESSION["shopping_cart"] as $keys => $values)
   {
    if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])
      // this assumes that the shopping cart has this product
      // thus it is a revision to the quantity
      // product id, along with all other parameters are passed
    {
      // the product is there, so we run this block to update the quantity
     $is_available++;
     $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];
        
     $_SESSION["shopping_cart"][$keys]['product_total'] = number_format($_SESSION["shopping_cart"][$keys]['product_price'] * ($_SESSION["shopping_cart"][$keys]['product_quantity']), 2);
    }
   }
      // the product is not there, it stays at 0
      // we add it
   if($is_available == 0)
   {
    $item_array = array(
     'product_id'               =>     $_POST["product_id"],  
     'product_name'             =>     $_POST["product_name"],  
     'product_code'             =>     $_POST["product_code"], 
     'product_price'            =>     $_POST["product_price"],  
     'product_quantity'         =>     $_POST["product_quantity"],
     'product_total'            =>     number_format($_POST["product_quantity"] * $_POST["product_price"], 2)
    );
    $_SESSION["shopping_cart"][] = $item_array;
       //echo $_SESSION["shopping_cart"][$item_array]["product_id"];
       //echo $_SESSION["shopping_cart"][$item_array]["product_name"];
       //echo $_SESSION["shopping_cart"][$item_array]["product_code"];
       //echo $_SESSION["shopping_cart"][$item_array]["product_price"];
       //echo $_SESSION["shopping_cart"][$item_array]["product_quantity"];
   }
       // ... each item has its array ...
       // ... we add a new item if it's not there
  }

// if the shopping cart is set, we assume it's not available,
// if it IS available, we update the quantity thru the product_id
     
// if it's not available, we take all information and initialize cart item
     
// if the shopping cart is not set, we intializae it
  else
  {
   $item_array = array(
    'product_id'               =>     $_POST["product_id"],  
    'product_name'             =>     $_POST["product_name"],  
    'product_code'             =>     $_POST["product_code"], 
    'product_price'            =>     $_POST["product_price"],  
    'product_quantity'         =>     $_POST["product_quantity"],
    'product_total'            =>     number_format($_POST["product_quantity"] * $_POST["product_price"], 2),
       
   );
   $_SESSION["shopping_cart"][] = $item_array;
  }
 }
     
    
if($_POST["action"] == 'remove')
 {
  foreach($_SESSION["shopping_cart"] as $keys => $values)
  {
   if($values['product_id'] == $_POST["product_id"])
   {
    unset($_SESSION["shopping_cart"][$keys]);
   }
  }
 }
     
 if($_POST["action"] == 'empty')
 {
  unset($_SESSION["shopping_cart"]);
 }
    
if($_POST["action"] == 'plus')
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
     if ($values['product_id'] == $_POST['product_id'])
     {
         $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + 1;
         
         $_SESSION["shopping_cart"][$keys]['product_total'] = 
        number_format($_SESSION["shopping_cart"][$keys]['product_quantity'] * $_SESSION["shopping_cart"][$keys]['product_price'], 2);
     }
 }
}
    
if($_POST["action"] == 'subtract')
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {
     if ($values['product_id'] == $_POST['product_id'])
     {
         $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] - 1;
         
         $_SESSION["shopping_cart"][$keys]['product_total'] = 
        number_format($_SESSION["shopping_cart"][$keys]['product_quantity'] * $_SESSION["shopping_cart"][$keys]['product_price'], 2);
     }
 }
}
    
if($_POST["action"] == 'shipping')
{   
    if(isset($_SESSION["shipping"]))
    {
        $_SESSION["shipping"] = $_POST["product_shipping"];
    } 
    else
    {
        $_SESSION["shipping"] = $_POST["product_shipping"];
    }
}
    
if($_POST["action"] == 'clear_shipping')
{
    $_SESSION['shipping'] = '0.00';
}
    
}
 

?>
