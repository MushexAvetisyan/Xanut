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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body class="main">
    <div class="contain">
        <a href="index.php">
            <img src="images/logo.png" alt="">
        </a>
        <h1 class="tittle"> 
            <cite>A book is a device that can ignite the imagination. - Alan Bennett</cite>
        </h1>
    </div>
<table class="container">
    <tr>
        <th>CATEGORY</th>
        <th>SHOW</th>
    </tr>
<?php foreach($all as $val){
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