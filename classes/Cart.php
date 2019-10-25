<?php

require_once("Config.php");

class Cart extends Config
{
    public function addToCart($item_id,$quantity,$user_id)
    {
     
        $sql = "SELECT * FROM items WHERE item_id=$item_id AND item_quantity <= $quantity";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $item_row = $result->fetch_assoc();
            $item_quantity = $item_row['item_quantity']-$quantity;
            $total_price = $quantity * $item_row['item_price'];

            #get cart details
            $sql2 = "SELECT * FROM carts WHERE user_id=$user_id AND cart_status='available'";
            $result2 = $this->conn->query($sql2);

            if($result2->num_rows > 0){
                $cart_row = $result->fetch_assoc();
                $cart_id = $cart_row['cart_id'];
            }else{
                $add_cart_sql = "INSERT INTO carts(user_id, cart_status)
                                 VALUES($user_id,'available')";
                $add_cart_result = $this->conn->query($add_cart_sql);
                //get the last inserted id in the database
                $cart_id = $this->conn->insert_id;
            }

            $sql = "INSERT INTO cart_items(cart_id,item_id,cart_item_quantity,cart_item_price)
                    VALUES($cart_id,$item_id,$quantity,$total_price)";
            $result = $this->conn->query($sql);
            
            if($result){
                $item_sql = "UPDATE items SET item_quantity = $item_quantity WHERE item_id=$item_id";
                $item_result = $this->conn->query($item_sql);
                if($item_result){
                    header("Location: cart.php");
                }
            }
        }
    }    
}