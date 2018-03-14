<?php
	function curl_get_contents($url){
		
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		
		$data=curl_exec($ch);
		curl_close($ch);
		return $data;
	
	}
	
	$apiCall = "https://api.svsu.edu/courses?courseNumber=355&prefix=cis";
    $json = curl_get_contents($apiCall);
	$obj = json_decode($json);
    echo $json;
	
	echo '<br><br><br>';
	
	json_decode($obj);
	var_dump($obj);
	
	echo '<br><br>';
	echo $obj->courses[0]->academicLevel;
	
	echo '<br><br>';
	
	foreach ($obj->courses as $row){
		
		echo '<table><tr>';
		echo '<td>' . $row->prefix . '</td>';
		echo '<td>' . $row->courseNumber . '</td></tr></table>';
	}
?>