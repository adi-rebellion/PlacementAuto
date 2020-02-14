<?php
    require_once('googleApi/vendor/autoload.php');
    session_start();
    $client = new Google_Client();
    $client->setAuthConfig('googleApi/client_credentials.json');
    $client->addScope([Google_Service_Oauth2::PLUS_ME,Google_Service_Oauth2::USERINFO_EMAIL]);

    $client->setRedirectUri("http://localhost/PlacementAuto/Main/Student/callback.php");


?>