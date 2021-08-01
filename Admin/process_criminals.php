<!-- Update and Delete operations on Wanted Criminals -->

<?php 
    include "../Action/connection.php";

    if(isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $img = "select criminal_photo from wanted_criminals where Criminal_id='$id'";
        $delete = "delete from wanted_criminals where Criminal_id='$id' ";
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
        header("location:display_criminals.php");
    }
    if(isset($_GET['edit'])) {
?>
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
            <form class="modal-content"  method="post" enctype="multipart/form-data">
                <div class="container">    
                    <h1>Update Criminal's Details</h1>
                    <hr>
                    <?php
                        $id = $_GET['edit'];
                        $select = "select * from wanted_criminals where Criminal_id='$id' ";
                        $query1 = mysqli_query($conn,$select);
                        $res = mysqli_fetch_array($query1);

                        if(isset($_POST['submit']))
                        {  
                            $Criminal_id = $_POST['Criminal_id'];
                            $FName = $_POST['FName'];
                            $LName = $_POST['LName'];
                            $Age = $_POST['Age'];
                            $Religion = $_POST['Religion'];
                            $Crimes = $_POST['Crimes'];
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
                            $update_query = "update wanted_criminals set Criminal_id='$Criminal_id',FName='$FName',LName='$LName', Age='$Age', Religion='$Religion', Crimes='$Crimes', criminal_photo='$update_image' where Criminal_id='$id' ";
                            $res=mysqli_query($conn,$update_query);
                            if($res)
                            {
                                unlink("../upload/".$oldimage);
                                ?>
                                <script>
                                    alert("Details Updated");
                                </script>
                                <?php
                                header("location:display_criminals.php");
                            }
                            else
                            {
                                ?>
                                <script>
                                    alert("Details Not Updated");
                                </script>
                                <?php
                                header("location:display_criminals.php");
                            }                            
                        }
                    ?>
                    <label for="Criminal_id"><b>Criminal ID</b></label>
                    <input type="text" placeholder="Enter criminal ID" name="Criminal_id" value="<?php echo  $res['Criminal_id']; ?>" required>

                    <label for="Fname"><b>First Name</b></label>
                    <input type="text" placeholder="Enter first name of the criminal" name="FName" value="<?php echo  $res['FName']; ?>" required>        
                        
                    <label for="Lname"><b>Last Name</b></label>
                    <input type="text" placeholder="Enter last name of the criminal" name="LName" value="<?php echo  $res['LName']; ?>" >
                        
                    <label for="Age"><b>Age</b></label>
                    <input type="tel" placeholder="Enter the age of the criminal" pattern="[0-9]{2}" name="Age" value="<?php echo  $res['Age']; ?>" required><br><br>
                                
                    <label for="Religion"><b>Religion</b></label>
                    <input type="text" placeholder="Enter religion of the criminal" name="Religion" value="<?php echo  $res['Religion']; ?>" required>

                    <label for="Crimes"><b> Crimes performed</b></label>
                    <input type="text" placeholder="Enter the crimes performed by the criminal" name="Crimes" value="<?php echo  $res['Crimes']; ?>" required>
                         
                    <b>Criminal Photo</b><br>
                    <img src="<?php echo  $res['criminal_photo']; ?>" width="100" height="100"><br>
                    <input type="file"  name="newphoto">
                    <input type="hidden" name="oldphoto" value="<?php echo  $res['criminal_photo']; ?>"><br>
                    
                    <div class="clearfix">
                        <a  href="display_criminals.php"><button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
                        <button type="submit" class="signupbtn"name="submit">Update</button>
                    </div>
                </div>
            </form>
        </body>
        </html>
<?php
    }
?>