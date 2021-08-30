<?php
class model {
    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect('localhost', 'root', "", 'xanut');
    }
    public function __destruct(){
        mysqli_close ($this->conn);
    }
    public function add_user($login,$password,$email){
        $query = "INSERT INTO users VALUES(null,'$login','$password','$email')";
        mysqli_query($this->conn,$query);
    }
    public function check_user($login,$password){
        $query = "SELECT * FROM users WHERE login='$login' and password= '$password'";
        $res=mysqli_query($this->conn,$query);
        if(mysqli_num_rows($res)>0)
           return mysqli_fetch_assoc($res);
        else   return false;
    }
    public function check_email($email){
        $sql=mysqli_query($this->conn,"SELECT * FROM users where email='$email'");
        
        return mysqli_num_rows($sql)>0;
        
    }
    public function add_to_cart($id,$user_id){
        $query = "SELECT * FROM cart WHERE user_id  = $user_id and product_id = $id";
        $res = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($res) == 0){
            $query = "INSERT INTO cart VALUES(null,'$user_id','$id','1')";
            mysqli_query($this->conn,$query);
        }
        
    }

    public function get_selected_products($user_id){
        $query = "SELECT * FROM products JOIN cart ON product_id=products.id WHERE user_id='$user_id'";
        $res=mysqli_query($this->conn,$query);
        if (mysqli_num_rows ($res) > 0)
            return mysqli_fetch_all($res,MYSQLI_ASSOC);
        else return false;
    }
    public function update_cart($id,$count){
         $query = "UPDATE `cart` SET quantity = '$count' WHERE id = $id";
         mysqli_query($this->conn, $query);

    }
    public function delete_from_cart($id){
        $query = "DELETE FROM `cart` WHERE id = $id";
        $res=mysqli_query($this->conn,$query);
    }
    public function cart_is_empty($user_id){
        $query = "SELECT * FROM cart WHERE user_id = $user_id";
        $res=mysqli_query($this->conn,$query); 
        return mysqli_num_rows($res) == 0;
    }
    public function insert_order($user_id,$total){
     $query = "INSERT INTO orders (user_id, total) VALUES ('$user_id', $total)";   
     mysqli_query($this->conn,$query);
     $order_id = mysqli_insert_id($this->conn);
     $query = "SELECT * FROM cart WHERE user_id = $user_id";
     $res = mysqli_query($this->conn,$query);
     $result = mysqli_fetch_all($res, MYSQLI_ASSOC);

     foreach($result as $row){
         $query = "INSERT INTO order_items VALUES ($order_id, $row[product_id], $row[quantity])";
         mysqli_query($this->conn, $query);
     } 
    }

}

$model = new Model;
?>