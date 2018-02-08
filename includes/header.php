<!DOCTYPE html>
<html>
	<head>
		<title>
			Tuna Games
			<?php 
				if(!empty($pageSubTitle)) {
					echo ' - '.$pageSubTitle; 
				}
			?>				
		</title>	
		<link rel="stylesheet" href="./css/style.css" type="text/css" />
		<link rel="stylesheet" href="./css/fontawesome/fontawesome-all.css" type="text/css" />
	</head>
	<link rel="stylesheet" href="./css/header.css" type="text/css" />
	<body>
		<header>
			<div class="wrapper">
				<a class="logo" href="./index.php">
					<img src="./images/ui/tunagameslogo.png" alt="Tuna Games" />	
				</a>
				<div class="social-media">
					<a href="https://www.facebook.com">
						<i class="fab fa-facebook"></i>
					</a>
					<a href="https://www.twitter.com">
						<i class="fab fa-twitter"></i>
					</a>
					<a href="https://www.youtube.com">
						<i class="fab fa-youtube"></i>
					</a>
					<a href="http://www.twitch.tv">
						<i class="fab fa-twitch"></i>
					</a>
				</div>
				<div class="navigation">
					<ul>
						<li><a href="games.php">Games</a></li>
						<li><a href="team.php">Team</a></li>
						<li><a href="shop.php">Shop</a></li>
					</ul>
				</div>
			</div>
		</header>