<?php
     require_once('config.php');
     if(isset($_SESSION['accessToken'])){
          $client->setAccessToken($_SESSION['accessToken']);
     } else if (isset($_GET['code'])) {
          $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
          $_SESSION['accessToken'] = $token;
    }  else{
         header("location: index.php");
     }

     $oAuth = new Google_Service_Oauth2($client);
     $user = $oAuth->userinfo->get();
     // echo"<pre>";
     $userData['name'] = $user->name;
     $userData['gender'] = $user->gender;
     $userData['email'] = $user->email;
     $userData['pageLink'] = $user->link;
     $userData['picture'] = $user->picture;
     $userData['id'] = $user->id;
     $_SESSION['user'] = $userData;
     print_r($userData);
     header("location: Student_profile.php");






?>