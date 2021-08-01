<?php 

    session_start();
    if($_SESSION['Mail']==true){      
    }
    else{    
      header('location:../Home1.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>JUDGEMENT REPORT</title>
        <?php include "../Action/links.php" ?>
        <link rel = "stylesheet" type="text/css" href = "../Action/display.css">
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/jr_1.jpg");
                background-repeat:no-repeat;
                background-size:100% 100%;
            } 
            #searchBar{
                border:1px solid #000000;
                border-right:none;
                font-size:16px;
                padding:10px;
                outline:none; 
                width:250px;
                -webkit-border-top-left-radius:10px;
                -webkit-border-bottom-left-radius:10px;
                -moz-border-radius-topleft:10px;
                -moz-border-radius-bottomleft:10px;
                border-top-left-radius:10px;
                border-bottom-left-radius:10px;
            }

            #searchBtn{
                border:1px solid #000000;
                font-size:16px;
                padding:10px;
                background:rgb(0, 225, 255);
                font-weight: bold;
                cursor: pointer;
                outline:none;
                -webkit-border-top-right-radius:10px;
                -webkit-border-bottom-right-radius:10px;
                -moz-border-radius-topright:10px;
                -moz-border-radius-bottomright:10px;
                border-top-right-radius:10px;
                border-bottom-right-radius:10px;
            }

            #searchBtn:hover {
                background:rgb(5, 21, 236);
            }
        </style>
    </head>
<body>    
    <div class="left">
        <form>
            <a  href="User.php"> <button type="button" name="back"><<<</button>  </a> 
        </form>
    </div>
   <div class="right">
         <form  method="POST">
            <input type="text" name="user_name" id="searchBar" placeholder="Search..."><input type="submit" id="searchBtn" name="submit" value="SEARCH"/>
         </form>
    </div>
    <u><h1>JUDGEMENT REPORT</h1></u>
    <div class="center-div">
        <div class="table-responsive">
        <?php
            include "../Action/connection.php";
            $email=$_SESSION['Mail'];
            $selectquery1=" select * from user_register where Mail='$email' "; 
            $query1 = mysqli_query($conn, $selectquery1);
            $row=mysqli_fetch_array( $query1);
            $aadharno=$row['AadharNo'];

            if(isset($_POST['submit'])){
                $user=$_POST['user_name'];
                $selectquery1 = " select j.* from judgement_report as j, case_status as s, complaint as c where ((j.fir_no=s.fir_no) and (s.case_id=c.CaseId) and (c.Aadhar_No='$aadharno')) and ((j.case_type like '$user%') OR (j.fir_no like '$user') OR (j.court_type like '$user%') OR (j.jr_no like '$user') OR (j.judgement_date like '%$user%'))";               
                $query1 = mysqli_query($conn, $selectquery1);
                $num1 = mysqli_num_rows($query1);
        ?>
                <table>
                    <thead>
                        <tr>
                        <th>Judement report No</th>
                            <th>FIR NO</th>
                            <th>Case Type</th>
                            <th>Court </th>
                            <th>Judgement Date</th>
                            <th>Judgement</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
                for($i=1; $i<=$num1; $i++)
                {
                    $row=mysqli_fetch_array($query1);
        ?>
                    <tr>
                        <td><?php echo  $row['jr_no']; ?></td>                               
                        <td><?php echo  $row['fir_no']; ?></td>
                        <td><?php echo  $row['case_type']; ?></td>
                        <td><?php echo  $row['court_type']; ?></td>
                        <td><?php echo  $row['judgement_date']; ?></td>
                        <td><?php echo  $row['judgement']; ?></td>                        
                    </tr>
        <?php
                }
            }
        ?>
                    </tbody>
                </table>
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th>JUDGEMENT REPORT NO</th>
                        <th>FIR NO</th>
                        <th>Case Type</th>
                        <th>Court</th>
                        <th>JUDGEMENT Date</th>
                        <th>JUDGEMENT</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                    $selectquery2 = " select j.* from judgement_report as j, case_status as s, complaint as c where ((j.fir_no=s.fir_no) and (s.case_id=c.CaseId) and (c.Aadhar_No='$aadharno')) ";
                    $query = mysqli_query($conn, $selectquery2);
                    while($res1 = mysqli_fetch_array($query)) {
            ?>
                        <tr>
                            <td><?php echo  $res1['jr_no']; ?></td>                               
                            <td><?php echo  $res1['fir_no']; ?></td>
                            <td><?php echo  $res1['case_type']; ?></td>
                            <td><?php echo  $res1['court_type']; ?></td>
                            <td><?php echo  $res1['judgement_date']; ?></td>
                            <td><?php echo  $res1['judgement']; ?></td>                                
                        </tr>
            <?php                        
                    }
            ?>                
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
