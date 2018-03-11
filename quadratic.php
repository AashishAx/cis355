<html>
	<head>
		<title>Roots of the Equation</title>
	</head>
	
	<body>
		<?php
			$a = $_POST['a'];
			$b = $_POST['b'];
			$c = $_POST['c'];
			$x1 = ((-$b)+ sqrt(($b*$b)-(4*$a*$c)))/(2*$a);
			$x2 = ((-$b)- sqrt(($b*$b)-(4*$a*$c)))/(2*$a);
			echo "x1 = " . $x1;
			echo "<br />";
			echo "x2 = " . $x2;
		
		?>
	
	</body>
</html>