<?php
    require "header.php";
?>

<main>
    <?php
        $selector = $_GET['selector'];    
        $validator = $_GET['validator'];   
    
        if(empty($selector) || empty($validator)){
            echo 'Could not validate your request!';
        }
        else{
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
                ?>
                <form action="includes/reset-password.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                    <input type="password" name="pwd" placeholder="Enter a new password">
                    <input type="password" name="pwd-repeat" placeholder="Confirm new password">
                    <button type="submit" name="reset-password-submit">Reset password</button>
                </form>
                <?php
            }
        }
    ?>
   
    
    <form action="includes/reset-request.php" method="post">
        <input type="text" name="email" placeholder="Enter your e-mail address...">
        <button type="submit" name="reset-request-submit">Receive new password by e-mail</button>
    </form>  
</main>

<?php
    require "footer.php";
?>