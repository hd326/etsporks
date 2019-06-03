<?php

session_start();

$total_price = 0;
$total_item = 0;



/*function calculateShipping($country){
    foreach ($country['price'] as $key => $value) {
        echo '<input type=radio name=shipping_cost value='.$value.'>' .$value. '<br>';
    }
*/

/*for ($i = 0; $i < count($Afghanistan); i++){
        echo '<input type=radio name=shipping_cost value='.$Afghanistan[$i].'>' . $Afghanistan[$i] . '<br>';
}*/


$Asia = ['Asia', '3.00', '6.00'];
$Europe = ['Europe', '3.00', '5.00'];
$CentralAmerica = ['Central America', '3.00', '6.00'];
$Australia = ['Australia', '3.00', '6.00'];
$SouthAmerica = ['South America', '3.00', '6.00'];
$Canada = ['Canada', '3.00'];
$China = ['China', '3.00', '6.00'];
$Mexico = ['Mexico', '3.00', '6.00'];
$UnitedStates = ['United States', '0.00', '2.99'];
$International = ['International', '22.33', '47.29', '66.44'];

$AsiaReduced = 'Asia - Over $20 Order - Reduced Standard Shipping - $3.00';
$AsiaStandard = 'Asia - Sub $20 Order - Standard Shipping - $6.00';

$EuropeReduced = 'Europe - Over $20 Order - Reduced Standard Shipping - $3.00';
$EuropeStandard = 'Europe - Sub $20 Order - Standard Shipping - $6.00';

$CentralAmericaReduced = 'Central America - Over $20 Order - Reduced Standard Shipping - $3.00';
$CentralAmericaStandard = 'Central America - Sub $20 Order - Standard Shipping - $6.00';

$AustraliaReduced = 'Australia - Over $20 Order - Reduced Standard Shipping - $3.00';
$AustraliaStandard = 'Australia - Sub $20 Order - Standard Shipping - $6.00';

$SouthAmericaReduced = 'South America - Over $20 Order - Reduced Standard Shipping - $3.00';
$SouthAmericaStandard = 'South America - Sub $20 Order - Standard Shipping - $6.00';

$Canada = 'Canada - Sub $20 Order - Standard Shipping - $6.00';

$ChinaReduced = 'China - Over $20 Order - Reduced Standard Shipping - $3.00';
$ChinaStandard = 'China - Sub $20 Order - Standard Shipping - $6.00';

$MexicoReduced = 'Mexico - Over $20 Order - Reduced Standard Shipping - $3.00';
$MexicoStandard = 'Mexico - Sub $20 Order - Standard Shipping - $6.00';

$UnitedStatesReduced = 'Free $20 and UP - $0.00';
$UnitedStatesStandard = 'Standard - Sub $20 Order - Standard Shipping - $3.00';

$InternationalFirstClass = 'First Class Package International (7 - 21 days) - $22.33';
$InternationalPriorityMail = 'Priority Mail International (6 - 10 days) - $47.29';
$InternationalPriorityExpress = 'Priority Mail Express International (3 - 5 days) - $66.44';


/*echo '<input type=radio name=shipping_cost value='.$Asia[1].'>'. $Asia[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>'.$Asia[1].'</span>' . '<br>';
echo '<input type=radio name=shipping_cost value='.$Asia[2].'>'. $Asia[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>'.$Asia[2].'</span>' .'<br>';*/

/*2 spans for grid, the right span has nested span*/

if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {

     $total_price = $total_price + ($values['product_quantity'] *   $values['product_price']);
     $total_item = $total_item + $values['product_quantity'];

$asiaCost = 
    '<p class=shipping_line><span><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Asia[1].'></span>'.'<span class=shipping_details>'. $Asia[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Asia[1].'</span></span>' . '</p>' .
    
    '<p class=shipping_line><span><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Asia[2].'></span>'.'<span class=shipping_details>'. $Asia[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Asia[2].'</span></span>' . '</p>';

$europeCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Europe[1].'>'.'<span class=shipping_details>'. $Europe[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Europe[1].'</span></span>' . '</p>' .
    
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Europe[2].'>'.'<span class=shipping_details>'. $Europe[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Europe[2].'</span></span>' . '</p>';


$centralAmericaCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$CentralAmerica[1].'>'.'<span class=shipping_details>'. $CentralAmerica[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$CentralAmerica[1].'</span></span>' . '</p>' .
    
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$CentralAmerica[2].'>'.'<span class=shipping_details>'. $CentralAmerica[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$CentralAmerica[2].'</span></span' .'</p>';

$australiaCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Australia[1].'>'.'<span class=shipping_details>'. $Australia[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Australia[1].'</span></span>' . '</p>' .
    
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Australia[2].'>'.'<span class=shipping_details>'. $Australia[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Australia[2].'</span></span>' .'</p>';

$southAmericaCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$SouthAmerica[1].'>'.'<span class=shipping_details>'. $SouthAmerica[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$SouthAmerica[1].'</span></span' . '</p>' .
    
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$SouthAmerica[2].'>'.'<span class=shipping_details>'. $SouthAmerica[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$SouthAmerica[2].'</span></span' .'</p>';

$canadaCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Canada[1].'>'.'<span class=shipping_details>'. $Canada[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>'.$Canada[1].'</span></span></p>';

$chinaCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$China[1].'>'.'<span class=shipping_details>'. $China[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>'.$China[1].'</span></span></p>' .
    
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$China[2].'>'.'<span class=shipping_details>'. $China[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>'.$China[2].'</span></span></p>';

$mexicoCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Mexico[1].'>'.'<span class=shipping_details>'. $Mexico[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Mexico[1].'</span></span>' . '</p>' .
    
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Mexico[2].'>'.'<span class=shipping_details>'. $Mexico[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Mexico[2].'</span></span>' . '</p>';

$unitedStatesCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$UnitedStates[1].'>'.'<span class=shipping_details>'. 'Free $20 and UP - <span class=prices>$'.$UnitedStates[1].'</span></span>' . '</p>' .
    
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$UnitedStates[2].'>'.'<span class=shipping_details>'. 'Standard Shipping - <span class=prices>$'.$UnitedStates[2].'</span></span>' . '</p>';

$internationalCost = 
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$International[1].'>'.'<span class=shipping_details>'. 'First Class Package '. $International[0] . ' (7 - 21 days) - <span class=prices>$'.$International[1].'</span></span>' . '</p>' .
        
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$International[2].'>'.'<span class=shipping_details>'. 'Priority Mail '. $International[0] . ' (6 - 10 days) - <span class=prices>$'.$International[2].'</span></span>' . '</p>' . '<br>' .
        
    '<p class=shipping_line><input data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$International[3].'>'.'<span class=shipping_details>'. 'Priority Mail Express '. $International[0] . ' (3 - 5 days) - <span class=prices>$'.$International[3].'</span></span>' .'</p>';
     
    }
}




if(isset($_GET['country'])){
    $country = $_GET['country'];
    
    if($country == 'Afghanistan'){ echo $asiaCost; }
    if($country == 'Aland_Islands'){ echo $europeCost; }
    if($country == 'Albania'){ echo $europeCost; }
    if($country == 'Algeria'){ echo $internationalCost; }
    if($country == 'Andorra'){ echo $europeCost; }
    if($country == 'Angola'){ echo $internationalCost; }
    if($country == 'Anguilla'){ echo $centralAmericaCost; }
    if($country == 'Antigua_And_Barbuda'){ echo $centralAmericaCost; }
    if($country == 'Argentina'){ echo $centralAmericaCost; }
    if($country == 'Armena'){ echo $europeCost; }
    if($country == 'Aruba'){ echo $centralAmericaCost; }
    if($country == 'Australia'){ echo $australiaCost; }
    if($country == 'Austria'){ echo $europeCost; }
    if($country == 'Azerbaijan'){ echo $asiaCost; }
    if($country == 'Bahamas'){ echo $centralAmericaCost; }
    if($country == 'Bahrain'){ echo $centralAmericaCost; }
    if($country == 'Bangladesh'){ echo $asiaCost; }
    if($country == 'Barbados'){ echo $centralAmericaCost; }
    if($country == 'Belarus'){ echo $europeCost; }
    if($country == 'Belgium'){ echo $europeCost; }
    if($country == 'Belize'){ echo $centralAmericaCost; }
    if($country == 'Benin'){ echo $internationalCost; }
    if($country == 'Bermuda'){ echo $centralAmericaCost; }
    if($country == 'Bhutan'){ echo $asiaCost; }
    if($country == 'Bolivia'){ echo $southAmericaCost; }
    if($country == 'Bonaire_Sinit_Eustatius_And_Saba'){ echo $southAmericaCost; } 
    if($country == 'Bosnia_And_Herzegovina'){ echo $europeCost; } 
    if($country == 'Botswana'){ echo $internationalCost; }
    if($country == 'Bouvet_Island'){ echo $europeCost; }
    if($country == 'Brazil'){ echo $southAmericaCost;}
    if($country == 'British_Indian_Ocean_Territory'){ echo $asiaCost; }
    if($country == 'Brunei'){ echo $asiaCost; }
    if($country == 'Bulgaria'){ echo $europeCost; }
    if($country == 'Burkina_Faso'){ echo $internationalCost; }
    if($country == 'Burindi'){ echo $internationalCost; }
    if($country == 'Cambodia'){echo $asiaCost; }
    if($country == 'Canada') { echo $canadaCost; }
    if($country == 'Cape_Verde') { echo $internationalCost; }
    if($country == 'Cayman_Islands') { echo $centralAmericaCost; }
    if($country == 'Central_African_Republic') { echo $internationalCost; }
    if($country == 'Chad') { echo $internationalCost; }
    if($country == 'Chile') { echo $southAmericaCost; }
    if($country == 'China') { echo $chinaCost; }
    if($country == 'Christmas_Islands') { echo $asiaCost; }
    if($country == 'Cocos_Keeling_Islands') { echo $asiaCost; }
    if($country == 'Colombia') { echo $southAmericaCost; }
    if($country == 'Comoros') { echo $internationalCost  ;}
    if($country == 'Congo') { echo $internationalCost; }
    if($country == 'Congo_The_Democratic_Republic_Of_The') { echo $internationalCost; }
    if($country == 'Cook_Islands') { echo $internationalCost  ;}
    if($country == 'Costa_Rica') { echo $centralAmericaCost; }
    if($country == 'Cote_d_Ivoire') { echo $internationalCost; }
    if($country == 'Crotia') { echo $europeCost; }
    if($country == 'Cuba') { echo $centralAmericaCost; }
    if($country == 'Curacao') { echo $centralAmericaCost; }
    if($country == 'Cyprus') { echo $europeCost; }
    if($country == 'Czech_Republic') { echo $europeCost; }
    if($country == 'Denmark') { echo $europeCost; }
    if($country == 'Djibouti') { echo $internationalCost; }
    if($country == 'Dominica') { echo $centralAmericaCost; }
    if($country == 'Dominican_Republic') { echo $centralAmericaCost; } 
    if($country == 'Ecuador') { echo $southAmericaCost; }
    if($country == 'Egypt') { echo $internationalCost; }
    if($country == 'El_Salvador') { echo $centralAmericaCost; }
    if($country == 'Equatorial_Guinea') { echo $internationalCost; }
    if($country == 'Eritrea') { echo $internationalCost; }
    if($country == 'Estonia') { echo $europeCost; }
    if($country == 'Ethiopia') { echo $internationalCost; }
    if($country == 'Falkland_Islands') { echo $southAmericaCost; }
    if($country == 'Fiji') { echo $internationalCost; }
    if($country == 'Finland') { echo $europeCost; }
    if($country == 'France') { echo $europeCost; }
    if($country == 'French_Guiana') { echo $southAmericaCost; }
    if($country == 'French_Polynesia') { echo $internationalCost; }
    if($country == 'French_Southern_Territories') { echo $internationalCost; }
    if($country == 'Gabon') { echo $internationalCost; }
    if($country == 'Gambia') { echo $internationalCost; }
    if($country == 'Georgia') { echo $europeCost; }
    if($country == 'Germany') { echo $europeCost; }
    if($country == 'Ghana') { echo $internationalCost; }
    if($country == 'Gibraltar') { echo $europeCost; }
    if($country == 'Greece') { echo $europeCost; }
    if($country == 'Greenland') { echo $europeCost; }
    if($country == 'Grenada') { echo $centralAmericaCost; }
    if($country == 'Guadeloupe') { echo $europeCost; }
    if($country == 'Guatemala') { echo $centralAmericaCost; }
    if($country == 'Guernsey') { echo $europeCost; }
    if($country == 'Guinea') { echo $internationalCost; }
    if($country == 'Guinea_Bissau') { echo $internationalCost; }
    if($country == 'Guyana') { echo $southAmericaCost; }
    if($country == 'Haiti') { echo $centralAmericaCost; }
    if($country == 'Heard_Island_And_Mcdonald_Islands') { echo 'No Shipping Cost Could Be Found.';}
    if($country == 'Holy_See_Vatican_City_State') { echo $europeCost; }
    if($country == 'Honduras') { echo $centralAmericaCost; }
    if($country == 'Hong_Kong') { echo $asiaCost; }
    if($country == 'Hungary') { echo $europeCost; }
    if($country == 'Iceland') { echo $europeCost; }
    if($country == 'India') { echo $asiaCost; }
    if($country == 'Indonesia') { echo $asiaCost; }
    if($country == 'Iran_Islamic_Republic_Of') { echo $asiaCost; }
    if($country == 'Iraq') { echo $asiaCost; }
    if($country == 'Ireland') { echo $europeCost; }
    if($country == 'IsleOfMan') { echo $europeCost; }
    if($country == 'Israel') { echo $asiaCost; }
    if($country == 'Italy') { echo $europeCost; }
    if($country == 'Jamaica') { echo $centralAmericaCost; }
    if($country == 'Japan') { echo $asiaCost; }
    if($country == 'Jersey') { echo $europeCost; }
    if($country == 'Jordan') { echo $asiaCost; }
    if($country == 'Kazakhstan') { echo $asiaCost; }
    if($country == 'Kenya') { echo $internationalCost; }
    if($country == 'Kiribati') { echo $internationalCost; }
    if($country == 'Korea_Democratic_Peoples_Republic_Of') { echo $asiaCost; }
    if($country == 'Kosovo') { echo $europeCost; }
    if($country == 'Kuwait') { echo $asiaCost; }
    if($country == 'Kyrgyzstan') { echo $asiaCost; }
    if($country == 'Lao_Peoples_Democratic_Republic') { echo $asiaCost; }
    if($country == 'Latvia') { echo $europeCost; }
    if($country == 'Lebanon') { echo $asiaCost; }
    if($country == 'Lesotho') { echo $internationalCost; }
    if($country == 'Liberia') { echo $internationalCost; }
    if($country == 'Libyan_Arab_Jamahiriya') { echo $internationalCost; }
    if($country == 'Liechtenstein') { echo $europeCost; }
    if($country == 'Lithuania') { echo $europeCost; }
    if($country == 'Luxembourg') { echo $europeCost; }
    if($country == 'Macao') { echo $asiaCost; }
    if($country == 'Macedonia_Republic_Of') { echo $europeCost; }
    if($country == 'Madagascar') { echo $internationalCost; }
    if($country == 'Malawi') { echo $internationalCost; }
    if($country == 'Malaysia') { echo $asiaCost; }
    if($country == 'Maldives') { echo $asiaCost; }
    if($country == 'Mali') { echo $internationalCost; }
    if($country == 'Malta') { echo $europeCost; }
    if($country == 'Matinique') { echo $centralAmericaCost; }
    if($country == 'Mauritania') { echo $internationalCost; }
    if($country == 'Mauritius') { echo $internationalCost; }
    if($country == 'Mayotte') { echo $europeCost; }
    if($country == 'Mexico') { echo $mexicoCost; }
    if($country == 'Maldova_Republic_Of') { echo $europeCost; }
    if($country == 'Monaco') { echo $europeCost; }
    if($country == 'Mongolia') { echo $asiaCost; }
    if($country == 'Montenegro') { echo $europeCost; }
    if($country == 'Montserrat') { echo $centralAmericaCost; }
    if($country == 'Morocco') { echo $internationalCost; }
    if($country == 'Mozambique') { echo $internationalCost; }
    if($country == 'Myanmar') { echo $asiaCost; }
    if($country == 'Namibia') { echo $internationalCost; }
    if($country == 'Nauru') { echo $internationalCost; }
    if($country == 'Nepal') { echo $asiaCost; }
    if($country == 'Netherlands') { echo $europeCost; }
    if($country == 'Netherlands_Antilles') { echo $southAmericaCost; }
    if($country == 'New_Caledonia') { echo $internationalCost; }
    if($country == 'New_Zealand') { echo $internationalCost; }
    if($country == 'Nicaragua') { echo $centralAmericaCost; }
    if($country == 'Niger') { echo $internationalCost; }
    if($country == 'Nigeria') { echo $internationalCost; }
    if($country == 'Niue') { echo $internationalCost; }
    if($country == 'Norfolk_Island') { echo $internationalCost; }
    if($country == 'Norway') { echo $europeCost; }
    if($country == 'Oman') { echo $asiaCost; }
    if($country == 'Pakistan') { echo $asiaCost; }
    if($country == 'Palestinian_Territory_Occupied') { echo $asiaCost; }
    if($country == 'Panama') { echo $centralAmericaCost; }
    if($country == 'Papua_New_Guinea') { echo $internationalCost; }
    if($country == 'Paraguay') { echo $southAmericaCost; }
    if($country == 'Peru') { echo $southAmericaCost; }
    if($country == 'Philippines') { echo $asiaCost; }
    if($country == 'Pitcairn') { echo $internationalCost; }
    if($country == 'Poland') { echo $europeCost; }
    if($country == 'Portugal') { echo $europeCost; }
    if($country == 'Qatar') { echo $asiaCost; }
    if($country == 'Republic_Of_Cameroon') { echo $internationalCost; }
    if($country == 'Reunion') { echo $europeCost; }
    if($country == 'Romania') { echo $europeCost; }
    if($country == 'Russia') { echo $asiaCost; }
    if($country == 'Rwanda') { echo $internationalCost; }
    if($country == 'Saint_Barthelemy') { echo $centralAmericaCost; }
    if($country == 'Saint_Helena') { echo $internationalCost; }
    if($country == 'Saint_Kitts_And_Nevis') { echo $centralAmericaCost; }
    if($country == 'Saint_Lucia') { echo $centralAmericaCost; }
    if($country == 'Saint_Martin') { echo $centralAmericaCost; }
    if($country == 'Saint_Pierre_And_Miquelon') { echo $centralAmericaCost; }
    if($country == 'Samoa') { echo $internationalCost; }
    if($country == 'San_Marina') { echo $europeCost; } 
    if($country == 'Sao_Tome_And_Principe') { echo $internationalCost; }
    if($country == 'Saudi_Arabia') { echo $asiaCost; }
    if($country == 'Senegal') { echo $internationalCost; }
    if($country == 'Serbia') { echo $europeCost; }
    if($country == 'Seychelles') { echo $internationalCost; }
    if($country == 'Sierra_Leone') { echo $internationalCost; }
    if($country == 'Singapore') { echo $asiaCost; }
    if($country == 'Sint_Maarten') { echo $centralAmericaCost; }
    if($country == 'Slovakia') { echo $europeCost; }
    if($country == 'Slovenia') { echo $europeCost; }
    if($country == 'Soloman_Islands') { echo $internationalCost; }
    if($country == 'Somalia') { echo $internationalCost; }
    if($country == 'South_Africa') { echo $internationalCost; }
    if($country == 'South_Georgia_And_The_South_Sandwich_Islands') { echo 'No Shipping Cost Could Be Found.'; }
    if($country == 'South_Korea') { echo $asiaCost;}
    if($country == 'South_Sudan') { echo 'No Shipping Cost Could Be Found.'; }
    if($country == 'Spain') { echo $europeCost; }
    if($country == 'Sri_Lanka') { echo $asiaCost; }
    if($country == 'St_Vincent') { echo $centralAmericaCost; }
    if($country == 'Sudan') { echo $internationalCost; }
    if($country == 'Suriname') { echo $southAmericaCost; }
    if($country == 'Svalbard_And_Jan_Mayen') { echo $europeCost; }
    if($country == 'Swaziland') { echo $internationalCost; }
    if($country == 'Sweden') { echo $europeCost; }
    if($country == 'Switzerland') { echo $europeCost; }
    if($country == 'Syria') { echo $asiaCost; }
    if($country == 'Taiwan') { echo $asiaCost; }
    if($country == 'Tajikistan') { echo $asiaCost; }
    if($country == 'Tanzania_United_Republic_Of') { echo $internationalCost; }
    if($country == 'Thailand') { echo $asiaCost; }
    if($country == 'Timor_Leste') { echo $internationalCost; }
    if($country == 'Togo') { echo $internationalCost; }
    if($country == 'Tokelau') { echo $internationalCost; }
    if($country == 'Tonga') { echo $internationalCost; }
    if($country == 'Trinidad_And_Tobago') { echo $centralAmericaCost; }
    if($country == 'Tunisia') { echo $internationalCost; }
    if($country == 'Turkey') { echo $europeCost; }
    if($country == 'Turkmenistan') { echo $asiaCost; }
    if($country == 'Turks_And_Caicos_Islands') { echo $centralAmericaCost; }
    if($country == 'Tuvalu') { echo $internationalCost; }
    if($country == 'Uganda') { echo $internationalCost; }
    if($country == 'Ukraine') { echo $europeCost; }
    if($country == 'United_Arab_Emirates') { echo $asiaCost; }
    if($country == 'United_Kingdom') { echo $europeCost; }
    if($country == 'United_States') { echo $unitedStatesCost; }
    if($country == 'United_States_Minor_Outlying_Islands') { echo $centralAmericaCost; }
    if($country == 'Uruguay') { echo $europeCost; }
    if($country == 'Uzbekistan') { echo $asiaCost; }
    if($country == 'Vanuatu') { echo $internationalCost; }
    if($country == 'Venezuela') { echo $southAmericaCost; }
    if($country == 'Vietnam') { echo $asiaCost; }
    if($country == 'Virgin_Islands_British') { echo $centralAmericaCost; }
    if($country == 'Wallis_And_Futuna') { echo $internationalCost; }
    if($country == 'Western_Sahara') { echo 'No Shipping Cost Could Be Found'; }
    if($country == 'Yemen') { echo $asiaCost; }
    if($country == 'Zambia') { echo $internationalCost; }
    if($country == 'Zimbabwe') { echo $internationalCost; }
    
    
}

/*
    $Afghanistan=""; Asia
    $AlandIslands=""; Europe 
    $Albania=""; Europe
    $Algeria=""; International
    $Andorra=""; Europe
    $Angola=""; International
    $Anguilla=""; Central America
    $AntiguaAndBarbuda=""; Central America
    $Argentina=""; Central America
    $Armena Europe
    $Aruba Central America
    $Austrailia Austrailia
    $Austria Europe
    $Azerbaijan Asia
    $Bahamas Central America
    $Bahrain Central America
    $Bangladesh Asia
    $Barbados Central America
    $Belarus Europe
    $Belgium Europe
    $Belize Central America
    $Benin International
    $Bermuda Central America
    $Bhutan Asia 
    $Bolivia South America 
    $BonaireSinitEustatiusandSaba South America     
    $BosniaandHerzegovina  Europe       
    $Botswana International     
    $BouvetIsland Europe        
    $Brazil South America       
    $BritishIndianOceanTerritory Asia       
    $Brunei Asia        
    $Bulgaria Europe      
    $BurkinaFaso International      
    $Burindi International      
    $Cambodia=""; Asia      
    $Canada=""; Canada // more      
    $CapeVerde=""; International        
    $CaymanIslands=""; Central America      
    $CentralAfricanRepublic=""; International       
    $Chad=""; International         
    $Chile=""; South America        
    $China=""; China // more        
    $ChrismasIslands=""; Asia       
    $CocosKeelingIslands=""; Asia       
    $Colombia=""; // more       
    $Comoros=""; International      
    $Congo=""; International     
    $CongoTheDemocraticRepublicOfThe=""; International    
    $CookIslands=""; International      
    $CostaRica=""; Central America    
    $CotedIvoire=""; International      
    $Croatia=""; Europe   
    $Cuba=""; Central America     
    $Curacao=""; Central America      
    $Cyprus=""; Europe    
    $CzechRepublic=""; Europe  
    $Denmark=""; Europe     
    $Djibouti=""; International     
    $Dominica=""; Central America       
    $DominicanRepublic=""; Central America      
    $Ecuador=""; South America      
    $Egypt=""; International // more        
    $ElSalvador=""; Central America     
    $EquatorialGuinea=""; International     
    $Eritrea=""; International      
    $Estonia=""; Europe     
    $Ethiopia=""; International   
    $FalklandIslands=""; South America      
    $Fiji=""; International     
    $Finland=""; Europe         
    $France=""; Europe      
    $FrenchGuiana=""; South America     
    $FrenchPolynesia=""; International      
    $FrenchSouthernTerritories=""; // none could be     
    $Gabon=""; International        
    $Gambia=""; International       
    $Georgia=""; Europe     
    $Germany=""; Europe     
    $Ghana=""; International        
    $Gibraltar=""; Europe       
    $Greece=""; Europe      
    $Greenland=""; Europe       
    $Grenada=""; Central America        
    $Guadeloupe=""; Europe      
    $Guatemala=""; Central America      
    $Guernsey=""; Europe        
    $Guinea=""; International       
    $GuineaBissau=""; International     
    $Guyana=""; South America       
    $Haiti=""; Central America      
    $HeardIslandAndMcdonaldIslands=""; // none could be     
    $HolySeeVaticanCityState=""; Europe     
    $Honduras=""; Central America       
    $HongKong=""; Asia      
    $Hungary=""; Europe     
    $Iceland=""; Europe     
    $India=""; Asia     
    $Indonesia=""; Asia         
    $IranIslamicRepublicOf=""; Asia     
    $Iraq=""; Asia      
    $Ireland=""; Europe         
    $IsleOfMan=""; Europe       
    $Israel=""; Asia        
    $Italy=""; Europe // more   
    $Jamaica=""; Central America        
    $Japan=""; Asia //more      
    $Jersey=""; Europe      
    $Jordan=""; Asia        
    $Kazakhstan=""; Asia        
    $Kenya=""; International        
    $Kiribati=""; International         
    $KoreaDemocraticPeoplesRepublicOf=""; Asia      
    $Kosovo=""; Europe      
    $Kuwait=""; Asia        
    $Kyrgyzstan=""; Asia        
    $LaoPeoplesDemocraticRepublic=""; Asia      
    $Latvia=""; Europe      
    $Lebanon=""; Asia       
    $Lesotho=""; International      
    $Liberia=""; International      
    $LibyanArabJamahiriya="";  International        
    $Liechtenstein=""; Europe       
    $Lithuania=""; Europe       
    $Luxembourg=""; Europe      
    $Macao=""; Asia         
    $MacedoniaRepublicOf=""; Europe         
    $Madagascar=""; International           
    $Malawi=""; International           
    $Malaysia=""; Asia          
    $Maldives=""; Asia           
    $Mali=""; International         
    $Malta=""; Europe           
    $Matinique=""; Central America          
    $Mauritania=""; International           
    $Mauritius=""; International            
    $Mayotte=""; Europe         
    $Mexico=""; Mexico // more          
    $MaldovaRepublicof=""; Europe           
    $Monaco=""; Europe           
    $Mongolia=""; Asia          
    $Montenegro=""; Europe          
    $Montserrat=""; Central America         
    $Morocco=""; International          
    $Mozambique=""; International            
    $Myanmar=""; Asia            
    $Namibia=""; International          
    $Nauru=""; International            
    $Nepal=""; Asia         
    $Netherlands=""; Europe         
    $NetherlandsAntilles=""; South America          
    $NewCaledonia=""; International         
    $NewZealand=""; International // more          
    $Nicaragua=""; Central America          
    $Niger=""; International             
    $Nigeria=""; International           
    $Niue=""; International         
    $NorfolkIsland=""; International            
    $Norway=""; Europe           
    $Oman=""; Asia          
    $Pakistan=""; Asia          
    $PalestinianTerritoryOccupied=""; Asia          
    $Panama=""; Central America // more         
    $PapuaNewGuinea=""; International           
    $Paraguay=""; South America         
    $Peru=""; South America         
    $Philippines=""; Asia           
    $Pitcairn=""; International         
    $Poland=""; Europe           
    $Portugal=""; Europe //more  
    $Qatar=""; Asia      
    $RepublicofCameroon=""; International       
    $Reunion=""; Europe      
    $Romania=""; Europe     
    $Russia=""; Asia        
    $Rwanda=""; International       
    $SaintBathelemy=""; Central America     
    $SaintHelena=""; International      
    $SaintKittsandNevis=""; Central America      
    $SaintLucia=""; Central America     
    $SaintMartin=""; Central America        
    $SaintPierreandMiquelon=""; Central America     
    $Samoa=""; International        
    $SanMarina=""; Europe       
    $SaoTomeandPrincipe=""; International       
    $SaudiArabia=""; Asia       
    $Senegal=""; International      
    $Serbia=""; Europe      
    $Seychelles=""; International       
    $SierraLeone=""; International      
    $Singapore=""; Asia     
    $SintMaarten=""; Central America        
    $Slovakia=""; Europe        
    $Slovenia=""; Europe        
    $SolomanIslands=""; International       
    $Somalia=""; International // none could be     
    $SouthAfrica=""; International //more        
    $SouthGeorgiaAndTheSouthSandwichIslands=""; // none could be        
    $SouthKorea=""; Asia        
    $SouthSudan=""; // none could be        
    $Spain=""; Europe       
    $SriLanka=""; Asia      
    $StVincent=""; Central America      
    $Sudan=""; International        
    $Suriname=""; South America      
    $SvalbardAndJanMayen=""; Europe     
    $Swaziland=""; International        
    $Sweden=""; Europe      
    $Switzerland=""; Europe     
    $Syria=""; Asia              
    $Taiwan=""; Asia         
    $Tajikistan=""; Asia        
    $TanzaniaUnitedRepublicOf=""; International     
    $Thailand=""; Asia // more      
    $TimorLeste=""; International       
    $Togo=""; International     
    $Tokelau=""; International      
    $Tonga=""; International        
    $TrinidadandTobago=""; Central America      
    $Tunisia=""; International      
    $Turkey=""; Europe      
    $Turkmenistan=""; Asia      
    $TurksandCaicosIslands=""; Central America      
    $Tuvalu=""; International       
    $Uganda=""; International       
    $Ukraine=""; Europe      
    $UnitedArabEmirates=""; Asia // more        
    $UnitedKingdom=""; Europe       
    $UnitedStates=""; United States       
    $UnitedStatesMinorOutlyingIslands=""; Central America      
    $Uruguay=""; Europe     
    $Uzbekistan=""; Asia         
    $Vanuatu=""; International      
    $Venezuela=""; South America        
    $Vietnam=""; Asia       
    $VirginIslandsBritish=""; Central America       
    $WallisandFutuna=""; International      
    $WesternSahara=""; // none could be found       
    $Yemen=""; Asia      
    $Zambia=""; International       
    $Zimbabwe=""; International     
    */

?>
