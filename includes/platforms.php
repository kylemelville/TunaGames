<?php
	$query = "SELECT game_id, platform_id, page_url, icon, platform_name
		FROM platforms p
		JOIN game_platform gp
			ON p.id = gp.platform_id
		WHERE gp.game_id = '$gameID'
		ORDER BY platform_id ASC;";
	$platformResult = @mysqli_query($dbc, $query);
	$platforms = '';
	if($platformResult && $platformResult->num_rows > 0) {
		$platforms = $platforms.'<hr />
			<span class="play-on">Play on</span>
			<ul class="platform-list">';
		while ($platformRow = mysqli_fetch_array($platformResult, MYSQLI_ASSOC)) {
			$platforms = $platforms.'<li class="platform">
					<a href="'.$platformRow['page_url'].'" >
						<img src="./images/ui/platforms/'.$platformRow['icon'].'" alt="'.$platformRow['platform_name'].'" title="'.$platformRow['platform_name'].'" />
					</a>
				</li>';
		}
	}
?>