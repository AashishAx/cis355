<?php 

	// ----- PART ONE ----- 

	# initialize array 
	$s = "--------------------<br />"; 
	$a = array($s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s); 
	$n = count($a);
	// print_r($a); 

	echo "<pre>"; 
	$prstr = "*-------------------<br />"; 
	
	$currentx = 0; 
	$currenty = 0; 

	$direction = rand(0,1); 

	while ($currentx < 20 and $currenty < 20) { 
		if($direction) { // x was incremented 
			$prstr[++$currentx] = '*'; 
		} 
		else { // y was incremented 
			$a[$currenty++] = $prstr; 
			$prstr = "--------------------<br />"; 
			$prstr[$currentx] = "*"; 
		} 
		$direction = rand(0,1); 
	} 

	if($currentx == 20) { 
		for($i = $currenty; $i < 20; $i++) { 
			$prstr = "-------------------*<br />"; 
			$a[$currenty++] = $prstr; 
		} 
	} 
	else { 
		$lastx = $currentx; 
		for($i = $lastx; $i < 20; $i++) { 
			$prstr[$i] = '*'; 
		} 
		$a[$currenty++] = $prstr; 
	} 

	for($i=0; $i<20; $i++) echo $a[$n-$i]; 

	echo "</pre>"; 

// ----- PART TWO ----- 

// ----- PART THREE ----- 

$name = "george"; 
$b = array($name[0]=>$name.$name); 
print_r($b); 
echo "<br /><br /><br />"; 

echo "---------- END OF OUTPUT ----------"; 

echo "<br /><br /><br />"; 


?>