    <link rel="shortcut icon" href="./games/RockCopter_Web/TemplateData/favicon.ico">
    <link rel="stylesheet" href="./games/RockCopter_Web/TemplateData/style.css">
    <script src="./games/RockCopter_Web/TemplateData/UnityProgress.js"></script>  
    <script src="./games/RockCopter_Web/Build/UnityLoader.js"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "./games/RockCopter_Web/Build/RockCopter_Web.json", {onProgress: UnityProgress});
    </script>
  </head>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">RockCopter</div>
      </div>
    </div>