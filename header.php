<?php
    session_start();
    //session_destroy();
?>

<!doctype html>
<html lang="en-US">
	<head>
		<title>Login System</title>
        <!-- <link rel='shortcut icon' type='image/x-icon' href='resources/img/favicon.png'>   -->
		<meta name="viewport" content="width = device-width, initial-scale=1.0">
        <meta name="description" content="Login System( with mmtuts)">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--for ie & edge support -->
		<meta name="author" content="Sadia Afrin Tarin">
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
		
		<!--<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/> used for animation on scroll-->
		<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->
		<!--<script src="../travelBD/js/all.min.js"></script>-->
		<!--<script src="Prefix_Free.js"></script>   if js not supported in browser-->
		<!--<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700" rel='stylesheet'>-->	
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->

        <!-- jQuery library -->
       <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->

        <!-- Popper JS -->
         <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->

        <!-- Latest compiled JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
        <link rel="stylesheet"  type="text/css" href= "style.css">
	</head>

	<body>
        <header>
            <nav>
                <a href="index.php" class="header-brand">MMTUTS</a>
                
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">About me</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                
                <div>
                    <?php
                        if(isset($_SESSION['userId'])){
                            echo '<form action="includes/logout.php" method="post"> 
                            <button type="submit" name="logout-submit">Logout</button>
                            </form>';
                        }
                        else{
                            echo '<form action="includes/login.php" method="post">
                            <input type="text" name="mailuid" placeholder="Username/Email...">
                            <input type="password" name="pwd" placeholder="Password"> 
                            <button type="submit" name="login-submit">Login</button>
                            </form>
                            <a href="signup.php">Signup</a>';
                        }
                    ?> 
                </div>
            </nav>
        </header>