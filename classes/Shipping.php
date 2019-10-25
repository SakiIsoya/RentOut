<?php

require_once("Config.php");

class Shipping extends Config
{
    public function shipDetails($shipping_id,$rental_id,$user_id,$fname,$lname,$phone,$email,
                                  $country,$address,$city,$postcode)
    {
     
        $sql = "INSERT INTO　shipping(shipping_id,rental_id,user_id,first_name,last_name,phone_number
                                      ,emial,country,address,city,postcode)
                VALUES('$shipping_id','$rental_id','$user_id','$fname','$lname','$phone','$email',
                       '$country','$address','$city','$postcode')";
        $result = $this->conn->query($sql);

        if($result === TRUE){
            header("Location:shipping.php");
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
            return "invalid EmailAddress or password";
        }
        else{
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];

            if($row['user_role']=== 'admin'){
                header("Location: admin/index.php");
            }
            elseif($row['user_role']=== 'user'){
                header("Location:categories.php ");
            }
        }
    } 
    public function logout()
        {
            session_destroy();
            header("Lpcation:categories.php");

        }
} 
            
            