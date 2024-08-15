<?php

include 'C:\xampp\htdocs\Drug\HTML\shop\xampp_connection.php';
$message = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Check if email exists in the user table
    $sql = "SELECT * FROM user WHERE user_email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // I'll murder you Kevin
        // Redirect to the reset password page with the email as a GET parameter
        header("location: http://localhost:8081/Drug/index.php?p=rs&email=" . urlencode($email));
        exit();
    } else {
        $message = "Email do not match.";
    }
}
?>

<div class="container mt-5">
    <h2>Forget Password</h2>
    <?php if ($message): ?>
        <div class="alert alert-danger"><?php echo $message; ?></div>
    <?php endif; ?>
    <form action="index.php?p=fg" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<?php
$connection->close();
?>
