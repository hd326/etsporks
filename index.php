<?php
require('util/main.php');
require('model/database.php');
require('model/cart.php');
require('util/validation.php');
require('model/order.php');

require_once('model/fields.php');
require_once('model/validate.php');
require_once('model/fb_config.php');

require_once('phpmailer/PHPMailerAutoload.php');
require_once('phpmailer/class.smtp.php');

require('vendor/autoload.php');

\Stripe\Stripe::setApiKey('');

$action = filter_input(INPUT_POST, 'action');
if($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

$validate = new Validate();
$fields = $validate->getFields();

$fields->addField('email_phone');
$fields->addField('first_name');
$fields->addField('last_name');
$fields->addField('address');
$fields->addField('city');
$fields->addField('country');
$fields->addField('state');
$fields->addField('zip');
$fields->addField('phone_number');

switch ($action) {
    case 'home':
        include 'view/home.php';
        break;
    case 'purchase':
        $products = get_products();
        include 'view/purchase.php';
        break;
    case 'about':
        include 'view/about.php';
        break;
    case 'contact':
        include 'view/contact.php';
        break;
    case 'add':
        /*$product_id = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        if ($quantity === null) {
            display_error('You must enter a quantity.');
        } elseif (!is_valid_number($quantity, 1)) {
            display_error('Quantity must be 1 or more.');
        }
        cart_add_item($product_id, $quantity);
        $cart = cart_get_items();
        break;*/
        break;
    case 'share':
        /*if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
        // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
        }
        
        //FB post content
        $message = 'ET Sporks, an environment friendly utensil!';
        $title = 'Post From Website';
        $link = 'http://etspork.com';
        $description = 'CodexWorld is a programming blog.';
        $picture = 'http://www.codexworld.com/wp-content/uploads/2015/12/www-codexworld-com-programming-blog.png';
                
        $attachment = array(
            'message' => $message,
            'name' => $title,
            'link' => $link,
            'description' => $description,
            'picture'=>$picture,
        );
        
        try{
            // Post to Facebook
            $fb->post('/me/feed', $attachment, $accessToken);
            
            // Display post submission status
            echo 'The post was published successfully to the Facebook timeline.';
        }catch(FacebookResponseException $e){
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        }catch(FacebookSDKException $e){
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
}else{
    // Get Facebook login URL
    $fbLoginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
    
    // Redirect to Facebook login page
    echo '<a href="'.$fbLoginURL.'"><img src="fb-btn.png" /></a>';
}*/
    case 'cart_page':
        include 'view/cart_page.php';
        break;
        
    case 'checkout':
        // shipping cost was here, but we no longer need it change pricing prematurely
        $country = filter_input(INPUT_POST, 'country');
        $country_code = "";
        $shipping_cost = "";
        $email_phone = "";
        $first_name = "";
        $last_name = "";
        $company = "";
        $address = "";
        $apt = "";
        $city = "";
        $country = "";
        $state = "";
        $zip = "";
        $phone_number = "";
        $shipping_method = filter_input(INPUT_POST, 'shipping_method');
        $totalPrice = "";
        $shippingPrice = "";
        $totalPriceShipping = "";
        include 'view/checkout.php';
        break;
    case 'shipping':
        $shipping_method = filter_input(INPUT_POST, 'shipping_method');
        // shipping method gets sent back if user decides to go back, from the payment screen (which is the page it is sent to)
        $country = filter_input(INPUT_POST, 'country');
        $country_code = filter_input(INPUT_POST, 'country_code');
        // for the shipping rates display -- it's doing alot
        $email_phone = filter_input(INPUT_POST, 'email_phone');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $apt = filter_input(INPUT_POST, 'apt');
        $city = filter_input(INPUT_POST, 'city');
        //$country = filter_input(INPUT_POST, 'country');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        
        $validate->text('country', $country);
        $validate->text('email_phone', $email_phone);
        $validate->text('first_name', $first_name);
        $validate->text('last_name', $last_name);
        $validate->text('address', $address);
        $validate->text('city', $city);
        $validate->text('state', $state);
        $validate->text('zip', $zip);
        $validate->text('phone_number', $phone_number);
        
        if($fields->hasErrors()){
            include 'view/checkout.php';
            break;
        }
        
        include 'view/shipping.php';
        break;
    case 'payment':
        // to payment
        $shipping_cost = filter_input(INPUT_POST, 'shipping_cost');
        $shipping_method = filter_input(INPUT_POST, 'shipping_method');
        
        if($shipping_cost == ''){
        $shipping_method = filter_input(INPUT_POST, 'shipping_method');
        $country = filter_input(INPUT_POST, 'country');
        $country_code = filter_input(INPUT_POST, 'country_code');
        $email_phone = filter_input(INPUT_POST, 'email_phone');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $apt = filter_input(INPUT_POST, 'apt');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
            include 'view/shipping.php';
            break;
            
        } else {
        // countries data need to be passed onto our payment page
        $country = filter_input(INPUT_POST, 'country');
        $country_code = filter_input(INPUT_POST, 'country_code');
        // once we get the country to populate, we need to store the actual text into a separate hidden input field
        // since the ajax actually populates both fields, we need BOTH descriptions for each field,
        // unless we only use the shipping text that is CHOSEN...
        $shipping_method = filter_input(INPUT_POST, 'shipping_method');
        $email_phone = filter_input(INPUT_POST, 'email_phone');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $apt = filter_input(INPUT_POST, 'apt');
        $city = filter_input(INPUT_POST, 'city');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        }
        include 'view/payment.php';
        break;
        
    case 'revise':
        $shipping_method = filter_input(INPUT_POST, 'shipping_method');
        $email_phone = filter_input(INPUT_POST, 'email_phone');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $apt = filter_input(INPUT_POST, 'apt');
        $city = filter_input(INPUT_POST, 'city');
        $country = filter_input(INPUT_POST, 'country');
        $country_code = filter_input(INPUT_POST, 'country_code');
        // send the country value backward to checkout?
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        
        include 'view/checkout.php';
        break;
        
    case 'charge':
        // we need to store customer information
        $token = filter_input(INPUT_POST, 'stripeToken');
        
        $email_phone = filter_input(INPUT_POST, 'email_phone');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $apt = filter_input(INPUT_POST, 'apt');
        $city = filter_input(INPUT_POST, 'city');
        $country = filter_input(INPUT_POST, 'country');
        $country_code = filter_input(INPUT_POST, 'country_code');
        // send the country value backward to checkout?
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        $shipping_method = filter_input(INPUT_POST, 'shipping_method');
        $mirror = filter_input(INPUT_POST, 'qty1');
        $brush = filter_input(INPUT_POST, 'qty2');
        
        /*
        these names are not valid because they are on the second half of the checkout page
        
        $subtotal = filter_input(INPUT_POST, 'subtotal_cost');
        $shipping = filter_input(INPUT_POST, 'shipping_total_cost');
        $total = filter_input(INPUT_POST, 'total_cost');
        */
        $subtotal = filter_input(INPUT_POST, 'subtotal');
        $shipping = filter_input(INPUT_POST, 'shipping');
        $total = filter_input(INPUT_POST, 'total');
        $stripe_total = str_replace('.', '', $total);
        
        $customer = \Stripe\Customer::create(array(
        "email" => $email_phone,
        "source" => $token
        ));
        
        // charge customer
        $charge = \Stripe\Charge::create(array(
        "amount" => $stripe_total,
        // we don't put the dot, but this is 50 dollars
        // this would be implemented as 
        "currency" => "usd",
        "description" => $mirror . " - Mirror / " . $brush . " - Brush",
        "customer" => $customer->id,
        // these contents form the first two columns of the stripe API
        // customer email is up top, it must be
        )); 
        
        //add_customer($customer->id, $first_name, $last_name, $email_phone, $phone_number);
        
        add_transaction($charge->id, $customer->id, $email_phone, $first_name, $last_name, $company, $address, $apt, $city, $country, $state, $zip, $phone_number, $mirror, $brush, $shipping_method, $subtotal, $shipping, $total);
        
        $mail = new PHPMailer();   
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                           // Passing `true` enables exceptions
    //Server settings
                                     // Enable verbose debug output
                                         // Set mailer to use SMT
    //$mail->Host = gethostbyname("a2plcpnl0849.prod.iad2.secureserver.net");
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;   
        $mail->SMTPAuth = true;  
        $mail->Username = '';
        $mail->Password = '';
                        // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Priority = 1;
        $mail->AddCustomHeader("X-MSMail-Priority: High");
        $mail->WordWrap = 50;  
        $mail->From = 'support@etspork.com';
        $mail->Sender = 'support@etspork.com';     // TCP port to connect to
        $mail->FromName = $first_name . ' ' . $last_name;
        //Recipients
        $mail->setFrom("donotreply@company.com", $first_name . ' ' . $last_name);
        $mail->addReplyTo("support@etspork.com", $first_name . ' ' . $last_name);
        $mail->addAddress("support@etspork.com", $first_name . ' ' . $last_name);


    //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'New order:';
        $mail->Body    = 
        "<h1 align=center>
        You have received a new order!<br>
        Name: " .$first_name . ' ' . $last_name . "<br>" . "
        Address: " . $address . ' ' . $apt . ' ' . $city .' '. $country .' '. $state .' '. $zip ."<br>" . "
        Shipping Method: " . $shipping_method . "<br>" . "
        Phone Number: " . $phone_number . "<br>" . "
        Brush: " . $brush . "<br>" . "
        Mirror: " . $mirror . "<br>" . "
        Shipping: " . $shipping . "<br>" . "
        Total: " . $total . "<br>";
    
        if(!$mail->send()){
        echo "Something went wrong. Please try again.";
        } else {
        
        include 'view/contact.php';
        break;
        }
        
        header('Location: view/success.php?tid='.$charge->id.'&product='.$charge->description);
        break;
        
    case 'confirm':
        $country = filter_input(INPUT_POST, 'country');
        $country_code = filter_input(INPUT_POST, 'country_code');
        $email_phone = filter_input(INPUT_POST, 'email_phone');
        $first_name = filter_input(INPUT_POST, 'first_name');
        $last_name = filter_input(INPUT_POST, 'last_name');
        $company = filter_input(INPUT_POST, 'company');
        $address = filter_input(INPUT_POST, 'address');
        $apt = filter_input(INPUT_POST, 'apt');
        $city = filter_input(INPUT_POST, 'city');
        //$country = filter_input(INPUT_POST, 'country');
        $state = filter_input(INPUT_POST, 'state');
        $zip = filter_input(INPUT_POST, 'zip');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        
        // for db, not apparent
        $shipping_cost = filter_input(INPUT_POST, 'shipping_cost');
        $subtotal_cost = "";
        $total_cost = "";
        
        include 'view/confirm.php';
        break;
        
    case 'deal':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone_number = filter_input(INPUT_POST, 'phone_number');
        $mail = new PHPMailer();   
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                           // Passing `true` enables exceptions
    //Server settings
                                     // Enable verbose debug output
                                         // Set mailer to use SMT
    //$mail->Host = gethostbyname("a2plcpnl0849.prod.iad2.secureserver.net");
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;   
        $mail->SMTPAuth = true;  
        $mail->Username = '';
        $mail->Password = '';                     // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Priority = 1;
        $mail->AddCustomHeader("X-MSMail-Priority: High");
        $mail->WordWrap = 50;  
        $mail->From = 'support@etspork.com';
        $mail->Sender = 'support@etspork.com';     // TCP port to connect to
        $mail->FromName = $name;
        //Recipients
        $mail->setFrom("donotreply@company.com", $name);
        $mail->addReplyTo("support@etspork.com", $name);
        $mail->addAddress("support@etspork.com", $name);


    //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Inquiry to become a dealer.';
        $mail->Body    = "<h1 align=center>Name: ". $name ."<br>Email: " . $email . "<br>Phone Number: " .$phone_number. "<br>Message: You have received an inquiry from " .$name. " to become a dealer.";
    
        if(!$mail->send()){
        echo "Something went wrong. Please try again.";
        } else {
        
        include 'view/contact.php';
        break;
        }
        
    case 'question':
        $name2 = filter_input(INPUT_POST, 'name2');
        $email2 = filter_input(INPUT_POST, 'email2');
        $message = filter_input(INPUT_POST, 'message');
        
        $mail = new PHPMailer();   
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                           // Passing `true` enables exceptions
    //Server settings
                                     // Enable verbose debug output
                                         // Set mailer to use SMT
    //$mail->Host = gethostbyname("a2plcpnl0849.prod.iad2.secureserver.net");
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;   
        $mail->SMTPAuth = true;  
        $mail->Username = '';
        $mail->Password = '';                         // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Priority = 1;
        $mail->AddCustomHeader("X-MSMail-Priority: High");
        $mail->WordWrap = 50;  
        $mail->From = 'support@etspork.com';
        $mail->Sender = 'support@etspork.com';     // TCP port to connect to
        $mail->FromName = $name2;
        //Recipients
        $mail->setFrom("donotreply@company.com", $name2);
        $mail->addReplyTo("support@etspork.com", $name2);
        $mail->addAddress("support@etspork.com", $name2);


    //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Message about et spork';
        $mail->Body    = "<h1 align=center>Name: ". $name2 ."<br>Email: " . $email2 . "<br>" . "<br>Message: " . $message;
    
        if(!$mail->send()){
        echo "Something went wrong. Please try again.";
        } else {
        
        include 'view/contact.php';
        break;
        }
    case 'privacy':
        include 'view/privacy.php';
        break;
    case 'terms':
        include 'view/terms.php';
        break;
    case 'return':
        include 'view/return.php';
        break;
}

?>
