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
        <title>Profile</title>
        <style>
            * {
                margin:0;
                padding:0;
                box-sizing: border-box;
                font-family: 'Poppins',sans-serif;
            }
            .modal {
                position: relative;
                min-height: 100vh;
                padding: 50px 100px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("../images/digital.png");
                background-size: cover;                
            }
            .modal .content {
                max-width: 800px;
                text-align: center;
            }
            .container {
                width:100%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 30px;
            }
            .container .modalInfo {
                width: 500px;
                display: flex;
                flex-direction: column;    
            }
            .container .modalInfo .box {
                position: relative;
                padding: 20px 0;
                display: flex;
            }

            .text {
                border: 1px solid;
                background-color:black;
                display: flex;
                margin-left: 20px;
                font-size: 16px;
                color: #fff;
                flex-direction: column;
                font-weight: 300;

            }
            p{
                padding:5px;
            }
            b{
                font-weight: 1000;
                color: #00bcd4;
            }
            .updateForm {
                width:500px;
                padding:30px;
                background:black;
            }
            .updateForm h2 {
                font-size: 30px;
                color: #ddd;
                font-weight: 500;
            }
            .updateForm .inputBox {
                position: relative;
                width: 100%;
                margin-top: 10px;
            }
            .updateForm .inputBox input {
                width: 100%;
                padding: 5px 0;
                font-size: 16px;
                margin: 10px 0;
                border:none;
                border-bottom: 2px solid #ddd;
                background:black;
                color:#fff;
                outline: none;
                resize: none;
            }
            .updateForm .inputBox span {
                position: absolute;
                left:0;
                padding: 5px 0;
                font-size: 16px;
                margin: 10px 0;
                pointer-events: none;
                transition: 0.5s;
                color: #666;
            }
            .updateForm .inputBox input:focus ~ span {
                color: #e91e63;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .updateForm .inputBox input:valid ~ span {
                color: green;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .updateForm .inputBox textarea:focus ~ span {
                color: #e91e63;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .updateForm .inputBox textarea:valid ~ span {
                color: green;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .updateForm .inputBox input[type="submit"] {
                width: 100px;
                background: #00bcd4;
                color: #fff;
                border: none;
                cursor: pointer;
                padding: 10px;
                font-size: 18px;
            }
        </style>
    </head>
<body>
    <section class="modal">
        <div class="container">
            <div class="modalInfo">
                <div class="box">                        
                    <div class="text">
                        <?php 
                            include "../Action/connection.php"; 
                            $email=$_SESSION['Mail'];
                            $selectquery1=" select * from user_register where Mail='$email' "; 
                            $query1 = mysqli_query($conn, $selectquery1);
                            while($res = mysqli_fetch_array($query1))
                            {
                        ?>
                                <p><b>AadharNo : </b><?php echo  $res['AadharNo']; ?></p>
                                <p><b>First Name : </b><?php echo  $res['FName']; ?></p>
                                <p><b>Last Name : </b><?php echo  $res['LName']; ?></p>  
                                <p><b>Mail Id : </b><?php echo  $res['Mail']; ?></p>    
                                <p><b>PhNo : </b><?php echo  $res['PhNo']; ?></p>    
                                <p><b>Area : </b><?php echo  $res['Area']; ?></p>    
                                <p><b>city : </b><?php echo  $res['city']; ?></p>        
                                <p><b>District : </b><?php echo  $res['District']; ?></p>        
                                <p><b>Pincode : </b><?php echo  $res['Pincode']; ?></p>    
                        <?php
                            }
                        ?>
                    </div>
                </div>                    
            </div>
            <form class="updateForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
                <h2>Update Password</h2>
                <div class="inputBox">
                    <input type="password"  name="cuurent_psw" required>
                    <span>Current Password</span>
                </div>
                <div class="inputBox">
                    <input type="password"  name="new_psw" required>
                    <span>New Password</span>
                </div> 
                <div class="inputBox">
                    <input type="password"  name="con_psw" required>
                    <span>Confirm Password</span>
                </div>                
                <div class="inputBox">
                    <input type="submit" name="submit" value="UPDATE">
                </div>
            </form>            
        </div>
        <h3 style="color:#ec4d04;" >If you want to edit your details then send your queries through "Contact Us" page which avilable at Home page of this website</h3>
    </section>
</body>
</html>

<?php 
    
    $email=$_SESSION['Mail'];
    $selectquery=" select * from user_register where Mail='$email' "; 
    $query = mysqli_query($conn, $selectquery);
    $row=mysqli_fetch_array( $query);
    $psw=$row['psw'];
    // echo $psw;

    if(isset($_POST['submit']))
    {  
        $cuurent_psw = $_POST['cuurent_psw'];
        $new_psw = $_POST['new_psw'];
        $con_psw = $_POST['con_psw'];
        if($psw===$cuurent_psw)
        {
            if($new_psw === $con_psw)
            {
                $update = "update user_register set psw='$new_psw' where  Mail='$email' ";
                $update_result=mysqli_query($conn,$update);
                if($update_result)
                {
                    ?>
                    <script>
                        alert("Password Updated Successful");
                    </script>
                    <?php
                    if($row["user_type"]=="user"){
                        ?>
                        <script>
                            location.replace("User.php");
                        </script>        
                        <?php
                    }
                    if($row["user_type"]=="admin"){
                        ?>
                        <script>
                            location.replace("../Admin/admin.php");
                        </script>        
                        <?php
                    }                    
                }
            } 
            else
            {
                ?>
                <script>
                    alert("Password Missmatching");
                </script>
                <script>
                    location.replace("user_profile.php");
                </script>
                <?php
            }
        }
        else 
        {
            ?>
            <script>
                alert("Wrong Password");
            </script>
            <script>
                location.replace("user_profile.php");
            </script>
            <?php
        }
    }                        
    ?>