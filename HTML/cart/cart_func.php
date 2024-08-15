<?php

require_once '../Drug/HTML/shop/xampp_connection.php';

class cart
{
    public function getCart($connection, $user_id)
    {
        $sql = "SELECT c.cart_id, c.product_id, c.quantity, p.productName, p.productPrice, p.productImg 
        FROM cart c 
        JOIN product p ON c.product_id = p.productId 
        WHERE c.user_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        
        $total = 0;
        $cart_items = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $cart_items[] = $row;
            $total += $row['quantity'] * $row['productPrice'];
        }
        mysqli_stmt_close($stmt);

        return $cart_items;
    }

    public function removeCart($connection, $product_id, $user_id){
        $sql = "DELETE FROM cart WHERE product_id = ? AND user_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $product_id, $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: http://localhost:8081/Drug/index.php?p=cart");
        exit();
    }

}


?>