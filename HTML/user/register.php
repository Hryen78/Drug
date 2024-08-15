<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div id="register">
    <div class="container">
        <div id="register-row" class="row justify-content-center align-items-center">
            <div id="register-column" class="col-md-6">
                <div id="register-box" class="col-md-12">
                    <form id="register-form" class="form" action="../Drug/HTML/user/save_register.php" method="post">
                        <h3 class="text-center text-info">Register</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address" class="text-info">Address:</label><br>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="city" class="text-info">City:</label><br>
                            <input type="text" name="city" id="city" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="registerbtn" class="btn btn-info btn-md" value="Register">
                        </div>
                    </form>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyInput") {
                            echo "<p>Some input are empty</p>";
                        } else if ($_GET["error"] == "invalidUid") {
                            echo "<p>Invalid registration</p>";
                        } else if ($_GET["error"] == "invalidAddress") {
                            echo "<p>Invalid address</p>";
                        } else if ($_GET["error"] == "usernametaken") {
                            echo "<p>Username existed, please choose a different one</p>";
                        } else if ($_GET["error"] == "psfaild") {
                            echo "<p>!404 ERROR!</p>";
                        } else if ($_GET["error"] == "none") {
                            echo "<p>Success</p>";
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>