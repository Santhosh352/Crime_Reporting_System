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
        <title>Complaints</title> 
        <link rel = "stylesheet" type="text/css" href = "../Action/display.css">
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("../images/digital.png");
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
            <B><a  href="User.php"> <button type="button" name="back"><<<</button></a></B> 
        </form>
    </div>
    <div class="right">
        <form  method="POST">
            <input type="text" name="user_name" id="searchBar" placeholder="Search..."><input type="submit" id="searchBtn" name="submit" value="SEARCH"/>
        </form>
    </div>
        <u><h1>COMPLAINTS</h1></u>
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
                    $selectquery2 = " select CaseId, CaseType, Date, Time, District, city, Area, Pincode, Description, police_station_name from complaint where (Aadhar_No='$aadharno') and ((CaseType like '$user') OR (CaseId like '$user') OR (Date like '$user') OR (District like '$user')  OR (city like '$user')  OR (Area like '$user')  OR (Pincode like '$user') OR (police_station_name like '%$user%')) ";
                    $query2 = mysqli_query($conn, $selectquery2);
            ?>
                <table>
                    <thead>
                        <tr>
                            <th>Case id</th>
                            <th>Case Type</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>District</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Pincode</th>
                            <th>Description</th>
                            <th>Police Station</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                    while($row = mysqli_fetch_array($query2)) {
            ?>
                        <tr>
                            <td><?php echo  $row['CaseId']; ?></td>
                            <td><?php echo  $row['CaseType']; ?></td>
                            <td><?php echo  $row['Date']; ?></td>
                            <td><?php echo  $row['Time']; ?></td>
                            <td><?php echo  $row['District']; ?></td>
                            <td><?php echo  $row['city']; ?></td>
                            <td><?php echo  $row['Area']; ?></td>
                            <td><?php echo  $row['Pincode']; ?></td>
                            <td><?php echo  $row['Description']; ?></td>   
                            <td><?php echo  $row['police_station_name']; ?></td>    
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
                        <th>Case id</th>
                        <th>Case Type</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>District</th>
                        <th>City</th>
                        <th>Area</th>
                        <th>Pincode</th>
                        <th>Description</th>
                        <th>Police Station</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                    $selectquery = " select * from complaint where Aadhar_No='$aadharno' ";
                    $query = mysqli_query($conn, $selectquery);
                    while($res = mysqli_fetch_array($query)) {
            ?>
                        <tr>
                            <td><?php echo  $res['CaseId']; ?></td>
                            <td><?php echo  $res['CaseType']; ?></td>
                            <td><?php echo  $res['Date']; ?></td>
                            <td><?php echo  $res['Time']; ?></td>
                            <td><?php echo  $res['District']; ?></td>
                            <td><?php echo  $res['city']; ?></td>
                            <td><?php echo  $res['Area']; ?></td>
                            <td><?php echo  $res['Pincode']; ?></td>
                            <td><?php echo  $res['Description']; ?></td>
                            <td><?php echo  $res['police_station_name']; ?></td>
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
