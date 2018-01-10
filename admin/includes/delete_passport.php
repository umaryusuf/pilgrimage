<?php

$id = $_GET["id"];

$sql = "DELETE FROM passport_info WHERE pilgrim_id='$id'";

if (mysqli_query($dbc, $sql)) {
	echo '<script>window.open("admin.php?action=manage_passports", "_self")</script>';
}else{
	echo 
		"<div class='alert alert-danger'>
		  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		  <strong></strong> Error deleting data
		</div>";
}

?>