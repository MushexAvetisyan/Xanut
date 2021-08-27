<?php
session_start();
include('model.php');
$action = $_POST['action'];
if($action=='add'){
    $user_id = $_SESSION['user_id'];
    $model->add_to_cart($_POST['id'],$user_id);

}
if($action=='update'){
   
    $model->update_cart($_POST['id'],$_POST['count']);

}

if($action=='delete'){
   
    $model->delete_from_cart($_POST['id']);

}

?>