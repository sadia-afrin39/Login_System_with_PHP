<?php

    if(isset($_POST['reset-request-submit'])){
        $selector = bin2hex(random_bytes(8)); //for cryptographically secure
        $token = random_bytes(32);
        
        $url = "www.mmtuts.net/create-new-password.php?selector=" .$selector. "&validator=" .bin2hex($token);
        
        $expires = date("U") + 1800;//Todays date in seconds since 1970 //the link in email will work for 1 hour
        
        require 'dbh.php';
        
        $userEmail = $_POST['email'];
        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail =?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
           echo "There was an error!"; 
           exit();
        }
        else{
           mysqli_stmt_bind_param($stmt, "s", $userEmail); 
           mysqli_stmt_execute($stmt);
        } 
        
        $sql = "INSERT INTO pwdreset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) values(?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
           echo "There was an error!"; 
           exit();
        }
        else{
           $hashedToken = password_hash($token, PASSWORD_DEFAULT);
           mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires); 
           mysqli_stmt_execute($stmt);
        } 
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        
        $to = $userEmail;
        $subject = 'Reset your password for mmtuts';
        $message = "<p>WE recieved a password reset request. The link to reset your password make this request, you can ignore this email</p>";
        $message .= "<p>Here is your password reset link:<br>";
        $message .= '<a>href="' .$url. '">'.$url.'</a></p>';
        
        $headers = "From: mmtuts <usemmtuts@gmail.com>\r\n";
        $headers .= "Reply-To: usemmtuts@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        
        mail($to, $subject, $message, $headers);
        header("Location: ../reset-password.php?reset=success");
        exit();
    }
    else{
        header("Location: ../index.php");
        exit(); 
    }
