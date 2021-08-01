
<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <?php include "Action/links.php" ?>
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
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("images/digital.png");
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
        <form class="updateForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
          <h2>login</h2>
          <div class="inputBox">
              <input type="text"  name="email" required>
              <span>Email</span>
          </div>
          <div class="inputBox">
              <input type="password" name="password" minlength="5" required>
              <span>Password</span>
          </div>        
          <div class="inputBox">
              <input type="submit" name="submit" value="SignIn">
          </div>
          <p style="color:#fff;font-weight: bold;">No account? <a  href="signup.php"> Create one!</a></p>      
        </form>
    </div>
  </section>
</body>
</html>


<?php 
  include 'Action/connection.php';
  error_reporting(0);
  if(isset($_POST['submit']))
  {
    $email= $_POST['email'];
    $password= $_POST['password'];

    $email_search= " select * from user_register where Mail='$email' AND psw='$password' ";
    $query= mysqli_query($conn,$email_search);
    $row = mysqli_fetch_array($query);

    if($row["user_type"]=="admin")
    {
        $name1 = $row['FName'];  
        $name2 = $row['LName'];      
        $_SESSION['FName'] = $name1;
        $_SESSION['LName'] = $name2;
        $_SESSION['Mail'] =  $email;                
        ?> 
          <script>
            location.replace("Admin/admin.php");
          </script>        
        <?php     
    }
    elseif($row["user_type"]=="user")
    {
        $name1 = $row['FName'];  
        $name2 = $row['LName'];      
        $_SESSION['FName'] = $name1;
        $_SESSION['LName'] = $name2;
        $_SESSION['Mail'] =  $email;                
        ?> 
          <script>
            location.replace("User/User.php");
          </script>        
        <?php     
    }
    else
      {
        ?>
          <script>
            alert("Invalid Email or Password");
          </script>        
         <?php  
      }
  }
?>
