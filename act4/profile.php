<?php include_once "dbconnection.php";?>

    <div id="display">
    <?php
    $opposing_team = [];
    $attacksArr    = [];
    $blocksArr     = [];
    $acesArr       = [];
    // these will show in your “cards” below
    $attacks = 0;
    $blocks  = 0;
    $aces    = 0;

    $playerStats = "SELECT opposing_team, SUM(attack) as attacks, SUM(block) as blocks, SUM(ace) as aces 
    FROM score WHERE username = '".$_GET['username']."' GROUP BY opposing_team ";
    
    $result = $conn->query($playerStats);
    while($playerStats = $result->fetch_assoc()){
    $opposing_team[] = $playerStats['opposing_team'];
    $attacksArr[] = $playerStats['attacks'];
    $blocksArr[] = $playerStats['blocks'];
    $acesArr[] = $playerStats['aces'];
    };

    $playerStats = "SELECT SUM(attack) as attacks, SUM(block) as blocks, SUM(ace) as aces 
    FROM score WHERE username = '".$_GET['username']."'";
    
    $result = $conn->query($playerStats);
    while($playerStats = $result->fetch_assoc()){
    $attacks = $playerStats['attacks'];
    $blocks = $playerStats['blocks'];
    $aces = $playerStats['aces'];
    };

    $query = "SELECT a.profilePicture, a.firstname, a.lastname, c.collegeDescription, c.collegeCode, a.jerseyNo, p.positionDescription, p.positionCode
        FROM account as a, college as c, position as p
        WHERE a.position = p.positionCode
        AND a.college = c.collegeCode
        AND a.username = '".$_GET['username']."'";

    $result = $conn->query($query);

        $row = $result->fetch_assoc();
        $profilePicture = $row['profilePicture'];
        $first_name = $row['firstname'];
        $last_name = $row['lastname'];
        $colOffDesc = $row['collegeDescription'];
        $colOffCode = $row['collegeCode'];
        $jerseyNo = $row['jerseyNo'];
        $posDesc = $row['positionDescription'];
        $posCode = $row['positionCode'];
    
        echo "
        <img src='images/$profilePicture' alt='Profile Picture' width='200' height='200'><br>
        <strong class='name'>$first_name $last_name</strong> <br>
        <strong class='office'>$colOffDesc</strong> (<span class='office-code'>$colOffCode</span>)<br>
        <br>
        <strong class='jersey'>JerseyNo: </strong><br>
        <span class='jersey-no'>$jerseyNo</span><br>
        <strong class='position'>Position:</strong><br>
        <span class='position-desc'>$posDesc</span>(<span class='position-code'>$posCode)</span>
        ";
    ?>
    

  <div class="chart-card">
  <h3>Attacks / Blocks / Aces</h3>
  <canvas id="chartASCUStats"
    data-labels='<?= json_encode($opposing_team) ?>'
    data-attacks='<?= json_encode($attacksArr)    ?>'
    data-blocks='<?= json_encode($blocksArr)     ?>'
    data-aces='<?= json_encode($acesArr)         ?>'
  ></canvas>
    
</div>

  <div class="profile-stats">
    <div class="card-attacks">
      <h4>Attacks:</h4>
      <p id="Attacks"><?php echo $attacks; ?></p>
    </div>
    <div class="card-blocks">
      <h4>Blocks:</h4>
      <p id="Blocks"><?php echo $blocks; ?></p>
    </div>
    <div class="card-aces">
      <h4>Aces:</h4>
      <p id="Aces"><?php echo $aces; ?></p>
    </div>
  </div>
    </div>

