<script> 

            $(document).ready(function(data) {

                load_cart_data();
                load_cart_page_data();

                function load_cart_data() {
                    $.ajax({
                        url: "model/fetchcart.php",
                        method: "POST",
                        dataType: "json",
                        success: function(data) {
                            $('#cart_items').html(data.cart_details);
                            $('.total_price').text(data.total_price);
                            $('#cart_number').text(data.total_item);
                        }
                    });
                }



                function load_cart_page_data() {
                    $.ajax({
                        url: "model/fetchcartpage.php",
                        method: "POST",
                        dataType: "json",
                        success: function(data) {
                            $('#cart_items_page').html(data.cart_details);

                            $('.item_page_subtotal').text(data.total_price);

                            /*$('#item_page_checkout #item_page_instructions_map #item_page_map_shipping #item_page_map_shipping_total #item_page_map_subtotal_shipping #item_page_subtotal').text(data.total_price);*/
                            // actually subtotal price

                            $('#item_page_cart_totals #item_page_cart_t_d .item_page_cart_t_d_d #item_page_subtotal').text(data.total_price);



                            /*$('#cart_items_each_total').html(data.cart_details);*/
                        }
                    });
                }



                $('.purchase_add').click(function() {
                    var product_id = $(this).attr("id");

                    var product_name = $('#name' + product_id).val();

                    var product_code = $('#code' + product_id).val();

                    var product_price = $('#price' + product_id).val();

                    var product_quantity = $('#quantity' + product_id).val();

                    var action = "add";

                    if (product_quantity > 0) { // as in the value
                        $.ajax({
                            url: "model/action.php",
                            method: "POST",
                            data: {
                                product_id: product_id,
                                product_name: product_name,
                                product_code: product_code,
                                product_price: product_price,
                                product_quantity: product_quantity,
                                action: action,
                            },
                            success: function(data) {
                                load_cart_data();
                                load_cart_page_data();
                            }
                        });
                    } else {
                        alert('Please enter number of quantity');
                    }
                });



                /*$(document).on('click', '.delete', function() {
                    var button = $(this);
                    // its not actually a button, but the "delete" div, which happens to have an ID of the product ID
                    var product_id = $(this).attr("id");
                    var action = "remove";
                    $.ajax({
                        url: "model/action.php",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            //$('#shopping_cart_item'+product_id).remove();
                             //this
                        }
                    });
                });*/

                $(document).on('click', '.delete', function() {
                    var button = $(this);
                    // its not actually a button, but the "delete" div, which happens to have an ID of the product ID
                    var product_id = $(this).attr("id");
                    var action = "remove";
                    $.ajax({
                        url: "model/action.php",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            load_cart_page_data();
                            //$('#shopping_cart_item'+product_id).remove();
                        }
                    });
                });
                
                $(document).on('click', '.shopping_cart_delete', function() {
                    var button = $(this);
                    
                    var product_id = $(this).attr("id");
                    var action = "remove";
                    $.ajax({
                        url: "model/action.php",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            load_cart_page_data();
                            
                        }
                    });
                });
                
                $(document).on('click', '.delete_page', function() {
                    var button = $(this);
            
                    var product_id = $(this).attr("id");
                    var action = "remove";
                    $.ajax({
                        url: "model/action.php",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            load_cart_page_data();
                        }
                    });
                });
                
                $(document).on('click', '.delete_page_button', function() {
                    var button = $(this);
            
                    var product_id = $(this).attr("id");
                    var action = "remove";
                    $.ajax({
                        url: "model/action.php",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            load_cart_page_data();
                        }
                    });
                });


                $(document).on('click', '.add', function() {
                    var button = $(this);
                    var product_id = $(this).attr("id");
                    var action = "plus";
                    $.ajax({
                        url: "model/action.php",
                        method: "POST",
                        data: {
                            product_id: product_id,
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            load_cart_page_data();
                        }
                    });
                });

                $(document).on('click', '.subtract', function() {
                    var button = $(this);
                    if ($(this).siblings('input').val() > 1) {
                        var product_id = $(this).attr("id");
                        var action = "subtract";
                        $.ajax({
                            url: "model/action.php",
                            method: "POST",
                            data: {
                                product_id: product_id,
                                action: action
                            },
                            success: function(data) {
                                load_cart_data();
                                load_cart_page_data();
                            }
                        });
                    }
                });

                $(document).on('click', '#empty_cart', function() {
                    var action = "empty";
                    $.ajax({
                        url: "model/action.php",
                        method: "POST",
                        data: {
                            action: action
                        },
                        success: function(data) {
                            load_cart_data();
                            load_cart_page_data();
                        }
                    });
                });

                $(document).on('click', '#update_cart', function() {
                    load_cart_page_data();
                });


                $('.item_add_subtract').on('click', '.add', function() {
                    $(this).siblings('input[type="text"]').val(parseInt($(this).siblings('input[type="text"]').val(), 10) + 1);

                }).on('click', '.subtract', function() {
                    if (parseInt($(this).siblings('input[type="text"]').val(), 10) > 1) {
                        $(this).siblings('input[type="text"]').val(parseInt($(this).siblings('input[type="text"]').val(), 10) - 1);
                    }
                });



                $(document).on('click', '.gather', function() {
                    var country = $('#country').val();
                    $.ajax({
                        url: 'checkoutpageshippingarrays2.php',
                        method: "GET",
                        data: {
                            country: country,
                        },
                        success: function(data) {
                            $('#item_page_map_shipping_options:nth-of-type(1)').html(data);
                        }
                    });
                });

                /*$(document).on('change', '#shipping_cost', function() {
                    var product_shipping = $(this).val();
                    var action = "shipping";
                    $.ajax({
                        url: 'model/action.php',
                        method: "POST",
                        data:{
                          action: action,
                          product_shipping: product_shipping,
                        },
                        success: function(data){
                          load_cart_page_data();  
                        }
                    });*/

                $(document).on('change', '#shipping_cost', function() {
                    $('#item_page_shipping').html($(this).val());
                    $('#item_page_subtotal').text((parseInt($(this).attr('data-shipping')) + parseInt($(this).val())).toFixed(2));
                });

                $(document).on('change', '#us_cost', function() {
                    $('#item_page_shipping').html($(this).val());

                    $('#item_page_subtotal').text((parseInt($(this).attr('data-shipping')) + parseInt($(this).val())).toFixed(2));

                });

                // do we need to send it to the server?
                // how about we just kick out the total value thats not changeable to an ATTR,
                // then take that value and SUBTRACT it by the shipping cost?
                // since it is a VALUE, it cant be changed by HTML

            });

            // ajax -> subtotal - value -> = real subtotal 


            /*$('#item_page_subtotal').text($('#item_page_subtotal').text() - $(this).val());
                    
            $('#item_page_cart_totals #item_page_cart_t_d .item_page_cart_t_d_d #item_page_subtotal').text($('#item_page_cart_totals #item_page_cart_t_d .item_page_cart_t_d_d #item_page_subtotal').text() - $(this).val());*/
            /*var action = 'alter';
                    
            $.ajax({
                url: 'model/action.php',
                method: 'POST',
                data: {
                  action: action,  
                },
                success: {
                    
                },
                
            });*/

            /*$('.shopping_cart_number').on('click', '#add', function() {
                $(this).siblings('input[type="text"]').val(parseInt($(this).siblings('input[type="text"]').val(), 10) + 1);

            }).on('click', '#subtract', function() {
                if (parseInt($(this).siblings('input[type="text"]').val(), 10) > 0) {
                    $(this).siblings('input[type="text"]').val(parseInt($(this).siblings('input[type="text"]').val(), 10) - 1);
                }
            });*/





            $(function() {

                $('#icon').on('click', function() {
                    $('#side_nav nav').toggleClass('side_nav_width');
                    $('#side_nav_transparent').show();
                });

                $('#header_cart').on('click', function() {
                    $('#shopping_cart').toggleClass('shopping_cart_width');
                    $('#side_nav_transparent').show();
                });

                function closeSideNav() {
                    var side = document.querySelector('#side_nav nav');
                    var sideNavMargin = window.getComputedStyle(side).getPropertyValue('margin-left');
                    if (sideNavMargin === '0px') {
                        $('#side_nav nav').toggleClass('side_nav_width');
                        $('#side_nav_transparent').hide();
                    }
                }

                function closeShoppingCart() {
                    var shoppingCart = document.querySelector('#shopping_cart');
                    var shoppingCartMargin = window.getComputedStyle(shoppingCart).getPropertyValue('margin-right');
                    if (shoppingCartMargin === '0px') {
                        $('#shopping_cart').toggleClass('shopping_cart_width');
                        $('#side_nav_transparent').hide();
                    }
                }

                $('#side_nav_transparent').click(function() {
                    closeSideNav();
                });

                $('#side_nav_transparent').click(function() {
                    closeShoppingCart();
                });

                $('#close_cart').click(function() {
                    closeShoppingCart();
                });


            });

        </script>