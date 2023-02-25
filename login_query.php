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
    		$query = "SELECT COUNT(*) as count FROM `Prodajalec` WHERE `uporabnisko_ime` = :uporabnisko_ime AND `password` = :password";
    		$stmt = $conn->prepare($query);
    		$stmt->bindParam(':uporabnisko_ime', $username);
    		$stmt->bindParam(':password', $password);
    		$stmt->execute();
    		$row = $stmt->fetch();
    		$count = $row['count'];
    		if($count > 0){
				$name = $_POST['username'];
				$_SESSION['name']= $name;
				$_SESSION['loggedin'] = true;
				$_SESSION['seller'] = 2;
				$pdo = new PDO('sqlite:db/sneaker_haven.sqlite3');
				$stmtt = $pdo->query("SELECT * FROM `Prodajalec` WHERE `uporabnisko_ime` = '$username' AND `password` = '$password'");
				$user = $stmtt->fetchAll(PDO::FETCH_ASSOC);
				foreach($user as $roww => $user){
					$_SESSION['id'] = $user['prod_id'];
				}
    			header('location:index.php');
    		}else{

				$query1 = "SELECT COUNT(*) as count FROM `Stranke` WHERE `uporabnisko_ime` = :uporabnisko_ime AND `password` = :password";
				$stmt1 = $conn->prepare($query1);
				$stmt1->bindParam(':uporabnisko_ime', $username);
				$stmt1->bindParam(':password', $password);
				$stmt1->execute();
				$row1 = $stmt1->fetch();
				$count1 = $row1['count'];

				if ($count1 > 0) {
					$name = $_POST['username'];
					$_SESSION['name']= $name;
					$_SESSION['loggedin'] = true;
					$_SESSION['seller'] = 1;
					$pdo = new PDO('sqlite:db/sneaker_haven.sqlite3');
					$stmtt = $pdo->query("SELECT * FROM `Stranke` WHERE `uporabnisko_ime` = '$username' AND `password` = '$password'");
					$user = $stmtt->fetchAll(PDO::FETCH_ASSOC);
					foreach($user as $roww => $user){
						$_SESSION['id'] = $user['strank_id'];
					}
    				header('location:index.php');
				}else {
					$_SESSION['loggedin'] = false;
					$_SESSION['error'] = "Invalid username or password";
    				header('location:index.php');
				}
    		}
    	}
?>