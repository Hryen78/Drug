<?php
    
    if(isset($_POST["registerbtn"]))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $city = $_POST['city'];

        require_once '../shop/xampp_connection.php';
        require_once '../class/customer.php';

        if(emptyInputSignup($username,$password,$address, $email , $city) !== false){
            header("location: http://localhost:8081/Drug/index.php?p=reg&error=emptyInput");
            exit();
        }
        if(invalidUid($username) !== false){
            header("location: http://localhost:8081/Drug/index.php?p=reg&error=invalidUid");
            exit();
        }
        if(invalidAddress($address) !== false){
            header("location: http://localhost:8081/Drug/index.php?p=reg&error=invalidAddress");
            exit();
        }
        if(uidExists($connection, $username) !== false){
            header("location: http://localhost:8081/Drug/index.php?p=reg&error=usernametaken");
            exit();
        }
        
        $customer = new customer(); 
        $cus= $customer->add($connection, $username, $email, $password, $address, $city);

    }else{
        header("location: http://localhost:8081/Drug/index.php?index.php?p=reg");
        exit();
    }
// Checking for empty input
function emptyInputSignup($username, $email, $password,$address,$city)
{
    $result = true ;
    if(empty($username) || empty($password) || empty($address) || empty($city)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
// Checking for wrong input
function invalidUid($username)
{
    $result = true;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
// Checking Address registeration 
function invalidAddress($address)
{
    $result = true;
    if(!preg_match("/^[0-9]+[a-zA-Z]*$/",$address))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($connection, $username){
    $sql = "SELECT * FROM user WHERE user_name = ? ";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: http://localhost:8081/Drug/index.php?p=reg&error=psfaild");
        exit();
    }
    // submit string "s" 
    // mysqli_stmt_bind_param to transfer $username
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result; 
    }
    mysqli_stmt_close($stmt);
}
?>