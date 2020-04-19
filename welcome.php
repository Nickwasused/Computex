<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Der Artikel wurde von Ihrem Einkaufswagen entfernt!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}

?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<title>Computex | Willkommen</title>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
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
				<div class="page-header">
					<h1>Hallo, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
				</div>
				<div class="cart">
				<?php
				if(isset($_SESSION["shopping_cart"])){
					$total_price = 0;
				?> 
				<table class="table">
				<tbody>
				<tr>
				<td></td>
				<td>Artikel</td>
				<td>Anzahl</td>
				<td>Preis pro St&uuml;ck</td>
				<td>Gesamter Preis</td>
				</tr> 
				<?php 
				foreach ($_SESSION["shopping_cart"] as $product){
				?>
				<tr>
				<td>
				<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
				</td>
				<td><?php echo $product["name"]; ?><br />
				<form method='post' action=''>
				<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
				<input type='hidden' name='action' value="remove" />
				<button type='submit' class='remove'>Artikel entfernen</button>
				</form>
				</td>
				<td>
				<form method='post' action=''>
				<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
				<input type='hidden' name='action' value="change" />
				<select name='quantity' class='quantity' onChange="this.form.submit()">
				<option <?php if($product["quantity"]==1) echo "selected";?>
				value="1">1</option>
				<option <?php if($product["quantity"]==2) echo "selected";?>
				value="2">2</option>
				<option <?php if($product["quantity"]==3) echo "selected";?>
				value="3">3</option>
				<option <?php if($product["quantity"]==4) echo "selected";?>
				value="4">4</option>
				<option <?php if($product["quantity"]==5) echo "selected";?>
				value="5">5</option>
				</select>
				</form>
				</td>
				<td><?php echo "$".$product["price"]; ?></td>
				<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
				</tr>
				<?php
				$total_price += ($product["price"]*$product["quantity"]);
				}
				?>
				<tr>
				<td colspan="5" align="right">
				<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
				</td>
				</tr>
				</tbody>
				</table> 
				  <?php
				}else{
				 echo "<h3>Ihr Einkaufwagen ist leer!</h3>";
				 }
				?>
				</div>
				 
				<div style="clear:both;"></div>
				 
				<div class="message_box" style="margin:10px 0px;">
				<?php echo $status; ?>
				</div>
				<p>
					<a href="reset-password.php" class="btn btn-warning">&Auml;ndere dein Passwort</a>
					<a href="logout.php" class="btn btn-danger">Ausloggen</a>
				</p>
			</div>
			<div class="D"></div>
			<div class="E"><div id=center><a href="impressum.php" target="_blank">Impressum</a>   <a href="data.php" target="_blank">Privacy Policy</a>   <a href="terms.php" target="_blank">Terms of Service</a></div></div>
		</div> 
	</body>
</html>