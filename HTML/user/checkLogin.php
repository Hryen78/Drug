<?php

if (isset($_POST['loginbtn'])) 
{
   
    $name = $_POST['username'];
    $password = $_POST['password'];

    require_once '../shop/xampp_connection.php';
    require_once '../class/customer.php';

    
    if(emptyInputLogin($name,$password) !== false){
        header("location: http://localhost:8081/Drug/index.php?p=log&error=emptyInput");
        exit();
    }
    $customer = new customer(); 
    $cus= $customer->getByID($connection, $name, $password);
     
}else if(isset($_POST['reg'])){
    header('location: http://localhost:8081/Drug/index.php?p=reg');
    exit();
}
else{
    header("location: http://localhost:8081/Drug/index.php?p=log");
    exit();
}

// Checking for empty input
function emptyInputLogin($name,$password)
{
    $result = true ;
    if(empty($name)|| empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
?>