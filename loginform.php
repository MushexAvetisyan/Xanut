<?php
include('header.php');

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design/loginform.css">
</head>
<body>


<div class="log_form">
    <form action="login.php" method="post">
        <p>login</p><input type="text" name="login" class="name_box" placeholder="User Name"><br>
        <p>password</p><input type="password" name="password" class="name_box" placeholder="Password"><br>
        <input type="submit" value="Login" id="loged">     
    </form>
</div>
    
    
</body>
</html>

<?php

if(isset($_SESSION['error'])){
  echo $_SESSION['error'];
  unset($_SESSION['error']);
}
include('footer.php');
?>