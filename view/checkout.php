<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <title></title>
</head>

<script>
    $(document).ready(function(data){
        
    load_checkout_page_data();
        
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
        $('#country').on('change', function(){
                        var action = 'clear_shipping';
                        $.ajax({
                            url: 'model/action.php',
                            method: 'POST',
                            data: {
                                action: action,
                            },
                            success: function(data){
                                /*$('#customer_2_subtotal_shipping .customer_2_ss_line:nth-of-type(2) p:nth-of-type(2)').text('--');*/
                                load_checkout_page_data();
                                
                            }
                        });
                    });
        
        
        $(window).resize(function(){
            if($(window).width() > 1000){
                $('#customer_2').show();
            }
        });
        });
            
    
    </script>

<body>
    
    <form action="index.php?action=shipping" method="post">
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
        <input type="hidden" name="shipping_method" value="<?php echo $shipping_method; ?>">
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

                <div id="customer_1_collection">
                    <p class="customer_1_collection_title">Contact information</p>
                    
                    <div id="customer_1_email"><input name="email_phone" class="<?php echo $fields->getField('email_phone')->setError(); ?>" type="text" placeholder="Email or mobile phone number" value="<?php echo htmlspecialchars($email_phone); ?>"><?php echo $fields->getField('email_phone')->setErrorIcon();?></div>

                    <p class="customer_1_collection_title">Shipping address</p>
                    <div id="customer_1_collection_fields">

                        <div id="customer_1_field"><input name="first_name" class="<?php echo $fields->getField('first_name')->setError(); ?>" type="text" placeholder="First name" value="<?php echo htmlspecialchars($first_name); ?>"><?php echo $fields->getField('first_name')->setErrorIcon();?></div>
                        
                        <div id="customer_1_field"><input name="last_name" class="<?php echo $fields->getField('last_name')->setError(); ?>" type="text" placeholder="Last name" value="<?php echo htmlspecialchars($last_name); ?>"><?php echo $fields->getField('last_name')->setErrorIcon();?></div>
                        
                        <div id="customer_1_field"><input name="company" class="" type="text" placeholder="Company (optional)" value="<?php echo htmlspecialchars($company); ?>"></div>
                        
                        <div id="customer_1_field"><input name="address" class="<?php echo $fields->getField('address')->setError(); ?>" type="text" placeholder="Address" value="<?php echo htmlspecialchars($address); ?>"><?php echo $fields->getField('address')->setErrorIcon();?></div>
                        
                        <div id="customer_1_field"><input name="apt" class="" type="text" placeholder="Apartment, suite, etc. (optional)" value="<?php echo htmlspecialchars($apt);?>"></div>
                        
                        <div id="customer_1_field"><input name="city" class="<?php echo $fields->getField('city')->setError(); ?>" type="text" placeholder="City" value="<?php echo htmlspecialchars($city); ?>"><?php echo $fields->getField('city')->setErrorIcon(); ?></div>

                        <!--<input type="text" placeholder="Country">-->
                        <div id="customer_1_field"><select id="country" name="country">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Aland_Islands">Aland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antigua_And_Barbuda">Antigua And Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armena">Armena</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bonaire_Sinit_Eustatius_And_Saba">Bonaire Sinit Eustatius And Saba</option>
                            <option value="Bosnia_And_Herzegovina">Bosnia And Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet_Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British_Indian_Ocean_Territory">British Indian Ocean Territory</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina_Faso">Burkina Faso</option>
                            <option value="Burindi">Burindi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape_Verde">Cape Verde</option>
                            <option value="Cayman_Islands">Cayman Islands</option>
                            <option value="Central_African_Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas_Islands">Christmas Islands</option>
                            <option value="Cocos_Keeling_Islands">Cocos Keeling Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo_The_Democratic_Republic_Of_The">Congo The Democratic Republic Of The</option>
                            <option value="Cook_Islands">Cook Islands</option>
                            <option value="Costa_Rica">Costa Rica</option>
                            <option value="Cote_d_Ivoire">Cote d Ivoire</option>
                            <option value="Crotia">Crotia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curacao">Curacao</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech_Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican_Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El_Salvador">El Salvador</option>
                            <option value="Equatorial_Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland_Islands">Falkland Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French_Guiana">French Guiana</option>
                            <option value="French_Polynesia">French Polynesia</option>
                            <option value="French_Southern_Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guernsey">Guernsey</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea_Bissau">Guinea Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard_Island_And_Mcdonald_Islands">Heard Island And Mcdonald Islands</option>
                            <option value="Holy_See_Vatican_City_State">Holy See Vatican City_ tate</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong_Kong">Hong_Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran_Islamic_Republic_Of">Iran Islamic Republic Of</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="IsleOfMan">IsleOfMan</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea_Democratic_Peoples_Republic_Of">Korea Democratic Peoples Republic Of</option>
                            <option value="Kosovo">Kosovo</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao_Peoples_Democratic_Republic">Lao Peoples Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan_Arab_Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Macedonia_Republic_Of">Macedonia Republic Of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Matinique">Matinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Maldova_Republic_Of">Maldova Republic Of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands_Antilles">Netherlands Antilles</option>
                            <option value="New_Caledonia">New Caledonia</option>
                            <option value="New_Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk_Island">Norfolk Island</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palestinian_Territory_Occupied">Palestinian Territory Occupied</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua_New_Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Republic_Of_Cameroon">Republic Of Cameroon</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint_Barthelemy">Saint Barthelemy</option>
                            <option value="Saint_Helena">Saint Helena</option>
                            <option value="Saint_Kitts_And_Nevis">Saint Kitts And Nevis</option>
                            <option value="Saint_Lucia">Saint Lucia</option>
                            <option value="Saint_Martin">Saint Martin</option>
                            <option value="Saint_Pierre_And_Miquelon">Saint Pierre And Miquelon</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San_Marina">San Marina</option>
                            <option value="Sao_Tome_And_Principe">Sao Tome And Principe</option>
                            <option value="Saudi_Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra_Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Sint_Maarten">Sint Maarten</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Soloman_Islands">Soloman Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South_Africa">South Africa</option>
                            <option value="South_Georgia_And_The_South_Sandwich_Islands">South Georgia And The South Sandwich Islands</option>
                            <option value="South_Korea">South Korea</option>
                            <option value="South_Sudan">South Sudan</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri_Lanka">Sri Lanka</option>
                            <option value="St_Vincent">St Vincent</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard_And_Jan_Mayen">Svalbard And Jan Mayen</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania_United_Republic_Of">Tanzania United Republic Of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Timor_Leste">Timor Leste</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad_And_Tobago">Trinidad And Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks_And_Caicos_Islands">Turks And Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United_Arab_Emirates">United Arab Emirates</option>
                            <option value="United_Kingdom">United Kingdom</option>
                            <option value="United_States" selected>United States</option>
                            <option value="United_States_Minor_Outlying_Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin_Islands_British">Virgin Islands British</option>
                            <option value="Wallis_And_Futuna">Wallis And Futuna</option>
                            <option value="Western_Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                            </select></div>


                            <div id="customer_1_field"><input name="state" class="<?php echo $fields->getField('state')->setError(); ?>" type="text" placeholder="State" value="<?php echo htmlspecialchars($state); ?>"><?php echo $fields->getField('state')->setErrorIcon();?></div>
                        
                            <div id="customer_1_field"><input name="zip" class="<?php echo $fields->getField('zip')->setError(); ?>" type="text" placeholder="ZIP code" value="<?php echo htmlspecialchars($zip); ?>"><?php echo $fields->getField('zip')->setErrorIcon();?></div>
                        
                            <div id="customer_1_field"><input name="phone_number" class="<?php echo $fields->getField('phone_number')->setError(); ?>" type="text" placeholder="Phone" value="<?php echo htmlspecialchars($phone_number); ?>"><?php echo $fields->getField('phone_number')->setErrorIcon();?></div>

                    </div>
                </div>

                <div id="customer_1_return_continue">
                    <a href="index.php?action=cart_page">
                        <div id="return">
                            <div id="return_arrow">></div> Return to cart
                        </div>
                    </a>
                    <div id="continue"><button type="submit">Continue to shipping method</button></div>
                </div>
            </div>
            <div id="customer_2">
                <!--<div class="customer_2_item_line">
                
                <div class="customer_2_item_line_cell"><img src="image/get_et_spork2.jpg"><span class="customer_2_line_cell_amt">1</span></div>
                
                <div class="customer_2_item_line_cell"><p>ET Spork</p><p>Mirror</p></div>
                
                <div class="customer_2_item_line_cell"><p>$12.95</p></div>
                
            </div>
            <div class="customer_2_item_line">
                
                <div class="customer_2_item_line_cell"><img src="image/get_et_spork2.jpg"><span class="customer_2_line_cell_amt">1</span></div>
                
                <div class="customer_2_item_line_cell"><p>ET Spork</p><p>Mirror</p></div>
                
                <div class="customer_2_item_line_cell"><p>$12.95</p></div>
                
            </div>
            <hr>
            
            <div id="customer_2_subtotal_shipping">
            <div class="customer_2_ss_line"><p>Subtotal</p><p></p></div>
            <div class="customer_2_ss_line"><p><? php if(isset($shipping_cost)) { echo $shipping_cost; } else { echo "--";} ?></p><p></p></div>
            </div>
            <hr>
            
            <div id="customer_2_total">
            <p>Total</p>
                <p><span>USD</span><span></span></p>
            </div>-->

            </div>
        </div>
    </form>
</body>

</html>
