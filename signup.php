
<?php 

session_start();

?>

<!DOCTYPE html>

<html>
    <head>
        <title>signup</title>
        <?php include "Action/links.php" ?>
        <link rel = "stylesheet" type="text/css" href = "Action/forms_style.css">
    </head>
    <style>
        body{
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("images/IMG-20201219-WA0000.jpg");
            background-repeat:no-repeat;
            background-size:100% 100%;
        } 
    </style>
<body>

    <form class="modal-content"  action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
        <div class="container">
            <h1>Registration</h1>
            <p>Please fill in this form to SignUp.</p>
            <hr>
            <label for="FName"><b>First Name</b></label>
            <input type="text" placeholder="Enter Your First Name" name="FName" required><br>

            <label for="LName"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Your Last Name" name="LName"><br>
            
            <label for="Mail"><b>Mail ID</b></label>
            <input type="text" placeholder="Enter Your Mail ID"  name="Mail" required><br>
            
            <label for="PNumber"><b>Phone Number</b></label>
            <input type="tel" placeholder="Enter Phone Number" pattern="[0-9]{10}" name="PhNo" required><br>
            
            
            <label for="ANumber"><b>Aadhar Number</b></label>
            <input type="tel" placeholder="Enter Aadhar Number" pattern="[0-9]{12}" name="AadharNo" required><br>
            
            
            <label for="District"><b>District</b></label>
            <input type="text" placeholder="Enter District" name="District" required><br>

            <label for="city"><b>city</b></label>
            <input type="text" placeholder="Enter city" name="city" required><br>

            <label for="Area"><b>Area</b></label>
            <input type="text" placeholder="Enter Area" name="Area" required><br>

            <label for="Pincode"><b>Pincode</b></label>
            <input type="tel" placeholder="Enter Pincode" pattern="[0-9]{6}" name="Pincode" required><br>
            
            
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password"  name="psw" required minlength="5"><br>

            <label for="psw"><b>Confirm Password</b></label>
            <input type="password" placeholder="Renter Password"  name="cpsw" required minlength="5"><br>
            

            <div class="clearfix">   
                <a  href="Home1.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
                <button type="submit" class="signupbtn" name="Register">Sign Up</button>
            </div>
            <h5><p style = "color:navy;">Have an account? <a href="signin.php">Sign In</a></p></h5>
        </div>
    </form>
</body>
</html>


<?php

    include "Action/connection.php";

    if(isset($_POST['Register']))
    {
        $FName = $_POST['FName'];
        $LName = $_POST['LName'];
        $Mail = $_POST['Mail'];
        $PhNo = $_POST['PhNo']; 
        $AadharNo = $_POST['AadharNo']; 
        $Pincode = $_POST['Pincode']; 
        $District = $_POST['District']; 
        $city = $_POST['city']; 
        $Area = $_POST['Area']; 
        $psw = $_POST['psw'];
        $cpsw = $_POST['cpsw'];

        $emailquery = " select * from user_register where Mail = '$Mail' ";
        $query = mysqli_query($conn, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0)
        {
            ?>
            <script>
                alert("Email Already Exist");
            </script>
        <?php
        }
        else
        {
            if($psw === $cpsw)
            {
                
                $insertquery=" insert into user_register(AadharNo,FName,LName,Mail,PhNo,District,city,Area,Pincode,psw) values('$AadharNo','$FName','$LName','$Mail','$PhNo','$District','$city','$Area','$Pincode','$psw') ";

                $iquery = mysqli_query($conn, $insertquery);

                if($iquery)
                {
                    ?>
                        <script>
                            alert("Registerd Successful");
                        </script>
                    <?php

                     ?>
                     <script>
                          location.replace("Home1.php");
                     </script>        
                     <?php
                }
                else
                {
                    ?>
                        <script>
                            alert("Registration Failed");
                        </script>
                    <?php
                }
            }
            else 
            {
                ?>
                  <script>
                     alert("Password Not matching");
                  </script>
                <?php
            }
        }

    }

?>

