<?php

include ('model.php');
$login = $_POST['login'];
$pass = $_POST['password'];

$model = new Model;

session_start();
if ($model->check_admin($login,$pass)){
	$_SESSION['admin'] = $login;
	header('location:home.php');
	die();
} else {
	$_SESSION['error'] ='<p 
style =
"color: white;
width: 300px;
margin: auto;
text-align: center;
margin-top: 610px;
font-size: 17px;
font-weight: 800;">WRONG LOGIN AND PASSWORD PLEASE WRITE CORRECT</p>';

	header ('location:index.php');
	die();
}


