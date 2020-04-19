<?php
include('../config.php');
session_start();
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$link,
"SELECT * FROM `products` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $code=>array(
 'name'=>$name,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<title>Computex | be quiet&#33; Pure Base 600</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Computex Shop: be quiet&#33; Pure Base 600">
	<meta name="keywords" content="Gmbh, Computex">
	<link rel="author" href="https://bbs-old.de" />
	<link rel="canonical" href="https://computexnow.com" />
	<meta name="twitter:card" content="Computex eine Computer Firma">
	<meta name="twitter:url" content="https://computexnow.com">
	<meta name="twitter:title" content="Computex">
	<meta name="twitter:description" content="Computex Shop: be quiet&#33; Pure Base 600">
	<meta name="twitter:image" content="../favicon.png">
	<link rel="apple-touch-icon" sizes="180x180" href="../fav/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="194x194" href="../fav/favicon-194x194.png">
	<link rel="icon" type="image/png" sizes="192x192" href="../fav/android-chrome-192x192.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../fav/favicon-16x16.png">
	<link rel="manifest" href="../fav/site.webmanifest">
	<link rel="mask-icon" href="../fav/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="../fav/favicon.ico">
	<meta name="msapplication-TileColor" content="#b91d47">
	<meta name="msapplication-TileImage" content="../fav/mstile-144x144.png">
	<meta name="msapplication-config" content="../fav/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<link type="text/css" rel="stylesheet" href="../basic.css" media="none" onload="if(media!='all')media='all'">
	<link type="text/css" rel="stylesheet" href="shop.css" media="none" onload="if(media!='all')media='all'">
	<link type="text/css" rel="stylesheet" href="../gallery.css" media="none" onload="if(media!='all')media='all'">
</head>
<body>
	<div class="grid">
		<div class="A">
			<ul>
				<li><a href="../.">Home</a></li>
				<li><a href="../shop.php">Shop</a></li>
				<li><a href="../geschichte.php">Firmengeschichte</a></li>
				<li><a href="../kontakt.php">Kontakt</a></li>
				<li><a href="../wir.php">Unsere Firma</a></li>
				<li><script async src="https://cse.google.com/cse.js?cx=007807546472067433593:o191pdokv4o"></script><div class="gcse-search"></div></li>
			</ul>
		</div>
		<div class="B"></div>
		<div class="C">
		<div class="desktoponly">
			<video autoplay muted loop id="myVideo">		
					<source src="vid/case0/case0.webm" type="video/webm" >
					<source src="vid/case0/case0.wmv" type="video/wmv">
					<source src="vid/case0/case0.mp4" type="video/mp4">
					<source src="vid/case0/case0.flv" type="video/flv">
			</video>
			</div>
			<div class="shopgrid">
				<div class="G">
					<div id="gallery">					
					<div class="preview" align="center">
						<img name="preview" src="img/case0/case0.png" alt=""/>
					</div>

						<div class="thumbnails">
							<img onmouseover="preview.src=img1.src" name="img1" src="img/case0/case0.png" alt="" />
							<img onmouseover="preview.src=img2.src" name="img2" src="img/case0/case1.png" alt="" />
							<img onmouseover="preview.src=img3.src" name="img3" src="img/case0/case2.png" alt="" />
							<img onmouseover="preview.src=img4.src" name="img4" src="img/case0/case3.png" alt="" />
						</div>
				</div>
				</div>
				<div class="H"><h2>be quiet&#33; Pure Base 600 schwarz, schallged&auml;mmt (BG021)</h2>
				<ul id="normal" type="square">
					<li>Extern	2x 5.25"</li><br>
					<li>Intern	3x 2.5"/3.5" (quer, Laufwerksschienen), 8x 2.5"</li><br>
					<li>Front I/O	2x USB-A 3.0, 1x Kopfh&ouml;rer, 1x Mikrofon</li><br>
					<li>PCI-Steckpl&auml;tze	7</li><br>
					<li>L&uuml;fter (vorne)	1x 140mm, 900rpm oder 2x 140mm (optional), 3x 120mm (optional)</li><br>
					<li>L&uuml;fter (hinten)	1x 120mm, 1200rpm</li><br>
					<li>L&uuml;fter (links)	N/​A</li><br>
					<li>L&uuml;fter (rechts)	N/​A</li><br>
					<li>L&uuml;fter (oben)	2x 140mm (optional), 3x 120mm (optional)</li><br>
					<li>L&uuml;fter (unten)	N/​A</li><br>
					<li>L&uuml;fter (sonstige)	N/​A</li><br>
					<li>Mainboard	bis ATX</li><br>
				</ul>
				<br>
				<p id="price">Preis: 70&euro;</p>
				<form method='post' action=''>
				<button type='submit' class='buy'>Jetzt kaufen</button>
				<input type='hidden' name='code' value='case0' />
				</form>
			</div>
			</div>
		</div>
		<div class="D"></div>
		<div class="E"><div id=center><a href="impressum.php" target="_blank">Impressum</a>   <a href="data.php" target="_blank">Privacy Policy</a>   <a href="terms.php" target="_blank">Terms of Service</a></div></div>
		</div> 
	</body>
</html>