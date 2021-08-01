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
        <title>USER QUERIES</title>
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
          <input type="text" name="user" id="searchBar" placeholder="Search..."><input type="submit" id="searchBtn" name="submit" value="SEARCH"/>
      </form>
    </div>   
    <u><h1 style="color:navy; font-size:250%;  background: linear-gradient(to right, #00AAFF, #00FF6C); ">USER QUERIES</h1></u>
    <div class="center-div">
        <div class="table-responsive">
        <?php
            include "../Action/connection.php";
            if(isset($_POST['submit'])){
                $user=$_POST['user'];
                $selectquery = " select  * from contact_us where (id like '$user') OR (Name like '$user') OR (Email like '$user') OR (Message like '%$user%')";
                $query = mysqli_query($conn, $selectquery);
        ?>
            <table>
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Messages</th>
                </tr>
                </thead>
                <tbody>
        <?php                     
                while($res = mysqli_fetch_array($query)) {
        ?>
                    <tr> 
                        <td><?php echo  $res['id']; ?></td>                               
                        <td><?php echo  $res['Name']; ?></td>
                        <td><?php echo  $res['Email']; ?></td>
                        <td><?php echo  $res['Message']; ?></td>
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
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Messages</th>
                    </tr>
                </thead>
                <tbody>
        <?php                
                $selectquery = " select * from contact_us ";
                $query = mysqli_query($conn, $selectquery);
                while($res = mysqli_fetch_array($query)) {
        ?>
                    <tr> 
                        <td><?php echo  $res['id']; ?></td>                               
                        <td><?php echo  $res['Name']; ?></td>
                        <td><?php echo  $res['Email']; ?></td>
                        <td><?php echo  $res['Message']; ?></td>
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
