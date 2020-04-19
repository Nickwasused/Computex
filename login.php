<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Computex</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="description" content="Computex eine Computer Firma">
		<meta name="keywords" content="Gmbh, Computex">
		<link rel="author" href="https://bbs-old.de" />
		<link rel="canonical" href="https://computexnow.com" />
		<meta name="twitter:card" content="Computex eine Computer Firma">
		<meta name="twitter:url" content="https://computexnow.com">
		<meta name="twitter:title" content="Computex">
		<meta name="twitter:description" content="Computex eine moderne Firma">
		<meta name="twitter:image" content="https://computexnow.com/img/metadata/fav-og.jpg">
		<meta property="og:image" content="https://computexnow.com/img/metadata/fav-og.jpg">
		<meta property="og:image:width" content="1744">
		<meta property="og:image:height" content="913">
		<meta property="og:title" content="Computex">
		<meta property="og:description" content="Computex Pictures">
		<meta property="og:url" content="https://computexnow.com/index.php">
		<link rel="apple-touch-icon" sizes="180x180" href="fav/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="194x194" href="fav/favicon-194x194.png">
		<link rel="icon" type="image/png" sizes="192x192" href="fav/android-chrome-192x192.png">
		<link rel="icon" type="image/png" sizes="16x16" href="fav/favicon-16x16.png">
		<link rel="manifest" href="fav/site.webmanifest">
		<link rel="mask-icon" href="fav/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="fav/favicon.ico">
		<meta name="msapplication-TileColor" content="#b91d47">
		<meta name="msapplication-TileImage" content="fav/mstile-144x144.png">
		<meta name="msapplication-config" content="fav/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">
		<link type="text/css" rel="stylesheet" href="basic.css" media="none" onload="if(media!='all')media='all'">
		<link type="text/css" rel="stylesheet" href="gallery.css" media="none" onload="if(media!='all')media='all'">
	</head>
	<body>
		<div class="grid">
			<div class="A">
				<ul>
					<li><a href=".">Home</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="geschichte.php">Firmengeschichte</a></li>
					<li><a href="kontakt.php">Kontakt</a></li>
					<li><a href="wir.php">Unsere Firma</a></li>
					<li><script async src="https://cse.google.com/cse.js?cx=007807546472067433593:o191pdokv4o"></script><div class="gcse-search"></div></li>
				</ul>
			</div>
			<div class="B"></div>
			<div class="C">
				<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Computex | Login</title>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Bitte tragen sie Ihre Daten hier ein.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Benutzername</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Passwort</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Haben Sie noch keinen Account?<a href="register.php">Registrieren sie sich hier!</a>.</p>
        </form>
    </div>    
</body>
</html>
			</div>
			<div class="D"></div>
			<div class="E"><div id=center><a href="impressum.php" target="_blank">Impressum</a>   <a href="data.php" target="_blank">Privacy Policy</a>   <a href="terms.php" target="_blank">Terms of Service</a></div></div>
		</div> 
	</body>
</html>