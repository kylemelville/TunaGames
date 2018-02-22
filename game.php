<?php
	require("../mysqli_connect.php");
	include("./includes/game_builder.php");
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
		if(empty($gameRow['banner'])) {
			$game = '<div class="game-banner">';	
		} else {
			$game = '<div class="game-banner" style="background-image: url(./images/games/'.$gameRow['banner'].');">';	
		}
		$game = $game.'<div class="wrapper">
					<div class="game-logo">';
		if(empty($gameRow['logo'])) {
			$game = $game.$gameRow['game_name'];
		} else {
			$game = $game.'<img src="./images/games/'.$gameRow['logo'].'" alt="'.$gameRow['game_name'].'" title="'.$gameRow['game_name'].'" />';
		}
		$game = $game.'</div>
				</div>
			</div>
			'.getEmbeddedGame($gameID, $dbc).'
			<div class="wrapper game">
				<div class="game-description">
					<p>'.$gameRow['description'].'</p>
					'.getPlatforms($gameID, $dbc).'
				</div>
			</div>
			'.getScreenshots($gameID, $dbc);
	}
	include('./includes/header.php');
	echo $game;
?>
<?php include('./includes/footer.php'); ?>
<link rel="stylesheet" href="./css/game.css" type="text/css" />