<?php
    	//starting the session
    	session_start();
    	//including the database connection
    	require_once 'connection.php';

    	if(ISSET($_POST['register'])){
    		// Setting variables
    		$username = $_POST['username'];
    		$password = md5($_POST['password']);
			$Rpassword = md5($_POST['Rpassword']);
    		$firstname = $_POST['firstname'];
    		$lastname = $_POST['lastname'];
			$email = $_POST['email'];

			if ($password == $Rpassword) {

					// Insertion Query
					$query = "INSERT INTO `Prodajalec` (ime, primek, password, uporabnisko_ime, email) VALUES(:ime, :primek, :password, :uporabnisko_ime, :email)";
					$stmt = $conn->prepare($query);
					$stmt->bindParam(':ime', $firstname);
					$stmt->bindParam(':primek', $lastname);
					$stmt->bindParam(':password', $password);
					$stmt->bindParam(':uporabnisko_ime', $username);
					$stmt->bindParam(':email', $email);

					// Insertion Query
					$query1 = "INSERT INTO `Stranke` (ime, primek, password, uporabnisko_Ime, email) VALUES(:ime, :primek, :password, :uporabnisko_ime, :email)";
					$stmt1 = $conn->prepare($query1);
					$stmt1->bindParam(':uporabnisko_ime', $username);
					$stmt1->bindParam(':password', $password);
					$stmt1->bindParam(':ime', $firstname);
					$stmt1->bindParam(':primek', $lastname);
					$stmt1->bindParam(':email', $email);

			}else {
				$_SESSION['error'] = "The passwords did not match";
    			header('location:../../?page=regr/index.php');
			}

			
			
    		// Check if the execution of query is success
    		if($stmt->execute() && $stmt1->execute()){
				$query3 = "SELECT * FROM 'Stranke' WHERE uporabnisko_Ime = '$username'";
				$linkAccountsC = $conn->query($query3);
				$linkProfilesC = $linkAccountsC->fetchAll(PDO::FETCH_ASSOC);
				foreach ($linkProfilesC as $rows => $linkProfilesC) {
					$linkingC = $linkProfilesC['strank_id'];
				}
				$query4 = "SELECT * FROM 'Prodajalec' WHERE uporabnisko_ime = '$username'";
				$linkAccountsS = $conn->query($query4);
				$linkProfilesS = $linkAccountsS->fetchAll(PDO::FETCH_ASSOC);
				foreach ($linkProfilesS as $rows => $linkProfilesS) {
					$linkingS = $linkProfilesS['prod_id'];
				}
				$querryLink = "INSERT INTO 'povezava_racunov' (strank_id, prod_id) VALUES(:linkingC, :linkingS)";
				$stmtLinking = $conn->prepare($querryLink);
				$stmtLinking->bindParam(':linkingC', $linkingC);
				$stmtLinking->bindParam(':linkingS', $linkingS);
				if($stmtLinking->execute()) {
					    			//setting a 'success' session to save our insertion success message.
									$_SESSION['success'] = "Successfully created an account";
									//redirecting to the index.php 
									header('location:../../?page=login/index.php');
				} 
    		}
			else{
				header('location:../../?page=register/index.php');
			}
    	}
?>