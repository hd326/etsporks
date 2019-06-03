<?php include 'view/header.php'; ?>

<div class="title">

    <h1><a href="purchase.html">ET SPORK PREORDER</a></h1>

</div>

<div id="purchase_container">

    <?php foreach ($products as $product) : ?>

    <div class="purchase_product">

        <div class="purchase_img"><img src="image/<?php echo $product['productCode']; ?>.jpg"></div>

        <!-- 1. pic display from db -->

        <div class="purchase_description">

            <div class="purchase_title">
                <h2>
                    ET SPORK <span id="percentage_off">(
                        <?php echo $product['productName']; ?> Finish ) 31% off</span></h2>
                <!-- 2. product name display from db -->
            </div>

            <div class="purchase_information">
                <p>$
                    <?php echo $product['listPrice']; ?>
                    <!-- 3. price display from db -->
                </p>
                <p>Et Spork will start shipping early April 2019.</p>
                <p>Shipping will be free if purchase is $50 and above.</p>
                <p><span>Finish</span>:
                    <?php echo $product['productName']; ?>

                    <!-- 4. finish display from db -->
                </p>
            </div>


            <!--<input type="hidden" name="quantity" id="quantity<?php/* echo $product['productID']; */?>"  value="1">-->

            <input type="hidden" name="hidden_code" id="code<?php echo $product['productID']; ?>" value="<?php echo $product['productCode']; ?>">

            <input type="hidden" name="hidden_name" id="name<?php echo $product['productID']; ?>" value="<?php echo $product['productName']; ?>">

            <input type="hidden" name="hidden_price" id="price<?php echo $product['productID']; ?>" value="<?php echo $product['listPrice']; ?>">



            <div class="purchase_cart">

                <div class="purchase_buttons"><button id="subtract">-</button><input type="text" id="quantity<?php echo $product['productID']; ?>" value="1"><button id="add">+</button></div>
                <!-- id as product_id + name (like php) to transfer values with input vals -->
                <!-- adding product id to cart -->
                <!-- adding quantity with input field -->

                <div class="purchase_add" id="<?php echo $product['productID']; ?>">
                    <!--<a href="">ADD TO CART</a>--><input type="button" name="add_to_cart" value="ADD TO CART">
                </div>

            </div>

            <div class="purchase_icons">

                <p><span>Share:</span>
                    <a href="<?php echo $product['facebookUrl']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <!-- fb same -->
                    
                    <a href="<?php echo $product['twitterUrl']; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <!-- twitter same -->
                    
                    <a href="<?php echo $product['googleUrl']; ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                    <!-- google same -->
                    
                    <a href="<?php echo $product['email']; ?>"><i class="fas fa-envelope"></i></a>
                    <!-- mail same -->
                    
                    <a href="<?php echo $product['pinterestUrl']; ?>"><i class="fab fa-pinterest"></i></a>
                    
                    <!-- pinterest diff -->
                    
                    <a href="<?php echo $product['tumblrUrl']; ?>" data-content="https://www.etspork.com/image/Et1Mirror.jpg" target="_blank"><i class="fab fa-tumblr"></i></a>
                    
                    <!-- tumblr same -->
                    
                    <!-- removing http for data -->
                    
                </p>
            </div>
        </div>
    </div>


    <?php endforeach; ?>

    <script>
        $(function() {
            /*$('#subtract').on('click', function(){
                if(parseInt($('#amt').val()) > 0) {
                    $('#amt').val(parseInt($('#amt').val()) - 1);
                }
            });
        
            $('#add').on('click', function(){
                $('#amt').val(parseInt($('#amt').val()) + 1);
            });
            */
            /*$('#subtract').on('click',function(){
            if(parseInt($('#amt', this).val()) > 0){
               $('#amt', this).val(parseInt($('#amt', this).val()) - 1);
            }
            });
        
            $('#add').on('click',function(){
            $('#amt', this).val(parseInt($('#amt', this).val()) + 1);
            });
            */

            $('.purchase_buttons').on('click', '#add', function() {
                $(this).siblings('input[type="text"]').val(parseInt($(this).siblings('input[type="text"]').val(), 10) + 1);

            }).on('click', '#subtract', function() {
                if (parseInt($(this).siblings('input[type="text"]').val(), 10) > 0) {
                    $(this).siblings('input[type="text"]').val(parseInt($(this).siblings('input[type="text"]').val(), 10) - 1);
                }
            });
        });

    </script>

    <!--<div class="purchase_product">

        <div class="purchase_img"><img src="image/get_et_spork2.jpg"></div>

        <div class="purchase_description">

            <div class="purchase_title">
                <h2>Et Spork (Mirror Finish) 31% off</h2>
            </div>

            <div class="purchase_information">
                <p>$9.00</p>
                <p>Et Spork will start shipping early April 2019.</p>
                <p>Shipping will be free if purchase is $50 and above.</p>
                <p><span>Finish</span>: Mirror</p>
            </div>

            <div class="purchase_cart">

                <div class="purchase_buttons"><button>-</button><input type="text" value="1"><button>+</button></div>

                <div class="purchase_add"><a href="">ADD TO CART</a></div>

            </div>

            <div class="purchase_icons">

                <p><span>Share:</span>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-google-plus-g"></i>
                    <i class="fas fa-envelope"></i>
                    <i class="fab fa-pinterest"></i>
                    <i class="fab fa-tumblr"></i>
                </p>


            </div>
        </div>

    </div>

    <div class="purchase_product">

        <div class="purchase_img"><img src="image/get_et_spork2.jpg"></div>

        <div class="purchase_description">

            <div class="purchase_title">
                <h2>Et Spork (Brush Finish) 31% off</h2>
            </div>

            <div class="purchase_information">
                <p>$9.00</p>
                <p>Et Spork will start shipping early April 2019.</p>
                <p>Shipping will be free if purchase is $50 and above.</p>
                <p><span>Finish</span>: Brush</p>
            </div>

            <div class="purchase_cart">

                <div class="purchase_buttons"><button>-</button><input type="text" value="1"><button>+</button></div>

                <div class="purchase_add"><a href="">ADD TO CART</a></div>

            </div>

            <div class="purchase_icons">

                <p><span>Share:</span>
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-google-plus-g"></i>
                    <i class="fas fa-envelope"></i>
                    <i class="fab fa-pinterest"></i>
                    <i class="fab fa-tumblr"></i>
                </p>

            </div>
        </div>

    </div>
-->

</div>

<?php include 'footer.php'; ?>
