<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$db = 'test';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 

if (!empty($_POST)) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	mysqli_query($conn, "insert into feedback (name, email, comment) values ('$name', '$email', '$comment')"); 
	$data = "SELECT * FROM feedback  ORDER BY insert_datetime";
	$result = $conn->query($data);
	
}




?>