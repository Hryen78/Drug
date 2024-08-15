<?php
// Add User
if (isset($_POST['add_user'])) {
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];
    $user_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
    $city = $_POST['city'];
    $user_type = $_POST['user_type'] ? $_POST['user_type'] : null;

    $sql = "INSERT INTO user (user_name, user_address, user_password, city, user_type) 
            VALUES ('$user_name', '$user_address', '$user_password', '$city', '$user_type')";
    if ($connection->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Delete User
if (isset($_GET['userid'])) {
    $user_id = $_GET['userid'];

    $sql = "DELETE FROM user WHERE user_id=$user_id";
    if ($connection->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Edit User
if (isset($_POST['edit_user'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];
    $city = $_POST['city'];
    $user_type = $_POST['user_type'] ? $_POST['user_type'] : null;

    $sql = "UPDATE user SET user_name='$user_name', user_address='$user_address', city='$city', user_type='$user_type' 
            WHERE user_id=$user_id";
    if ($connection->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Fetch users
$sql = "SELECT * FROM user";
$result = $connection->query($sql);
?>
