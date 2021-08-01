
<?php session_start(); ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Wanted Criminals</title>
    <?php include "../Action/links.php" ?>
    <link rel = "stylesheet" type="text/css" href = "../Action/forms_style.css">
    <style>
      body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/IMG-20201219-WA0000.jpg");
        background-repeat:no-repeat;
        background-size:100% 100%;
      } 
    </style>    
    
  </head>
<body>
  <form class="modal-content" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>"  method="post" enctype="multipart/form-data">
    <div class="container">    
      <h1>Enter Criminal's Details</h1>
      <hr>
      <label for="Criminal_id"><b>Criminal ID</b></label>
      <input type="text" placeholder="Enter criminal ID" name="Criminal_id" required Minlength="5">

      <label for="Fname"><b>First Name</b></label>
      <input type="text" placeholder="Enter first name of the criminal" name="FName" required>        
          
      <label for="Lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter last name of the criminal" name="LName" >
        
      <label for="Age"><b>Age</b></label>
      <input type="tel" placeholder="Enter the age of the criminal" pattern="[0-9]{2}" name="Age" required><br><br>
                
      <label for="Religion"><b>Religion</b></label>
      <input type="text" placeholder="Enter religion of the criminal" name="Religion" required>

      <label for="Crimes"><b> Crimes performed</b></label>
      <input type="text" placeholder="Enter the crimes performed by the criminal" name="Crimes" required>
      
      <label for="photo"><b>Criminal Photo</b></label>
      <input type="file"  name="photo">      
      
      <div class="clearfix">
        <a  href="admin.php"><button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
        <button type="submit" class="signupbtn"name="submit">Add</button>
      </div>
    </div>
  </form>
</body>
</html>

<?php

    include "../Action/connection.php";

    if(isset($_POST['submit']))
    {  
        $Criminal_id = $_POST['Criminal_id'];
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $Age = $_POST['Age'];
        $Religion = $_POST['Religion'];
        $Crimes = $_POST['Crimes'];
        $image = $_FILES['photo'];

        $image_name = $image['name'];
        $image_path = $image['tmp_name'];
        $image_error = $image['error'];
        if($image_error==0)
        {
          $destination = '../upload/'.$image_name;
          move_uploaded_file($image_path, $destination);
          $insertquery=" insert into wanted_criminals values('$Criminal_id','$FName','$LName','$Age','$Religion','$Crimes', '$destination') ";
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


