<?php

session_start();
include ('model.php');




$action = $_POST['action'];
if($action == 'add'){
    $cat_id = $_SESSION['cat'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img_name = $_FILES['img']['name']."_".time();
    move_uploaded_file($_FILES['img']['tmp_name'],"images/$img_name");
    $model->add_product($name,$price,$description,$cat_id, $img_name);
    header('location:products.php');
}
if($action == "update"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $desc = $_POST["desc"];
    $model->update_product($id,$name,$price,$desc);
}
if($action == "delete"){
    $id = $_POST["id"];
    unlink($_POST['src']);
    $model->delete_fruit($id);
}
