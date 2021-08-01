<html>
    <head>
        <title>contact</title>
        <style> 
            * {
                margin:0;
                padding:0;
                box-sizing: border-box;
                font-family: 'Poppins',sans-serif;
            }
            .contact {
                position: relative;
                min-height: 100vh;
                padding: 50px 100px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("images/city.jpg");
                background-size: cover;
                
            }
            .contact .content {
                max-width: 800px;
                text-align: center;
            }
            .contact .content h2 {
                font-size: 36px;
                font-weight: 500;
                color: #fff;
            }
            .contact .content p {
                font-weight: 300;
                color: #fff;
            }
            .container {
                width:100%;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 30px;
            }
            .contactForm {
                width:500px;                
                padding:30px;
                background: #fff;
            }
            .contactForm h2 {
                font-size: 30px;
                color: #333;
                font-weight: 500;
            }
            .contactForm .inputBox {
                position: relative;
                width: 100%;
                margin-top: 10px;
            }
            .contactForm .inputBox input, textarea {
                width: 100%;
                padding: 5px 0;
                font-size: 16px;
                margin: 10px 0;
                border:none;
                border-bottom: 2px solid #333;
                outline: none;
                resize: none;
            }
            .contactForm .inputBox span {
                position: absolute;
                left:0;
                padding: 5px 0;
                font-size: 16px;
                margin: 10px 0;
                pointer-events: none;
                transition: 0.5s;
                color: #666;
            }
            .contactForm .inputBox input:focus ~ span {
                color: #e91e63;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .contactForm .inputBox input:valid ~ span {
                color: #e91e63;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .contactForm .inputBox textarea:focus ~ span {
                color: #e91e63;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .contactForm .inputBox textarea:valid ~ span {
                color: #e91e63;
                font-size: 12px;
                transform:translateY(-20px) ;
            }
            .contactForm .inputBox input[type="submit"] {
                width: 100px;
                background: #00bcd4;
                color: #fff;
                border: none;
                cursor: pointer;
                padding: 10px;
                font-size: 18px;
            }
            .cancelbtn {
                width: 100px;
                background: #ec4d04;
                color: #fff;
                border: none;
                cursor: pointer;
                padding: 10px;
                font-size: 18px;
            }
        </style>
    </head>
    <body>        
        <section class="contact">
            <div class="content">   
                <h2>CONTACT US</h2>
            </div>
            <div class="container">
                <div class="contactForm">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
                        <h2>Send Message</h2>
                        <div class="inputBox">
                            <input type="text" name="Name" required="required">
                            <span>Full Name</span>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="Email" required="required">
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <textarea name="Message" required="required"></textarea>
                            <span>Type Your Message...</span>
                        </div>
                        <div class="inputBox">
                            <a  href="Home1.php"> <button type="button" class="cancelbtn" name="cancel">Cancel</button></a>
                            <input type="submit" name="send" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>

<?php
    include "Action/connection.php";
    if(isset($_POST['send']))  
    {  
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Message = $_POST['Message'];

        $insertquery=" insert into contact_us(Name, Email, Message) values('$Name','$Email','$Message') ";

        $res=mysqli_query($conn,$insertquery);

        if($res)
        {
            ?>
            <script>
                alert("Message Sent");
            </script>
            <?php
            ?>
            <script>
              location.replace("Home1.php");
            </script>        
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Error");
            </script>
            <?php
        }
    }
?>
