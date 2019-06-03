<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <title></title>
</head>
<script>
    $(document).ready(function(data){
    $(window).resize(function(){
            if($(window).width() > 1000){
                $('#customer_2').show();
            }
        });
    
        $('.customer_2_toggle_item:nth-of-type(2)').on('click', function(){
         var text = $(this).text();
         $('.customer_2_toggle_item:nth-of-type(2)').toggleClass('changed');
         if(text == 'Show order summary'){
             $('#customer_2').slideToggle();
             $('.customer_2_toggle_item:nth-of-type(2)').html('Hide order summary');
             
         } 
         if (text == 'Hide order summary'){
             $('#customer_2').slideToggle();
             $('.customer_2_toggle_item:nth-of-type(2)').html('Show order summary');
            
             
         }
    });
        
    /*$('#payment_method1').on('click', function(){
        // adding a box not associated with 3 payment cells, has made the count 4
        $('#customer_1_payment_box_wrap .customer_1_payment_cell:nth-of-type(3)').show();
       $('#customer_1_payment_box #customer_1_payment_box_wrap #customer_1_payment_cell_help').hide(); 
        $('#continue button').show();
        $('#customer_1 #customer_1_return_continue #continue #paypal-button').hide();
        
    });
    
    $('#payment_method2').on('click', function(){
        $('#customer_1_payment_box_wrap .customer_1_payment_cell:nth-of-type(3)').hide();
        $('#customer_1_payment_box #customer_1_payment_box_wrap #customer_1_payment_cell_help').show(); 
        $('#continue button').hide();
        $('#customer_1 #customer_1_return_continue #continue #paypal-button').show();
    });*/
        
    load_checkout_page_data();
        
    function load_checkout_page_data() {
                    $.ajax({
                        url: "model/fetchcheckout_page.php",
                        method: "POST",
                        dataType: "json",
                        success: function(data) {
                            $('#customer_2').html(data.cart_details);
                            
                            $('.customer_2_ss_line:nth-of-type(1) p:nth-of-type(2) span:nth-of-type(2)').text(data.total_price);
                            
                            $('#customer_2_subtotal_shipping .customer_2_ss_line:nth-of-type(2) p:nth-of-type(2) span:nth-of-type(2)').text(data.shipping_price);
                            
                            $('#customer_2_total p:nth-of-type(2) span:nth-of-type(2) span:nth-of-type(2)').text(data.total_price_shipping);
                            
                            $('.customer_2_toggle_item:nth-of-type(3)').text(data.total_price_shipping);
                            
    
                            //$('#customer_2_total p:nth-of-type(2) span:nth-of-type(2)').text(data.total_price);

                            /*$('#item_page_checkout #item_page_instructions_map #item_page_map_shipping #item_page_map_shipping_total #item_page_map_subtotal_shipping #item_page_subtotal').text(data.total_price);*/
                            // actually subtotal price
                            /*$('#cart_items_each_total').html(data.cart_details);*/
                        }
                    });
                }            
        });
    
        $(document).on('click', '#shipping_cost', function() {
                var product_shipping = $(this).val();
                var action = "shipping";
                $.ajax({
                    url: 'model/action.php',
                    method: 'POST',
                    data: {
                        action: action,
                        product_shipping: product_shipping,
                    },
                    success: function(data) {
                        load_checkout_page_data();
                    }
                });
            });

            $(document).on('click', '#us_cost', function() {
                var product_shipping = $(this).val();
                var action = "shipping";
                $.ajax({
                    url: 'model/action.php',
                    method: 'POST',
                    data: {
                        action: action,
                        product_shipping: product_shipping,
                    },
                    success: function(data) {
                        load_checkout_page_data();
                    }
                });
            });
        
            $(window).on('load', function(){
            var country = $('#customer_shipping_country').html();
            // it's not immediately reading the value on customer_shipping_country j.s runs before server, i thought it was the other way around?
                        $.ajax({
                            url: 'shipping_countries.php',
                            method: "GET",
                            data: {
                                country: country,
                            },
                            success: function(data){
                                /*$('#customer_2_subtotal_shipping .customer_2_ss_line:nth-of-type(2) p:nth-of-type(2)').text('--');*/
                                $('#customer_information #customer_1 #customer_1_shipping_method #customer_1_shipping_method_container').html(data);
                            }
                        });
            /*var shipping_method = $('.shipping_details').html();
            $('#shipping_method1').val(shipping_method);*/
                // so when data is loaded
                // we need to have it so when it is clicked...
                // the shipping detail method is most convenient
                // targeting dom 
                // .shipping_line input[type=radio] on click function .shipping_line input[type=hidden].val() = #shipping_method.val();
            $('#subtotal').val($('#subtotal_cost').val());
            $('#shipping').val($('#shipping_total_cost').val());
            $('#total').val($('#total_cost').val());
            $('#qty1').val($('#item_qty1').val());
            $('#qty2').val($('#item_qty2').val());
                
            
            });
    
        /*$('#customer_information #customer_1 #customer_1_shipping_method #customer_1_shipping_method_container .shipping_line #shipping_cost').on('click', function (){
            alert('hello');
            var shipping_method = $('#customer_information #customer_1 #customer_1_shipping_method #customer_1_shipping_method_container .shipping_line #shipping_method', this).val();
            $('#shipping_method1').val(shipping_method);
        });*/
    
        
        
        $(document).on('change', '#shipping_cost', function() {
                $('.customer_2_ss_line:nth-of-type(2) p:nth-of-type(2) span:nth-of-type(2)').html($(this).val());
            
                $('#customer_2_total p:nth-of-type(2) span:nth-of-type(2) span:nth-of-type(2)').text((parseFloat($(this).attr('data-shipping')) + parseFloat($(this).val())).toFixed(2));
            
                // we also need it to change for an input value database purposes, we can't just take a div
            
                $('#subtotal_cost').html($(this).val());
            
                $('#total_cost').val((parseFloat($(this).attr('data-shipping')) + parseFloat($(this).val())).toFixed(2));
            
                $('#shipping_total_cost').val($(this).val());
            
                $('#customer_1_return_continue #shipping_cost').val($(this).val());
                
               //var shipping_method = $('#customer_information #customer_1 #customer_1_shipping_method #customer_1_shipping_method_container p.shipping_line #shipping_method', this).val();
                
                //alert(shipping_method);
               //$('#shipping_method1').val(shipping_method); 
                
                var shipping_method = ($(this).attr("data-method")).toString();
                $("#shipping_method").val(shipping_method);
            });
            

            $(document).on('change', '#us_cost', function() {
                $('.customer_2_ss_line:nth-of-type(2) p:nth-of-type(2) span:nth-of-type(2)').html($(this).val());
                
                $('#customer_2_total p:nth-of-type(2) span:nth-of-type(2) span:nth-of-type(2)').text((parseFloat($(this).attr('data-shipping')) + parseFloat($(this).val())).toFixed(2));
                
                // we also need it to change for an input value database purposes, we can't just take a div
            
                $('#subtotal_cost').html($(this).val());
                
                $('#total_cost').val((parseFloat($(this).attr('data-shipping')) + parseFloat($(this).val())).toFixed(2));
                
                $('#shipping_total_cost').val($(this).val());
                
                $('#customer_1_return_continue #shipping_cost').val($(this).val());
            });
        
        // how can i hide a shipping line based on value of total_cost
        
    






    $(window).on('load', function(){
                
                var country = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .country').value;
                var country_code = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .country_code').value;
                var email_phone = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .email_phone').value;
                var first_name = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .first_name').value;
                var last_name = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .last_name').value;
                var company = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .company').value;
                var address = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .address').value;
                var apt = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .apt').value;
                var city = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .city').value;
                var state = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .state').value;
                var zip = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .zip').value;
                var phone_number = document.querySelector('#customer_1_changes .customer_1_changes_line .customer_1_changes_cell .phone_number').value; 
        
                var subtotal = document.querySelector("#subtotal_cost").value;
                var shipping = document.querySelector("#shipping_total_cost").value;
                var total = document.querySelector("#total_cost").value;
        // alert(subtotal);
        // alert(shipping);
        // alert(total);
        
        /*var itemqty1 = (document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt').innerHTML) : (document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt')).innerHTML : "";
        
        var itemqty2 = (document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt').innerHTML) : (document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt')).innerHTML : "";
        
        var itemname1 = (document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(2) .customer_2_line_cell_name').innerHTML) : (document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt')).innerHTML : "";
        
        var itemname2 = (document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(2) .customer_2_line_cell_name').innerHTML) : document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(2) .customer_2_line_cell_name').innerHTML : "";*/
        
        var itemqty1 = document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt') ? document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt').innerHTML : "0";
        
        var itemqty2 = document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt') ? document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(1) .customer_2_line_cell_amt').innerHTML : "0";
        
        var itemname1 = document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(2) .customer_2_line_cell_name') ? document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(2) .customer_2_line_cell_name').innerHTML : "";
        
        var itemname2 = document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(2) .customer_2_line_cell_name') ? document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(2) .customer_2_line_cell_name').innerHTML : "";
        
        console.log(itemqty1);
        console.log(itemqty2);
        console.log(itemqty1);
        console.log(itemqty2);
        
        //var itemtotal1 = document.querySelector('.customer_2_item_line:nth-of-type(1) .customer_2_item_line_cell:nth-of-type(3) .customer_2_line_cell_total').innerHTML;
        
        //var itemtotal2 = document.querySelector('.customer_2_item_line:nth-of-type(2) .customer_2_item_line_cell:nth-of-type(3) .customer_2_line_cell_total').innerHTML;
        
        // why is itemqty and itemname not visible?
        
        
        // alert(itemname1);
        // alert(itemname2);
        // alert(itemqty1);
        // alert(itemqty2);
        //alert(itemtotal1);
        //alert(itemtotal2);
        /*
        
        since there is only 2 items...
        qty , name , total
        .customer_2_item_line_cell:nth-of-type(1)
        .customer_2_item_line_cell:nth-of-type(2)
        
        var name1 = document.querySelector();
        
        
        */
        
        // i can create an array and then foreach it?
        /*
        if (itemname1 != "") {
        var shoppingCartData = [
            {
            'name': 'ET Spork' + ' ' + itemname1, 
            'description': 'ET Spork 1', 
            'quantity': itemqty1,
            'price': '9.00',
            'tax': '0.00',
            'sku': 'ET Spork 1',
            'currency': 'USD'
            }
        ];
        } else if (itemname2 != "") {
            var shoppingCartData = [
                {
            'name': 'ET Spork' + ' ' + itemname2, 
            'description': 'ET Spork 1', 
            'quantity': itemqty2,
            'price': '9.00',
            'tax': '0.00',
            'sku': 'ET Spork 1',
            'currency': 'USD'
            }
            ];
        } else if (itemname1 != "" && itemname2 != "") {
            var shoppingCartData = [
            {
            'name': 'ET Spork' + ' ' + itemname1, 
            'description': 'ET Spork 1', 
            'quantity': itemqty1,
            'price': '9.00',
            'tax': '0.00',
            'sku': 'ET Spork 1',
            'currency': 'USD'
            },
            {
            'name': 'ET Spork' + ' ' + itemname2, 
            'description': 'ET Spork 1', 
            'quantity': itemqty2,
            'price': '9.00',
            'tax': '0.00',
            'sku': 'ET Spork 1',
            'currency': 'USD'
            }
        ];
        }
        */
        
        
        //alert(country_code);
        
                //alert(email_phone + '<br>' + country + '<br>' + first_name + '<br>' + last_name + '<br>' + company + '<br>' + address + '<br>' + apt + '<br>' + city + '<br>' + state + '<br>' + zip + '<br>' + phone_number);
                //r_duong89@yahoo.com<br>United States<br>Richard<br>Duong<br><br>8729 Koto Drive<br><br>Elk Grove<br>CA<br>95624<br>9167044061
        paypal.Button.render({
                    // Configure environment
                    env: 'sandbox',
                    client: {
                        sandbox: 'AbwUROMPvBXX3vEqgn3UHu9lNfsaIYmG8V2F61pUXAnGOaEG8OIZHFXEUTtnWXouadBB6kIyM_Olg6OS',
                        production: 'demo_production_client_id'
                    },
                    // Customize button (optional)
                    locale: 'en_US',
                    style: {
                        layout: 'horizontal',
                        size: 'responsive',
                        color: 'blue',
                        shape: 'rect',
                        tagline: 'false'
                    },
                    // Set up a payment
            
                    payment: function(data, actions) {
        
                        return actions.payment.create({
                            
                            transactions: [{
                                amount: {
                                    total: total,
                                    currency: 'USD',
                                    details: {
                                        subtotal: subtotal,
                                        tax: '0.00',
                                        shipping: shipping,
                                        handling_fee: '0.00',
                                        shipping_discount: '0.00',
                                        insurance: '0.00'
                                    }
                                },
                                /*description: 'The payment transaction description.',
                                custom: '90048630024435',*/
                                //invoice_number: '12345', Insert a unique invoice number
                                payment_options: {
                                    allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                                },
                                /*soft_descriptor: 'ECHI5786786',*/
                                item_list: {
                                    items: [
                                        /* 
                                        { 
                                            'name': 'ET Spork' + ' ' + itemname1,
                                            'description': 'ET Spork 1.',
                                            'quantity': itemqty1,
                                            'price': '9.00',
                                            'tax': '0.00',
                                            'sku': 'ET Spork 1',
                                            'currency': 'USD'
                                        }, 
                                        
                                        {
                                            'name': 'ET Spork' + ' ' + itemname2,
                                            'description': 'ET Spork 2.',
                                            'quantity': itemqty2,
                                            'price': '9.00',
                                            'tax': '0.00',
                                            'sku': 'ET Spork 1',
                                            'currency': 'USD'
                                        },
                                        */
                                    ], 
                                
                                    
                                    shipping_address: {
                                        recipient_name: first_name + " " + last_name,
                                        line1: address,
                                        line2: apt,
                                        city: city,
                                        country_code: country_code,
                                        postal_code: zip,
                                        phone: phone_number,
                                        state: state
                                    }
                                }
                                
                                
                            }],
                            note_to_payer: 'Contact us for any questions on your order.'
                        });
                    },
            
                    // Execute the payment
                    onAuthorize: function(data, actions) {
                        return actions.payment.execute().then(function() {
                            // Show a confirmation message to the buyer
                            window.alert('Thank you for your purchase!');
                        });
                    }
                }, '#paypal-button');
    });
    
    
        

    
</script>

<body>
    <input type="hidden" value="<?php echo $shipping_method; ?>">
    <div id="customer_2_mobile">
        <h1 id="checkout_title2">ET SPORK</h1>
        <hr>
        <div id="customer_2_toggle">
            <div class="customer_2_toggle_item"><i class="fas fa-shopping-cart"></i></div>
            <div class="customer_2_toggle_item">Show order summary</div>
            <div class="customer_2_toggle_item">$23.95</div>
        </div>
        <hr>
        </div>
    <div id="customer_information">


        <div id="customer_1">
            <h1 id="checkout_title">ET SPORK</h1>
            <div id="customer_1_nav">
                <nav>
                    <ul>
                        <li class="1_link"><a href="index.php?action=cart_page">Cart</a></li>
                        <li class="1_arrow">></li>
                        <li class="1_link"><a href="index.php?action=revise">Customer information</a></li>
                        <li class="1_arrow">></li>
                        <li class="1_link"><a href="index.php?action=shipping">Shipping method</a></li>
                        <li class="1_arrow">></li>
                        <li class="1_link">Payment method</li>
                    </ul>
                </nav>
            </div>

            <div id="customer_1_changes">
                <div class="customer_1_changes_line">
                    <div class="customer_1_changes_cell">Contact</div>
                    <div class="customer_1_changes_cell">
                        <?php echo $email_phone; ?>
                    </div>
                    <div class="customer_1_changes_cell">
                        <!-- we have this in place so that all fields are successfully transferred from one document to another checkout, shipping, to payment -->
                        <form action="index.php?action=revise" method="post">
                            <input type="hidden" name="shipping_method" value="<?php echo $shipping_method; ?>">
                            <input class="country" type="hidden" name="country" value="<?php echo $country; ?>">
                            <input class="country_code" type="hidden" name="country_code" value="<?php echo $country_code; ?>">
                            <input class="email_phone" type="hidden" name="email_phone" value="<?php echo $email_phone; ?>">
                            <input class="first_name" type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                            <input class="last_name" type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                            <input class="company" type="hidden" name="company" value="<?php echo $company; ?>">
                            <input class="address" type="hidden" name="address" value="<?php echo $address; ?>">
                            <input class="apt" type="hidden" name="apt" value="<?php echo $apt; ?>">
                            <input class="city" type="hidden" name="city" value="<?php echo $city; ?>">
                            <input class="state" type="hidden" name="state" value="<?php echo $state; ?>">
                            <input class="zip" type="hidden" name="zip" value="<?php echo $zip; ?>">
                            <input class="phone_number" type="hidden" name="phone_number" value="<?php echo $phone_number; ?>"><button type="submit">Change</button></form>
                    </div>
                </div>
                <hr>
                <div class="customer_1_changes_line">

                    <div class="customer_1_changes_cell">Ship to</div>

                    <?php $country = str_replace('_', ' ', $country); ?>

                    <div class="customer_1_changes_cell">
                        <?php echo $address . ', ' . $zip . ' ' . $city . ', ' . $country; ?>
                    </div>

                    <div class="customer_1_changes_cell">
                        <form action="index.php?action=revise" method="post">
                            <input type="hidden" name="shipping_method" value="<?php echo $shipping_method; ?>">
                            <input class="country" type="hidden" name="country" value="<?php echo $country; ?>">
                            <input class="country_code" type="hidden" name="country_code" value="<?php echo $country_code; ?>">
                            <input class="email_phone" type="hidden" name="email_phone" value="<?php echo $email_phone; ?>">
                            <input class="first_name" type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                            <input class="last_name" type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                            <input class="company" type="hidden" name="company" value="<?php echo $company; ?>">
                            <input class="address" type="hidden" name="address" value="<?php echo $address; ?>">
                            <input class="apt" type="hidden" name="apt" value="<?php echo $apt; ?>">
                            <input class="city" type="hidden" name="city" value="<?php echo $city; ?>">
                            <input class="state" type="hidden" name="state" value="<?php echo $state; ?>">
                            <input class="zip" type="hidden" name="zip" value="<?php echo $zip; ?>">
                            <input class="phone_number" type="hidden" name="phone_number" value="<?php echo $phone_number; ?>"><button type="submit">Change</button></form>
                    </div>
                </div>
                <hr>

                <div class="customer_1_changes_line">
                    <div class="customer_1_changes_cell">Method</div>
                    <div class="customer_1_changes_cell">
                        <?php echo $shipping_method; ?>
                    </div>
                    <div class="customer_1_changes_cell">
                        <form action="index.php?action=revise" method="post">
                            <input type="hidden" name="shipping_method" value="<?php echo $shipping_method; ?>">
                            <input class="country" type="hidden" name="country" value="<?php echo $country; ?>">
                            <input class="country_code" type="hidden" name="country_code" value="<?php echo $country_code; ?>">
                            <input class="email_phone" type="hidden" name="email_phone" value="<?php echo $email_phone; ?>">
                            <input class="first_name" type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                            <input class="last_name" type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                            <input class="company" type="hidden" name="company" value="<?php echo $company; ?>">
                            <input class="address" type="hidden" name="address" value="<?php echo $address; ?>">
                            <input class="apt" type="hidden" name="apt" value="<?php echo $apt; ?>">
                            <input class="city" type="hidden" name="city" value="<?php echo $city; ?>">
                            <input class="state" type="hidden" name="state" value="<?php echo $state; ?>">
                            <input class="zip" type="hidden" name="zip" value="<?php echo $zip; ?>">
                            <input class="phone_number" type="hidden" name="phone_number" value="<?php echo $phone_number; ?>"><button type="submit">Change</button></form>
                    </div>
                </div>
            </div>

            <!-- payment processing -->

            <div id="customer_1_payment">

        <h1>Payment method</h1>
        <p>All transactions are secure and encrypted</p>
        <div id="customer_1_payment_box">

            <div id="customer_1_payment_box_wrap">

                <div class="customer_1_payment_cell">
                    <div class="customer_1_payment_divide"><input id="payment_method1" type="radio" name="credit_card" checked> Credit card</div>
                    <div class="customer_1_payment_divide"><img src="image/creditcard.png"></div>
                </div>
                <hr>
                <!-- stripe implementation-->
                <div id="customer_1_payment_cell_help">
<i class="fas fa-arrow-right"></i><br>
                After clicking “Complete order”, you will be redirected to PayPal to complete your purchase securely.
                </div>
                
                <div class="customer_1_payment_cell">
                    
                    <div class="form-row">
                        <label for="card-element"></label>
                        
                        <div id="card-element">

                        </div>

                        <div id="card-errors" role="alert"></div>
                    </div>
                
                </div>
                
                <!--<hr>-->
                <!-- stripe implementation-->
                <!--<div class="customer_1_payment_cell">
                    <div class="customer_1_payment_divide"><input id="payment_method2" type="radio" name="credit_card"> PayPal</div>
                    <div class="customer_1_payment_divide"><img src="image/creditcardonly.png"></div>
                </div>
                -->

            </div>

        </div>
    </div>
        

            <!-- payment processing -->
            
            <div id="customer_1_return_continue">
                <form action="index.php?action=revise" method="post">
                            <input type="hidden" name="shipping_method" value="<?php echo $shipping_method; ?>">
                            <input type="hidden" name="country" value="<?php echo $country; ?>">
                            
                            <input type="hidden" name="email_phone" value="<?php echo $email_phone; ?>">
                            <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                            <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                            <input type="hidden" name="company" value="<?php echo $company; ?>">
                            <input type="hidden" name="address" value="<?php echo $address; ?>">
                            <input type="hidden" name="apt" value="<?php echo $apt; ?>">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <input type="hidden" name="state" value="<?php echo $state; ?>">
                            <input type="hidden" name="zip" value="<?php echo $zip; ?>">
                            <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>">
                    <div id="return">
                        <div id="return_arrow"><button type="submit">></button></div><button type="submit">Return to customer information</button>
                    </div>
                </form>
                
                
                <form action="index.php?action=charge" method="post" id="payment-form">
                    <!-- since we can't submit the shipping information from within this button ( it is rendered elsewhere ) -->
                    <!-- on revisit, i forgot why this is here -->
                
                <div id="customer_1_shipping_method">

                <p>Shipping method</p>
                

                <div id="customer_1_shipping_method_container">
                    
                    <!--<p class="customer_1_shipping_method_line"><span><input type="radio"></span><span>Standard Shipping</span><span>$2.99</span></p>

                    <p class="customer_1_shipping_method_line"></p>-->

                    <!--<p class=shipping_line><input data-shipping="" type=radio id=shipping_cost name=shipping_cost value=""><span class=shipping_details><span class=prices></span></span></p>-->
                    
                    <!-- it's sent in, but it also populates, but part of it also populates a separate input field name="shipping_method" -->
                    
                    <!-- we can say $('shipping_details').html() = input id="shipping_method" type="hidden" name="shipping_method" -->

                </div>
                
            </div>
                
                <input id="shipping_cost" type="hidden" name="shipping_cost" value="">
                <input id="shipping_method" type="text" name="shipping_method" value="<?php echo $shipping_method; ?>">
                <input type="hidden" name="country" value="<?php echo $country; ?>">
                <!-- country code not necessary, yet because of google -->
                    
                
                
                <input type="hidden" name="email_phone" value="<?php echo $email_phone; ?>">
                <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
                <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
                <input type="hidden" name="company" value="<?php echo $company; ?>">
                <input type="hidden" name="address" value="<?php echo $address; ?>">
                <input type="hidden" name="apt" value="<?php echo $apt; ?>">
                <input type="hidden" name="city" value="<?php echo $city; ?>">
                <input type="hidden" name="state" value="<?php echo $state; ?>">
                <input type="hidden" name="zip" value="<?php echo $zip; ?>">
                <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>">
                <!-- payment options -->     
                    
                <div id="continue">
                    <button id="continue_checkout" type="submit">Continue with Stripe Payment</button>
                    <script src="https://js.stripe.com/v3/"></script>
                    <script src="js/charge.js"></script>
                    <div id="paypal-button" style="height: 67.5px"></div>
                </div>
                    
                <!-- payment options -->  
                
                <!-- total fields -->
                <input id="subtotal" type="hidden" name="subtotal" value="">
                <input id="shipping" type="hidden" name="shipping" value="">
                <input id="total" type="hidden" name="total" value="">
                <input id="qty1" type="hidden" name="qty1" value="">
                <input id="qty2" type="hidden" name="qty2" value="">
                <!-- total fields -->
                </form>
            </div>

        </div>

        <div id="customer_2">
            <!--<div class="customer_2_item_line">

                <div class="customer_2_item_line_cell"><img src="image/get_et_spork2.jpg"><span class="customer_2_line_cell_amt">1</span></div>

                <div class="customer_2_item_line_cell">
                    <p>ET Spork</p>
                    <p>Mirror</p>
                </div>

                <div class="customer_2_item_line_cell">
                    <p>$12.95</p>
                </div>

            </div>
            <div class="customer_2_item_line">

                <div class="customer_2_item_line_cell"><img src="image/get_et_spork2.jpg"><span class="customer_2_line_cell_amt">1</span></div>

                <div class="customer_2_item_line_cell">
                    <p>ET Spork</p>
                    <p>Mirror</p>
                </div>

                <div class="customer_2_item_line_cell">
                    <p>$12.95</p>
                </div>

            </div>
            <hr>

            <div id="customer_2_subtotal_shipping">
                <div class="customer_2_ss_line">
                    <p>Subtotal</p>
                    <p>$25.90</p>
                </div>
                <div class="customer_2_ss_line">
                    <p>Shipping</p>
                    <p>$2.99</p>
                </div>
            </div>
            <hr>

            <div id="customer_2_total">
                <p>Total</p>
                <p><span>USD</span><span>$28.89</span></p>
            </div>

            <hr>-->
        </div>

    </div>


</body>

</html>
