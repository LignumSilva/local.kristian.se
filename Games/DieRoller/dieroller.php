<?php
$display_name = 'A. Name';
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset=UTF-8>
 <title>Die Roller</title>
 <link href="dieroller.css" rel="stylesheet" />
 <style>
   .mySlides {display:none;}
 </style>
</head>

<body>
  <div id="wrap">
    <section class="sidebar text-center">
      <div class="avatar">
        <img class="logo" src="img/3d-dice.png" alt="3d-dice">
      </div>
      <h1><?php echo $display_name; ?></h1>
      <p>Contact:<br />
        <a href="mailto:">EMAIL</a></p>
        <hr />
        <ul class="social">
          <li><a href="https://www.facebook.com/KristianSkoglund"><span class="icon one"></span></a></li>
        </ul>
        <hr />
        <?php
        echo "Today: ";
        echo date("M d, \n Y");
        ?>
      </section>
      <section class="main">
        <h1>Die Roller</h1>
        <hr />
        <?php
        function roll () {
          return mt_rand(1,6);
        }

        echo roll();
        ?>
        <script>
          var slideIndex = 0;
          carousel();

          function carousel() {
            var i;
            var x = document.getElementsByClassName("dice-a");
            for (i = 0; i < x.length; i++) {
              x[i].style.display = "none"; 
            }
            slideIndex++;
            if (slideIndex > x.length) {slideIndex = 1} 
              x[slideIndex-1].style.display = "block"; 
            setTimeout(carousel, 1000); 
          }
        </script>
      
    </div>
    <div class="roller">
      <img class="dice-a" src="img/dice-a/" style="width:100%">
    </div>
    </section>
    <section class="footer text-center">
      &copy; <?php 
      echo date('Y');
      echo " " . $display_name . ". ";
      echo "Last modified: " . date ("F d Y, H:i:s.", getlastmod());
      ?>
    </section>
  </body>
  </html>