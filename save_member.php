<?php
    	//starting the session
    	session_start();
    	//including the database connection
    	require_once 'connection.php';

    	if(ISSET($_POST['register'])){
    		// Setting variables
    		$username = $_POST['username'];
    		$password = $_POST['password'];
			$Rpassword = $_POST['Rpassword'];
    		$firstname = $_POST['firstname'];
    		$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$is_seller = $_POST['is_seller'];

			if ($password == $Rpassword) {
				if($is_seller == 1){
					// Insertion Query
					$query = "INSERT INTO `Prodajalec` (ime, primek, password, uporabnisko_ime, email) VALUES(:ime, :primek, :password, :uporabnisko_ime, :email)";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(':ime', $firstname);
					$stmt->bindParam(':primek', $lastname);
					$stmt->bindParam(':password', $password);
					$stmt->bindParam(':uporabnisko_ime', $username);
					$stmt->bindParam(':email', $email);
				}else {
					// Insertion Query
					$query = "INSERT INTO `Stranke` (ime, primek, password, uporabnisko_ime, email) VALUES(:ime, :primek, :password, :uporabnisko_ime, :email)";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(':uporabnisko_ime', $username);
					$stmt->bindParam(':password', $password);
					$stmt->bindParam(':ime', $firstname);
					$stmt->bindParam(':primek', $lastname);
					$stmt->bindParam(':email', $email);
				}
			}else {
				$_SESSION['error'] = "The passwords did not match";
    			header('location:register.php');
			}

			
			
    		// Check if the execution of query is success
    		if($stmt->execute()){
    			//setting a 'success' session to save our insertion success message.
    			$_SESSION['success'] = "Successfully created an account";
    			//redirecting to the index.php 
    			header('location:login.php');
    		}
			else{
				header('location:index.php');
			}
    	}
?>