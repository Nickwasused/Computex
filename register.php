<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
<html lang="de">
	<head>
		<title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
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
				<div class="wrapper">
					<h2>Account erstellen</h2>
					<p>Bitte f&uuml;llen Sie dieses Formular aus, um einen Account zu erstellen.</p>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
							<label>Benutzername</label>
							<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
							<span class="help-block"><?php echo $username_err; ?></span>
						</div>    
						<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
							<label>Passwort</label>
							<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
							<span class="help-block"><?php echo $password_err; ?></span>
						</div>
						<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
							<label>Passwort best&auml;tigen</label>
							<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
							<span class="help-block"><?php echo $confirm_password_err; ?></span>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Submit">
							<input type="reset" class="btn btn-default" value="Reset">
						</div>
						<p>Haben Sie bereits einen Account? <a href="login.php">Hier können Sie sich Einloggen!</a>.</p>
					</form>
			</div>
			</div>
			<div class="D"></div>
			<div class="E"><div id=center><a href="impressum.php" target="_blank">Impressum</a>   <a href="data.php" target="_blank">Privacy Policy</a>   <a href="terms.php" target="_blank">Terms of Service</a></div></div>
		</div> 
	</body>
</html>