<link rel="stylesheet" href="../Drug/CSS/product_detail.css">

<?php
// xampp database connection file
include('xampp_connection.php');

// Get "productID" from the URL
$productId = $_GET['product_id']; 

// Prepare the SQL statement
$sql = "SELECT * FROM product WHERE productId = ?";
$stmt = $connection->prepare($sql);

// Bind the product ID to the statement
$stmt->bind_param("i", $productId);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();
$itemVe = $result->fetch_assoc();

// Check if product exists
if (!$itemVe) {
    echo "Product not found.";
    exit;
}
?>

<div class="container my-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img src="<?php echo $itemVe['productImg']; ?>" class="product-img" alt="Product Image">
        </div>
        <!-- Product Details -->
        <div class="col-md-6">
            <h2><?php echo htmlspecialchars($itemVe['productName']); ?></h2>
            <div class="d-flex align-items-center">
                <span class="price-tag"><?php echo htmlspecialchars($itemVe['productPrice']); ?></span>
            </div>
            
            <!-- Description -->
            <div class="description">
                <h5>Description</h5>
                <p><?php echo htmlspecialchars($itemVe['productDesc']); ?></p>
            </div>
            <!-- Buy and Add to Cart Buttons -->
            <div class="btn-container d-flex align-items-center justify-content-between">
                <form method="post" action="cart_action.php">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($itemVe['productId']); ?>">
                    <input type="hidden" name="veAmount" value="1"/>
                    <button class="btn btn-danger text-uppercase" name="buy">Buy Now</button>
                    <button class="btn btn-primary text-uppercase" name="add">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

