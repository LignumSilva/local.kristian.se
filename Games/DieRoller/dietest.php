<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="dietest.css">
<body>

  <h2>Die Roller</h2>

  <div class="images" style="max-width:250px">
    <img class="dice-a" src="img/dice-a/Dice-a-6.png" style="width:100%">
    <img class="dice-a" src="img/dice-a/Dice-a-4.png" style="width:100%">
    <img class="dice-a" src="img/dice-a/Dice-a-3.png" style="width:100%">
    <img class="dice-a" src="img/dice-a/Dice-a-1.png" style="width:100%">
    <img class="dice-a" src="img/dice-a/Dice-a-5.png" style="width:100%">
    <img class="dice-a" src="img/dice-a/Dice-a-2.png" style="width:100%">
  </div>


  <button id="roll" onclick="rollDice()">Roll!</button>

  <script>
    var rollDice = setInterval(function(){carousel() }, 200);
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("dice-a");
      for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
     }

     rollDice++;
     if (rollDice > x.length) {rollDice = 1}    
      x[rollDice-1].style.display = "block";  
  }

  var stopDice = setTimeout(function(){clearInterval(rollDice)
  },
  6000
  );
</script>

</body>
</html>