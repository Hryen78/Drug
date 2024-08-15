<?php
// Add Product
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $img = $_FILES['img']['name'];
    $categoryID = $_POST['categoryID'];
    $price = $_POST['price'];
    $temperature = $_POST['temperature'];
    $quantity = $_POST['quantity'];

    // Upload image
    $target_dir = "../Drug/IMAGE/";
    $target_file = $target_dir . basename($img);
    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

    $sql = "INSERT INTO product (productName, productDesc, productImg, categoryID, productPrice, drug_temparture, quantity) 
            VALUES ('$name', '$desc', '$target_file', '$categoryID', '$price', '$temperature', '$quantity')";
    if ($connection->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Delete Product
if (isset($_GET['prodid'])) {
    $id = $_GET['prodid'];

    $sql = "DELETE FROM product WHERE productId=$id";
    if ($connection->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Edit Product
if (isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $img = $_FILES['img']['name'];
    $categoryID = $_POST['categoryID'];
    $price = $_POST['price'];
    $temperature = $_POST['temperature'];
    $quantity = $_POST['quantity'];

    if ($img) {
        // Upload new image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($img);
        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

        // Update with new image
        $sql = "UPDATE product SET productName='$name', productDesc='$desc', productImg='$target_file', categoryID='$categoryID', 
                productPrice='$price', drug_temparture='$temperature', quantity='$quantity' WHERE productId=$id";
    } else {
        // Update without changing the image
        $sql = "UPDATE product SET productName='$name', productDesc='$desc', categoryID='$categoryID', 
                productPrice='$price', drug_temparture='$temperature', quantity='$quantity' WHERE productId=$id";
    }

    if ($connection->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Fetch products
$sql = "SELECT * FROM product";
$result = $connection->query($sql);
?>
