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
        <div class="item_page">
        
        <!-- class shopping_cart_delete - delete_page_button - delete --> 


            <div class="item_page_mobile_delete">
                <div class="item_mobile_delete"><span class="delete_page"><span class="delete_page_button" id='.$values['product_id'].'></span></span></div>
                <div class="item_mobile_img"><img src="image/get_et_spork2.jpg"></div>
            </div>


            <div class="item_page_holder">

                <!--displays at 480px-->

                <div id="item_page_mobile_sec">
                    <span>PRODUCT:</span>
                    <span>PRICE:</span>
                    <span>QUANTITY:</span>
                    <span>TOTAL:</span>
                </div>

                <!--displays at 480px-->

                <div id="item_page_mobile_sec">

                    <!--hidden at 480px-->

                    <div>
                    
                    <!-- delete_page - delete -->
                    
                        <span class="delete_page" id='.$values['product_id'].'><span class="delete_page_button"></span></span>

                        <span class="image_page"><img src="image/'.$values['product_code'].'.jpg"></span>

                        <span class="desc_page"><span class="desc_page_sec">ET SPORK</span><span class="desc_page_sec">
                                <div class="desc_page_sec_f">Finish:</div>
                                <div class="desc_page_sec_t">'.$values['product_name'].'</div>
                            </span></span>
                    </div>

                    <!--hidden at 480px-->

                    <!--displays at 480px-->

                    <div class="item_page_mobile_product"><span class="mobile_product">ET SPORK</span><span class="mobile_description">
                            <div class="mobile_f">Finish: </div>
                            <div class="mobile_t">'.$values['product_name'].'</div>
                        </span></div>

                    <!--displays at 480px-->

                    <div>$9.00</div>
                    
                    <!-- item_add_subtract for add subtract -->
                    <!-- item_add_subtract - purchase_buttons -->
                    

                    <div class=item_add_subtract><button class="subtract" id='.$values['product_id'].'>-</button><input type="text" value='.$values['product_quantity'].'><button class="add" id='.$values['product_id'].'>+</button></div>

                    <div id=cart_items_each_total>$'.$values['product_total'].'</div>

                </div>

            </div>
        </div>
     ';
     $total_price = $total_price + ($values['product_quantity'] * $values['product_price']);
     $total_item = $total_item + $values['product_quantity'];
 }
$output .= '
<div id="item_page_buttons">

        <div id="item_page_clear"><button id="empty_cart">CLEAR SHOPPING CART</button></div>
        <div id="item_page_update"><button id="update_cart">UPDATE CART</button></div>

    </div>
    
    <div id="item_page_checkout">

        <!-- first checkout section -->

        <div id="item_page_instructions_map">
            <p id=item_page_instructions_title>SPECIAL INSTRUCTIONS FOR SELLER</p>
            <textarea></textarea>

            <p id="item_page_shipping_rates_title">Shipping rates for United States</p>
            <hr>
            <div id="item_page_map_shipping">
                <div id="item_page_map_shipping_options">
                    
                    <p class=shipping_line><input type=radio data-shipping='.number_format($total_price, 2).' id=us_cost name=shipping_cost value=0.00><span class=shipping_details>Free $20 and UP - <span class=prices>$0.00</span></span></p>
    
                    <p class=shipping_line><input type=radio data-shipping='.number_format($total_price, 2).' id=us_cost name=shipping_cost value=3.00><span class=shipping_details> Standard Shipping - <span class=prices>$3.00</span></span></p>
                    
                </div>
                
                <div id="item_page_map_shipping_total">
                    
                    <div id="item_page_map_subtotal_shipping">
                    <p><span>Subtotal</span><span><span id=dollar_sign>$</span><span class="item_page_subtotal"></span></span></p>
                    
                    <p><span>Shipping</span><span><span id="dollar_sign">$</span><span id=item_page_shipping></span></span></p>
                    
                    <p><span>Total</span><span><span id="dollar_sign">$</span><span id=item_page_subtotal></span></span></p>
                    
                    </div>
                
                
                </div>

                <hr>
                
                <!-- if split shipping details -->

                <!--<div class="item_page_map_shipping_sec">
                </div>
                <div class="item_page_map_shipping_sec">
                    <div id="item_page_map_shipping_choices"> 
                    </div>
                </div>-->

                <!-- if split shipping details -->

                <div id="item_page_map_shipping_options">

                    <!--<input type="radio" name="shipping_cost" value=3.00>HELLO
                <input type="radio" name="shipping_cost" value=6.00>HELLO-->

                    <select id="country" name="country">
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
                    </select>
                    <br>
                    <button class="gather">GATHER SHIPPING RATES</button>

                    <script>
                        

                    </script>

                </div>
            </div>
        </div>

        <!-- first checkout section end -->

        <!-- second checkout section -->

        <div id="item_page_cart_totals">
            <p>CART TOTALS</p>
            <p id="cart_ajax"></p>

            <div id="item_page_cart_t_d">

                <div class="item_page_cart_t_d_d">
                    <div class="item_page_cart_row_item">Subtotal:</div>
                    <div class="item_page_cart_row_item"><span id=dollar_sign>$</span><span id="item_page_subtotal"></span></div>
                </div>

                <div class="item_page_cart_t_d_d">
                    <div class="item_page_cart_row_item">Shipping:</div>
                    <div class="item_page_cart_row_item">Shipping & taxes calculated at checkout</div>
                </div>

                <div class="item_page_cart_t_d_d">
                    <div class="item_page_cart_row_item">TOTAL</div>
                    <div class="item_page_cart_row_item"><span id=dollar_sign>$</span><span id="item_page_subtotal"></span></div>
                </div>

            </div>
            <a href=index.php?action=checkout><button>PROCEED TO CHECKOUT</button></a>
        </div>

        <!-- second checkout section end -->
    
';
}
    else
    {
        $output .= '
        
        <div id="empty_cart_holder"><img src="image/cart.png"></div>
    <div id="empty_cart">
        <p id="title">YOUR CART IS CURRENTLY EMPTY.</h1>
        <p id="title_guide">Before you proceed to checkout you must add some products to your shopping cart. You will find a lot of interesting products on our "Shop" page.</p>
    <a href="index.php?action=purchase"><button>RETURN TO SHOP</button></a>
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
