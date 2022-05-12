<!DOCTYPE html>
<html>
<title>Competency</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {margin:0;}

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
<body bgcolor="#E6E6FA">

<div class="navbar">
  <ul>
  <a href="Index.php">Home</a>
  <a href="../Leadership/User/Userlogin.php">User</a>
  <a href="../Leadership/Superior/Superiorlogin.php">Superior</a>
  <a href="../Leadership/Manage/Adminlogin.php">Admin</a>
  </ul>
   </div>
   <br>
   <br>
   <br>
   <br>
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width:100%;
  position: relative;
  margin:auto;
}

/* The dots/bullets/indicators */
.dot {
  height:15px;
  width:15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width:100px) {
  .text {font-size: 11px}
}
</style>

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="Image/bgPic.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <img src="Image/bgPic1.jpg" style="width:100%">
 
</div>

<div class="mySlides fade">

  <img src="Image/bgPic2.jpg" style="width:100%">
 
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>  
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
  
</html> 
