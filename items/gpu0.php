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
	<title>Computex | RTX 2070 SUPER EX</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Computex Shop: RTX 2070 SUPER EX">
	<meta name="keywords" content="Gmbh, Computex">
	<link rel="author" href="https://bbs-old.de" />
	<link rel="canonical" href="https://computexnow.com" />
	<meta name="twitter:card" content="Computex eine Computer Firma">
	<meta name="twitter:url" content="https://computexnow.com">
	<meta name="twitter:title" content="Computex">
	<meta name="twitter:description" content="Computex Shop: RTX 2070 SUPER EX">
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
					<source src="vid/gpu0/gpu0.webm" type="video/webm" >
					<source src="vid/gpu0/gpu0.wmv" type="video/wmv">
					<source src="vid/gpu0/gpu0.flv" type="video/flv">
					<source src="vid/gpu0/gpu0.mp4" type="video/mp4">
			</video>
			</div>
			<div class="shopgrid">
				<div class="G">
					<div id="gallery">					
					<div class="preview" align="center">
						<img name="preview" src="img/gpu0/gpu0.png" alt=""/>
					</div>

						<div class="thumbnails">
							<img onmouseover="preview.src=img1.src" name="img1" src="img/gpu0/gpu0.png" alt="" />
							<img onmouseover="preview.src=img2.src" name="img2" src="img/gpu0/gpu1.png" alt="" />
							<img onmouseover="preview.src=img3.src" name="img3" src="img/gpu0/gpu2.png" alt="" />
							<img onmouseover="preview.src=img4.src" name="img4" src="img/gpu0/gpu3.png" alt="" />
						</div>
				</div>
				</div>
				<div class="H"><h2>KFA2 GeForce RTX 2070 SUPER EX [1-Click OC], 8GB GDDR6, HDMI, 3x DP (27ISL6MDU9EK)</h2>
				<ul id="normal" type="square">
					<li>Anschl&uuml;sse	1x HDMI 2.0b, 3x DisplayPort 1.4a</li><br>
					<li>Modell	NVIDIA GeForce RTX 2070 SUPER (Desktop), 8GB GDDR6</li><br>
					<li>Chip	TU104-410-A1 "Turing"</li><br>
					<li>Fertigung	12nm (TSMC)</li><br>
					<li>Chiptakt	1605MHz, Boost: 1815MHz (OC Mode)</li><br>
					<li>Speicher	8GB GDDR6, 1750MHz, 256bit, 448GB/​s</li><br>
					<li>Shader-Einheiten/TMUs/ROPs	2560/​160/​64</li><br>
					<li>TDP	215W (NVIDIA)</li><br>
					<li>Externe Stromversorgung	1x 8-Pin PCIe, 1x 6-Pin PCIe</li><br>
					<li>K&uuml;hlung	2x Axial-L&uuml;fter (100mm) (RGB beleuchtet)</li><br>
					<li>Gesamth&ouml;he	Triple-Slot</li><br>
					<li>Abmessungen	295x143x52mm</li>
				</ul>
				<br>
				<p id="price">Preis: 510&euro;</p>
				<form method='post' action=''>
				<button type='submit' class='buy'>Jetzt kaufen</button>
				<input type='hidden' name='code' value='gpu0' />
				</form>
			</div>
			</div>
		</div>
		<div class="D"></div>
		<div class="E"><div id=center><a href="impressum.php" target="_blank">Impressum</a>   <a href="data.php" target="_blank">Privacy Policy</a>   <a href="terms.php" target="_blank">Terms of Service</a></div></div>
		</div> 
	</body>
</html>