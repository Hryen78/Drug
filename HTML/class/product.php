<?php

class product
{

    public function gettAll($connection)
    {

        $sql = "SELECT * FROM product";
        $result = mysqli_query($connection, $sql);
        $product = array();
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $product[] = $rows;
            }
            return $product;
        } else {
            echo "Sorry, We currently don't have any product available! :(";
        }
    }

    public function getListByCateIds($connection)
    {
        if (isset($_GET['cate'])) {
            $mark = [];
            $mark = $_GET['cate'];
            foreach ($mark as $markVe) {
                $sql = "SELECT * FROM product WHERE categoryID IN ($markVe)";
                $result = mysqli_query($connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $itemVe) :
                        include '../Drug/HTML/shop/product_card.php';
                    endforeach;
                }
            }
        }
    }

    public function getById($connection, $productId)
    {
        $sql = "SELECT * FROM product WHERE productId = ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "i", $productId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            return $row;
        }
        return null;
    }
    // Search engine
    public function searchProducts($connection, $search_query) {
        $search_query = "%" . $search_query . "%";
        $sql = "SELECT * FROM product WHERE productName LIKE ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt,"s", $search_query); // 's' for string
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $products[] = $row;
        }
        $stmt->close();
        return $products;
    }
    
    // Remember to update this so it can be more organize 
    // Alway put this at the end
    public function addProducts($connection) {
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'];
        $quantity = (int)$_POST['veAmount'];
    
        // Use ON DUPLICATE KEY UPDATE to insert or update the quantity
        $sql = "INSERT INTO cart ( user_id, product_id, quantity) 
                VALUES ( ?, ?, ?) 
                ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "iii", $user_id, $product_id, $quantity);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='alert alert-success'>Product added to cart successfully!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error adding product to cart: " . mysqli_error($connection) . "</div>";
        }
        mysqli_stmt_close($stmt);
    }
    

    public function buyProducts($connection) {

    }


}
    
?>