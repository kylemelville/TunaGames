<?php
	$pageSubTitle = 'Games';
	include('./includes/header.php');
	require("../mysqli_connect.php");
	$query = "SELECT game_name, description
		FROM games;";
	$result = @mysqli_query($dbc, $query);
	if($result && $result->num_rows > 0) {
		$gameList = '<ul id="games">';
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$gameList = $gameList.'<li class="game">
					<img class="game-background" src="" />
					<img class="game-logo" src="" />
					<span class="game-name">'.$row['game_name'].'</span>
					<p>
						'.$row['description'].'
					</p>
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