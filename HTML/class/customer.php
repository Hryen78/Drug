<?php


class customer
{
    
    // getByID get user data from database to verify user
    public function getByID( $connection, $name, $password)
    {
        $sql = mysqli_query($connection, "SELECT * FROM user WHERE user_name = '$name' ");
        $row = mysqli_num_rows($sql);
        if ($row == 0) {
            header("location: http://localhost:8081/Drug/index.php?p=log&error=wrongloginid");
            exit();
        }

        $row = mysqli_fetch_array($sql);

        if ($password !== $row['user_password']) {
            header("location: http://localhost:8081/Drug/index.php?p=log&error=wrongloginpass");
            exit();
        } else if ($password === $row['user_password'] && $row['user_type'] == '') {
            session_start();
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_name"] = $row["user_name"];
            $_SESSION["user_type"] = $row["user_type"];
            header("location: http://localhost:8081/Drug/index.php");
            exit();
        } else if ($row["user_type"] == "admin"){
            session_start();
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_name"] = $row["user_name"];
            $_SESSION["user_type"] = $row["user_type"];
            header("location: http://localhost:8081/Drug/index.php?p=admin");
            exit();
        }
    }

    // add user into data base
    public function add($connection, $username, $email, $password, $address, $city)
    {
        $sql = "INSERT INTO user(user_name, user_email, user_address, user_password, city) VALUES(?,?,?,?,?) ;";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: .http://localhost:8081/Drug/index.php?p=reg?error=psfaild");
            exit();
        }
        // submit string type "ssss" 4 
        // mysqli_stmt_bind_param transfer $username
        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $address, $password, $city);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: http://localhost:8081/Drug/index.php?p=reg&error=none");
        exit();
    }
}

?>