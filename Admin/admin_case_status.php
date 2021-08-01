<?php 

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Case Status</title>
  <?php include "../Action/links.php" ?>
  <link rel = "stylesheet" type="text/css" href = "../Action/forms_style.css">
  <style>
    body
    {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/IMG-20201219-WA0000.jpg");
      background-repeat:no-repeat;
      background-size:100% 100%;
    } 
  </style>    

</head>

<body>

  <form class="modal-content" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>"  method="post">
    <div class="container">     


     <h1>Enter Case Status Details</h1>
      <hr>
 
      <label for="FIR_no"><b>FIR Number</b></label>
      <input type="tel" placeholder="Enter FIR number" pattern="[0-9]{10}" name="FIRNo" required><br>

      <label for="CaseId"><b>Case Id</b></label>
      <input type="text" placeholder="Enter Case Id" name="CaseId" required><br>	  

      <label for="Ctype"><b>Case Type</b></label>
      <input type="text" placeholder="Enter  type of crime" name="Ctype" required><br>
	  
	   <label for="Cdate"><b>Case date</b></label>
      <input type="date" placeholder="Enter date of the case registered" pattern="DD/MM/YYYY" name="Cdate" required><br>
      
      <label for="AadharNo"><b>Aadhar Number</b></label>
      <input type="text" placeholder="Enter Aadhar Number of user who Register the case" name="AadharNo" required><br>
	  
	  <label for="Pid"><b>Police Id</b></label>
      <input type="text" placeholder="Enter Police ID who is handling the case" name="Pid" required><br>

      <label for="Status"><b>Status</b></label>
      <input type="text" placeholder="Enter the Current status of the case" name="Status" required><br>

      
      <div class="clearfix">
      <a  href="admin.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
        <button type="submit" class="signupbtn" name="submit">Submit</button>
      </div>
    </div>
  </form>

</body>
</html>


<?php

    include "../Action/connection.php";

    if(isset($_POST['submit']))
    {  
        $FIRno = $_POST['FIRNo'];
        $CaseId = $_POST['CaseId'];
        $CaseType = $_POST['Ctype'];
        $Date = $_POST['Cdate'];
        $Aadharno = $_POST['AadharNo'];
        $PId = $_POST['Pid'];
        $status = $_POST['Status'];

        $insertquery=" insert into case_status(fir_no,case_id,case_type,date,aadhar_no,police_id,status) values('$FIRno','$CaseId','$CaseType','$Date','$Aadharno','$PId',' $status') ";

        $res=mysqli_query($conn,$insertquery);

        if($res)
        {
            ?>
            <script>
                alert("Status Added");
            </script>
            <?php

            ?>
            <script>
              location.replace("admin.php");
            </script>        
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Error");
            </script>
            <?php
        }

    }

?>
