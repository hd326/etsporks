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
$UnitedStates = ['United States', '0.00', '3.00'];
$International = ['International', '22.33', '47.29', '66.44'];

$AsiaReduced = "Asia - Over $20 Order - Reduced Standard Shipping - $3.00";
$AsiaStandard = "Asia - Sub $20 Order - Standard Shipping - $6.00";

$EuropeReduced = "Europe - Over $20 Order - Reduced Standard Shipping - $3.00";
$EuropeStandard = "Europe - Sub $20 Order - Standard Shipping - $6.00";

$CentralAmericaReduced = "Central America - Over $20 Order - Reduced Standard Shipping - $3.00";
$CentralAmericaStandard = "Central America - Sub $20 Order - Standard Shipping - $6.00";

$AustraliaReduced = "Australia - Over $20 Order - Reduced Standard Shipping - $3.00";
$AustraliaStandard = "Australia - Sub $20 Order - Standard Shipping - $6.00";

$SouthAmericaReduced = "South America - Over $20 Order - Reduced Standard Shipping - $3.00";
$SouthAmericaStandard = "South America - Sub $20 Order - Standard Shipping - $6.00";

$CanadaCost = "Canada - Sub $20 Order - Standard Shipping - $6.00";

$ChinaReduced = "China - Over $20 Order - Reduced Standard Shipping - $3.00";
$ChinaStandard = "China - Sub $20 Order - Standard Shipping - $6.00";

$MexicoReduced = "Mexico - Over $20 Order - Reduced Standard Shipping - $3.00";
$MexicoStandard = "Mexico - Sub $20 Order - Standard Shipping - $6.00";

$UnitedStatesReduced = "Free $20 and UP - $0.00";
$UnitedStatesStandard = "Standard - Sub $20 Order - Standard Shipping - $3.00";

$InternationalFirstClass = "First Class Package International (7 - 21 days) - $22.33";
$InternationalPriorityMail = "Priority Mail International (6 - 10 days) - $47.29";
$InternationalPriorityExpress = "Priority Mail Express International (3 - 5 days) - $66.44";


/*echo '<input type=radio name=shipping_cost value='.$Asia[1].'>'. $Asia[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>'.$Asia[1].'</span>' . '<br>';
echo '<input type=radio name=shipping_cost value='.$Asia[2].'>'. $Asia[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>'.$Asia[2].'</span>' .'<br>';*/

/*2 spans for grid, the right span has nested span*/

if(!empty($_SESSION["shopping_cart"]))
{
 foreach($_SESSION["shopping_cart"] as $keys => $values)
 {

     $total_price = $total_price + ($values['product_quantity'] *   $values['product_price']);
     $total_item = $total_item + $values['product_quantity'];
     
if ($total_price > '20')
{
    $shipping_line_hidden = "";
} else if($total_price < '20')
{
    $shipping_line_hidden = "shipping_line_hidden";
}
     // what a genius way to display proper shipping fields based on total price
     // now i need to use a data attr to take data-text

$asiaCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><span><input data-method="'.$AsiaReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Asia[1].'></span>'.'<span class=shipping_details>'. $Asia[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Asia[1].'</span></span></p>' . '<hr id='.$shipping_line_hidden.'>' .
    
    '<p class=shipping_line id=><span><input data-method="'.$AsiaStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Asia[2].'></span>'.'<span class=shipping_details>'. $Asia[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Asia[2].'</span></span></p>';

$europeCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><input data-method="'.$EuropeReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Europe[1].'>'.'<span class=shipping_details>'. $Europe[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Europe[1].'</span></span></p>' . '<hr id='.$shipping_line_hidden.'>' .
    
    '<p class=shipping_line><input data-method="'.$EuropeStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Europe[2].'>'.'<span class=shipping_details>'. $Europe[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Europe[2].'</span></span></p>';


$centralAmericaCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><input data-method="'.$CentralAmericaReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$CentralAmerica[1].'>'.'<span class=shipping_details>'. $CentralAmerica[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$CentralAmerica[1].'</span></span></p>' . '<hr id='.$shipping_line_hidden.'>' .
    
    '<p class=shipping_line><input data-method="'.$CentralAmericaStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$CentralAmerica[2].'>'.'<span class=shipping_details>'. $CentralAmerica[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$CentralAmerica[2].'</span></span></p>';

$australiaCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><input data-method="'.$AustraliaReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Australia[1].'>'.'<span class=shipping_details>'. $Australia[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Australia[1].'</span></span></p>' . '<hr id='.$shipping_line_hidden.'>' .
    
    '<p class=shipping_line><input data-method="'.$AustraliaStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Australia[2].'>'.'<span class=shipping_details>'. $Australia[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Australia[2].'</span></span></p>';

$southAmericaCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><input data-method="'.$SouthAmericaReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$SouthAmerica[1].'>'.'<span class=shipping_details>'. $SouthAmerica[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$SouthAmerica[1].'</span></span></p>' . '<hr id='.$shipping_line_hidden.'>' .
    
    '<p class=shipping_line><input data-method="'.$SouthAmericaStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$SouthAmerica[2].'>'.'<span class=shipping_details>'. $SouthAmerica[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$SouthAmerica[2].'</span></span></p>';

$canadaCost = 
    '<p class=shipping_line id=><input data-method="'.$CanadaCost.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Canada[1].'>'.'<span class=shipping_details>'. $Canada[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>'.$Canada[1].'</span></span></p>';

$chinaCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><input data-method="'.$ChinaReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$China[1].'>'.'<span class=shipping_details>'. $China[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>'.$China[1].'</span></span></p>' . '<hr>' .
    
    '<p class=shipping_line><input data-method="'.$ChinaStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$China[2].'>'.'<span class=shipping_details>'. $China[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>'.$China[2].'</span></span></p>';

$mexicoCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><input data-method="'.$MexicoReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Mexico[1].'>'.'<span class=shipping_details>'. $Mexico[0] . ' Over $20 Order - Reduced Shipping Rate - <span class=prices>$'.$Mexico[1].'</span></span></p>' . '<hr>' .
    
    '<p class=shipping_line><input data-method="'.$MexicoStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$Mexico[2].'>'.'<span class=shipping_details>'. $Mexico[0] . ' Sub $20 Order - Standard Shipping - <span class=prices>$'.$Mexico[2].'</span></span></p>';

$unitedStatesCost = 
    '<p class=shipping_line id='.$shipping_line_hidden.'><input data-method="'.$UnitedStatesReduced.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$UnitedStates[1].'>'.'<span class=shipping_details>'. 'Free $20 and UP - <span class=prices>$'.$UnitedStates[1].'</span></span></p>' . '<hr id='.$shipping_line_hidden.'>' .
    
    '<p class=shipping_line id=><input data-method="'.$UnitedStatesStandard.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$UnitedStates[2].'>'.'<span class=shipping_details>'. 'Standard Shipping - <span class=prices>$'.$UnitedStates[2].'</span></span></p>';

$internationalCost = 
    '<p class=shipping_line><input data-method="'.$InternationalFirstClass.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$International[1].'>'.'<span class=shipping_details>'. 'First Class Package '. $International[0] . ' (7 - 21 days) - <span class=prices>$'.$International[1].'</span></span></p>' . '<hr>' .
        
    '<p class=shipping_line><input data-method="'.$InternationalPriorityMail.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$International[2].'>'.'<span class=shipping_details>'. 'Priority Mail '. $International[0] . ' (6 - 10 days) - <span class=prices>$'.$International[2].'</span></span></p>' . '<hr>' .
        
    '<p class=shipping_line><input data-method="'.$InternationalPriorityExpress.'" data-shipping='.number_format($total_price,2).' type=radio id=shipping_cost name=shipping_cost value='.$International[3].'>'.'<span class=shipping_details>'. 'Priority Mail Express '. $International[0] . ' (3 - 5 days) - <span class=prices>$'.$International[3].'</span></span></p>';
     
    }
}




if(isset($_GET['country'])){
    $country = $_GET['country'];
    
    if($country == 'Afghanistan'){ $country_code = 'AF'; echo '<input class=country_code type=text name=country_code value="'.$country_code.'">'; echo $asiaCost; }
    if($country == 'Aland_Islands'){ $country_code = 'AX'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Albania'){ $country_code = 'AL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Algeria'){ $country_code = 'DZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Andorra'){ $country_code = 'AD'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Angola'){ $country_code = 'AO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Anguilla'){ $country_code = 'AI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Antigua_And_Barbuda'){ $country_code = 'AG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Argentina'){ $country_code = 'AR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Armena'){ $country_code = 'AM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Aruba'){ $country_code = 'AW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Australia'){ $country_code = 'AU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $australiaCost; }
    if($country == 'Austria'){ $country_code = 'AT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Azerbaijan'){ $country_code = 'AZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Bahamas'){ $country_code = 'BS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Bahrain'){ $country_code = 'BH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Bangladesh'){ $country_code = 'BD'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Barbados'){ $country_code = 'BB'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Belarus'){ $country_code = 'BY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Belgium'){ $country_code = 'BE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Belize'){ $country_code = 'BZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Benin'){ $country_code = 'BJ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Bermuda'){ $country_code = 'BM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Bhutan'){ $country_code = 'BT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Bolivia'){ $country_code = 'BO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Bonaire_Sinit_Eustatius_And_Saba'){ $country_code = 'BQ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; } 
    if($country == 'Bosnia_And_Herzegovina'){ $country_code = 'BA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; } 
    if($country == 'Botswana'){ $country_code = 'BW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Bouvet_Island'){ $country_code = 'BV'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Brazil'){ $country_code = 'BR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost;}
    if($country == 'British_Indian_Ocean_Territory'){ $country_code = 'IO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Brunei'){ $country_code = 'BN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Bulgaria'){ $country_code = 'BG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Burkina_Faso'){ $country_code = 'BF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Burindi'){ $country_code = 'BI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Cambodia'){ $country_code = 'KH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Canada') { $country_code = 'CA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $canadaCost; }
    if($country == 'Cape_Verde') { $country_code = 'CV'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Cayman_Islands') { $country_code = 'KY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Central_African_Republic') { $country_code = 'CF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Chad') { $country_code = 'TD'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Chile') { $country_code = 'CL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'China') { $country_code = 'CN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $chinaCost; }
    if($country == 'Christmas_Islands') { $country_code = 'CX'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Cocos_Keeling_Islands') { $country_code = 'CC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Colombia') { $country_code = 'CO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Comoros') { $country_code = 'KM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost  ;}
    if($country == 'Congo') { $country_code = 'CG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Congo_The_Democratic_Republic_Of_The') {$country_code = 'CD'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>";  echo $internationalCost; }
    if($country == 'Cook_Islands') { $country_code = 'CK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost  ;}
    if($country == 'Costa_Rica') { $country_code = 'CR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Cote_d_Ivoire') { $country_code = 'CI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Crotia') { $country_code = 'HR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Cuba') { $country_code = 'CU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Curacao') { $country_code = 'CW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Cyprus') { $country_code = 'CY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Czech_Republic') { $country_code = 'CZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Denmark') { $country_code = 'DK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Djibouti') { $country_code = 'DJ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Dominica') { $country_code = 'DM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Dominican_Republic') { $country_code = 'DO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; } 
    if($country == 'Ecuador') { $country_code = 'EC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Egypt') { $country_code = 'EG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'El_Salvador') { $country_code = ''; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Equatorial_Guinea') { $country_code = 'GQ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Eritrea') { $country_code = 'ER'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Estonia') { $country_code = 'EE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Ethiopia') { $country_code = 'SZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>";echo $internationalCost; }
    if($country == 'Falkland_Islands') { $country_code = 'FK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Fiji') { $country_code = 'FJ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Finland') { $country_code = 'FI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'France') { $country_code = 'FR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'French_Guiana') { $country_code = 'GF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'French_Polynesia') { $country_code = 'PF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'French_Southern_Territories') { $country_code = 'TF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Gabon') { $country_code = 'GA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Gambia') { $country_code = 'GM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Georgia') { $country_code = 'GE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Germany') { $country_code = 'DE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Ghana') { $country_code = 'GH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Gibraltar') { $country_code = 'GI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Greece') { $country_code = 'GR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Greenland') { $country_code = 'GL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Grenada') { $country_code = 'GD'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Guadeloupe') { $country_code = 'GP'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Guatemala') { $country_code = 'GT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Guernsey') { $country_code = 'GG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Guinea') { $country_code = 'GN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Guinea_Bissau') { $country_code = 'GW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Guyana') { $country_code = 'GY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Haiti') { $country_code = 'HT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Heard_Island_And_Mcdonald_Islands') { $country_code = 'HM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo 'No Shipping Cost Could Be Found.';}
    if($country == 'Holy_See_Vatican_City_State') { $country_code = 'VA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Honduras') { $country_code = 'HN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Hong_Kong') { $country_code = 'HK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Hungary') { $country_code = 'HU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Iceland') { $country_code = 'IS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'India') { $country_code = 'IN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Indonesia') { $country_code = 'ID'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Iran_Islamic_Republic_Of') { $country_code = 'IR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Iraq') { $country_code = 'IQ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Ireland') { $country_code = 'IE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'IsleOfMan') { $country_code = 'IM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Israel') { $country_code = 'IL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Italy') { $country_code = 'IT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Jamaica') { $country_code = 'JM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Japan') { $country_code = 'JP'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Jersey') { $country_code = 'JE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Jordan') { $country_code = 'JO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Kazakhstan') { $country_code = 'KZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Kenya') { $country_code = 'KE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Kiribati') { $country_code = 'KI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Korea_Democratic_Peoples_Republic_Of') { $country_code = 'KP'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Kosovo') { $country_code = 'XK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Kuwait') { $country_code = 'KW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Kyrgyzstan') { $country_code = 'KG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Lao_Peoples_Democratic_Republic') { $country_code = 'LA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Latvia') { $country_code = 'LV'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Lebanon') { $country_code = 'LB'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Lesotho') { $country_code = 'LS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Liberia') { $country_code = 'LR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Libyan_Arab_Jamahiriya') { $country_code = 'LY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Liechtenstein') { $country_code = 'LI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Lithuania') { $country_code = 'LT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Luxembourg') { $country_code = 'LU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Macao') { $country_code = 'MO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Macedonia_Republic_Of') { $country_code = 'MK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Madagascar') { $country_code = 'MG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Malawi') { $country_code = 'MW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Malaysia') { $country_code = 'MY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Maldives') { $country_code = 'MV'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Mali') { $country_code = 'ML'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Malta') { $country_code = 'MT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Martinique') { $country_code = 'MQ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Mauritania') { $country_code = 'MR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Mauritius') { $country_code = 'MU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Mayotte') { $country_code = 'YT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Mexico') { $country_code = 'MX'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $mexicoCost; }
    if($country == 'Maldova_Republic_Of') { $country_code = 'MD'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Monaco') { $country_code = 'MC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Mongolia') { $country_code = 'MN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Montenegro') { $country_code = 'ME'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Montserrat') { $country_code = 'MS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Morocco') { $country_code = 'MA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Mozambique') { $country_code = 'MZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Myanmar') { $country_code = 'MM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Namibia') { $country_code = 'NA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Nauru') { $country_code = 'NR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Nepal') { $country_code = 'NP'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Netherlands') { $country_code = 'NL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    //if($country == 'Netherlands_Antilles') { $country_code = ''; echo $country_code; echo $southAmericaCost; }
    if($country == 'New_Caledonia') { $country_code = 'NC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'New_Zealand') { $country_code = 'NZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Nicaragua') { $country_code = 'NI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Niger') { $country_code = 'NE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Nigeria') { $country_code = 'NG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Niue') { $country_code = 'NU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Norfolk_Island') { $country_code = 'NF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Norway') { $country_code = 'NO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Oman') { $country_code = 'OM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Pakistan') { $country_code = 'PK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Palestinian_Territory_Occupied') { $country_code = 'PS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Panama') { $country_code = 'PA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Papua_New_Guinea') { $country_code = 'PG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Paraguay') { $country_code = 'PY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Peru') { $country_code = 'PE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Philippines') { $country_code = 'PH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Pitcairn') { $country_code = 'PN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Poland') { $country_code = 'PL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Portugal') { $country_code = 'PT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Qatar') { $country_code = 'QA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Republic_Of_Cameroon') { $country_code = 'CM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Reunion') { $country_code = 'RE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Romania') { $country_code = 'RO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Russia') { $country_code = 'RU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Rwanda') { $country_code = 'RW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Saint_Barthelemy') { $country_code = 'BL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Saint_Helena') { $country_code = 'SH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Saint_Kitts_And_Nevis') { $country_code = 'KN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Saint_Lucia') { $country_code = 'LC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Saint_Martin') { $country_code = 'MF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Saint_Pierre_And_Miquelon') { $country_code = 'PM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Samoa') { $country_code = 'WS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'San_Marina') { $country_code = 'SM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; } 
    if($country == 'Sao_Tome_And_Principe') { $country_code = 'ST'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Saudi_Arabia') { $country_code = 'SA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Senegal') { $country_code = 'SN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Serbia') { $country_code = 'RS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Seychelles') { $country_code = 'SC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Sierra_Leone') { $country_code = 'SL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Singapore') { $country_code = 'SG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Sint_Maarten') { $country_code = 'SX'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Slovakia') { $country_code = 'SK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Slovenia') { $country_code = 'SI'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Soloman_Islands') { $country_code = 'SB'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Somalia') { $country_code = 'SO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'South_Africa') { $country_code = 'ZA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'South_Georgia_And_The_South_Sandwich_Islands') { $country_code = 'GS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo 'No Shipping Cost Could Be Found.'; }
    if($country == 'South_Korea') { $country_code = 'KR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost;}
    if($country == 'South_Sudan') { $country_code = 'SS'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo 'No Shipping Cost Could Be Found.'; }
    if($country == 'Spain') { $country_code = 'ES'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Sri_Lanka') { $country_code = 'LK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'St_Vincent') { $country_code = 'VC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Sudan') { $country_code = 'SD'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Suriname') { $country_code = 'SR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Svalbard_And_Jan_Mayen') { $country_code = 'SJ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Swaziland') { $country_code = 'SZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Sweden') { $country_code = 'SE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Switzerland') { $country_code = 'CH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Syria') { $country_code = 'SY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Taiwan') { $country_code = 'TW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Tajikistan') { $country_code = 'TJ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Tanzania_United_Republic_Of') { $country_code = 'TZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Thailand') { $country_code = 'TH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Timor_Leste') { $country_code = 'TL'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Togo') { $country_code = 'TG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Tokelau') { $country_code = 'TK'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Tonga') { $country_code = 'TO'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Trinidad_And_Tobago') { $country_code = 'TT'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Tunisia') { $country_code = 'TN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Turkey') { $country_code = 'TR'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Turkmenistan') { $country_code = 'TM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Turks_And_Caicos_Islands') { $country_code = 'TC'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Tuvalu') { $country_code = 'TV'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Uganda') { $country_code = 'UG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Ukraine') { $country_code = 'UA'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'United_Arab_Emirates') { $country_code = 'AE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'United_Kingdom') { $country_code = 'GB'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'United_States') { $country_code = 'US'; echo "<input class=country_code  type=hidden name=country_code value='$country_code'>"; echo $unitedStatesCost; }
    if($country == 'United_States_Minor_Outlying_Islands') { $country_code = 'UM'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Uruguay') { $country_code = 'UY'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $europeCost; }
    if($country == 'Uzbekistan') { $country_code = 'UZ'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Vanuatu') { $country_code = 'VU'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Venezuela') { $country_code = 'VE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $southAmericaCost; }
    if($country == 'Vietnam') { $country_code = 'VN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Virgin_Islands_British') { $country_code = 'VG'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $centralAmericaCost; }
    if($country == 'Wallis_And_Futuna') { $country_code = 'WF'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Western_Sahara') { $country_code = 'EH'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo 'No Shipping Cost Could Be Found'; }
    if($country == 'Yemen') { $country_code = 'YE'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $asiaCost; }
    if($country == 'Zambia') { $country_code = 'ZN'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    if($country == 'Zimbabwe') { $country_code = 'ZW'; echo "<input class=country_code type=hidden name=country_code value='$country_code'>"; echo $internationalCost; }
    
    
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
