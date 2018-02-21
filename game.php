<?php
	require("../mysqli_connect.php");
	/*security concern ****/
	$gameID = $_GET['id'];
	$query = "SELECT game_name, description, logo, banner
		FROM games
		WHERE id = '$gameID'
		LIMIT 1;";
	$gameResult = @mysqli_query($dbc, $query);
	$game = '';
	if($gameResult && $gameResult->num_rows > 0) {
		$gameRow = mysqli_fetch_array($gameResult, MYSQLI_ASSOC);
		$pageSubTitle = $gameRow['game_name'];
		$game = '<div class="game-banner" style="background-image: url(./images/games/'.$gameRow['banner'].');">
				<div class="wrapper">
					<div class="game-logo">
						<img src="./images/games/'.$gameRow['logo'].'" alt="'.$gameRow['game_name'].'" title="'.$gameRow['game_name'].'" />
					</div>
				</div>
			</div>
			
			<div class="wrapper game">
				<div class="game-description">
					<p>'.$gameRow['description'].'</p>';
		include("./includes/platforms.php");
		$game = $game.$platforms;
		$game = $game.'</ul>
						</div>
					</div>
				</a>
			</li>';
		$game = $game.'</ul>';
		$query = "SELECT image
			FROM screenshots s
			JOIN game_screenshot gs
				ON s.id = gs.screenshot_id
			WHERE gs.game_id = '$gameID';";
		$screenshotResult = @mysqli_query($dbc, $query);
		if($screenshotResult && $screenshotResult->num_rows > 0) {
			$game = $game.'<ul class="screenshots">
				<div class="wrapper">';
			while ($screenshotRow = mysqli_fetch_array($screenshotResult, MYSQLI_ASSOC)) {
				$game = $game.'<li>
						<a href="./images/screenshots/'.$gameID.'/'.$screenshotRow['image'].'" target="_blank">
							<img src="./images/screenshots/'.$gameID.'/'.$screenshotRow['image'].'" />
						</a>
					</li>';
			}
			$game = $game.'</div>
				</ul>';
		}
	}
	include('./includes/header.php');
	include('./includes/embedded-game.php');
	echo $game;
?>
<?php include('./includes/footer.php'); ?>
<link rel="stylesheet" href="./css/game.css" type="text/css" />