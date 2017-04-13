<?php
$display_name = 'A. Name';
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset=UTF-8>
   <title>Website by <?php echo $display_name; ?></title>
   <link href="style.css" rel="stylesheet" />
</head>

<body>
  <div id="wrap">
    <section class="sidebar text-center">
      <div class="avatar">
        <img class="logo" src="img/binary-world.png" alt="Alt For Image">
    </div>
    <h1><?php echo $display_name; ?></h1>
    <p>Contact:<br />
        <a href="mailto:">EMAIL</a></p>
        <hr />
        <ul class="social">
          <li><a href="https://www.facebook.com/KristianSkoglund"><span class="icon facebook"></span></a></li>
      </ul>
      <hr />
      <?php
      echo "Today: ";
      echo date("M d, \n Y");
      ?>
  </section>
  <section class="main">
    <h1>My Website</h1>
    <hr />
    <h2>Text</h2>
</section>
</div>
<section class="footer text-center">
  &copy; <?php 
  echo date('Y');
  echo " " . $display_name . ". ";
  echo "Last modified: " . date ("F d Y, H:i:s.", getlastmod());
  ?>
</section>
</body>
</html>