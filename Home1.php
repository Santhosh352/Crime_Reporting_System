<!DOCTYPE html>
<html>
<head>
    <title>CRMS</title>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		body{
			font-family: 'Poppins', sans-serif;
		}
		header{
			background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url("images/1.jpeg");
			height: 100vh;
			-webkit-background-size: cover;
			background-size: cover;
			background-position: center center;
			position: relative;
		}
		.wrapper{
			width: 1170px;
			margin: auto;
		}
		.nav-area {
			float: right;
			list-style: none;
			margin-top: 30px;
		}
		.nav-area li {
			display: inline-block;
		}
		.nav-area li a {
			color: #fff;
			text-decoration: none;
			padding: 5px 20px;
			font-family: poppins;
			font-size: 16px;
			text-transform: uppercase;
		}
		.nav-area li a:hover {
			background: #fff;
			color: #333;
		}
		.titlename {
			position: absolute;
			width: 800px;
			height: 300px;
			margin: 10% 25%;
			text-align: start;
		}
		.titlename h1 {
			text-align: start;
			color: #fff;
			text-transform: uppercase;
			font-size: 55px;
		}
		.welcome-text {
			position: absolute;
			width: 600px;
			height: 300px;
			margin: 18% 30%;
			text-align: center;
		}
		.welcome-text h1 {
			text-align: center;
			color: #fff;
			text-transform: uppercase;
			font-size: 40px;
		}
		.welcome-text h1 span {
			color: #00fecb;
		}
		.welcome-text a {
			border: 1px solid #fff;
			padding: 10px 25px;
			text-decoration: none;
			text-transform: uppercase;
			font-size: 14px;
			margin-top: 20px;
			display: inline-block;
			color: #fff;
		}
		.welcome-text a:hover {
			background: #fff;
			color: #333;
		}
	</style>
</head>
<body>
    <header>
    <div class="wrapper">        
		<ul class="nav-area">
			<li><a href="#">Home</a></li>
			<li><a href="signin.php">Sign In</a></li>
			<li><a href="signup.php">Sign Up</a></li>			
		</ul>
	</div>
	<div class="titlename">
    	<h1>CRIME REPORTING SYSTEM</h1>
	</div>
	<div class="welcome-text">
		<h1><span> We are Here for You</span></h1>
		<a href="contact.php">Contact US</a>
	</div>
	</header>
</body>
</html>