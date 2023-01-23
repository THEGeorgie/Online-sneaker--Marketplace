<?php
    	//starting the session
    	session_start();
    	//including the database connection
    	require_once 'connection.php';

    	if(ISSET($_POST['login'])){
    		// Setting variables
    		$username = $_POST['username'];
    		$password = $_POST['password'];
    		// Select Query for counting the row that has the same value of the given username and password. This query is for checking if the access is valid or not.
    		$query = "SELECT COUNT(*) as count FROM `member` WHERE `username` = :username AND `password` = :password";
			$query1 = "SELECT is_seller FROM 'member' WHERE `username` = :username1 AND `password` = :password1";
    		$stmt = $conn->prepare($query);
			$stmt1 = $conn->prepare($query1);
    		$stmt->bindParam(':username', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->execute();
			$stmt1->execute([
				':username1' => $username,
				':password1' => $password,
			]);
    		$row = $stmt->fetch();
    		$count = $row['count'];
			while (($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) !== false) {
				$_SESSION['is_seller'] = $row1['is_seller'];
			}
    		if($count > 0){
						$name = $_POST['username'];
						$_SESSION['name']= $name;
    			header('location:home.php');
    		}else{
    			$_SESSION['error'] = "Invalid username or password";
    			header('location:login.php');
    		}
    	}
?>