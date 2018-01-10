<?php  
session_start();

unset($_SESSION["is_logged_in"]);
unset($_SESSION["pilgrim_id"]);
unset($_SESSION["gl_id"]);

$$_SESSION = array();

session_destroy();
header("location: login.php");
?>