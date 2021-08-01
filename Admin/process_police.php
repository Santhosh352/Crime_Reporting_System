<!-- Update and Delete operations on Police Details -->

<?php 
    include "../Action/connection.php";

    if(isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $img = "select police_photo from police where Pid='$id'";
        $delete = "delete from police where Pid='$id' ";
        $query = mysqli_query($conn, $delete);
        if($query){
            unlink("../upload/".$img);
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
        header("location:display_police.php");
    }
    if(isset($_GET['edit'])) {
?>        
        <!DOCTYPE html>
        <html>
            <head>
                <title>Police details </title>
                <?php include "../Action/links.php"  ?>
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
            <form class="modal-content"  method="post" enctype="multipart/form-data">
                <div class="container">
                    <h1>Update Police Details</h1>
                    <hr>       
                    <?php
                        $id = $_GET['edit'];
                        $select = "select * from police where Pid='$id' ";
                        $query1 = mysqli_query($conn,$select);
                        $res = mysqli_fetch_array($query1);

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
                            $newimage = $_FILES['newphoto'];
                            $oldimage = $_POST['oldphoto'];

                            $image_name = $newimage['name'];
                            $image_path = $newimage['tmp_name'];
                            $image_error = $newimage['error'];

                            if($image_error==0)
                            {
                                $update_image = '../upload/'.$image_name;
                                move_uploaded_file($image_path, $update_image);
                            }
                            else
                            {
                                $update_image = $oldimage;
                            }
                            $update_query = "update police set Pid='$Pid', FName='$FName', LName='$LName', PhNo='$PhNo', Mail='$Mail', Station_Name='$Station_Name', District='$District', city='$city', Pincode='$Pincode', police_photo='$update_image' where Pid='$id' ";
                            $res=mysqli_query($conn,$update_query);
                            if($res)
                            {
                                unlink("../upload/".$oldimage);
                                ?>
                                <script>
                                    alert("Details Updated");
                                </script>
                                <?php
                                header("location:display_police.php");
                            }
                            else
                            {
                                ?>
                                <script>
                                    alert("Details Not Updated");
                                </script>
                                <?php
                                header("location:display_police.php");
                            }                            
                        }
                    ?>
                    <label for="Pid"><b>Police ID</b></label>
                    <input type="text" placeholder="Enter Police ID" name="Pid" value="<?php echo  $res['Pid']; ?>" required>

                    <label for="FName"><b>First Name</b></label>
                    <input type="text" placeholder="Enter Police First Name" name="FName" value="<?php echo  $res['FName']; ?>" required>

                    <label for="LName"><b>Last Name</b></label>
                    <input type="text" placeholder="Enter Police Last Name" name="LName" value="<?php echo  $res['LName']; ?>" >
                    
                    <label for="Mail"><b>Mail Id</b></label>
                    <input type="text" placeholder="Enter Mail Id"  name="Mail" value="<?php echo  $res['Mail']; ?>"  required>
                    
                    <label for="PhNo"><b>Phone Number</b></label>
                    <input type="tel" placeholder="Enter Phone Number" pattern="[0-9]{10}" name="PhNo" value="<?php echo  $res['PhNo']; ?>"  required><br><br>	  
                    
                    <label for="Station_Name"><b>Station Name</b></label>
                    <input type="text" placeholder="Enter name of the station"  name="Station_Name" value="<?php echo  $res['Station_Name']; ?>"  required>
                    
                    <label for="District"><b>District</b></label>
                    <input type="text" placeholder="Enter the district of the police station" name="District" value="<?php echo  $res['District']; ?>" required>

                    <label for="city"><b>City</b></label>
                    <input type="text" placeholder="Enter city of the station" name="city" value="<?php echo  $res['city']; ?>" required>
                        
                    <label for="Pincode"><b>Pincode</b></label>
                    <input type="tel" placeholder="Enter Pincode" pattern="[0-9]{6}" name="Pincode" value="<?php echo  $res['Pincode']; ?>" required><br><br>
                    
                    <b>Police Photo</b><br>
                    <img src="<?php echo  $res['police_photo']; ?>" width="100" height="100"><br>
                    <input type="file"  name="newphoto">
                    <input type="hidden" name="oldphoto" value="<?php echo  $res['police_photo']; ?>"><br>
                                        
                
                    <div class="clearfix">
                        <a  href="display_police.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
                        <button type="submit" class="signupbtn" name="submit">Update</button>
                    </div>
                </div>
            </form>

        </body>
        </html>
<?php
    }
?>