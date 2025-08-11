<?php
include_once "database_conn.php";

//patawag nlng nung student id from ano, di ko alam pano -------------------------------------------------------------------------------


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="js/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/general.css" />
  <link rel="stylesheet" href="css/studentPage.css" />
  <link rel="stylesheet" href="css/stylesChart.css" />
  <title>Student Fitness Profile System</title>
</head>

<body onload="loadPage()">
  <header>
    <h1>Student Fitness Profile System</h1>
    <div class="user-info">
      <span class="greet-name"></span>
      <form onSubmit="return logout();" method="post" style="display:inline;">
        <button type="submit" class="logout-btn">Logout</button>
      </form>
    </div>
  </header>

  <nav class="sidebar">
    <ul>
      <li class="progress-link" class="active">
        <a href="#">My Progress</a>
      </li>
      <li class="postTest-link"><a href="#">Post-Test Form</a></li>
      <li class="remarksHistory-link"><a href="#">Remarks History</a></li>
      <li class="profile-link"><a href="#">My Profile</a></li>
    </ul>
  </nav>

  <div class="main-content-div"></div>

  <footer>
    <p>Bulacan State University © 2025</p>
  </footer>
  <script src="js/remarksCreation.js"></script>
  <script src="js/script.js"></script>
</body>

</html>