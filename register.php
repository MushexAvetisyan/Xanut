<?php
session_start();

include('model.php');

//stugel inputnere lracvac linen
$login = $_POST['login'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$email = $_POST['email'];

if (empty($login)) {
    $_SESSION['error'] = "<span class=name_err>*ԱՆՈՒՆԸ ՊԱՐՏԱԴԻՐ Է</span>";
    header('location:registform.php');
    die;
 }else{
   $_SESSION['login'] = $login;
 }

 if (empty($password)) {
     $_SESSION['error'] = "<span class=pass_err>*ԳԱՂՏՆԱԲԱՌԸ ՊԱՐՏԱԴԻՐ Է</span>";
       header('location:registform.php');
      die;
  }else{
   $_SESSION['password'] = $password;
  }
  if (empty($email)) {
     $_SESSION['error'] = "<span class=mail_err>*Էլ, ՀԱՍՑԵՆ ՊԱՐՏԱԴԻՐ Է</span>";
    header('location:registform.php');
 die;
  }else{
   $_SESSION['email'] = $email;
  }

  if (!preg_match("/^([a-zA-Z' ]+)$/",$login)) {
     $_SESSION['error'] = "<span class=preg_err>ՍԽԱԼ ՖՈՐՄԱՏԻ ԱՆՈՒՆ</span>"; 
     header('location:registform.php');
 die;
  }

  if(strlen($password) < 6){
   $_SESSION['error'] = "<span class=len_err>ԳԱՂՏՆԱԲԱՌԸ ՊԵՏՔ Է ԼԻՆԻ 6 ՆԻՇԻՑ ԱՎԵԼ</span>"; 
     header('location:registform.php');
 die;
}

if($password !== $confirm){
   $_SESSION['error'] = "<span class=conf_err>ԳԱՂՏՆԱԲԱՌԸ ՉԻ ՀԱՄԸՆԿՆՈՒՄ</span>"; 
     header('location:registform.php');
 die;
}


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $_SESSION['error'] = "<span class=mailval_err>*ՍԽԱԼ ՖՈՐՄԱՏԻ ԷԼ․ՀԱՍՑԵ</span>";
     header('location:registform.php'); 
     die;
  }

if($model->check_email($email)){
 $_SESSION['error'] = '<span class=chek_err>*Էլ․ հասցեն արդեն զբաղված է</span>';
 header('location:registform.php');
 die;
}

if (!empty($login) && !empty($password) && !empty($confirm) && !empty($email)){
  $model->add_user($login,$password,$email,$confirm);
  header('location:index.php');
}

?>
