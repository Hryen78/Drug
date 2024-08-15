<?php
// Include database connection file
include '../Drug/HTML/shop/xampp_connection.php';

// user login condition
if (!isset($_SESSION['user_id'])) {
    header('Location: http://localhost:8081/Drug/index.php?p=log');
    exit;
}

$user_id = $_SESSION['user_id'];

include '../Drug/HTML/cart/history_func.php';

$connection->close();
?>

<div class="container mt-5">
    <h2>Order History</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total Price</th>
                <th>Order Date</th>
                <th>Order State</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_history as $order): ?>
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo $order['user_id']; ?></td>
                    <td><?php echo number_format($order['sum_price'], 2); ?></td>
                    <td><?php echo $order['order_date']; ?></td>
                    <td><?php echo $order['order_state']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
