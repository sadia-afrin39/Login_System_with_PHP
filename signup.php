<?php
    require "header.php";
?>

<main>
    <h1>Signup</h1>
    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "emptyfields"){
                echo "<p style='color: red; font-size: 1.3rem;'>Fill in all fields!</p>";
            }
            else if($_GET['error'] == "invaliduidmail"){
               echo "<p style='color: red; font-size: 1.3rem;'>Invalid username and email!</p>"; 
            }
             else if($_GET['error'] == "invaliduid"){
               echo "<p style='color: red; font-size: 1.3rem;'>Invalid username!</p>"; 
            }
             else if($_GET['error'] == "invalidmail"){
               echo "<p style='color: red; font-size: 1.3rem;'>Invalid e-mail!</p>"; 
            }
             else if($_GET['error'] == "passwordcheck"){
               echo "<p style='color: red; font-size: 1.3rem;'>Your password do not match!</p>"; 
            }
            else if($_GET['error'] == "usertaken"){
               echo "<p style='color: red; font-size: 1.3rem;'>Username is already taken!</p>"; 
            }
        }
        else if( isset($_GET['signup']) && $_GET['signup'] == "success"){
            echo "<p style='color: green; font-size: 1.3rem;'>Signup Successful!</p>"; 
        }
    
    ?>
    <form action="includes/signup.php" method="post">
        <?php
            if(isset($_GET['uid'])){
                $uid = $_GET['uid'];
                echo '<input type="text" name="uid" placeholder="Username" value="'.$uid.'"><br><br>';
                }
            else{
                echo '<input type="text" name="uid" placeholder="Username"><br><br>';
            }
            if(isset($_GET['mail'])){
                $mail = $_GET['mail'];
                echo '<input type="text" name="mail" placeholder="E-mail" value="'.$mail.'"><br><br>';
                }
            else{
                echo'<input type="text" name="mail" placeholder="E-mail"><br><br>';
            }
        ?>  
       <input type="password" name="pwd" placeholder="Password"><br><br>
       <input type="password" name="pwd-repeat" placeholder="Confirm Password"><br><br> 
       <button type="submit" name="signup-submit">Signup</button> 
    </form>
    
     <!--password reset process-->
    <?php
        if( isset($_GET['newpwd'])){
            if($_GET['newpwd'] == "passwordupdated"){
                echo "<p style='color: green; font-size: 1.3rem;'>Your password has been reset!</p>"; 
            }
        }
    ?>
    <a href="reset-password.php">Forgot your password?</a>
</main>

<?php
    require "footer.php";
?>