<?php
	
		
			include '/home/gpcorser/public_html/database/database.php';

			$pdo = Database::connect();
			
			$sql = "SELECT id, fname, lname FROM qm_persons";
			//creating json array
			$json = array();
			foreach ($pdo->query($sql) as $row) { //run through database and populate json array
				$json[] = $row;
			}
			
			echo json_encode($json); //encode to json and print
			Database::disconnect();
			
			
	
?>
