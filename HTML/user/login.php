<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="../Drug/HTML/user/checkLogin.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">User Name:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="loginbtn" class="btn btn-info btn-md" value="Login">
                                <input type="submit" name="reg" class="btn btn-info btn-md" value="Register">
                                <a href="index.php?p=fg">Forget Password</a>
                            </div>
                        </form>
                        <?php
                            if(isset($_GET["error"])){
                                if($_GET["error"] == "emptyInput"){
                                    echo "<p>Some Input are missing</p>";
                                }
                                else if($_GET["error"] == "wrongloginid"){
                                    echo "<p>Couldn't find the account</p>";
                                }
                                else if($_GET["error"] == "invalidAddress"){
                                    echo "<p>Invalid Address</p>";
                                }
                                else if($_GET["error"] == "wrongloginpass"){
                                    echo "<p>Wrong Password</p>";
                                }
                                else if($_GET["error"] == "none"){
                                    echo "<p>Login Failed</p>";
                                }
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>