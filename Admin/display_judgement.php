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
        <title>JUDGEMENT</title>
        <?php include "../Action/links.php" ?>
        <link rel = "stylesheet" type="text/css" href = "../Action/display.css">
        <style>
            body {
                background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../images/jr_2.jpg");
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
    <u><h1 style="color:navy;  background: linear-gradient(to right, #00AAFF, #00FF6C);">JUDGEMENT REPORT</h1></u>
    <div class="center-div">
        <div class="table-responsive">
<?php
        include "../Action/connection.php";
        if(isset($_POST['submit'])){
            $user=$_POST['user_name'];
            $selectquery1 = " select * from judgement_report where (jr_no like '$user') OR (fir_no like '$user') OR (case_type like '$user%') OR (court_type like '$user%') OR (judgement_date like '$user')  ";
            $query1 = mysqli_query($conn, $selectquery1);
?>
            <table>
                <thead>
                    <tr>
                        <th>JUDGEMENT REPORT NO</th>
                        <th>FIR NO</th>
                        <th>Case Type</th>
                        <th>Court</th>
                        <th>JUDGEMENT Date</th>
                        <th>JUDGEMENT</th>
                        <th colspan="2">operation</th>                     
                    </tr>
                </thead>
                <tbody>
<?php
            while($row = mysqli_fetch_array($query1)) {
?>
                <tr>
                    <td><?php echo  $row['jr_no']; ?></td>                               
                    <td><?php echo  $row['fir_no']; ?></td>
                    <td><?php echo  $row['case_type']; ?></td>
                    <td><?php echo  $row['court_type']; ?></td>
                    <td><?php echo  $row['judgement_date']; ?></td>
                    <td><?php echo  $row['judgement']; ?></td>  
                    <td><a href="process_judgement.php?edit=<?php echo  $row['jr_no']; ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                    <td><a href="process_judgement.php?delete=<?php echo  $row['jr_no']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></td>                                                         
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
                    <th colspan="2">operation</th>                   
                </tr>
            </thead>
            <tbody>
<?php                                   
            $selectquery = " select * from judgement_report ";
            $query = mysqli_query($conn, $selectquery);
            while($res = mysqli_fetch_array($query))  {
?>
                <tr>
                    <td><?php echo  $res['jr_no']; ?></td>                               
                    <td><?php echo  $res['fir_no']; ?></td>
                    <td><?php echo  $res['case_type']; ?></td>
                    <td><?php echo  $res['court_type']; ?></td>
                    <td><?php echo  $res['judgement_date']; ?></td>
                    <td><?php echo  $res['judgement']; ?></td>
                    <td><a href="process_judgement.php?edit=<?php echo  $res['jr_no']; ?>"> <i class="fa fa-edit" aria-hidden="true"></i></a></td>
                    <td><a href="process_judgement.php?delete=<?php echo  $res['jr_no']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></td>                       
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
