<?php
// Add Category
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];

    $sql = "INSERT INTO category (CategoryName) VALUES ('$name')";
    if ($connection->query($sql) === TRUE) {
        echo "New category added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Delete Category
if (isset($_GET['cateid'])) {
    $id = $_GET['cateid'];

    $sql = "DELETE FROM category WHERE CategoryID=$id";
    if ($connection->query($sql) === TRUE) {
        echo "Category deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Edit Category
if (isset($_POST['edit_category'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "UPDATE category SET CategoryName='$name' WHERE CategoryID=$id";
    if ($connection->query($sql) === TRUE) {
        echo "Category updated! ";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Fetch categories
$sql = "SELECT * FROM category";
$result = $connection->query($sql);
?>