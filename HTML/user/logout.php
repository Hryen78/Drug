<?php
    session_start();
    session_unset();
    session_destroy();

    header("location: http://localhost:8081/Drug/index.php");
    exit();
?>