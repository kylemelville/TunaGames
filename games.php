<?php
	$pageSubTitle = 'Games';
	require("../mysqli_connect.php");
	include('./includes/header.php');	
	include("./includes/game_builder.php");
	$query = "SELECT id, game_name, description, logo, banner
		FROM games;";
	$gameResult = @mysqli_query($dbc, $query);
	if($gameResult && $gameResult->num_rows > 0) {
		$gameList = '<ul id="games">';
		while ($gameRow = mysqli_fetch_array($gameResult, MYSQLI_ASSOC)) {
			if(empty($gameRow['banner'])) {
				$gameList = $gameList.'<li class="game">';	
			} else {
				$gameList = $gameList.'<li class="game" style="background-image: url(./images/games/'.$gameRow['banner'].');">';	
			}
			$gameList = $gameList.'<a href="./game.php?id='.$gameRow['id'].'">"
				<div class="wrapper">
				<div class="game-logo">';
			if(empty($gameRow['logo'])) {
				$gameList = $gameList.$gameRow['game_name'];
			} else {
				$gameList = $gameList.'<img src="./images/games/'.$gameRow['logo'].'" alt="'.$gameRow['game_name'].'" title="'.$gameRow['game_name'].'" />';
			}
			$gameList = $gameList.'</div>
				<div class="game-description">
					<p>
						'.$gameRow['description'].'
					</p>';
			$gameID = $gameRow['id'];
			$gameList = $gameList.getPlatforms($gameID, $dbc);
			$gameList = $gameList.'</ul>
							</div>
						</div>
					</a>
				</li>';
		}
		$gameList = $gameList.'</ul>';
		echo $gameList;
	} else {
		echo '<div class="empty-list">
				<span>Nothing here!</span>
				<img src="./images/ui/sweatytuna.png" />
			</div>';
	}
	include('./includes/footer.php');
?>
<link rel="stylesheet" href="./css/game.css" type="text/css" />
<link rel="stylesheet" href="./css/games.css" type="text/css" />
