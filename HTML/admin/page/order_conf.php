<?php
// Delete Order
if (isset($_GET['orderid'])) {
    $order_id = $_GET['orderid'];

    $sql = "DELETE FROM `order` WHERE order_id=$order_id";
    if ($connection->query($sql) === TRUE) {
        echo "Order deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Edit Order
if (isset($_POST['edit_order'])) {
    $order_id = $_POST['order_id'];
    $user_id = $_POST['user_id'];
    $sum_price = $_POST['sum_price'];
    $order_date = $_POST['order_date'];
    $order_state = $_POST['order_state'];

    $sql = "UPDATE `order` SET user_id='$user_id', sum_price='$sum_price', order_date='$order_date', order_state='$order_state' 
            WHERE order_id=$order_id";
    if ($connection->query($sql) === TRUE) {
        echo "Order updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Fetch orders
$sql = "SELECT * FROM `order`";
$result = $connection->query($sql);
?>
