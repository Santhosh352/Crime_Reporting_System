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
        <title>USER COMPLAINTS</title>
        <?php include "../Action/links.php" ?>
        <link rel = "stylesheet" type="text/css" href = "../Action/display.css">
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/people.png");
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
            <a  href="admin.php"> <button type="button" name="back"><<<</button>  </a> 
        </form>
    </div>
    <div class="right">
         <form  method="POST">
            <input type="text" name="user_name" id="searchBar" placeholder="Search..."><input type="submit" id="searchBtn" name="submit" value="SEARCH"/>
         </form>
    </div>
    <u><h1 style="color:navy; font-size:250%; background: linear-gradient(to right, #00AAFF, #00FF6C"> USER COMPLAINTS</h1></u>
    <div class="center-div">
    <div class="table-responsive">
<?php
        include "../Action/connection.php";
        if(isset($_POST['submit'])){
            $user=$_POST['user_name'];
            $first = $user[0];
            // $last=substr('$user', -1);
            $selectquery1 = " select concat(u.FName,' ',u.LName) as Name, c.* from user_register as u, complaint as c where (c.Aadhar_No = u.AadharNo) and ((c.Aadhar_no like '$user') OR (c.CaseId like '$user') OR (c.CaseType like '$user') OR (c.Date like '$user') OR (c.Time like '$user') OR (c.District like '$user')  OR (c.city like '$user')  OR (c.Area like '$user%') OR (c.Pincode like '$user') OR (u.FName like '$first%') OR (u.LName like '$user%'))";
            $query1 = mysqli_query($conn, $selectquery1);
?>
            <table>
                <thead>
                    <tr>
                        <th>Aadhar Number</th>
                        <th>User Name</th>
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
                        <th colspan="2">operation</th>                   
                    </tr>
                </thead>
                <tbody>
<?php
                    while($row = mysqli_fetch_array($query1)) {
?>
                        <tr>
                            <td><?php echo  $row['Aadhar_No']; ?></td>
                            <td><?php echo  $row['Name']; ?></td>
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
                            <td><a href="process_complaints.php?edit=<?php echo  $row['CaseId']; ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a href="process_complaints.php?delete=<?php echo  $row['CaseId']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></td>                            
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
                    <th>Aadhar Number</th>
                    <th>User Name</th>
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
                    <th colspan="2">operation</th>                
                </tr>
            </thead>
            <tbody>
<?php
                $selectquery = " select concat(u.FName,' ',u.LName) as Name,c.* from user_register as u, complaint as c where c.Aadhar_No = u.AadharNo";
                $query = mysqli_query($conn, $selectquery);
                $num = mysqli_num_rows($query);
                while($res = mysqli_fetch_array($query)) {
?>
                    <tr>
                        <td><?php echo  $res['Aadhar_No']; ?></td>
                        <td><?php echo  $res['Name']; ?></td>
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
                        <td><a href="process_complaints.php?edit=<?php echo  $res['CaseId']; ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="process_complaints.php?delete=<?php echo  $res['CaseId']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></td>                                                
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
