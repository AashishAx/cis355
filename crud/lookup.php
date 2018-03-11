<!DOCTYPE html>

<?php
     
    require 'database.php';
	echo "<form action='lookup.php' meathod='get'>";
	echo "<select>";
		$pdo = Database::connect();
		$sql = "SELECT * FROM customers";
		
		
			foreach ($pdo->query($sql) as $row) {
				if(!strcmp($row['name'],"CIS355"))
					echo "<option selected value='{$row['id']}'>{$row['name']}</option>";
				else
					echo "<option value='{$row['id']}'>{$row['name']}</option>";
			}
			
		
		Database::disconnect();
	
           echo "</select>";
           echo "<input type='submit' value='submit'>";
		   echo "</form>";
       
  
?>

