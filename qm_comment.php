<?php 
include '/home/gpcorser/public_html/database/header.php';
include '/home/gpcorser/public_html/database/database.php';
class QmComments { 
	
	function listTable() { 
	
		// beginning body section 
		echo '<body> <div class="container">';
		
		// title of page
		echo '<div class="row"><h3>Comments</h3></div>';
		
		// create button
		echo '<div class="row"><p><a href="qm_comments.php?oper=1&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '" class="btn btn-primary">Add Comment</a></p>';
		
		// beginning of table
		echo '<table class="table table-striped table-bordered" style="background-color: lightgrey !important"><thead>';
		echo '<tr><th>com id</th><th>per id</th><th>ques id</th><th>comment</th><th>rating</th><th>actions</th></tr></thead><tbody>';
		
		// populate table rows
		$pdo = Database::connect();
		$sql = 'SELECT * FROM qm_comments WHERE per_id=' . $_GET['per'] . ' AND ques_id=' . $_GET['ques'];
		foreach ($pdo->query($sql) as $row) {
			
			echo '<tr>';
			
			echo '<td>'. trim($row['id']) . '</td>'; 
			echo '<td>'. trim($row['per_id']) . '</td>'; 
			echo '<td>'. trim($row['ques_id']) . '</td>'; 
			echo '<td>'. trim($row['comment']) . '</td>';
			echo '<td>'. trim($row['rating']) . '</td>';
			
			// actions for each row
			echo '<td>';
			echo '<a class="btn btn-secondary" href="qm_comments.php?oper=2&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] .'">Read</a>';
			echo ' ';
			echo '<a class="btn btn-success" href="qm_comments.php?oper=3&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '&com=' . $row['id'] . '">Update</a>';
			echo ' ';
			echo '<a class="btn btn-danger" href="qm_comments.php?oper=4&per=' . $_GET['per'] . '&ques=' . $_GET['ques'] . '&com=' . $row['id'] . '">Delete</a>';
			echo ' ';
			echo '</td>';
			
			echo '</tr>';
		}
		Database::disconnect();
		
		// end body section of person list
		echo '</tbody></table></div></div></body>';
		
		
	}
	
	function createRow() {
	if ( !empty($_POST)) { 
		
			$commentError = null;
			$ratingError = null;
			
			$per = $_POST['per'];
			$ques = $_POST['ques'];
			$comment = $_POST['comment'];
			$rating = $_POST['rating'];
			
			// validate user input
			$valid = true;
			if (empty($comment)) {
				$commentError = 'Please enter comment';
				$valid = false;
			}
			if (empty($rating)) {
				$ratingError = 'Please enter rating';
				$valid = false;
			} 		
			
			if($valid){
				$pdo = Database::connect();
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO qm_comments (per_id, ques_id, comment, rating) values(?, ?, ?, ?)"; 
				$q = $pdo->prepare($sql);
				$q->execute(array($per, $ques, $comment, $rating));
				Database::disconnect();
				header('Location: qm_comments.php?oper=0&per=' . $per . '&ques=' . $ques);
			}
		}
		echo '<body style="background-color: lightblue !important">';
		echo '<div class="container"> <div class="span10 offset1">';
		echo '<div class="row"> <h3>New Comment</h3> </div><form class="form-horizontal" action="qm_comments.php?oper=1" method="post">';
		echo '<div class="control-group' . !empty($commentError)?'error':'' . '"><input type="hidden" name="per" value="' . $_GET['per'] . !empty($comment)?$comment:''  . '">';
		if (!empty($commentError))
			echo '<span class="help-inline">' . $commentError . '</span>';
		
		echo '<div class="control-group' . !empty($ratingError)?'error':'' . '"><input type="hidden" name="ques" value="' . $_GET['ques'] . !empty($rating)?$rating:'' . '">';
		if (!empty($ratingError))
			echo '<span class="help-inline">' . $ratingError . '</span>';
		echo '<div class="form-group"><label for="comment">Comment: </label><input class="form-control" name="comment" id="comment"></div>';
		echo '<div class="form-group"><label for="rating">Rating: </label><input type="numeric" class="form-control" name="rating" id="rating"></div>';
		echo '<button type="submit" class="btn btn-success">Yes</button><span>   </span>';
		echo '<a class="btn btn-danger" href="qm_comments.php?oper=0&per='. $_GET['per'] . '&ques=' . $_GET['ques'] . '">No</a>';
		echo '</form></div>';
	}

	}
	
	function readRow() {
		$id = $_GET['id'];
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM qm_comments where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
		echo '<body> <div class="container"> <div class="span10 offset1">';
		echo '<div class="row"> <h3>Comment Details</h3> </div><div class="form-horizontal" >';
		echo '<div class="form-group"><label for="id">ID: </label><input class="form-control" readonly value="' . $data['id'] . '"></div>';
		echo '<div class="form-group"><label for="per_id">Person ID:</label><input class="form-control" readonly value="' . $data['per_id'] . '"></div>';
		echo '<div class="form-group"><label for="ques_id">Question ID:</label><input class="form-control" readonly value="' . $data['ques_id'] . '"></div>';
		echo '<div class="form-group"><label for="comment">Comment:</label><input class="form-control" readonly value="' . $data['comment'] . '"></div>';
		echo '<div class="form-group"><label for="rating">Rating:</label><input class="form-control" readonly value="' . $data['rating'] . '"></div>';
		echo '<a class="btn btn-primary" href="qm_comments.php?oper=0&per=' . $data['per_id'] . '&ques=' . $data['ques_id'] . '">Go Back</a>';
	}
	
	function updateRow() {
		
		
	}
	
	function deleteRow() {
		
		
	}
	
	
}
if($_GET['oper']==0) {QmComments::listTable();}
if($_GET['oper']==1) {QmComments::createRow();}
if($_GET['oper']==2) {QmComments::readRow();}
// else {echo "error";}
?> 