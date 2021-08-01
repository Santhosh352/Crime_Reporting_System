<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>

  <title>Police details </title>
  <?php include "../Action/links.php"  ?>
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

  <form class="modal-content" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="post" enctype="multipart/form-data">
    <div class="container">

     <h1>Enter Police Details</h1>
      <hr>       
      <label for="Pid"><b>Police ID</b></label>
      <input type="text" placeholder="Enter Police ID" name="Pid" required>

      <label for="FName"><b>First Name</b></label>
      <input type="text" placeholder="Enter Police First Name" name="FName" required>

      <label for="LName"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Police Last Name" name="LName" >
	  
	    <label for="Mail"><b>Mail Id</b></label>
      <input type="text" placeholder="Enter Mail Id"  name="Mail" required>
	  
	    <label for="PhNo"><b>Phone Number</b></label>
      <input type="tel" placeholder="Enter Phone Number" pattern="[0-9]{10}" name="PhNo" required><br><br>	  
	  
	    <label for="Station_Name"><b>Station Name</b></label>
      <input type="text" placeholder="Enter name of the station"  name="Station_Name" required>
	  
	  
	    <label for="District"><b>District</b></label>
      <input type="text" placeholder="Enter the district of the police station" name="District" required>

	    <label for="city"><b>City</b></label>
      <input type="text" placeholder="Enter city of the station" name="city" required>
          
      <label for="Pincode"><b>Pincode</b></label>
      <input type="tel" placeholder="Enter Pincode" pattern="[0-9]{6}" name="Pincode" required> &nbsp
      
      <label for="photo"><b>Police Photo</b></label>
      <input type="file"  name="photo">
     
  
      <div class="clearfix">
      <a  href="admin.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
        <button type="submit" class="signupbtn" name="submit">Add</button>
      </div>
    </div>
  </form>

</body>
</html>

<?php

    include "../Action/connection.php";

    if(isset($_POST['submit']))  
    {  
        $Pid = $_POST['Pid'];
        $FName = $_POST['FName'];
        $LName = $_POST['LName']; 
        $Mail = $_POST['Mail']; 
        $PhNo = $_POST['PhNo']; 
        $Station_Name = $_POST['Station_Name']; 
        $District = $_POST['District'];
        $city = $_POST['city'];
        $Pincode = $_POST['Pincode']; 
        $image = $_FILES['photo'];

        $image_name = $image['name'];
        $image_path = $image['tmp_name'];
        $image_error = $image['error'];

        if($image_error==0)
        {
          $destination = '../upload/'.$image_name;
          move_uploaded_file($image_path, $destination);
          $insertquery=" insert into police values('$Pid','$FName','$LName','$Mail','$PhNo','$Station_Name','$District','$city','$Pincode','$destination') ";
          $res=mysqli_query($conn,$insertquery);

          if($res)
          {
              ?>
              <script>
                  alert("Details added ");
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

    }
?>

