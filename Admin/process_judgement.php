<!-- Update and Delete operations on Judgement Report -->

<?php 
    include "../Action/connection.php";

    if(isset($_GET['delete'])) {
        $id=$_GET['delete'];
        $delete = "delete from judgement_report where jr_no=$id";
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
        header("location:display_judgement.php");
    }

    if(isset($_GET['edit'])) {
?>        
        <!DOCTYPE html>
        <html>
            <head>
                <title>Update Judgement Report</title>
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
            <form class="modal-content"  method="post">
                <div class="container">
                    <h1>Enter Judgement Report Details</h1>
                    <hr>
            <?php
                    $id = $_GET['edit'];
                    $select = "select * from judgement_report where jr_no={$id}";
                    $query1 = mysqli_query($conn,$select);
                    $result = mysqli_fetch_array($query1);

                    if(isset($_POST['submit']))
                    {  
                        $jrno = $_POST['JRno']; 
                        $FIRno = $_POST['FIRNo'];
                        $CaseType = $_POST['CaseType'];
                        $CourtType = $_POST['CourtType'];
                        $Date = $_POST['Jdate'];
                        $judgement = $_POST['Jugement'];

                        $update_query = "update judgement_report set jr_no=$id, fir_no='$FIRno',case_type='$CaseType',court_type='$CourtType' ,judgement_date='$Date',judgement='$judgement' where jr_no=$id";
                        $update_result=mysqli_query($conn,$update_query);
                        if($update_result)
                        {
                            ?>
                            <script>
                                alert("Judgement Report Successfully Updated");
                            </script>
                            <?php

                            ?>
                            <script>
                                location.replace("display_judgement.php");
                            </script>        
                            <?php
                        }
                        else
                        {
                            ?>
                            <script>
                                alert("Judgement Report Not Updated");
                            </script>
                            <?php
                        }
                    }
            ?>
                    <label for="JRno"><b>Judgement Report number</b></label>
                    <input type="tel" placeholder="Enter the judgement report number" name="JRno" value="<?php echo  $result['jr_no']; ?>" required><br><br>

                    <label for="FIRNo"><b>FIR Number</b></label>
                    <input type="text" placeholder="Enter  FIR Number " name="FIRNo" value="<?php echo  $result['fir_no']; ?>" required>

                    <label for="CaseType"><b>Case Type</b></label>
                    <input type="text" placeholder="Enter  type of crime" name="CaseType" value="<?php echo  $result['case_type']; ?>" required>

                        <label for="CourtType"><b>Court Type</b></label>
                    <input type="text" placeholder="Enter  type of court in which the final judgement of the case is done" name="CourtType" value="<?php echo  $result['judgement_date']; ?>" required>
                    
                    <label for="Jdate"><b>Judgement date</b></label>
                    <input type="date" placeholder="Enter date of the case registered" pattern="DD/MM/YYYY" name="Jdate" value="<?php echo  $result['judgement_date']; ?>" required><br><br>                   
                    
                    <b>Jugement</b><br>
                    <textarea rows="3" cols="100"  name="Jugement"><?php echo  $result['judgement']; ?></textarea>
                    <div class="clearfix">
                        <a  href="display_judgement.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button>  </a>  
                        <button type="submit" class="signupbtn" name="submit">Update</button>
                    </div>
                </div>
            </form>
        </body>
        </html>



<?php
    }
?>