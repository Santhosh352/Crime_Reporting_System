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
        <title>POLICE DETAILS</title>
        <?php include "../Action/links.php" ?>
        <link rel = "stylesheet" type="text/css" href = "../Action/display.css">
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/police_bg.jpg");
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
            <input type="text" name="user_name" id="searchBar" placeholder="Search..." maxlength="100"><input type="submit" id="searchBtn" name="submit" value="SEARCH"/>
        </form>
    </div>   
    <u><h1 style="color:navy;  background: linear-gradient(to right, #00AAFF, #00FF6C);">POLICE DETAILS</h1></u>
    <div class="center-div">
        <div class="table-responsive">
        <?php
            include "../Action/connection.php";
            if(isset($_POST['submit'])) {
                $user=$_POST['user_name'];
                $selectquery1 = " select Pid,concat(FName,'  ',LName) as Name, PhNo, Mail, Station_Name, District, city, Pincode, police_photo from police where (FName like '$user%') OR (LName like '$user%') OR (District like '$user%') OR (Pid like '$user') OR (city like '$user%') OR (Pincode like '$user')";
                $query1 = mysqli_query($conn, $selectquery1);
        ?>
            <table>
                <thead>
                    <tr>
                        <th><center>Police Details</center></th>                
                    </tr>
                </thead>
                <tbody>
        <?php
                while($res = mysqli_fetch_array($query1)) {
    ?>
                    <tr>
                        <td><img src="<?php echo  $res['police_photo']; ?>" width="250" height="250" align="left">
                            <p> 
                                <b>Police Id    :</b>  <?php echo  $res['Pid']; ?><br>
                                <b>Name         :</b>  <?php echo  $res['Name']; ?><br>
                                <b>Mobile No    :</b>  <?php echo  $res['PhNo']; ?><br>
                                <b>Email        :</b>  <?php echo  $res['Mail']; ?><br>
                                <b>Station Name :</b>  <?php echo  $res['Station_Name']; ?><br>
                                <b>District     :</b>  <?php echo  $res['District']; ?><br>
                                <b>City         :</b>  <?php echo  $res['city']; ?><br>
                                <b>Pincode      :</b>  <?php echo  $res['Pincode']; ?><br>
                            </p>
                        </td>                               
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
                    <th><center>Police Details</center></th>                
                </tr>
            </thead>
            <tbody>
    <?php
                $selectquery = " select Pid,concat(FName,'  ',LName) as Name, PhNo, Mail, Station_Name, District, city, Pincode, police_photo from police ";
                $query = mysqli_query($conn, $selectquery);
                while($res = mysqli_fetch_array($query)) {
    ?>
                    <tr>
                        <td><img src="<?php echo  $res['police_photo']; ?>" width="200" height="250" align="left">
                            <p>
                                <b>Police Id    :</b>  <?php echo  $res['Pid']; ?><br>
                                <b>Name         :</b>  <?php echo  $res['Name']; ?><br>
                                <b>Mobile No    :</b>  <?php echo  $res['PhNo']; ?><br>
                                <b>Email        :</b>  <?php echo  $res['Mail']; ?><br>
                                <b>Station Name :</b>  <?php echo  $res['Station_Name']; ?><br>
                                <b>District     :</b>  <?php echo  $res['District']; ?><br>
                                <b>City         :</b>  <?php echo  $res['city']; ?><br>
                                <b>Pincode      :</b>  <?php echo  $res['Pincode']; ?><br>
                            </p>
                        </td>
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

                 