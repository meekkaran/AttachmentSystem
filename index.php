<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  </head>
  <body>

    <section>
      <input type="checkbox" id="check">
      <header>
        </div>
        <h2><a href="#" class="logo">STUDENT ATTACHEMENT</a></h2>
        <div class="navigation">
          <a href="#">Home</a>
          <a href="#">About</a>
          <a href="#">Info</a>
          <a href="#">Contact</a>
          <a href="#">Services</a>
          <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn">Portal</button>
          <div id="myDropdown" class="dropdown-content">
          <a href="students/login.php">Student</a>
          <a href="supervisor/login.php">Supervisor</a>
          <!-- <a href="trainers/index.php">Trainer</a> -->
          <a href="admin/login.php">Admin</a>
          </div>
          </div>
        </div>
        <label for="check">
        <i class="fas fa-bars menu-btn"></i>
        <i class="fas fa-times close-btn"></i>
        </label>
      </header>
      <div class="content">
        <div class="info">
          <h2>Like Nature <br><span>Be Creative!</span></h2>
          <p>Experirnce is the mother of invention, Catholic University of Eastern Africa participates in the empowering of young undergraduates to secure skills through various industries.</p>
          <a href="#" class="info-btn">More info</a>
        </div>
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </section>

    
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

  </body>
</html>
