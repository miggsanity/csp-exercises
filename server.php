<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$contact = "";
	$id = 0;
	$update = false;

	//save button
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$contact = $_POST['contact'];

		mysqli_query($db, "INSERT INTO info (name, contact) VALUES ('$name', '$contact')"); 
		$_SESSION['message'] = "Book saved"; 
		header('location: index.php');
	}

	//update
	if (isset($_POST['update'])) {
	$name = mysql_real_escape_string($db, $_POST['name']);
	$contact = mysql_real_escape_string($db, $_POST['contact']);
	$id = mysql_real_escape_string($db, $_POST['id']);

	mysqli_query($db, "UPDATE info SET name='$name', contact='$contact' WHERE id=$id");
	$_SESSION['message'] = "Booking details updated!"; 
	header('location: index.php');
	}

	//delete
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Booking deleted!"; 
	header('location: index.php');
	}

	//retrieve
	//$results = mysql_query($db, "SELECT * FROM info");

?>