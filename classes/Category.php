<?php
require_once("Config.php");
class Category extends Config{

    public function save($category_name)
{
$sql = "INSERT INTO categories(category_name)
        VALUES('$category_name')";
        $result = $this->conn->query($sql);

        if($result === TRUE)
        {
            $_SESSION['message'] = "category added successfully";

            header("Location: categories.php");
        }
        else{
            echo $this->conn->error;
        }
}
public function getCategories()
{
    $sql = "SELECT * FROM categories";
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
public function getSingleCategory($id)
{
    $sql = "SELECT * FROM categories WHERE category_id = $id";
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

public function updateCategory($category_id,$category_name)
{
    $sql = "UPDATE categories SET category_name='$category_name'
    WHERE category_id=$category_id";
    $result = $this->conn->query($sql);

    if($this->conn->error){
        echo $this->conn->error;
    }
    else{
        $_SESSION['message']="category updated successfully.";
        header("Location:category.php");
    }
}
public function deleteCategory($id)
{
    $sql = "DELETE FROM category WHERE category_id=$id";
    $result = $this->conn->query($sql);

    if($this->conn->error){
        echo $this->conn->error;
    }
}
}
