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
        <title>CRIMINALS</title>
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
            <a  href="admin.php"> <button type="button" name="back"><<<</button>  </a> 
        </form>
    </div>
    <div class="right">
         <form  method="POST">
            <input type="text" name="user_name" id="searchBar" placeholder="Search..." maxlength="100" ><input type="submit" id="searchBtn" name="submit" value="SEARCH"/>
         </form>
    </div>   
    <u><h1 style="color:navy;  background: linear-gradient(to right, #00AAFF, #00FF6C);">WANTED CRIMINAL DETAILS</h1></u>
    <div class="center-div">
        <div class="table-responsive">        
        <?php
            include "../Action/connection.php";
            if(isset($_POST['submit'])) {
                $user=$_POST['user_name'];
                $selectquery1 = " select Criminal_id, FName, LName, Age, Religion, Crimes, criminal_photo from wanted_criminals where (FName like '$user%') OR (Criminal_Id like '$user') OR (LName like '$user%') OR (Age like '$user%') OR (Religion like '$user%') ";
                $query1 = mysqli_query($conn, $selectquery1);
        ?>
                <table>
                    <thead>
                        <tr>
                            <th>Criminal Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Religion</th>
                            <th>Crimes</th>
                            <th>Criminal Photo</th>  
                            <th colspan="2">operation</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php
                    while($row = mysqli_fetch_array($query1)) {
        ?>
                        <tr>
                            <td><?php echo  $row['Criminal_id']; ?></td>
                            <td><?php echo  $row['FName']; ?></td>
                            <td><?php echo  $row['LName']; ?></td>
                            <td><?php echo  $row['Age']; ?></td>
                            <td><?php echo  $row['Religion']; ?></td>
                            <td><?php echo  $row['Crimes']; ?></td>
                            <td><img src="<?php echo  $row['criminal_photo']; ?>" width="150" height="150"></td>
                            <td><a href="process_criminals.php?edit=<?php echo  $row['Criminal_id']; ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a href="process_criminals.php?delete=<?php echo  $row['Criminal_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></td>                
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
                        <th>Criminal Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Religion</th>
                        <th>Crimes</th>
                        <th>Criminal Photo</th> 
                        <th colspan="2">operation</th>                   
                    </tr>
                </thead>
                <tbody>
        <?php
                    $selectquery = "select * from wanted_criminals";
                    $query = mysqli_query($conn, $selectquery);
                    while($res = mysqli_fetch_array($query)) {
        ?>
                        <tr>
                            <td><?php echo  $res['Criminal_id']; ?></td>
                            <td><?php echo  $res['FName']; ?></td>
                            <td><?php echo  $res['LName']; ?></td>
                            <td><?php echo  $res['Age']; ?></td>
                            <td><?php echo  $res['Religion']; ?></td>
                            <td><?php echo  $res['Crimes']; ?></td> 
                            <td><img src="<?php echo  $res['criminal_photo']; ?>" width="150" height="150"></td>
                            <td><a href="process_criminals.php?edit=<?php echo  $res['Criminal_id']; ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                            <td><a href="process_criminals.php?delete=<?php echo  $res['Criminal_id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></td>                                             
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
