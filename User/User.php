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
	<title>User</title>
	<link rel = "stylesheet" type="text/css" href = "../Action/menu.css">
</head>
	<body>
		<div class="menudropdown">
			<ul>
				<li>Home</a></li>

				<li>Complaint
					<ul>
						<li><a href="user_complaint.php">Report Crime</a></li>
						<li><a href="user_complaints.php">Crime Reports</a></li>
					</ul>
				</li>		

                <li>Case Status
					<ul>
                    <li><a href="user_case_status.php">Case Status</a></li>
					</ul>
				</li>	

                <li>Judgement Report
					<ul>
                    <li><a href="user_judgement.php">Judgement Report</a></li>
					</ul>
				</li>	

                <li>Police Details
					<ul>
                    <li><a href="user_police.php">Police Details</a></li>
					</ul>
				</li>	

                <li>Wanted Criminals
					<ul>
                    <li><a href="user_criminals.php">Wanted Criminals</a></li>
					</ul>
				</li>
				<li>Account
					<ul>
                    <li><a href="user_profile.php">Profile</a></li>				
                	<li><a href="../logout.php">Sign Out</a></li>
					</ul>
				</li>			
			</ul>
        <div class="welcome-text">
            <h1>WELCOME &nbsp;<span> <?php echo $name1; ?> <?php echo $name2; ?> </span> </h1>
        </div>
	
</body>
</html>