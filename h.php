<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TalkIT</title>
  <link rel="stylesheet" href="h.css" />
  <script src="h.js" defer></script>
</head>

<body>
  <div class="container">
    <div class="nav"><span id="talkait">TalkaIT</span></div>
    <div class="left">
      <ul type="none" id="profile">
        <li>Id</li>
        <li>
          <span><a href="overview.html">Overview</a></span>
        </li>
        <li>
          <span><a href="index.html">Log out</a></span>
        </li>
      </ul>
    </div>
    <div class="right">
      <div class="write">
        <button id="moodAsk" onclick="moodAsk()"><span>How are you feeling today?</span><img src="/icons/dropdown.svg"
           ></button>
        <div id="moodOption" style="display: none;">
          <button class="happy" onclick="mood('happy')"><img src="icons/happySVG.svg"><span>Happy</span></button>
          <button class="sad" onclick="mood('sad')"><img src="icons/sadSVG.svg"><span>Sad</span></button>
          <button class="suprise" onclick="mood('suprise')"><img src="icons/surprisedSVG.svg"><span>Suprise</span></button>
          <button class="disgust" onclick="mood('disgust')"><img src="icons/madSVG.svg"><span>Disgust</span></button>
          <button class="fear" onclick="mood('fear')"><img src="icons/fearSVG.svg"><span>Fear</span></button>
          <button class="angry" onclick="mood('angry')"><img src="icons/angrySVG.svg"><span>Anger</span></button>
          <button class="journal" onclick="mood('journal')" style="margin-bottom: 7px;width:100%;"><img src="icons/writeSVG.svg"><span>Note/Journal</span></button>
        </div>
        <br>
        <div id="post" style="display: none;">
          <form id="moodWrite">
            <!-- <textarea></textarea> -->
          </form>
        </div>
      </div>
      <div class="listen">
        <div id="breatheExe">
          <div id="outerCircle">
            <p id="ExeInner">.</p>
          </div>
          <button>Start</button>
        </div>
        <div id="meditate">

        </div>
      </div>
    </div>
  </div>
</body>

</html>