<!-- Update and Delete operations on Case Status -->

<?php 
    include "../Action/connection.php";

    if(isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $delete = "delete from case_status where fir_no=$id";
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
        header("location:display_case_status.php");
    }

    if(isset($_GET['edit'])) {
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
        <form class="modal-content"  method="post">
            <div class="container">     
            <h1>Update Case Status</h1>
            <hr>
            <?php
                $id = $_GET['edit'];
                $select = "select * from case_status where fir_no={$id}";
                $query1 = mysqli_query($conn,$select);
                $result = mysqli_fetch_array($query1);

                if(isset($_POST['submit']))
                {  
                    $FIRno = $_POST['FIRNo'];
                    $CaseId = $_POST['CaseId'];
                    $CaseType = $_POST['Ctype'];
                    $Date = $_POST['Cdate'];                    
                    $Station = $_POST['Station'];
                    $status = $_POST['Status'];

                    $update_query = "update case_status set fir_no=$id,case_id='$CaseId',case_type='$CaseType',date='$Date', police_station_name='$Station',status='$status' where fir_no=$id";
                    $update_result=mysqli_query($conn,$update_query);

                    if($update_result)
                    {
                        ?>
                        <script>
                            alert("Status Updated");
                        </script>
                        <?php

                        ?>
                        <script>
                        location.replace("display_case_status.php");
                        </script>        
                        <?php
                    }
                    else
                    {
                        ?>
                        <script>
                            alert("Status Not Updated");
                        </script>
                        <?php
                    }
                }
            ?>

            <label for="FIR_no"><b>FIR Number</b></label>
            <input type="tel" placeholder="Enter FIR number" pattern="[0-9]{10}" name="FIRNo" value="<?php echo  $result['fir_no']; ?>" required><br>

            <label for="CaseId"><b>Case Id</b></label>
            <input type="text" placeholder="Enter Case Id" name="CaseId" value="<?php echo  $result['case_id']; ?>" required><br>	  

            <label for="Ctype"><b>Case Type</b></label>
            <input type="text" placeholder="Enter  type of crime" name="Ctype" value="<?php echo  $result['case_type']; ?>" required><br>
            
            <label for="Cdate"><b>Case date</b></label>
            <input type="date" placeholder="Enter date of the case registered" pattern="DD/MM/YYYY" name="Cdate" value="<?php echo  $result['date']; ?>" required><br>
            
            
            <label for="Pid"><b>Police Station</b></label>
            <input type="text" placeholder="Enter Police Station" name="Station" value="<?php echo  $result['police_station_name']; ?>" required><br>

            <label for="Status"><b>Status</b></label>
            <input type="text" placeholder="Enter the Current status of the case" name="Status" value="<?php echo  $result['status']; ?>" required><br>

            
            <div class="clearfix">
            <a  href="display_case_status.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
                <button type="submit" class="signupbtn" name="submit">Update</button>
            </div>
            </div>
        </form>

        </body>
        </html>
<?php
    }
?>