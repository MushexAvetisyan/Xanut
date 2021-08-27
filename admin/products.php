<?php
session_start();
include ('model.php');
if (isset($_GET['cat'])){
    $_SESSION['cat']=$_GET['cat'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div class="add_form">
<form action="add_product.php" method="post" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Product name" class="name">
      <input type="text" name="price" placeholder="Product Price" class="price">
      <input type="text" name="description" placeholder="Product Description" class="place">
      <input type="file" name="img" class="loadimage">
      <button name="action" value="add" class="button_add">ADD NEW PRODUCT</button>
</form>
</div>


<table class="table" border="1">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>



    <?php
    $all = $model->get_products($_SESSION['cat']);

    foreach ($all as $val)
    {
        $id = $val["id"];
        $name = $val["name"];
        $price = $val["price"];
        $description = $val["description"];
        $image = "images/".$val['iamge'];
        echo "<tr id = '$id'>";
        echo "<td contenteditable class='name'>$name</td>
           
           <td contenteditable class='price'>
              $price$
            </td>
            
             <td contenteditable class='desc'>
                $description  
            </td>
            
             <td>
              <img src = '$image' width='250px;'></td>
            </td>  
            
             <td>
              <button class = 'update'> Update </button>  
            </td>  
            
            <td class = 'delete'>
                <button>Delete</button>
            </td>
        </tr>";

    }
    ?>
</table>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
	$(document).ready(function(){
        $('.delete').click(function(){
            let id  = $(this).parent().attr('id');
            let self  = $(this).parents('tr')
            let src = self.find('img').attr('src');
            $.ajax({
                url:"add_product.php",
                type: 'post',
                data:{id:id, src:src, action:'delete'},
                    success: function (d){
                // location.reload()
                        self.remove();
            }

            })

        });
        $('.update').click(function(){
            let self= $(this).parents('tr');
            let id  = self.attr('id');
            let name  = self.find('.name').text();
            let price  = self.find('.price').text();
            let desc  = self.find('.desc').text();
            
            $.ajax({
                url:"add_product.php",
                type: 'post',
                data:{ id:id, name:name, price:price, desc:desc, action:'update'},
                    success: function (d){
                        // location.reload();
                        // alert(d)
                    }

            })

        });
   });
</script>




</body>
</html>

<style>
     html {
    height: 100%;
}

    body {
        margin:0;
        padding:0;
        font-family: sans-serif;
        background: #130f40;
    }

.add_form{
    padding: 35px 0px 50px;
    border: 3px solid cornflowerblue;
    box-shadow: 0px 0px 8px 3px cornflowerblue;
    border-radius: 20px;
    margin: 20px auto;
    width: 660px;
}

.name, .price, .place{
    padding: 7px 6px 5px;
    margin-bottom: 22px;
    border: 3px solid cornflowerblue;
    box-shadow: 0px 0px 8px 3px cornflowerblue;
    background-color: transparent;
    color: white;
    font-weight: 600;
    border-radius: 5px;
    margin-left: 20px;
}

/* .loadimage{
    padding: 15px 0;
} */

.loadimage::-webkit-file-upload-button {
  visibility: hidden;
}
.loadimage::before {
    content: 'Upload Product Image';
    display: inline-block;
    background: linear-gradient(top, #f9f9f9, #e3e3e3);
    border: 1px solid #999;
    border-radius: 3px;
    padding: 5px 8px;
    outline: none;
    color: white;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    /* text-shadow: 1px 1px #fff; */
    font-weight: 700;
    font-size: 14px;
    margin-left: 20px;
}
.loadimage:hover::before {
  border-color: black;
}
.loadimage:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}

.loadimage:focus{
    background-color: transparent;
}

.button_add{
    position: relative;
    left: 250px;
    top: 20px;
    height: 40px;
    width: 120px;
    border: none;
    background-color: cornflowerblue;
    cursor: pointer;
    /* border: 3px solid cornflowerblue; */
    box-shadow: 0px 0px 8px 3px cornflowerblue;
    color: black;
    font-weight: 700;
}

.table{
    /* margin: auto; */
    /* padding: 5px; */
    border: 3px solid darkseagreen;
    color: white;
    width: 71%;
    border-collapse: collapse;
    position: relative;
    top: 10px;
    left: 16px;
    text-align: center;
    margin: auto;
}

.table thead{
    background-color: teal;
    border: 3px solid white;
    position: relative;
    
}

.table td, .table th {
    padding: 15px;
    text-align: center;
    font-size: 20px;
    text-shadow: 0px 1px 6px cornflowerblue;
    font-weight: 600;
}

.table button{
    font-size: 30px;
    outline: none;
    background-color: transparent;
    cursor: pointer;
    color: white;
    border: none;
    text-shadow: 0px 0px 20px greenyellow;
}

.table img{
    width: 120px;
    filter: grayscale(100%);
}

.table img:hover{
    filter: grayscale(0%);
    cursor: pointer;
    transform: scale(1.1);
}

</style>
