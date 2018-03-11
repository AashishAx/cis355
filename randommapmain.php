<?php 

	// ----- PART ONE ----- 

	# initialize array 
	$s = "--------------------<br />"; 
	$a = array($s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s,$s); 
	$n = count($a);
	// print_r($a); 

	echo "<pre>"; 
	$prstr = "1------------------2<br />"; 

	$currentx = 19; 
	$currenty = 19; 

	$direction = rand(0,1); 

	while ($currentx > 0 and $currenty > 0) { 
		if($direction) { // x was incremented 
			$prstr[--$currentx] = '2'; 
			$prstr[$n-$currentx] = '1';
		} 
		else { // y was incremented 
			$a[$currenty--] = $prstr; 
			
			$prstr = "--------------------<br />"; 
			
			if($currentx == ($n-$currentx))
				$prstr[$currentx] = '3';
			else
			{
				$prstr[$currentx] = "2"; 
				$prstr[$n-$currentx] = '1';
			}
		} 
		$direction = rand(0,1); 
	} 

	if($currentx == 0) { 
		for($i = $currenty; $i > 0; $i--) { 
			$prstr = "2------------------1<br />"; 
			$a[$currenty--] = $prstr; 
		} 
	} 
	else { 
		$lastx = $currentx; 
		for($i = $lastx; $i > 0; $i--) { 
			if($currentx == ($n-$currentx))
				$prstr[$currentx] = '3';
			else
			{
				$prstr[$i] = '2'; 
				$prstr[$n-$i] = '1';
			}
		} 
		$a[$currenty--] = $prstr; 
	} 

	for($i=0; $i<20; $i++) echo $a[$i]; 

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