<?php
session_start();
if (!isset($_SESSION['admin'])) {
	header ('location:index.php');
	die();
}
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/home.css">
    </head>

    <body>
        <div class="header">
         <a href="logout.php" class="logouting">LOG OUT</a>
        </div>
    
        <div class="container">
            <div class="adding">
                <input type="text" name="" placeholder="SPORT WEAR" id="name">
                <button id="add" class="btn-add">ADD</button>
            </div>
            <p class="title_category">BOOK CATEGORIES</p>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Show</th>
                </tr>
            </thead>
        </div>
    </body>
</html>


<?php
include('model.php');
$all = $model->get_categories();
//print_r($all);
foreach ($all as $val)
    {
       $id = $val["id"];
       $name = $val["name"];
       echo "<tr id = '$id'>";
       echo "<td contenteditable> $name</td>
           
           <td>
                <button class = 'update'> Update </button>
            </td>
             
            <td class = 'delete'>
                <button>Delete</button>
            </td>
            
            <td>
                <button><a href='products.php?cat=$id'>show</a></button>
            </td>
        </tr>";
    }
?>
</table>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->

<script>
	$(document).ready(function(){
		$('#add').click(function(){
			let name = $('#name').val();
			$.ajax({
			   url: 'add_cat.php',  			/*um dimel*/
			   type: 'post',
			   data: {name:name,action:'add'}, /*inchenq uxarkum*/
			   success:function(d){
			       location.reload();/*php-iic stacvox informacia*/
             // alert(d)
			   }
		    })
		})
        $('.delete').click(function(){
            let id  = $(this).parent().attr('id');
            let self  = $(this).parents('tr')
            $.ajax({
                url:"add_cat.php",
                type: 'post',
                data:{id:id, action:'delete'},
                    success: function (d){
                // location.reload()
                        self.remove();
            }

            })

        });
        $('.update').click(function(){
            let id  = $(this).parents('tr').attr('id');
            let name  = $(this).parent().prev().text();
            $.ajax({
                url:"add_cat.php",
                type: 'post',
                data:{ id:id, name:name, action:'update'},
                    success: function (d){
                        location.reload();
                        // alert(d)
                    }
            })
        });
   });
</script>

