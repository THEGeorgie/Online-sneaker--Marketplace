<?php
    	//starting the session
    	session_start();
    	//including the database connection
    	require_once 'connection.php';

    	if(ISSET($_POST['register'])){
    		// Setting variables
    		$username = $_POST['username'];
    		$password = $_POST['password'];
    		$firstname = $_POST['firstname'];
    		$lastname = $_POST['lastname'];
			$is_seller = $_POST['is_seller'];
    		// Insertion Query
    		$query = "INSERT INTO `member` (username, password, firstname, lastname, is_seller) VALUES(:username, :password, :firstname, :lastname, :is_seller)";
    		$stmt = $conn->prepare($query);
    		$stmt->bindParam(':username', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->bindParam(':firstname', $firstname);
    		$stmt->bindParam(':lastname', $lastname);
			$stmt->bindParam(':is_seller', $is_seller);
    		// Check if the execution of query is success
    		if($stmt->execute()){
    			//setting a 'success' session to save our insertion success message.
    			$_SESSION['success'] = "Successfully created an account";
    			//redirecting to the index.php 
    			header('location: main.php');
    		}
    	}
?>