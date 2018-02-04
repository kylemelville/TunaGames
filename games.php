<?php
	$pageSubTitle = 'Games';
	include('./includes/header.php');
	require("../mysqli_connect.php");
	$query = "SELECT first_name, last_name, description
		FROM games;";
	$result = @mysqli_query($dbc, $query);
	if($result && $result->num_rows > 0) {
		$gameList = '<ul id="games">';
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$gameList = $gameList.'<li class="game">
					<img class="game-background" src="" />
					<img class="game-logo" src="" />
					<span class="game-name">TUNADVENTURE</span>
					<p>
						Description
					</p>
				</li>';
		}
		$gameList = $gameList.'</ul>';
		echo $gameList;
	} else {
		echo '<div class="empty-list">
				NOTHING HERE!
				<img src="./images/ui/sweaty-tuna.png" />
			</div>';
	}
	include('./includes/footer.php');
?>