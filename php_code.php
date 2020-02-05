<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$contact = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$contact = $_POST['contact'];

		mysqli_query($db, "INSERT INTO info (name, contact) VALUES ('$name', '$contact')"); 
		$_SESSION['message'] = "Book saved!"; 
		header('location: index.php');
	}

	//update
	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$contact = $_POST['contact'];

	mysqli_query($db, "UPDATE info SET name='$name', contact='$contact' WHERE id=$id");
	$_SESSION['message'] = "Booking updated!"; 
	header('location: index.php');
}
?>