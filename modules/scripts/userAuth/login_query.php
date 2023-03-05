<?php
    	//starting the session
    	session_start();
    	//including the database connection
    	require_once 'connection.php';

    	if(ISSET($_POST['login'])){
    		// Setting variables
    		$username = $_POST['username'];
    		$password = md5($_POST['password']);
    		// Select Query for counting the row that has the same value of the given username and password. This query is for checking if the access is valid or not.
    		$query = "SELECT COUNT(*) as count FROM `Prodajalec` WHERE `uporabnisko_ime` = :uporabnisko_ime AND `password` = :password";
    		$stmt = $conn->prepare($query);
    		$stmt->bindParam(':uporabnisko_ime', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->execute();
    		$row = $stmt->fetch();
    		$count = $row['count'];
			if($count > 0){ 
				setcookie("user", $username, time() + 300, "/");
				setcookie("pass", $password, time() + 300, "/");
				header('location:../../../../index.php?page=login&log=profileSelection');
			}else {
				$_SESSION['loggedin'] = false;
				$_SESSION['error'] = "Invalid username or password!";
				header('location:../../../../?page=login/index.php');
			}
		}		
    	
?>