<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
	$address = $_POST['address'];

	$conn = new mysqli('localhost','root','','bestbuy');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into registration(firstname,lastname,email,password,number,address)
			values(?,?,?,?,?,?)");
		$stmt->bind_param("ssssis",$firstname,$lastname,$email,$password,$number,$address);
		$stmt->execute();
		echo"registration successfull";
		$stmt->close();
		$conn->close();
	}

?>