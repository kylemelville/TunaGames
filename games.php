<?php
	$pageSubTitle = 'Games';
	include('./includes/header.php');
	require("../mysqli_connect.php");	
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
			$query = "SELECT game_id, platform_id, page_url, icon, platform_name
				FROM platforms p
				JOIN game_platform gp
					ON p.id = gp.platform_id
				WHERE gp.game_id = '$gameID'
				ORDER BY platform_id ASC;";
			$platformResult = @mysqli_query($dbc, $query);
			if($platformResult && $platformResult->num_rows > 0) {
				$gameList = $gameList.'<hr />
					<span class="play-on">Play on</span>
					<ul class="platform-list">';
				while ($platformRow = mysqli_fetch_array($platformResult, MYSQLI_ASSOC)) {
					//handle if null to redirect to game specific page. for hosting my own webgl games
					$gameList = $gameList.'<li class="platform">
							<a href="'.$platformRow['page_url'].'" >
								<img src="./images/ui/'.$platformRow['icon'].'" alt="'.$platformRow['platform_name'].'" title="'.$platformRow['platform_name'].'" />
							</a>
						</li>';
				}
			}
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
