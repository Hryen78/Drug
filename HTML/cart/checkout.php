<?php
include '../Drug/HTML/cart/cart_func.php';
include 'C:/xampp/htdocs/Drug/HTML/shop/xampp_connection.php';


// Don't forget to put condition here
$user_id = $_SESSION['user_id'];

// cart class
$cart = new cart();

// Fetch cart items
$cart_items = $cart->getCart($connection, $user_id);

// Calculate total
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['quantity'] * $item['productPrice'];
}

// Empty cart, display an error message
if (empty($cart_items)) {
    echo "<div class='alert alert-danger'>Your cart is empty. Please add items to your cart before checking out.</div>";
    header("location: http://localhost:8081/Drug/index.php?p=cart");
    exit();
}

// Insert order into the order table
$order_date = date("m-d-y");  // Today's date in mm-dd-yy format
$order_state = "Shipping";
$sql_order = "INSERT INTO `order` (user_id, sum_price, order_date, order_state) VALUES (?, ?, ?, ?)";
$stmt_order = mysqli_prepare($connection, $sql_order);
mysqli_stmt_bind_param($stmt_order, "idss", $user_id, $total, $order_date, $order_state);

if (mysqli_stmt_execute($stmt_order)) {
    // Get the order ID of the newly created order
    $order_id = mysqli_insert_id($connection);

    // Optionally: You can add the logic here to transfer cart items to an `order_items` table if needed
    // Clear the cart after successful order
    $sql_clear_cart = "DELETE FROM cart WHERE user_id = ?";
    $stmt_clear_cart = mysqli_prepare($connection, $sql_clear_cart);
    mysqli_stmt_bind_param($stmt_clear_cart, "i", $user_id);
    mysqli_stmt_execute($stmt_clear_cart);
    mysqli_stmt_close($stmt_clear_cart);

    // Display order summary
    echo "<div class='container mt-5'>";
    echo "<h2>Order Summary</h2>";
    echo "<p>Order ID: <strong>{$order_id}</strong></p>";
    echo "<p>Order Date: <strong>{$order_date}</strong></p>";
    echo "<p>Order State: <strong>{$order_state}</strong></p>";
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Product</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "<th>Subtotal</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    
    foreach ($cart_items as $item) {
        $subtotal = $item['quantity'] * $item['productPrice'];
        echo "<tr>";
        echo "<td>{$item['productName']}</td>";
        echo "<td>\$" . number_format($item['productPrice'], 2) . "</td>";
        echo "<td>{$item['quantity']}</td>";
        echo "<td>\$" . number_format($subtotal, 2) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "<tfoot>";
    echo "<tr>";
    echo "<td colspan='3' class='text-right'><strong>Total:</strong></td>";
    echo "<td>\$" . number_format($total, 2) . "</td>";
    echo "</tr>";
    echo "</tfoot>";
    echo "</table>";
    echo "<div class='text-right'>";
    echo "<a href='index.php?p=shop' class='btn btn-primary'>Continue Shopping</a>";
    echo "</div>";
    echo "</div>";
} else {
    echo "<div class='alert alert-danger'>There was an error placing your order. Please try again.</div>";
}

mysqli_stmt_close($stmt_order);
?>
