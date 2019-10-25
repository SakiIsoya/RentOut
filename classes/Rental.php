<?php
require_once('Config.php');

class Rental extends Config{

    public function addToRental($item_id, $user_id, $total_price, $days, $start_date, $end_date)
    {
        $sql = "SELECT * FROM items WHERE item_id=$item_id";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0){
            $item_row = $result->fetch_assoc();
            $item_quantity = $item_row['item_quantity'] - 1;
            #get rental details
            $sql2 ="SELECT * FROM rentals WHERE user_id=$user_id AND rental_status='available'";
            $result2 = $this->conn->query($sql2);

            if($result2->num_rows > 0){
                $rental_row = $result2->fetch_assoc();
                $rental_id = $rental_row['rental_id'];
            }else{
                $add_rental_sql = "INSERT INTO rentals(user_id, rental_status)
                                 VALUES($user_id, 'available')";
                $add_rental_result = $this->conn->query($add_rental_sql);
                //get the last inserted id in the database
                $rental_id = $this->conn->insert_id;                 
            }

            $sql = "INSERT INTO rental_items(item_id,rental_id,rental_item_price, rental_start_date, rental_end_date)
                    VALUES($item_id, $rental_id,$total_price, '$start_date', '$end_date')";
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
