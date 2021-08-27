<?php
include('header.php');
include('admin/model.php');

$all = $model->get_categories();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design/indexpage.css">
</head>
<body>


<h1 class="tittle">Our Shop Store</h1>
<table class="container">
    <tr>
        <th>CATEGORY</th>
        <th>SHOW</th>
    </tr>
<?php





foreach($all as $val){
    $id = $val['id'];
    $name = $val['name'];

    echo"<tr id='$id'>";
    echo "<td class='name'>$name</td> 
            
            <td><a href='products.php?cat=$id'> SHOW</a></td> 
        </tr>";
}

?>

</table>



</body>
</html>