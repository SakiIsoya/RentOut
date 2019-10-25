<?php
require_once("Config.php");

class Item extends Config
{
    public function save($category, $item_name, $item_details, $item_price, $item_quantity, $item_included,$directory,$filename,$tmp_name)
    {
        $sql = "INSERT INTO items(category_id, item_name, item_details, item_price, item_quantity, item_included,item_picture) 
                VALUES($category, '$item_name', '$item_details', '$item_price', '$item_quantity', '$item_included','$filename')";
        $result = $this->conn->query($sql);

        if($result === TRUE)
        {
            if(move_uploaded_file($tmp_name,"../$directory" . basename($filename))){
            $_SESSION['message'] = "Item added successfully";
            #last inserted id in the database
            $item_id = $this->conn->insert_id;
            header("Location: single-item.php?item_id=$item_id");
        }
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
public function updateItem($item_id,$item_name)    
{
    $sql = "UPDATE items SET item_name='$item_name'
    WHERE item_id=$item_id";
    $result = $this->conn->query($sql);

    if($this->conn->error){
        echo $this->conn->error;
    }
    else{
        $_SESSION['message']="item updated successfully.";
        header("Location:Item.php");
    }
}
public function deleteItem($id)
{
    $sql = "DELETE FROM category WHERE item_id=$id";
    $result = $this->conn->query($sql);

    if($this->conn->error){
        echo $this->conn->error;
    }
}
}