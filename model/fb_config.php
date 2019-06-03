<?php
/*if(!session_id()){
    session_start();
}

require_once __DIR__ . '/Facebook/autoload.php';

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$appId = '';
$appSecret = '';
$redirectURL = 'https://9d8d5fc9.ngrok.io/jayswebsitelive/';
$fbPermissions = array('publish_pages', 'manage_pages');

$fb = new Facebook(array(
    'app_id' => $appId,
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.6',
));

$helper = $fb->getRedirectLoginHelper();

try{
    if(isset($_SESSION['facebook_access_token'])){
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch (FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
} catch (FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}*/
?>