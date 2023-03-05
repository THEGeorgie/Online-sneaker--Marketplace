<?php	
    	if(!is_file('../../../modules/scripts/db/sneaker_haven.sqlite3')){
    		file_put_contents('../../../modules/scripts/db/sneaker_haven.sqlite3', null);
    	}
    	$conn = new PDO('sqlite:../../../modules/scripts/db/sneaker_haven.sqlite3');
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>