<?php
// Include database connection file
include '../Drug/HTML/shop/xampp_connection.php';

$message = '';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

if (isset($_POST['submit'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {

        // Update the user's password in the database
        $sql = "UPDATE user SET user_password='$new_password' WHERE user_email='$email'";
        if ($connection->query($sql) === TRUE) {
            $message = "Password successfully updated!";
        } else {
            $message = "Error updating password: " . $connection->error;
        }
    } else {
        $message = "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Reset Password</h2>
        <?php if ($message): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>
        <form action="index.php?p=rs&email=<?php echo urlencode($email); ?>" method="POST">
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
</body>
</html>

<?php
$connection->close();
?>
