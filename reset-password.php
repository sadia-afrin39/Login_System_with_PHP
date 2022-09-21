<?php
    require "header.php";
?>

<main>
    <h1>Reset Your Password</h1>
    <p>An e-mail information will be send to you with instructions on how to reset your password</p>
    <form action="includes/reset-request.php" method="post">
        <input type="text" name="email" placeholder="Enter your e-mail address...">
        <button type="submit" name="reset-request-submit">Receive new password by e-mail</button>
    </form>  
    <?php
        if(isset($_GET['reset'])){
            if($_GET['reset'] == 'success'){
                echo '<p style="color: green; font-size: 1rem;">Check your e-mail</p>';
            }
        }
    ?>
</main>

<?php
    require "footer.php";
?>