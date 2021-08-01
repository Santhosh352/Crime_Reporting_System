<!-- Update and Delete operations on User details -->

<?php 
    include "../Action/connection.php";
    if(isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $delete = "delete from user_register where AadharNo=$id";
        $query = mysqli_query($conn, $delete);
        if($query){
            ?>
            <script>
                alert("Data Deleted Succefully");
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Data Not Deleted");
            </script>
            <?php
        }
        header("location:display_user.php");
    }

    if(isset($_GET['edit'])) {
?>
        <html>
            <head>
                <title>Update User Details</title>
                <?php include "../Action/links.php" ?>
                <link rel = "stylesheet" type="text/css" href = "../Action/forms_style.css">
            </head>
            <style>
                body{
                    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/IMG-20201219-WA0000.jpg");
                    background-repeat:no-repeat;
                    background-size:100% 100%;
                } 
            </style>
        <body>
            <form class="modal-content" method="POST">
                <div class="container">
                    <h1>Enter User Details</h1>
                    <hr>
                <?php
                    $id = $_GET['edit'];
                    $select = "select * from user_register where AadharNo=$id";
                    $query1 = mysqli_query($conn,$select);
                    $res = mysqli_fetch_array($query1);

                    if(isset($_POST['Update']))
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
            
                        $update_query = "update user_register set AadharNo=$id, FName='$FName', LName='$LName', Mail='$Mail', PhNo='$PhNo', District='$District',city='$city', Area='$Area', Pincode='$Pincode'  where AadharNo=$id";
                        $update_result=mysqli_query($conn,$update_query);
                        if($update_result) {
                ?>
                            <script>
                                alert("Updated Successful");
                            </script>
                            <script>
                                location.replace("display_user.php");
                            </script>        
                <?php
                        }
                        else {
                ?>
                            <script>
                                alert("Updation Failed");
                            </script>
                <?php
                        }
                    }                        
                ?>
                    <b>First Name</b>
                    <input type="text" placeholder="Enter Your First Name" name="FName" value="<?php echo  $res['FName']; ?>" required><br>
                    <b>Last Name</b>
                    <input type="text" placeholder="Enter Your Last Name" name="LName" value="<?php echo  $res['LName']; ?>" ><br>            
                    <b>Mail ID</b>
                    <input type="text" placeholder="Enter Your Mail ID"  name="Mail" value="<?php echo  $res['Mail']; ?>" required><br>            
                    <b>Phone Number</b>
                    <input type="tel" placeholder="Enter Phone Number" pattern="[0-9]{10}" name="PhNo" value="<?php echo  $res['PhNo']; ?>" required><br>           
                    <b>Aadhar Number</b>
                    <input type="tel" placeholder="Enter Aadhar Number" pattern="[0-9]{12}" name="AadharNo" value="<?php echo  $res['AadharNo']; ?>" required><br> 
                    <b>District</b>
                    <input type="text" placeholder="Enter District" name="District" value="<?php echo  $res['District']; ?>" required><br>
                    <b>city</b>
                    <input type="text" placeholder="Enter city" name="city" value="<?php echo  $res['city']; ?>" required><br>
                    <b>Area</b>
                    <input type="text" placeholder="Enter Area" name="Area" value="<?php echo  $res['Area']; ?>" required><br>
                    <b>Pincode</b>
                    <input type="tel" placeholder="Enter Pincode" pattern="[0-9]{6}" name="Pincode" value="<?php echo  $res['Pincode']; ?>" required><br>
                    
                    <div class="clearfix">   
                        <a  href="display_user.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
                        <button type="submit" class="signupbtn" name="Update">Update</button>
                    </div>
                </div>
            </form>
        </body>
        </html>
<?php
    }
?>