<?php
	function getEmbeddedGame($gameID, $dbc) {
  		$query = "SELECT build_folder
	    	FROM online_builds ob
	    	JOIN game_online_build gob
	    		ON ob.id = gob.build_id
	    	WHERE gob.game_id = '$gameID'
	    	LIMIT 1;";
	    $result = @mysqli_query($dbc, $query);
	    $embeddedGame = '';
	    if($result && $result->num_rows > 0) {
	    	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	    	$embeddedGame = '<div class="embedded-game">  
		    	<link rel="shortcut icon" href="./images/ui/unity/favicon.ico">
		    	<link rel="stylesheet" href="./css/embedded-game.css">
		    	<script src="./js/UnityProgress.js"></script>  
		    	<script src="./games/'.$row['build_folder'].'/UnityLoader.js"></script>
		    	<script>
		      		var gameInstance = UnityLoader.instantiate("gameContainer", "./games/'.$row['build_folder'].'/'.$row['build_folder'].'.json", {onProgress: UnityProgress});
		    	</script>
		    	<div class="webgl-content">
		      		<div id="gameContainer" style="width: 960px; height: 600px"></div>
		      		<div class="footer">
		        		<div class="webgl-logo"></div>
		        		<div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
		      		</div>
				</div>
			</div>';	
	    }		
		return $embeddedGame;
	}

	function getPlatforms($gameID, $dbc) {
		$query = "SELECT game_id, platform_id, page_url, icon, platform_name
			FROM platforms p
			JOIN game_platform gp
				ON p.id = gp.platform_id
			WHERE gp.game_id = '$gameID'
			ORDER BY platform_id ASC;";
		$result = @mysqli_query($dbc, $query);
		$platforms = '';
		if($result && $result->num_rows > 0) {
			$platforms = $platforms.'<hr />
				<span class="play-on">Play on</span>
				<ul class="platform-list">';
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				if(empty($row['page_url'])) {
					$pageURL = './game.php?id='.$row['game_id'];
				} else {
					$pageURL = $row['page_url'];
				}
				$platforms = $platforms.'<li class="platform">
							<a href="'.$pageURL.'" >
								<img src="./images/ui/platforms/'.$row['icon'].'" alt="'.$row['platform_name'].'" title="'.$row['platform_name'].'" />
							</a>
						</li>';
			}
			$platforms = $platforms.'</ul>';
		}
		return $platforms;
	}

	function getScreenshots($gameID, $dbc) {
		$query = "SELECT image
			FROM screenshots s
			JOIN game_screenshot gs
				ON s.id = gs.screenshot_id
			WHERE gs.game_id = '$gameID';";
		$result = @mysqli_query($dbc, $query);
		$screenshots = '';
		if($result && $result->num_rows > 0) {
			$screenshots = $screenshots.'<ul class="screenshots">
				<div class="wrapper">';
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$screenshots = $screenshots.'<li>
						<a href="./images/screenshots/'.$gameID.'/'.$row['image'].'" target="_blank">
							<img src="./images/screenshots/'.$gameID.'/'.$row['image'].'" />
						</a>
					</li>';
			}
			$screenshots = $screenshots.'</div>
				</ul>';
		}
		return $screenshots;
	}
?>