<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
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
        
    
    </script>


<body>
    
    <div id="customer_shipping_country"><?php echo htmlspecialchars($country); ?></div>
    <div id="customer_shipping_country_code"><?php echo htmlspecialchars($country_code); ?></div>
    
    
    <script>
        /*$(document).ready(function(data){
            var country = $('#customer_shipping_country').val();
                        $.ajax({
                            url: 'checkoutpageshippingarrays2.php',
                            method: "GET",
                            data: {
                                country: country,
                            },
                            success: function(data){
                                //$('#customer_2_subtotal_shipping .customer_2_ss_line:nth-of-type(2) p:nth-of-type(2)').text('--');
                                $('#customer_information #customer_1 #customer_1_shipping_method #customer_1_shipping_method_container').html(data);
                            }
                        });
        });*/
        
        
    </script>
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
                        <li class="1_link">Cart</li>
                        <li class="1_arrow">></li>
                        <li class="1_link">Customer information</li>
                        <li class="1_arrow">></li>
                        <li class="1_link">Shipping method</li>
                        <li class="1_arrow">></li>
                        <li class="1_link">Payment method</li>
                    </ul>
                </nav>
            </div>

            <div id="customer_1_changes">
                <div class="customer_1_changes_line">
                    <div class="customer_1_changes_cell">Contact</div>
                    <div class="customer_1_changes_cell"><?php echo $email_phone; ?></div>
                    <div class="customer_1_changes_cell">
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
                            <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>"><button type="submit">Change</button></form>
                    </div>
                </div>
                <hr>
                <div class="customer_1_changes_line">
                    <div class="customer_1_changes_cell">Ship to</div>
                    
                    <?php $country = str_replace('_', ' ', $country); ?>
                    
                    <div class="customer_1_changes_cell"><?php echo $address . ', ' . $zip . ' ' . $city . ', ' . $country; ?></div>
                    
                    <div class="customer_1_changes_cell">
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
                            <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>"><button type="submit">Change</button></form>
                    </div>
                </div>
                <!--<hr>
            
<div class="customer_1_changes_line">
                <div class="customer_1_changes_cell">Method</div>
                <div class="customer_1_changes_cell">Asia - Over $20 Order - Reduced Standard Shipping - $3.00</div>
                <div class="customer_1_changes_cell">Change</div>
            </div>  
            -->
            </div>

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
                
                
                <form action="index.php?action=payment" method="post">
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
                
                <input id="shipping_cost" type="text" name="shipping_cost" value="">
                <input id="shipping_method" type="hidden" name="shipping_method" value="<?php echo $shipping_method; ?>">
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
                <div id="continue"><button type="submit">Continue to payment method</button></div>
                </form>
            </div>

        </div>

        <div id="customer_2">

        </div>

    </div>


</body>

</html>
