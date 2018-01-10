<?php  
session_start();

unset($_SESSION["is_logged_in"]);

$$_SESSION = array();

session_destroy();
header("location: index.php");
?>