<?php 
$order_history = [];

// Query to get order history
$sql = "SELECT order_id, user_id, sum_price, order_date, order_state 
        FROM `order` 
        WHERE user_id = '$user_id'
        ORDER BY order_date DESC";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $order_history[] = $row;
    }
} else {
    // If no data is available, set a default message
    $order_history[] = ['order_id' => 'No Data', 'user_id' => 'N/A', 'sum_price' => 0, 'order_date' => 'N/A', 'order_state' => 'N/A'];
}

?>