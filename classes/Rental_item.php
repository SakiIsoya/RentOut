<?php
require_once('Config.php');

class Rental_Item extends Config{

    public function addToRentalItem($rental_item_id, $rental_id, $rental_item_price)
    {
        $sql = "SELECT * FROM rental_items WHERE rental_item_id=$rental_item_id";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $rental_item_row = $result->fetch_assoc();
            $rental_item_quantity = $rental_item_row['rental_item_quantity'] - 1;
            #get rental details
            $sql2 ="SELECT * FROM rentals WHERE user_id=$user_id AND rental_status='available'";
            $result2 = $this->conn->query($sql2);

            if($result2->num_rows > 0){
                $rental_row = $result->fetch_assoc();
                $rental_id = $rental_row['rental_id'];
                          
            }

            $sql = "INSERT INTO rental_items(item_id,rental_id,rental_item_price)
                    VALUES($item_id, $rental_id,$total_price)";
            $result = $this->conn->query($sql) ;
            
            if($result){
                $item_sql = "UPDATE items SET item_quantity = $item_quantity WHERE item_id=$item_id";
                $item_result = $this->conn->query($item_sql);
                if($item_result){
                    header("Location:cart.php");
                }
            }
        }
    }

    public function getRentalItems($user_id)
    {
        $sql = "SELECT * FROM rental_items
                INNER JOIN rentals ON rentals.rental_id=rental_items.rental_id
                INNER JOIN items ON items.item_id=rental_items.item_id
                WHERE rentals.user_id = $user_id AND rentals.rental_status='available'";
        $result = $this->conn->query($sql);
        
        if($result->num_rows <= 0){
            return false;
        }else{
            $rows = array();

            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
               
    }
}