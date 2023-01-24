<?php
    	//check if the database file exists and create a new if not
    	if(!is_file('db/sneaker_haven.sqlite3')){
    		file_put_contents('db/sneaker_haven.sqlite3', null);
    	}
    	// connecting the database
    	$conn = new PDO('sqlite:db/sneaker_haven.sqlite3');
    	//Setting connection attributes
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>