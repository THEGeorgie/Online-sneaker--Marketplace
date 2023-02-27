<?php	
    	if(!is_file('db/sneaker_haven.sqlite3')){
    		file_put_contents('db/sneaker_haven.sqlite3', null);
    	}
    	$conn = new PDO('sqlite:db/sneaker_haven.sqlite3');
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>