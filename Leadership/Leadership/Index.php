<!DOCTYPE html>
<html>
<title>Leadership Competencies</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Index.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1,h5 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('Image/skills-competence-knowledge-success.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
<body>

<div class="bgimg w3-display-container w3-text-white">
  <div class="w3-display-middle w3-jumbo">
    <p><button onclick="document.getElementById('menu').style.display='block'" class="w3-button w3-black">Leadership Competencies</button></p>
  </div>
</div>

<!-- Menu Modal -->
<div id="menu" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-black w3-display-container">
      <span onclick="document.getElementById('menu').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>User</h1>
    </div>
    <div class="w3-container">
	  <h5><a href="../Leadership/User/Userlogin.php">Login</a></h5>
	  <h5><a href="../Leadership/User/Userregister.php">Register</a></h5>
    </div>
    <div class="w3-container w3-black">
      <h1>Superior</h1>
    </div>
    <div class="w3-container">
	  <h5><a href="../Leadership/Superior/Superiorlogin.php">Login</a></h5>
	  <h5><a href="../Leadership/Superior/Superiorregister.php">Register</a></h5>
    </div>
    <div class="w3-container w3-black">
      <h1>Administration</h1>
    </div>
    <div class="w3-container">
	  <h5><a href="../Leadership/Manage/Adminlogin.php">Login</a></h5>
    </div>
  </div>
</div>
</body>
</html>
