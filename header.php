
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Xanut</title>
  <link rel="stylesheet" href="design/header.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  
<input type="checkbox" id="active">
    <label for="active" class="menu-btn"><span></span></label>
    <label for="active" class="close"></label>
    <div class="wrapper">
    <ul>
  <li><a href="index.php">HOME</a></li>
  <?php 
  
  session_start();
  if(isset($_SESSION['user'])){

    echo '<li>'.$_SESSION['user'].'</li>';
    echo '<li><a href="cart.php">CART</a></li>';
    echo '<li><a href="logout.php">LOG OUT</a></li>';
  }else{
  ?>

  <li><a href="#">GUEST</a></li>
  <li><a href="cart.php">CART</a></li>
  <li><a href="loginform.php">LOGIN</a></li>
  <li><a href="registform.php">REGISTER</a></li>
</ul>
<?php
  
  }
  
  ?>
</div>
</body>
</html>

