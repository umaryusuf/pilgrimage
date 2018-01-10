<?php

$id = $_GET["id"];

$sql = "DELETE FROM group_leader WHERE gl_slno='$id'";

if (mysqli_query($dbc, $sql)) {
	echo '<script>window.open("admin.php?action=manage_g_leader", "_self")</script>';
}else{
	echo 
		"<div class='alert alert-danger'>
		  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		  <strong></strong> Error deleting data
		</div>";
}

?>