<?php
$positionCode = $_GET['positionCode'];
$positionDesc = $_GET['positionDesc'];
?>

        <div class="delete">

        <p>Are you sure you want to delete the record of <b><?php echo $positionDesc . ' (' . $positionCode . ')'; ?></b>?</p>
        <a href="positionDeletion.php?positionCode=<?php echo $positionCode; ?>"><button class="btn delete-btn">Delete</button></a>
        <a href="main.php"><button class="btn cancel-btn">Cancel</button></a>
    </div>
