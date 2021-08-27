<?php

include('model.php');

session_start();

//stugel inputnere lracvac linen
$login = $_POST['login'];
$password = $_POST['password'];

$user = $model->check_user($login,$password);
if($user){
$_SESSION['user_id']=$user['id'];
$_SESSION['user']=$user['email'];
header('location:index.php');
die;
}
else{
    $_SESSION['error']='<p class="error">wrong login or password</p>';
    header('location:loginform.php');

}
