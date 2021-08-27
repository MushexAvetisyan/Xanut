<?php
include ('model.php');


$action = $_POST['action'];
if ($action == 'add') {
	$name = $_POST['name'];
	$model->add_category($name);
}
if($action == "delete"){
    $id = $_POST["id"];
    $model->delete_category($id);
}
if($action == "update"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $model->update_category($id,$name);
}