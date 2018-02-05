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
	</head>
	<link rel="stylesheet" href="./css/header.css" type="text/css" />
	<body>
		<header>
			<a href="./index.php">
				<img src="./images/ui/tunagameslogo.png" alt="Tuna Games" />	
			</a>	
			<div class="navigation">
				<ul>
					<li><a href="games.php">Games</a></li>
					<li><a href="team.php">Team</a></li>
					<li><a href="shop.php">Shop</a></li>
				</ul>
			</div>
		</header>