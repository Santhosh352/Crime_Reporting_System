<!-- Update and Delete operations on Users Complaints -->

<?php 
    include "../Action/connection.php";

    if(isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $delete = "delete from complaint where CaseId=$id";
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
        header("location:display_complaints.php");
    }

    if(isset($_GET['edit'])) {
?>
        <!DOCTYPE html>
        <html > 
        <head>
            <title>Update complaints</title>
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
        <form class="modal-content"  method="POST">
            <div class="container">
            <h1>update Users Complaints</h1>      
            <hr>      
            <?php
                $id = $_GET['edit'];
                $select = "select * from complaint where CaseId=$id";
                $query1 = mysqli_query($conn,$select);
                $res = mysqli_fetch_array($query1);

                if(isset($_POST['Update']))
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

                    $update_query = "update complaint set CaseId=$id, CaseType='$CaseType', Date='$Date',Time='$Time', District='$District', city='$city', Area='$Area', Pincode='$Pincode', Description='$Description', police_station_name='$station' where CaseId=$id";
                    $update_result=mysqli_query($conn,$update_query);

                    if($update_result)
                    {
                        ?>
                        <script>
                            alert("Complaints Updated");
                        </script>
                        <?php

                        ?>
                        <script>
                        location.replace("display_complaints.php");
                        </script>        
                        <?php
                    }
                    else
                    {
                        ?>
                        <script>
                            alert("Complaints Not Updated");
                        </script>
                        <?php
                    }
                }
            ?>

            <label for="case type"><b>Case type</b></label>
            <input type="text" placeholder="Enter Case Type" name="CaseType" value="<?php echo  $res['CaseType']; ?>" required>
            
            <label for="Date"><b>Date</b></label>
            <input type="Date" placeholder="Enter Date"  name="Date" value="<?php echo  $res['Date']; ?>" required><br><br>
            
            <label for="time"><b>Time</b></label>
            <input type="time" placeholder="Enter Time"  name="Time" value="<?php echo  $res['Time']; ?>" required><br><br>
            
            <label for="district"><b>District</b></label>
            <input type="text" placeholder="Enter District"  name="District" value="<?php echo  $res['District']; ?>" required><br>
            
            <label for="city"><b>City</b></label>
            <input type="text" placeholder="Enter City" name="city" value="<?php echo  $res['city']; ?>" required><br>
            
            <label for="city"><b>Area</b></label>
            <input type="text" placeholder="Enter Area" name="Area" value="<?php echo  $res['Area']; ?>" required><br>

            <label for="pin code"><b>Pincode</b></label>
            <input type="tel" placeholder="Enter Pincode" name="Pincode" value="<?php echo  $res['Pincode']; ?>" required><br><br>

            <label for="station"><b>Police Station</b></label>
            <input type="text" placeholder="Enter Station name" name="station" value="<?php echo  $res['police_station_name']; ?>" required><br>
            
            <label for="description"><b>Description</b></label><br>
            <textarea rows="3" cols="85" name="Description" ><?php echo  $res['Description']; ?></textarea>
                
            <div class="clearfix">
                <a  href="display_complaints.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
                <button type="submit" class="signupbtn" name="Update">Update</button>
            </div>
            </div>
        </form>
        </body>
        </html>
<?php
    }
?>