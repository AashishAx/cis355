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
	
	$apiCall = "http://csis.svsu.edu/~ashrest8/cis355/api2.php";
    $json = curl_get_contents($apiCall);
	$obj = json_decode($json);
	//echo $json;
	
    //json_decode($obj);
	//var_dump($obj);
	
	
	include '/home/gpcorser/public_html/database/header.php';
?>


<!DOCTYPE html>
<html lang="en">

 
<body>
	<div class="container">
		<div class="row"><h3>JSON API</h3></div>
		
		<div class="row">
			<p><a href="http://csis.svsu.edu/~ashrest8/cis355/api2.php" class="btn btn-primary" target="_blank">API2 JSON</a></p>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
                    </tr>
				</thead>
				
                <tbody>
					<?php
						foreach ($obj as $row){
			
							echo '<tr>';
							echo '<td>' . $row->id . '</td>';
							echo '<td>' . $row->fname . '</td>';
							echo '<td>' . $row->lname . '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
		
	</div>
</body>
