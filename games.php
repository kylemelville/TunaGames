<?php
	$pageSubTitle = 'Games';
	include('./includes/header.php');
	require("../mysqli_connect.php");
	$query = "SELECT id, game_name, description, logo, banner
		FROM games;";
	$result = @mysqli_query($dbc, $query);
	if($result && $result->num_rows > 0) {
		$gameList = '<ul id="games">';
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			if(empty($row['banner'])) {
				$gameList = $gameList.'<li class="game">';	
			} else {
				$gameList = $gameList.'<li class="game" style="background-image: url(./images/games/'.$row['banner'].');">';	
			}
			$gameList = $gameList.'<div class="wrapper">
				<div class="game-logo">';
			if(empty($row['logo'])) {
				$gameList = $gameList.$row['game_name'];
			} else {
				$gameList = $gameList.'<img src="./images/games/'.$row['logo'].'" alt="'.$row['game_name'].'" title="'.$row['game_name'].'" />';
			}
			$gameList = $gameList.'</div>
				<div class="game-description">
					<p>
						'.$row['description'].'
					</p>
					<hr />
					<span class="play-on">Play on</span>
					<ul class="platform-list">
						<li class="platform">
							<a href="" >
								<img src="./images/ui/onlinelogo.png" alt="Online" title="Online" />
							</a>
						</li>
						<li class="platform">
							<a href="" >
								<img src="./images/ui/steamlogo.png" />
							</a>
						</li>
					</ul>							
				</div>
			</div>
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
<link rel="stylesheet" href="./css/games.css" type="text/css" />