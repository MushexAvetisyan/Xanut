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
        $query = "INSERT INTO cart VALUES(null,'$user_id','$id','1')";
        mysqli_query($this->conn,$query);
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

}

$model = new Model;
?>