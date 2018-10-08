<?php
require_once('database.php');
$res = $database->read();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in PHP & MySQL - Read</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>E-Mail</th>
				<th>Gender</th>
				<th>Age</th>
				<th>Extras</th>
			</tr>
			<?php 
			while($r = mysqli_fetch_assoc($res)){
			?>
			<tr>
				<td><?php echo $r['id']; ?></td>
				<td><?php echo $r['first_name'] . " " . $r['last_name']; ?></td>
				<td><?php echo $r['email_id']; ?></td>
				<td><?php echo $r['gender']; ?></td>
				<td><?php echo $r['age']; ?></td>
				<td><a href="index.php">Create</a> <a href="update.php?id=<?php echo $r['id']; ?>">Edit</a> <a href="delete.php?id=<?php echo $r['id']; ?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>