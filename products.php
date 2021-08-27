<?php
include('admin/model.php');
include('header.php');
if(isset($_GET['cat'])){
    $_SESSION['cat'] = $_GET['cat'];
}

?>

<a href="index.php" class="back"> << Go Back In Items Category</a>

<h2 class="tit">Item Table</h2>
<table class="cart_table">
    <tr>
        <th>NAME</th>
        <th>PRICE</th>
        <th>DESCRIPTION</th>
        <th>IMAGE</th>
        <th>ADD TO CART</th>
    </tr>

<?php
$all=$model->get_products($_SESSION['cat']);


foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];
    $price = $val['price'];
    $description = $val['description'];
    $image = "../xanut/admin/images/".$val['iamge'];

    
    echo"<tr>";
    echo "<td class='name'>$name</td> 
            <td  class='price'>$price$</td>
            <td  class='description'>$description</td>
            <td  class='nkarimg'><img src = '$image'></td>
            <td><button class='addtocart' id='$id'>ADD TO CART</button></td>
        </tr>";
}

?> 
</table>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
$('.addtocart').click(function(){
        let id=$(this).attr('id');

        $.ajax({
            url:'add_to_cart.php',
            type:'post',
            data:{id:id,action:'add'},
            success:function(a){
           alert("You Added New Item in Your Cart")
            }
        });
    });


});
</script>

<style>

    .tit{
        text-align: center;
    color: white;
    font-size: 40px;
    font-weight: 600;
    text-shadow: 1px 0px 3px;
    }

    .back{
        color: white;
        text-decoration-line: none;
    }

    .addtocart{
        padding: 10px 15px;
    background: none;
    color: red;
    font-size: 18px;
    cursor: pointer;
    border: 3px solid red;
    box-shadow: 0px 0px 10px 0px red;
    }

    .addtocart:hover{
        background-color: red;
        color: black;
    }
    .nkarimg img{
        width: 180px;
        /* height: 150px; */
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
    margin: -30px auto;
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
    background-color: #464A52;
        -webkit-box-shadow: 0 6px 6px -6px #0E1119;
        -moz-box-shadow: 0 6px 6px -6px #0E1119;
        box-shadow: 0 6px 6px -6px #0E1119;
    }

    .cart_table td:hover {
       
        color: white;
        /* cursor: pointer; */
    }
</style>



<?php
include('footer.php');

?>