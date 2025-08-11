<?php
include_once "dbconnection.php";
$playerPerPosition = "SELECT position as positionCode, COUNT(*) as players FROM account GROUP BY position";
$playerPerCollege = "SELECT college as collegeCode, COUNT(*) as players FROM account GROUP BY college";
$playerPerSCUFAR3 = "SELECT opposing_team as opponent, COUNT(*) as players FROM score WHERE eventCode = 'SCUFAR3 2024' GROUP BY opposing_team";
$playerPerASCU = "SELECT opposing_team as opponent, COUNT(*) as players FROM score WHERE eventCode = 'ASCU-SN 2024' GROUP BY opposing_team";
$scuStats = "SELECT opposing_team, SUM(attack) as attacks, SUM(block) as blocks, SUM(ace) as aces FROM score WHERE eventCode = 'SCUFAR3 2024' GROUP BY opposing_team";
$ascuStats = "SELECT opposing_team, SUM(attack) as attacks, SUM(block) as blocks, SUM(ace) as aces FROM score WHERE eventCode = 'ASCU-SN 2024' GROUP BY opposing_team";

$registeredPlayers = "SELECT COUNT(*) as players FROM account";
$registeredColleges = "SELECT COUNT(*) as colleges FROM college";
$registeredEvents = "SELECT COUNT(DISTINCT eventCode) as events FROM score";
$registeredGames = "SELECT COUNT(DISTINCT opposing_team) as games FROM score";

  $resultPlayers = $conn->query($registeredPlayers);
  if ($resultPlayers->num_rows > 0) {
    while($row = $resultPlayers->fetch_assoc()) {
      $players = $row['players'];
    }
  } else {
    echo "No data";
  }

  $resultCollege = $conn->query($registeredColleges);
  if ($resultCollege->num_rows > 0) {
    while($row = $resultCollege->fetch_assoc()) {
      $NoColleges = $row['colleges'];
    }
  } else {
    echo "No data";
  }

  $resultEvent = $conn->query($registeredEvents);
  if ($resultEvent->num_rows > 0) {
    while($row = $resultEvent->fetch_assoc()) {
      $events = $row['events'];
    }
  } else {
    echo "No data";
  }

  $resultGame = $conn->query($registeredGames);
  if ($resultGame->num_rows > 0) {
    while($row = $resultGame->fetch_assoc()) {
      $games = $row['games'];
    }
  } else {
    echo "No data";
  }


$positions = $conn->query($playerPerPosition);
$colleges = $conn->query($playerPerCollege);
$scuOpponents = $conn->query($playerPerSCUFAR3);
$ascuOpponents = $conn->query($playerPerASCU);
$ascuStats = $conn->query($ascuStats);
$scuStats = $conn->query($scuStats);

if ($positions->num_rows > 0) {
  while($row = $positions->fetch_assoc()) {
    $positionCode[] = $row['positionCode'];
    $positionPlayers[] = $row['players'];
  }
} else {
  echo "No data";
}

if ($colleges->num_rows > 0) {
  while($row = $colleges->fetch_assoc()) {
    $collegeCode[] = $row['collegeCode'];
    $collegePlayers[] = $row['players'];
  }
} else {
  echo "No data";
}

if ($scuOpponents->num_rows > 0) {
  while($row = $scuOpponents->fetch_assoc()) {
    $scuPlayers[] = $row['players'];
    $scuOpponent[] = $row['opponent'];
  }
} else {
  echo "No data";
}

if ($ascuOpponents->num_rows > 0) {
  while($row = $ascuOpponents->fetch_assoc()) {
    $ascuPlayers[] = $row['players'];
    $ascuOpponent[] = $row['opponent'];
  }
} else {
  echo "No data";
}

if ($ascuStats->num_rows > 0) {
  while($row = $ascuStats->fetch_assoc()) {
    $ascuAttacks[] = $row['attacks'];
    $ascuBlocks[] = $row['blocks'];
    $ascuAces[] = $row['aces'];
    $ascuStatOpponent[] = $row['opposing_team'];
    
  }
} else {
  echo "No data";
}

if ($scuStats->num_rows > 0) {
  while($row = $scuStats->fetch_assoc()) {
    $scuAttacks[] = $row['attacks'];
    $scuBlocks[] = $row['blocks'];
    $scuAces[] = $row['aces'];
    $scuStatOpponent[] = $row['opposing_team'];
    
  }
} else {
  echo "No data";
}


$positionLabels = json_encode($positionCode);
$positionData = json_encode($positionPlayers); 

$collegeLabels = json_encode($collegeCode);
$collegeData = json_encode($collegePlayers);

$scuOppLabels = json_encode($scuOpponent);
$scuOppData = json_encode($scuPlayers);

$ascuOppLabels = json_encode($ascuOpponent);
$ascuOppData = json_encode($ascuPlayers);

$ascuStatsLabels = json_encode($scuStatOpponent);
$ascuStatsAttack = json_encode($scuAttacks);
$ascuStatsBlock = json_encode($scuBlocks);
$ascuStatsAces = json_encode($scuAces);

$scuStatsLabels = json_encode($scuStatOpponent);
$scuStatsAttack = json_encode($scuAttacks);
$scuStatsBlock = json_encode($scuBlocks);
$scuStatsAces = json_encode($scuAces);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="dashboardStyles.css">
</head>

<body>
  <div id="login-container">
    <h2>Login</h2>
    <form id="loginForm">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>
      <button type="submit">Log In</button>
    </form>
  </div>
  <div id="sidenav">
    <h2>Navigation</h2>
    <div><a href="main.php">Accounts</a></div>
    <div><a href="mainCollege.php">Colleges</a></div>
    <div><a href="mainPosition.php">Positions</a></div>
    <div><a href="mainEvent.php">Events</a></div>
    <div><a href="dashboard.php">Dashboard</a></div>
  </div>

  <div id="cards">
    <div class="card-players">
      <h4>No. of Registered Players</h4>
      <p id="players"><?php echo $players; ?></p>
    </div>
    <div class="card-colleges">
      <h4>No. of Colleges/Offices</h4>
      <p id="colleges"><?php echo $NoColleges; ?></p>
    </div>
    <div class="card-events">
      <h4>No. of Registered Events</h4>
      <p id="events"><?php echo $events; ?></p>
    </div>
    <div class="card-games">
      <h4>No. of Games Played</h4>
      <p id="games"><?php echo $games; ?></p>
    </div>
  </div>

  <div id="dashboard">
    <h2>Dashboard</h2>
    <p><span id="admin-name"></span></p>
    <div class="chart-grid">
      <div class="chart-card">
        <h3>Players per Position</h3><canvas id="chartPositions"></canvas>
      </div>
      <div class="chart-card">
        <h3>Players per College</h3><canvas id="chartColleges"></canvas>
      </div>
      <div class="chart-card">
        <h3>Players in SCUFAR3 2024 by Opponent</h3><canvas id="chartSCUOpponents"></canvas>
      </div>
      <div class="chart-card">
        <h3>Players in ASCU-SN 2024 by Opponent</h3><canvas id="chartASCUOpponents"></canvas>
      </div>
      <div class="chart-card">
        <h3>Attacks/Blocks/Aces in SCUFAR3 2024</h3><canvas id="chartSCUStats"></canvas>
      </div>
      <div class="chart-card">
        <h3>Attacks/Blocks/Aces in ASCU-SN 2024</h3><canvas id="chartASCUStats"></canvas>
      </div>
    </div>
  </div>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const validUser = 'admin',
        validPass = 'admin123';
      // Check sessionStorage to persist login across pages
      if (sessionStorage.getItem('loggedIn') === 'true') {
        showApp();
      }

      document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const u = document.getElementById('username').value.trim();
        const p = document.getElementById('password').value.trim();
        if (!u || !p) return alert('Please enter both username and password.');
        if (u === validUser && p === validPass) {
          sessionStorage.setItem('loggedIn', 'true');
          sessionStorage.setItem('adminUser', u);
          showApp();
        } else alert('Invalid username or password.');
      });

      function showApp() {
        document.getElementById('login-container').style.display = 'none';
        document.getElementById('sidenav').style.display = 'flex';
        document.getElementById('cards').style.display = 'flex';
        document.getElementById('dashboard').style.display = 'block';
        document.getElementById('admin-name').textContent = sessionStorage.getItem('adminUser');
        loadDataAndRender();
      }

      function loadDataAndRender() {
        // Sample data (replace with database call if needed)
        const posData = {
          labels: <?= $positionLabels?>,
          data: <?= $positionData?>
        };
        const colData = {
          labels: <?= $collegeLabels?>,
          data: <?= $collegeData?>
        };
        const scuOpp = {
          labels: <?= $scuOppLabels?>,
          data: <?= $scuOppData?>
        };
        const ascuOpp = {
          labels: <?= $ascuOppLabels?>,
          data: <?= $ascuOppData?>
        };
        const scuStats = {
          labels: <?= $scuStatsLabels?>,
          attacks: <?= $scuStatsAttack?>,
          blocks: <?= $scuStatsBlock?>,
          aces: <?= $scuStatsAces?>
        };
        const ascuStats = {
          labels: <?= $ascuStatsLabels?>,
          attacks: <?= $ascuStatsAttack?>,
          blocks: <?= $ascuStatsBlock?>,
          aces: <?= $ascuStatsAces?>
        };

        function lineChart(ctxId, labels, data, label) {
          new Chart(document.getElementById(ctxId).getContext('2d'), {
            type: 'line',
            data: {
              labels,
              datasets: [{
                label,
                data,
                borderColor:'rgba(196, 52, 52, 0.1)',
                backgroundColor: 'rgba(196, 52, 52, 0.1)',
                tension: 0,
                fill: true
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  display: false
                }
              }
            }
          });
        }

        function barChart(ctxId, labels, data) {
          new Chart(document.getElementById(ctxId).getContext('2d'), {
            type: 'bar',
            data: {
              labels,
              datasets: [{
                label: 'Players',
                data,
                backgroundColor: 'rgba(196, 52, 52, 0.1)',
                borderColor: 'rgba(0,156,148,1)',
                borderWidth: 1
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  display: false
                }
              },
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        }

        function stackedBar(ctxId, labels, attacks, blocks, aces) {
          new Chart(document.getElementById(ctxId).getContext('2d'), {
            type: 'bar',
            data: {
              labels,
              datasets: [{
                  label: 'Attacks',
                  data: attacks,
                  backgroundColor: 'rgba(196, 52, 52, 0.1)'
                },
                {
                  label: 'Blocks',
                  data: blocks,
                  backgroundColor: 'rgba(77,182,172,0.7)'
                },
                {
                  label: 'Aces',
                  data: aces,
                  backgroundColor: 'rgba(255,152,0,0.7)'
                }
              ]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  position: 'bottom',
                  labels: {
                    usePointStyle: true
                  }
                }
              },
              scales: {
                x: {
                  stacked: false
                },
                y: {
                  stacked: false,
                  beginAtZero: true
                }
              }
            }
          });
        }

        // Render charts
        lineChart('chartPositions', posData.labels, posData.data, 'Players');
        barChart('chartColleges', colData.labels, colData.data, 'Players');
        barChart('chartSCUOpponents', scuOpp.labels, scuOpp.data);
        barChart('chartASCUOpponents', ascuOpp.labels, ascuOpp.data);
        stackedBar('chartSCUStats', scuStats.labels, scuStats.attacks, scuStats.blocks, scuStats.aces);
        stackedBar('chartASCUStats', ascuStats.labels, ascuStats.attacks, ascuStats.blocks, ascuStats.aces);
      }
    });
  </script>
</body>

</html>