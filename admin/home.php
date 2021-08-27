<?php

session_start();
if (!isset($_SESSION['admin'])) {
	header ('location:index.php');
	die();
}


?>


    <div class="container">
        <a href="logout.php" class="logouting">LOG OUT</a>
        <p class="title_category"> SHOP STORES CATEGORIES</p>
        <div class="adding">
            <input type="text" name="" placeholder="SPORT WEAR" id="name">
            <button id="add" class="btn-add">ADD</button>
    </div>



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





<!-- home page style -->



<style>

body{
    background: linear-gradient(#141e30, #243b55);
}

.container a{
    color: white;
    text-decoration-line: none;
    cursor: pointer;
}

#name{
    padding: 2px 10px;
    border-radius: 30px;
    height: 35px;
    border: none;
    box-shadow: 0px 0px 20px 0px darkseagreen;    
}

.adding{
    width: 300px;
    border: 3px solid azure;
    padding: 12px;
    border-radius: 40px;
    box-shadow: 0px 0px 10px paleturquoise;
    text-align: center;
    margin: auto;
}

.adding input:focus{
    outline: none;
}

.title_category{
    color: white;
    text-align: center;
    font-size: 25px;
}

.btn-add{
    margin-left: 40px;
    padding: 4px 20px 4px 17px;
    border-radius: 20px;
    font-weight: 700;
    background-color: black;
    color: white;
    font-size: 15px;
    cursor: pointer;
}

.table{
    margin: auto;
    padding: 5px;
    border: 3px solid darkseagreen;
    color: white;
    width: 90%;
    border-collapse: collapse;
    position: relative;
    top: 45px;
}

.table td, .table th{
    padding: 15px;
    text-align: center;
    font-size: 20px;
    text-shadow: 0px 1px 6px cornflowerblue;
    font-weight: 600;
}

.table thead{
    background-color: teal;
    border: 3px solid white;
    position: relative;
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
</style>
