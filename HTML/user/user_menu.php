<!-- bootstrap based mostly -->

<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->

<!-- don't forget to add user login validation here -->
<?php

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];
?>

<div class="container mt-5">
    <h2 class="mb-4">Your Account</h2>
    <div class="row">

        <!-- Block 1 - Check order and history -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Order History</h5>
                    <p class="card-text">View and manage your orders.</p>
                    <a href='index.php?p=his' class="btn btn-primary">Go to Order History</a>
                </div>
            </div>
        </div>

        <!-- Block 2 - Edit user profile -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login & Security</h5>
                    <p class="card-text">Update your login information and security settings.</p>
                    <a href="index.php?p=loginfo" class="btn btn-primary">Go to Login & Security</a>
                </div>
            </div>
        </div>

        <!-- Block 3 - Name explain it all, let Syed deal with this -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer Service</h5>
                    <p class="card-text">Get help with your orders and account.</p>
                    <a href="index.php?p=contact" class="btn btn-primary">Go to Customer Service</a>
                </div>
            </div>
        </div>

        <!-- Block 4 - Check doctor description, Gia will deal with this -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Doctor Description</h5>
                    <p class="card-text">Manage your doctor description and preferences.</p>
                    <a href="index.php?p=doc" class="btn btn-primary">Go to Doctor Description</a>
                </div>
            </div>
        </div>
        <?php 
        if($user_type == "admin"){
        ?>
        <!-- Block 5 - Check Admin permission, Gia will deal with this -->
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admin Management</h5>
                    <p class="card-text">Management System for Admin</p>
                    <a href="index.php?p=admin" class="btn btn-primary">Go to Admin Management</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
</div>

<!--

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

-->