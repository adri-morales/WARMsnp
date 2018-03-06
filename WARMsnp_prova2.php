<?php
session_start();

?>


<!DOCTYPE html>
<html>
<link rel="icon" href="Home_images/flame.png">
<title>WARMsnp</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
}

/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
    background-image: url('images/vendrell.jpg');
    min-height: 100%;
}

/* Second image (Meet the team) */
.bgimg-2 {
    background-image: url('images/white.jpg');
    min-height: 400px;
}

/* Third image (Contact) */
.bgimg-3 {
    background-image: url('images/white.jpg');
    min-height: 400px;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}
/* Three columns side by side */
.column {
    float: left;
    width: 33.3%;
    margin-bottom: 16px;
    padding: 0 8px;
}

/* Display the columns below each other instead of side by side on small screens */
@media (max-width: 650px) {
    .column {
        width: 100%;
        display: block;
    }
}

/* Add some shadows to create a card effect */
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

/* Some left and right padding inside the container */
.container {
    padding: 0 16px;
}

/* Clear floats */
.container::after, .row::after {
    content: "";
    clear: both;
    display: table;
}

.title {
    color: grey;
}

.button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
}

.button:hover {
    background-color: #555;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar navbar navbar-dark bg-dark" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right bg-dark" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="#home" class="w3-bar-item w3-button">
      <img src="Home_images/flame.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      <b>WARMsnp</b>
    </a>
    <a href="WARMsnp_home.php" class="w3-bar-item w3-button"><i class="fa fa-search"></i>SEARCH</a>
     <a href="#meet" class="w3-bar-item w3-button"><i class="fa fa-group"></i>MEET THE TEAM</a>
    <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium">
    <a class="navbar-brand" href="#home">
      <img src="Home_images/flame.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      <b>WARMsnp</b>
    </a>
     <a href="WARMsnp_home.php" class="w3-bar-item w3-button"><i class="fa fa-search"></i>SEARCH</a>
  	<a href="#meet" class="w3-bar-item w3-button" onclick="toggleFunction()"><i class="fa fa-group"></i>MEET THE TEAM</a>
    <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()"><i class="fa fa-envelope"></i>CONTACT</a>
  </div>
</div>

<!-- First Parallax Image with Logo Text -->
<div class="w3-display-container w3-animate-opacity" id="home">
  <img src="images/bcn.jpg" alt="dna" style="width:100%;min-height:350px;max-height:600px;">
 <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity"><span class="w3-hide-small">WARM</span>snp</span>
  </div>
</div>

<div class="w3-display-middle">
<a href="WARMsnp_home.php"><button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" style="font-weight:900;"><i class="fa fa-search"></i>SEARCH PAGE</button></a>
</div>

<header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-file-archive-o"></i> Available Info</b></h3>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-fire w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>>2.5M</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>SNPs</h4>
      </div>
    </div>

<div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-heartbeat w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>1934</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Diseases</h4>
      </div>
    </div>

<div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-bar-chart-o w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3> ~21,000</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Genes</h4>
      </div>
    </div>

<div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-globe w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Databases</h4>
      </div>
    </div>
  </div>

<header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-bar-chart"></i> HIGHLIGHTS</b></h3>
  </header>

<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half">
        <img src="images/Snps_disease2.png" style="width:100%" alt="Top SNPs - Disease ratio">
      </div>


<!-- Container (MEET THE TEAM section) -->
<div class="w3-content w3-container w3-padding-64" id="meet">
  <header class="w3-container" style="padding-top:22px">
    <br><br><br><br>
    <h3><b><i class="fa fa-group"></i> MEET THE TEAM</b></h3>
  </header>

<div class="row">
  <div class="column">
    <div class="card">
      <img src="images/marc.jpeg" alt="Marc" style="width:100%">
      <div class="container">
        <h2>Marc Elosua</h2>
        <p class="title">CEO &amp; Founder</p>
        <p>In love with happy socks</p>
        <p>elosua.marc@gmail.com</p>
        <p><a href="https://www.linkedin.com/in/marc-elosua-bay%C3%A9s-598b49136/" target="__blank__"><button class="button">Contact</button></a></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/adri.jpeg" alt="Adri" style="width:100%">
      <div class="container">
        <h2>Adrian Morales</h2>
        <p class="title">The Brain</p>
        <p>In a relationship with JAVA</p>
        <p>drnmoralespastor@gmail.com</p>
        <p><a href="https://www.linkedin.com/in/adri%C3%A1n-morales-pastor-a8b137125/" target="__blank__"><button class="button">Contact</button></a></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/ramon.jpg" alt="Ramon" style="width:100%">
      <div class="container">
        <h2>Ramon Massoni</h2>
        <p class="title">Specialist in snps</p>
        <p>Beer is life</p>
        <p>ramonmassoni@gmail.com</p>
        <p><a href="https://www.facebook.com/ramon.massonibadosa" target="__blank__"><button class="button">Contact</button></a></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="images/winona.jpg" alt="Wini" style="width:100%">
      <div class="container">
        <h2>Winona Oliveros</h2>
        <p class="title">Designer</p>
        <p>The laziest one</p>
        <p>winn95@gmail.com</p>
        <p><a href="https://www.linkedin.com/in/winonaoliveros31/" target="__blank__"><button class="button">Contact</button></a></p>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Container (Contact Section) -->
<div class="bgimg-3 w3-content w3-container w3-padding-64" id="contact">
  <h3 class="w3-center">WHERE WE WORK</h3>
  <p class="w3-center"><em>We'd love your feedback!</em></p>

  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m4 w3-container">
      <!-- Add Google Maps -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2992.349347991449!2d2.1453708151774182!3d41.40993457926209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2a64a955c29%3A0xea7a0931c59bf9cf!2sAvinguda+de+Vallcarca%2C+56%2C+08023+Barcelona!5e0!3m2!1ses!2ses!4v1517312925694" width="600" height="450" frameborder="0" style="border:0;width:100%;height:400px;" allowfullscreen class="w3-round-large w3-greyscale" ></iframe>
    </div>
    <div class="w3-col m8 w3-panel">
      <div class="w3-large w3-margin-bottom">
        <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Barcelona, CAT<br>
        <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: +34 611291179<br>
        <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: warmsnp@gmail.com<br>
      </div>
      <p>Swing by for a cup of <i class="fa fa-coffee"></i>, or leave us a note:</p>
      <form action="send_mail.php">
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border" type="email" placeholder="Email" required name="Email">
          </div>
        </div>
        <input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
        <button class="w3-button w3-black w3-right w3-section" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</footer>
 
<script>

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-black";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-black", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>