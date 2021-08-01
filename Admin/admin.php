<?php 

session_start();

if($_SESSION['FName']==true){	
    $name1 = $_SESSION['FName'];
    $name2 = $_SESSION['LName'];
}	
else{
	header('location:../Home1.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<link rel = "stylesheet" type="text/css" href = "../Action/menu.css">
	</head>
<body>
	<div class="menudropdown">
		<ul>
			<li>Home</li>
			<li>User
				<ul>
					<li><a href="display_user.php">User Details</li>
					<li><a href="display_complaints.php">User Complaints</a></li>
					<li><a href="display_user_queries.php"> User Queries</a></li>
				</ul>
			</li>
			<li>Case Status
				<ul>
					<li><a href="admin_case_status.php">Add Status</a></li>
					<li><a href="display_case_status.php">Display Status</a></li>
				</ul>
			</li>
			<li>Judgement Report
				<ul>
					<li><a href="admin_judgement_report.php">Add Judgement</a></li>
					<li><a href="display_judgement.php">Display Judgement</a></li>
				</ul>
			</li>
			<li>Police Details
				<ul>
					<li><a href="admin_police_details.php">Add Police</a></li>
					<li><a href="display_police.php">Display Details</a></li>
				</ul>
			</li>
			<li>Wanted Criminals
				<ul>
					<li><a href="admin_wanted_criminals.php">Add criminal</a></li>
					<li><a href="display_criminals.php">Display Details</a></li>
				</ul>
			</li>
			<li>Account
					<ul>
                    <li><a href="../User/user_profile.php">Profile</a></li>				
                	<li><a href="../logout.php">Sign Out</a></li>
					</ul>
				</li>		
		</ul>
	</div>
	<div class="welcome-text">
		<h1>WELCOME &nbsp;admin&nbsp;<span> <?php echo $name1; ?> <?php echo $name2; ?> </span></h1>
	</div>
</body>
</html>