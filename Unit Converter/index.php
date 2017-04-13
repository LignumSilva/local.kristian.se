<html><head>
<title>Countdown Timer</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script><script>soundFile = 'bell'; curSndLoop = 0;</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/getswf.js"></script>
<script type="text/javascript" src="js/countdown-timer.js?v=091116a"></script>
<link href="css/online-stopwatch.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="timer"> <div class="bluebar"><a href="http://www.online-stopwatch.com/" title="Online Stopwatch" target="_blank" id="homeLink" style="font-size: 33px; line-height: 117.545px;">www.online-stopwatch.com</a></div> <div id="contents" style="width: 3057px;"> <div id="s1" class="screen s1" style="width: 1019px; left: -1019px;"> <div class="timerScreen"> <div class="pad"></div> <div id="displayScreen" class="display" style="font-size: 185px; line-height: 431px;"><span id="time">00:00:00</span></div> <div id="mills" style="font-size: 30.8333px; left: 736px; top: 346.571px;">000</div> </div> <div class="buttonSpace"> <div class="pad"></div> <div class="button"><a id="doStart" style="font-size: 54px; line-height: 323.25px;">Start</a></div> <div class="button2"><a id="doClear" style="font-size: 54px; line-height: 323.25px;">Clear</a></div> </div> </div> <div id="s2" class="screen s3" style="width: 1019px; visibility: visible; left: -1019px;"> <div class="timerScreen"> <div class="pad"></div> <div id="setTime" class="display" style="font-size: 185px; line-height: 431px;">00:00:00</div> </div> <div class="buttonSpace"> <div class="pad"></div> <div class="sleft"> <ol> <li><a class="sbutton" id="do5" style="font-size: 53px; line-height: 161.625px;">5</a></li> <li><a class="sbutton" id="do6" style="font-size: 53px; line-height: 161.625px;">6</a></li> <li><a class="sbutton" id="do7" style="font-size: 53px; line-height: 161.625px;">7</a></li> <li><a class="sbutton" id="do8" style="font-size: 53px; line-height: 161.625px;">8</a></li> <li><a class="sbutton" id="do9" style="font-size: 53px; line-height: 161.625px;">9</a></li> </ol> <div class="tpad"></div> <ol> <li><a class="sbutton" id="do0" style="font-size: 53px; line-height: 161.625px;">0</a></li> <li><a class="sbutton" id="do1" style="font-size: 53px; line-height: 161.625px;">1</a></li> <li><a class="sbutton" id="do2" style="font-size: 53px; line-height: 161.625px;">2</a></li> <li><a class="sbutton" id="do3" style="font-size: 53px; line-height: 161.625px;">3</a></li> <li><a class="sbutton" id="do4" style="font-size: 53px; line-height: 161.625px;">4</a></li> </ol> <div class="tpad"></div> </div> <div class="sright"> <ol> <li class="wide"><a id="doSet" class="sbutton" style="font-size: 54px; line-height: 161.625px;">Set</a></li> </ol> <div class="tpad"></div> <ol> <li class="wide"><a id="doUnSet" class="sbutton" style="font-size: 54px; line-height: 161.625px;">Clear</a></li> </ol> <div class="tpad"></div> </div> </div> </div> <div id="s3" class="s4" style="visibility: hidden; width: 0%; height: 0%;"> <div class="padload"></div> <div class="loading">Loading...</div> </div> </div> <div class="bluebar"><a id="doBack" title="Back" style="font-size: 33px; line-height: 117.545px; background-size: 35px;">Back</a></div> <div id="debug"></div> <div id="playAudio"></div> <audio class="hid" id="audio1" preload="auto2"> <source src="bell.mp3" type="audio/mpeg"> <source src="bell.wav" type="audio/wav"></audio></div>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23284110-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script><script>var loopMax = 1;document.getElementById("audio1").addEventListener("ended", function(){if (curSndLoop < loopMax){this.currentTime = 0;this.play();curSndLoop++;}}, false);</script>

</body></html>