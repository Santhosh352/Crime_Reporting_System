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
        <title>USER DETAILS</title>
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
    <u><h1 style="color:navy; font-size:250%;  background: linear-gradient(to right, #00AAFF, #00FF6C); ">USER DETAILS</h1></u>
    <div class="center-div">
        <div class="table-responsive">
        <?php
            include "../Action/connection.php";
            if(isset($_POST['submit'])){
                $user=$_POST['user_name'];
                $selectquery1 = " select  AadharNo, FName, LName, Mail, PhNo, District, city, Area, Pincode from user_register where (AadharNo like '$user') OR (PhNo like '$user') OR (Mail like '$user') OR (LName like '$user') OR (FName like '$user') OR (District like '$user')  OR (city like '$user')  OR (Area like '$user')  OR (Pincode like '$user')";
                $query1 = mysqli_query($conn, $selectquery1);
                $num1 = mysqli_num_rows($query1);
        ?>
                <table>
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Aadhar NO</th>
                            <th>Email</th>
                            <th>Mobile NO</th>
                            <th>District</th>
                            <th>City</th>
                            <th>Area</th>
                            <th>Pincode</th>
                            <th colspan="2">operation</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
                    while($row = mysqli_fetch_array($query1)) {
        ?>
                        <tr>
                            <td><?php echo  $row['FName']; ?></td>
                            <td><?php echo  $row['LName']; ?></td>
                            <td><?php echo  $row['AadharNo']; ?></td>
                            <td><?php echo  $row['Mail']; ?></td>
                            <td><?php echo  $row['PhNo']; ?></td>
                            <td><?php echo  $row['District']; ?></td>
                            <td><?php echo  $row['city']; ?></td>
                            <td><?php echo  $row['Area']; ?></td>
                            <td><?php echo  $row['Pincode']; ?></td>   
                            <td><a href="process_user.php?edit=<?php echo  $row['AadharNo']; ?>"> <i class="fa fa-edit"></i></a></td>
                            <td><a href="process_user.php?delete=<?php echo  $row['AadharNo']; ?>"> <i class="fa fa-trash"></i></a></td>                            
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Aadhar NO</th>
                        <th>Email</th>
                        <th>Mobile NO</th>
                        <th>District</th>
                        <th>City</th>
                        <th>Area</th>
                        <th>Pincode</th>
                        <th colspan="2">operation</th>
                    </tr>
                </thead>
                <tbody>
        <?php
                        $selectquery = " select AadharNo, FName, LName, Mail, PhNo, District, city, Area, Pincode from user_register ";
                        $query = mysqli_query($conn, $selectquery);
                        while($res = mysqli_fetch_array($query)) {
        ?>
                            <tr>                                
                                <td><?php echo  $res['FName']; ?></td>
                                <td><?php echo  $res['LName']; ?></td>
                                <td><?php echo  $res['AadharNo']; ?></td>
                                <td><?php echo  $res['Mail']; ?></td>
                                <td><?php echo  $res['PhNo']; ?></td>
                                <td><?php echo  $res['District']; ?></td>
                                <td><?php echo  $res['city']; ?></td>
                                <td><?php echo  $res['Area']; ?></td>
                                <td><?php echo  $res['Pincode']; ?></td>                             
                                <td><a href="process_user.php?edit=<?php echo  $res['AadharNo']; ?>"> <i class="fa fa-edit"></i></a></td>
                                <td><a href="process_user.php?delete=<?php echo  $res['AadharNo']; ?>"> <i class="fa fa-trash"></i></a></td>                            
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
