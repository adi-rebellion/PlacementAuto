<?php
    $db_user = "root";
    $db_pass = "";
    $db_name = "useraccounts";

    $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8',$db_user,$db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


?>

<?php
    require_once('googleApi/vendor/autoload.php');
    session_start();
    $client = new Google_Client();
    $client->setAuthConfig('googleApi/client_credentials.json');
    $client->addScope([Google_Service_Oauth2::PLUS_ME,Google_Service_Oauth2::USERINFO_EMAIL,Google_Service_Oauth2::USERINFO_PROFILE]);

    $client->setRedirectUri("http://localhost/PlacementAuto/Main/Student/callback.php");


?>