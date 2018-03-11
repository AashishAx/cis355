<?php
	$cars = array
	(
		array("Volvo",22,18),
		array("BMW",15,13),
		array("Saab",5,2),
		array("Land Rover",17,15),
		array("Mazda", 19, 62),
		array("Chevy", 20, 42)
		
	);
	
	echo $cars[0][0].'<br />';
	echo $cars[2][1];
	foreach ($cars as $car)
	{
		if($car[1]>$car[2])
			echo $car[0] . '<br />';
		
	}
?>