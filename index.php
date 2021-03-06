<?php  include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$contact = $n['contact'];
		}
	} 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Bicol Travel & Tours</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

	<form method="post" action="server.php" >

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<label>Contact</label>
			<input type="text" name="contact" value="">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #2E8B57;">Update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" style="background: #E4CD05;">Book now!</button>
			<?php endif ?>
		</div>
	</form>
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Contact</th>
			<th colspan="2">Update/Delete</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Remove</a>
			</td>
		</tr>
	<?php } ?>
</table>
</body>
</html>