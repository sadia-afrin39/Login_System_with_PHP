<?php
    require "header.php";
?>

<main>
    <?php
        if(isset($_SESSION['userId'])){
            echo "<p style='font-size: 1.2rem;'>You are logged in as ".$_SESSION["userUid"]." !</p>";
        }
        else{
            echo "<p style='font-size: 1.2rem;'>You are logged out!</p>";
        }
     ?>
</main>

<?php
    require "footer.php";
?>