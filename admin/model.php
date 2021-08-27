<?php

class model{
	public $conn;

	public function __construct(){
		$this->conn = mysqli_connect('localhost', 'root', "", 'xanut');
}
	public function __destruct(){
		mysqli_close($this->conn);
		}


	public function check_admin($log,$pass){
		$query = "SELECT * FROM admin WHERE login = '$log' and password='$pass'";
		$result = mysqli_query($this->conn, $query);
		return mysqli_num_rows($result);
	}

	public function add_category($name){
		$query = "INSERT INTO  categories values(null, '$name')";
		mysqli_query($this->conn, $query);
	}

	public function get_categories(){
		$query = "SELECT * FROM categories";
		$result = mysqli_query($this->conn, $query);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
//        return mysqli_num_rows($result);
	}

	public function delete_category($id){
	    $query = "DELETE FROM categories where id = $id";
		mysqli_query($this->conn, $query);
		$query = "SELECT iamge FROM products where cat_id = $id";
		$result = mysqli_query($this->conn, $query);
		$images = mysqli_fetch_all($result, MYSQLI_NUM);
		foreach ($images as $img) {
			unlink("images/$img");
		}
		$query = "DELETE from products where cat_id = $id";
		mysqli_query($this->conn, $query);
    }

	public function update_category($id,$name){
        $query = "UPDATE `categories` SET name = '$name' WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
    }

	public function delete_fruit($id){
	    $query = "DELETE FROM products where id = $id";
        $result = mysqli_query($this->conn, $query);

    }

	public function update_product($id,$name,$price,$desc){
        $query = "UPDATE `products` SET name = '$name', price = '$price', description = '$desc' WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
    }

    public function add_product($name,$price,$description,$cat_id, $img_name){
	    $query = "INSERT INTO products value (null,'$name','$price','$description','$cat_id','$img_name')";
	    mysqli_query($this->conn,$query);
    }

    public function get_products($cat){
	    $query = "SELECT * FROM products WHERE cat_id = $cat";
        $result = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}


$model = new Model;


