<?php 

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Judgement Report</title>
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

  <form class="modal-content" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="post">
    <div class="container">
     


     <h1>Judgement Report</h1>
      <p>Enter the judgement details</p>
      <hr>
 
      <label for="JRno"><b>Judgement Report number</b></label>
      <input type="tel" placeholder="Enter the judgement report number" name="JRno" required><br><br>
    
      <label for="FIRNo"><b>FIR Number</b></label>
      <input type="text" placeholder="Enter  FIR Number " name="FIRNo" required>

      <label for="CaseType"><b>Case Type</b></label>
      <input type="text" placeholder="Enter  type of crime" name="CaseType" required>

        <label for="CourtType"><b>Court Type</b></label>
      <input type="text" placeholder="Enter  type of court in which the final judgement of the case is done" name="CourtType" required>
	  
	  <label for="Jdate"><b>Judgement date</b></label>
      <input type="date" placeholder="Enter date of the case registered" pattern="DD/MM/YYYY" name="Jdate" required><br><br>
      
       
      <label for="Judgement"><b>Jugement</b></label>
      <input type="text" placeholder="Enter the final judement given by the court" name="Jugement" required>    
      

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
        $jrno = $_POST['JRno']; 
        $FIRno = $_POST['FIRNo'];
        $CaseType = $_POST['CaseType'];
        $CourtType = $_POST['CourtType'];
        $Date = $_POST['Jdate'];
        $judgement = $_POST['Jugement'];

        $insertquery=" insert into judgement_report(jr_no,fir_no,case_type,court_type,judgement_date,judgement) values('$jrno','$FIRno','$CaseType', '$CourtType','$Date', '$judgement') ";

        $res=mysqli_query($conn,$insertquery);

        if($res)
        {
            ?>
            <script>
                alert("Judgement Report Successfully Added");
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