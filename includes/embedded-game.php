<?php
  $query = "SELECT build_folder
    FROM web_games
    WHERE game_id = '$gameID';";
    
?>
<div class="embedded-game">  
    <link rel="shortcut icon" href="./images/ui/unity/favicon.ico">
    <link rel="stylesheet" href="./css/embedded-game.css">
    <script src="./js/UnityProgress.js"></script>  
    <script src="./games/RockCopter/UnityLoader.js"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "./games/RockCopter/RockCopter_Web.json", {onProgress: UnityProgress});
    </script>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
      </div>
    </div>
  </div>