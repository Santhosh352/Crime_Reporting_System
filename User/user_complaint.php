<?php 
    session_start();
    if($_SESSION['Mail']==true){
    }
    else{    
      header('location:../Home1.php');
    }  
?>

<!DOCTYPE html>
<html > 
  <head>
    <title>complaints</title>
    <?php include "../Action/links.php" ?>
    <link rel = "stylesheet" type="text/css" href = "../Action/forms_style.css">
    <style>
      body{
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/IMG-20201219-WA0000.jpg");
        background-repeat:no-repeat;
        background-size:100% 100%;
      } 
    </style>
  </head>
<body>  
  <form class="modal-content" action="" method="POST">
    <div class="container">
      <h1>Register Complaint</h1>      
      <hr>      
      <label for="case type"><b>Case type</b></label>
      <input type="text" placeholder="Enter Case Type" name="CaseType" required>
    
      <label for="Date"><b>Date</b></label>
      <input type="Date" placeholder="Enter Date"  name="Date" required><br><br>
    
      <label for="time"><b>Time</b></label>
      <input type="time" placeholder="Enter Time"  name="Time" required><br><br>
    
      <label for="district"><b>District</b></label>
      <input type="text" placeholder="Enter District"  name="District" required><br>
    
      <label for="city"><b>City</b></label>
      <input type="text" placeholder="Enter City" name="city" required><br>
    
      <label for="city"><b>Area</b></label>
      <input type="text" placeholder="Enter Area" name="Area" required><br>

      <label for="pin code"><b>Pincode</b></label>
      <input type="tel" placeholder="Enter Pincode" name="Pincode" required><br><br>

      <label for="station"><b>Police Station</b></label>
      <input type="text" placeholder="Enter Station name" name="station" required><br>
    
      <label for="description"><b>Description</b></label><br>
      <textarea rows="3" cols="85" name="Description" placeholder="Enter Description"></textarea>
           
      <div class="clearfix">
        <a  href="User.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
        <button type="submit" class="signupbtn" name="Register">Submit</button>
      </div>
    </div>
  </form>
</body>
</html>



<?php

    include "../Action/connection.php";

    $email=$_SESSION['Mail'];
    $selectquery=" select * from user_register where Mail='$email' "; 
    $query = mysqli_query($conn, $selectquery);
    $row=mysqli_fetch_array( $query);
    $aadharno=$row['AadharNo'];

    if(isset($_POST['Register']))
    {  
        $CaseType = $_POST['CaseType'];
        $Date = $_POST['Date'];
        $Time = $_POST['Time']; 
        $District = $_POST['District']; 
        $city = $_POST['city']; 
        $Area = $_POST['Area']; 
        $Pincode = $_POST['Pincode'];
        $station = $_POST['station']; 
        $Description = $_POST['Description'];

        $insertquery=" insert into complaint(CaseType,Date,Time,District,city,Area,Pincode,Description, police_station_name, Aadhar_No) values('$CaseType','$Date','$Time','$District','$city','$Area','$Pincode','$Description','$station', '$aadharno') ";

        $res=mysqli_query($conn,$insertquery);

        if($res)
        {
            ?>
            <script>
                alert("Report Submitted Succefull");
            </script>
            <?php

             ?>
             <script>
                  location.replace("User.php");
             </script>        
             <?php
        }
        else
        {
            ?>
            <script>
                alert("Report Not Submitted");
            </script>
            <?php
        }

    }
  ?>










