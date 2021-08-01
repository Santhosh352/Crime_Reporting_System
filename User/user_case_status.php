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
        <title>CASE STATUS</title>
        <?php include "../Action/links.php" ?>        
        <link rel = "stylesheet" type="text/css" href = "../Action/display.css">
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/case.jpg");
                background-repeat:no-repeat;
                background-size:100% 100%;
            }
            .status-style{
                font-size:14px;
                color:grey;
                display:inline-block;
                background:#f2f2f2;
                -webkit-border-radius:2px;
                -moz-border-radius:2px;
                border-radius:2px;
                line-height:30px;
                padding:0 14px;
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
       <b> <u><h1>CASE STATUS</h1></u></b>
        <div class="center-div">
            <div class="table-responsive">
        <?php
            include "../Action/connection.php";

            $email=$_SESSION['Mail'];
            $select=" select * from user_register where Mail='$email' "; 
            $query = mysqli_query($conn, $select);
            $row=mysqli_fetch_array( $query);
            $aadharno=$row['AadharNo'];

            if(isset($_POST['submit'])){

                $user=$_POST['user_name'];
                $selectquery = " select s.* from case_status as s, complaint as c where (s.case_id=c.CaseId and c.Aadhar_No='$aadharno') and ((s.case_type like '$user') OR (s.fir_no like '$user') OR (s.status like '$user') OR (s.case_id like '$user') OR (s.date like '$user') OR (s.police_station_name like '%$user%')) ";
                $query1 = mysqli_query($conn, $selectquery);
        ?>
                <table>
                    <thead>
                        <tr>
                            <th>FIR NO</th>
                            <th>Case Id</th>
                            <th>Case Type</th>
                            <th>Date</th>
                            <th>Police Station</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
                    while($row = mysqli_fetch_array($query1)) {
        ?>
                        <tr>
                            <td><?php echo  $row['fir_no']; ?></td>
                            <td><?php echo  $row['case_id']; ?></td>
                            <td><?php echo  $row['case_type']; ?></td>
                            <td><?php echo  $row['date']; ?></td>
                            <td><?php echo  $row['police_station_name']; ?></td>
                            <td><span class="status-style"><?php echo  $row['status']; ?></span></td>                       
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
                        <th>FIR NO</th>
                        <th>Case Id</th>
                        <th>Case Type</th>
                        <th>Date</th>
                        <th>Police Station</th>
                        <th>Status</th>                        
                    </tr>
                </thead>
                <tbody>
        <?php     
                $selectquery2 = " select s.* from case_status as s, complaint as c where (s.case_id=c.CaseId and c.Aadhar_No='$aadharno') ";
                $query2 = mysqli_query($conn, $selectquery2);
                while($res = mysqli_fetch_array($query2)) {
        ?>
                    <tr>
                        <td><?php echo  $res['fir_no']; ?></td>
                        <td><?php echo  $res['case_id']; ?></td>
                        <td><?php echo  $res['case_type']; ?></td>
                        <td><?php echo  $res['date']; ?></td>
                        <td><?php echo  $res['police_station_name']; ?></td>
                        <td><span class="status-style"><?php echo  $res['status']; ?></span></td>                        
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
