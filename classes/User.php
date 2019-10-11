<?php
require_once("Config.php");

class User extends Config{
    public function register($fname,$lname,$email,$address,$card,$password)
{
    $hash_password = md5($password);
    $sql = "INSERT INTO users(user_fname,user_lname,user_email,user_address,user_card_no,user_password)
            VALUE('$fname','$lname','$email','$address','$card','$password')";
    $result = $this->conn->query($sql);
    
    if($result === TRUE){
       header("Location:register.php");
    }
    else{
         echo $this->conn->error;
    }   
}
public function login($email,$password)  
{
    $hash_password = md5($password);
    $sql = "SELECT * FROM users
    WHERE user_email ='$email'
    AND user_password = '$hash_password'";
    $result = $this->conn->query($sql);

    if($result->num_rows <= 0)
    {
        return "Invalid Username or password";
    }
    else{
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
    
        if($row['user_role'] === 'admin'){
        header("Location: admin/index.php");
        }
        elseif($row['user_role'] === 'user'){
            header("Location:pages/index.php");
        }
    }
}
public function logout()
   {
        session_destroy();
        header("Location: login.php");
   }
}
