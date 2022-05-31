<?php include('Adminserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title> 
  <style>
   {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
label {
    float:left;
    margin: 5px 0px;
}

input {
    
    margin: 5px 0px;
    width: 200px;
   
}

.clear {
    clear: both;
}

.navbar {
  overflow: hidden;
  background-color:#ffffb3;
  position: fixed;
  top:0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #002080;
  text-align:medium;
  padding: 18px 20px;
  text-decoration: none;
  font-size: 20px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
</head>
<body>

<div class="navbar">
  <ul>
  <a href="../Index.php">Home</a>
  <a href="Adminlogin.php">Admin</a>
  </ul>
   </div>


  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="Adminlogin.php">
   	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>EmplyoeeID</label>
  		<input type="text" name="username" required >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" required>
  	</div>
	
<label class="container">Superadmin
  <input type="radio" name="Role" value="Superadmin" required>
  <span class="checkmark"></span>
</label>
<br></br>	
<label class="container">Admin
  <input type="radio" name="Role" value="Admin" required>
  <span class="checkmark"></span>
</label>
<br></br>	
	
	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  </form>
</body>
</html>


