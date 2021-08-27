<?php

include ('header.php');
include('model.php');

$all = $model->get_selected_products($_SESSION['user_id']);


if(empty ($all)){
echo "<h1>your cart is empty</h1>";
die;
}
// print_r($all);

?>


<table class="cart_table">
<tr>
        <th>NAME</th>
        <th>PRICE</th>
        <th>DESCRIPTION</th>
        <th>IMAGE</th>
        <th>Count</th>
        <th>Sum</th>
        <th>Delete</th>
    </tr>

<?php
$all = $model->get_selected_products($_SESSION['user_id']);
$total=0;
foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];
    $price = $val['price'];
    $description = $val['description'];
    $image = "../xanut/admin/images/".$val['iamge'];
    $count = $val['quantity'];
    $sum = $count * $price;
    $total+= $sum;


    echo"<tr>";
    echo "<td class='name'>$name</td> 
            <td  class='price'>$price$</td>
            <td  class='description'>$description</td>
            <td  class='nkarimg'><img src = '$image'></td>
            <td  ><input type='number' value='$count' class='count' id='$id'></td>
            <td  class='sum'>$sum</td>
            <td  class='delete'> <button id='$id'>DELETE</button></td>
        </tr>";
}
 echo"<tr><td colspan=5>total</td><td>$total</td></tr>";
 $_SESSION['total']=$total;
 echo "</table>"
?>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('.count').change(function(){
let id = $(this).attr('id')
let count = $(this).val()
   
    $.ajax({
         url:'add_to_cart.php',
            type:'post',
            data:{id:id, count:count, action: 'update'},
            success:function(a){
                location.reload();
            }
        })
    });




$('.count').click(function(){
let id = $(this).attr('id')
let count = $(this).val()
    
    $.ajax({
         url:'add_to_cart.php',
            type:'post',
            data:{id:id, count:count, action: 'delete'},
            success:function(a){
                
            }
        })
    });
});
</script>

</table>

<style>

    input[type="number"]{
        background-color: #eee;
	vertical-align: top;
	outline: none;
	padding: 0;
	height: 40px;
	line-height: 40px;    
	text-indent: 10px;
	display: inline-block;
	width: 100%;
	box-sizing: border-box;
	border: 1px solid #ddd;
	font-size: 14px;
	border-radius: 3px;
    }

    input[type="number"]:focus {
	outline: 2px solid blue;
}

    .nkarimg img{
        width: 180px;
        height: 150px;
        filter: grayscale(100%);
    }

    img:hover{
        filter: grayscale(0%);
        cursor: pointer;
        transform: scale(1.1);
    }

    .cart_table{
    text-align: left;
    overflow: hidden;
    width: 70%;
    margin: 0 auto;
    display: table;
    }

    .cart_table th{
        background-color: #1F2739;
    }
    .cart_table tr{
        font-size: 20px;
    }

    .cart_table td, .cart_table th{
        padding-bottom: 2%;
    padding-top: 2%;
    text-align: center;
    color: white;
    }
    .cart_table tr:nth-child(odd) {
    background-color: #323C50;
}

    .cart_table tr:nth-child(even) {
    background-color: #2C3446;
    }
    /* .cart_table td:first-child { color: #FB667A; } */

    .cart_table tr:hover {
    /* background-color: #464A52; */
        /* -webkit-box-shadow: 0 6px 6px -6px #0E1119; */
        /* -moz-box-shadow: 0 6px 6px -6px #0E1119; */
        /* box-shadow: 0 6px 6px -6px #0E1119; */
    }

    .cart_table td:hover {
       
        color: white;
        cursor: pointer;
    }
</style>



<?php
include('footer.php');

?>