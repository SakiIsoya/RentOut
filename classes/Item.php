<?php
require_once("Config.php");

class Item extends Config
{
    public function save($category, $item_name, $item_details, $item_price, $item_quantity, $item_included)
    {
        $sql = "INSERT INTO `items`(`category_id`, `item_name`, `item_details`, `item_price`, `item_quantity`, `item_included`) 
                VALUES('$category', '$item_name', '$item_details', '$item_price', '$item_quantity', '$item_included')";
        $result = $this->conn->query($sql);

        if($result === TRUE)
        {
            $_SESSION['message'] = "Item added successfully";

            header("Location: itemCategories.php?category_id=$category");
        }
        else{
            echo $this->conn->error;
        }
    }

    public function getItemsByCategory($category_id)
    {
        $sql = "SELECT * FROM items 
                INNER JOIN categories ON items.category_id=categories.category_id
                WHERE items.category_id = $category_id";
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

    public function getSingleItem($id)
    {
        $sql = "SELECT * FROM items 
                INNER JOIN categories ON items.category_id=categories.category_id
                WHERE items.item_id = $id";
        $result = $this->conn->query($sql);

        if($result->num_rows <= 0){
            return false;
        }
        elseif($this->conn->error){
            echo $this->conn->error;
        }
        else{
            return $result->fetch_assoc();
        }
    }
}