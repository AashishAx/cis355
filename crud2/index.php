<?php
	session_start();
	if(!isset($_SESSION['cust_id'])) {
		header("Location: login.php");
	}
	include '/home/gpcorser/public_html/database/header.php'; 
	include '/home/gpcorser/public_html/database/database.php';
?>

<!DOCTYPE html>
<html lang="en">

 
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
			    <p>
                    <a href="create.php" class="btn btn-primary">Create</a>
				 <a href="logout.php" class="btn btn-danger">Logout</a>

                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Mobile Number</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php				  
                   //include '../../database/database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customers2 ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['mobile'] . '</td>';
							echo '<td><a class="btn btn-info" href="read.php?id='.$row['id'].'">Read</a>';
							echo '&nbsp;&nbsp;&nbsp;';
							echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo '&nbsp;&nbsp;&nbsp;';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();

                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>