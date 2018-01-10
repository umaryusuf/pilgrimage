<?php  
$id = $_GET["id"];
$query = mysqli_query($dbc, "SELECT * FROM account_head WHERE h_id='$id'");
$data = mysqli_fetch_array($query);
$_name = $data["name"];
$_desc = $data["description"];
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<br>
		<?php  
		$error = false;
		$name_err = $desc_err = "";

		if (isset($_POST["update_account_head"])) {
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$name = trim($_POST["name"]);
			$desc = trim($_POST["desc"]);

			if (empty($name)) {
				$error = true;
				$name_err = "Name is empty";
			}

			if (empty($desc)) {
				$error = true;
				$desc_err = "Description is empty";
			}

			// if not error
			if (!$error) {
				$sql = "UPDATE account_head SET name='$name', description='$desc' WHERE h_id='$id'";

				if (mysqli_query($dbc, $sql)) {
					echo 
						"<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  Account head updated sucessfully. 
						</div>";
				}else{
					echo 
						"<div class='alert alert-danger'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  <strong>Oops: </strong> Error inserting data.
						</div>";
				}
			}

		}

		?>
		<div class="well">
			<form action="admin.php?action=edit_account_head&id=<?php echo $id ?>" method="POST">
				<fieldset>
					<legend>Edit account head form</legend>
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="name" value="<?php echo $_name ?>" required>
						<?php if (!empty($name_err)): ?>
							<span class="text-danger"><?php echo $name_err; ?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="desc">Description:</label>
						<input type="text" name="desc" id="desc" class="form-control" value="<?php echo $_desc; ?>" placeholder="description" required>
						<?php if (!empty($desc_err)): ?>
							<span class="text-danger"><?php echo $desc_err; ?></span>
						<?php endif ?>
					</div>
					<button type="submit" name="update_account_head" class="btn btn-primary btn-block">Update Account head</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>