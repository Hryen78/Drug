<?php
// Add Doc Description
if (isset($_POST['add_doc'])) {
    $ddid = $_POST['ddid'];
    $productId = $_POST['productId'];

    $sql = "INSERT INTO doc (DDID, productId) VALUES ('$ddid', '$productId')";
    if ($connection->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Delete Doc Description
if (isset($_GET['docid'])) {
    $id = $_GET['docid'];

    $sql = "DELETE FROM doc WHERE DDID=$id";
    if ($connection->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Edit Doc Description
if (isset($_POST['edit_doc'])) {
    $id = $_POST['ddid'];
    $productId = $_POST['productId'];

    $sql = "UPDATE doc SET productId='$productId' WHERE DDID=$id";

    if ($connection->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Fetch doc descriptions
$sql = "SELECT doc.DDID, product.productName FROM doc JOIN product ON doc.productId = product.productId";
$result = $connection->query($sql);
?>
