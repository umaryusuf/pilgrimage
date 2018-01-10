<?php

$id = $_GET["id"];

$sql = "DELETE FROM account_head WHERE h_id='$id'";

if (mysqli_query($dbc, $sql)) {
	echo '<script>window.open("admin.php?action=manage_account_head", "_self")</script>';
}else{
	echo 
		"<div class='alert alert-danger'>
		  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		  <strong></strong> Error deleting data. Back to <a href='admin.php?action=manage_account_head'>manage account head</a>
		</div>";
}

?>