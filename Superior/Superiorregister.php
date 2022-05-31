<?php include('Superiorserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Superior Registration</title>
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

</style>
</head>
<body>
<div class="navbar">
  <ul>
  <a href="../Index.php">Home</a>
  <a href="Superiorlogin.php">Login</a>

  </ul>
   </div>


  <div class="header">
  	<h2>Register</h2>
  </div>
  <form method="post" action="Superiorregister.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>EmployeeID</label>
  	  <input type="text" name="username" required />
  	</div>
	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" required onkeypress="return /[a-z]/i.test(event.key)"/>
  	</div>
	
		<div class="input-group">
  	  <label>Department</label>
	  <br></br>
  	<select name="Department" required>	
<option value="">--</option>
<?php
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");
$result=mysqli_query($conn,"SELECT * FROM Department");
if ($result->num_rows > 0) {
while($rowww = $result->fetch_assoc()) {?>
<option value="<?php echo $rowww['Department'];?>"><?php echo $rowww['Department'];?></option>
<?php				
}
}
?>
</select>
	</div>
	
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" id="password" pattern=".{8,12}" title="8 - 12 Character include [!@#$%^&*][a-z][A-Z][0-9]" size=30 pattern="[!@#$%^&*][a-z][A-Z][0-9]" required />
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2" id="password" pattern=".{8,12}" title="8 - 12 Character include [!@#$%^&*][a-z][A-Z][0-9]" size=30 pattern="[!@#$%^&*][a-z][A-Z][0-9]" required />
  	</div>
	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" required />
  	</div>
	<div class="input-group">
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" onClick="validatePasswords()" name="reg_user">Register</button>  
  	</div>
  </form>
<script>
function validatePasswords(){
    
   var InputValue = $("#password").val();
  var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    $("#passwordText").text(`Password value:- ${InputValue}`);
    
    if(!regex.test(InputValue)) {
         $("#error").text("Invalid Password");
    }
    else{
          $("#error").text("");
    }
}
</script>  
</body>
</html>