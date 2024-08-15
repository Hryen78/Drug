<?php
require_once '../Drug/HTML/shop/xampp_connection.php';
require_once '../Drug/HTML/class/product.php';
require_once '../Drug/HTML/cart/cart_func.php';

// user login condition
if (!isset($_SESSION['user_id'])) {
    header('Location: http://localhost:8081/Drug/index.php?p=log');
    exit;
}

$user_id = $_SESSION['user_id'];

// Initialize the cart class
$cart = new cart();

// Check if a product removal request has been made
if (isset($_GET['remove']) && isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $cart->removeCart($connection, $product_id, $user_id);
}

// Fetch cart items
$cart_items = $cart->getCart($connection, $user_id);

// Calculate total
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['quantity'] * $item['productPrice'];
}
?>


<div class="container mt-5">
    <h1>Your Shopping Cart</h1>
    <?php if (empty($cart_items)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td>
                            <img src="<?php echo $item['productImg']; ?>" alt="<?php echo $item['productName']; ?>" style="width: 50px; height: 50px;">
                            <?php echo $item['productName']; ?>
                        </td>
                        <td>$<?php echo number_format($item['productPrice'], 2); ?></td>
                        <td>
                            <input type="number" class="form-control quantity-input" data-cart-id="<?php echo $item['cart_id']; ?>" value="<?php echo $item['quantity']; ?>" min="1" style="width: 70px;">
                        </td>
                        <td>$<?php echo number_format($item['quantity'] * $item['productPrice'], 2); ?></td>
                        <td>
                            <a href="index.php?p=cart&remove=1&product_id=<?php echo $item['product_id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                    <td>$<?php echo number_format($total, 2); ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <div class="text-right">
            <a href="index.php?p=checkout" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>
