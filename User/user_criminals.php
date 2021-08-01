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
        <title>WANTED CRIMINALS</title>
        <?php include "../Action/links.php" ?>
        <link rel = "stylesheet" type="text/css" href = "../Action/display.css">
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/wanted1.jpg");
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
            <input type="text" name="user_name" id="searchBar" placeholder="Search..." ><input type="submit" id="searchBtn" name="submit" value="SEARCH"/>
        </form>
    </div>   
    <u><h1 style="color:navy;  background: linear-gradient(to right, #00AAFF, #00FF6C);">WANTED CRIMINALS</h1></u>
    <div class="center-div">
        <div class="table-responsive">
        <?php
            include "../Action/connection.php";
            if(isset($_POST['submit'])) {
                $user=$_POST['user_name'];
                $selectquery1 = " select Criminal_Id,concat(FName,'  ',LName) as Name, Age, Religion, Crimes, criminal_photo from wanted_criminals where (FName like '$user%') OR (LName like '$user%') OR (Criminal_Id like '$user') OR (Religion like '$user') OR (Crimes like '$user%') OR (Age like '$user')  ";
                $query1 = mysqli_query($conn, $selectquery1);
        ?>
            <table>
                <thead>
                    <tr>
                        <th><center>Criminals Details</center></th>                
                    </tr>
                </thead>
                <tbody>
        <?php
                while($res = mysqli_fetch_array($query1)) {
        ?>
                    <tr>
                        <td><img src="<?php echo  $res['criminal_photo']; ?>" width="200" height="250" align="left">
                            <p>
                                <b>Name         :</b>   <?php echo  $res['Name']; ?><br>
                                <b>Age          :</b>   <?php echo  $res['Age']; ?><br>
                                <b>Religion     :</b>   <?php echo  $res['Religion']; ?><br>
                                <b>Crimes       :</b>   <?php echo  $res['Crimes']; ?><br>                                    
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
                        <th><center>Criminals Details</center></th>                
                    </tr>
                </thead>
                <tbody>
        <?php                
                $selectquery = " select Criminal_Id,concat(FName,'  ',LName) as Name, Age, Religion, Crimes, criminal_photo from wanted_criminals ";
                $query = mysqli_query($conn, $selectquery);
                while($res = mysqli_fetch_array($query)) {
        ?>
                    <tr>
                        <td><img src="<?php echo  $res['criminal_photo']; ?>" width="200" height="250" align="left">
                            <p>                                    
                                <b>Name         :</b>   <?php echo  $res['Name']; ?><br>
                                <b>Age          :</b>   <?php echo  $res['Age']; ?><br>
                                <b>Religion     :</b>   <?php echo  $res['Religion']; ?><br>
                                <b>Crimes       :</b>   <?php echo  $res['Crimes']; ?><br>                                    
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