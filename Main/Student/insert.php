<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
     
    if(!empty($username) || !empty($email)){
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "palcement";

        $conn= new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_errorno().')'.mysqli_connect_error());
        }else{
            $SELECT = "SELECT email From register Where email = ? Limit 1";
            $INSERT = "INSERT Into register (username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
            //Prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            if ($rnum==0) {
             $stmt->close();
             $stmt = $conn->prepare($INSERT);
             $stmt->bind_param("ssssii", $username, $email);
             $stmt->execute();
             echo "New record inserted sucessfully";
            } else {
             echo "Someone already register using this email";
            }
            $stmt->close();
            $conn->close();
           }
        } else{
        echo "All Fields are Required";
        die();
    }
?>

