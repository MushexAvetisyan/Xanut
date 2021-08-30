<?php

include("model.php");
include("header.php");
if($model->cart_is_empty($_SESSION["user_id"])){
    echo '<h2> Your Cart is Empty</h2>';
    die;
}

$model -> insert_order($_SESSION["user_id"], $_SESSION["total"]);
        
?>