<?php
$eventCode = $_GET['eventCode'];
$eventDesc = $_GET['eventDesc'];
?>

        <div class="delete">
        <p>Are you sure you want to delete the record of <b><?php echo $eventDesc . ' (' . $eventCode . ')'; ?></b>?</p>
        <a href="eventDeletion.php?eventCode=<?php echo $eventCode; ?>"><button class="btn delete-btn">Delete</button></a>
        <a href="main.php"><button class="btn cancel-btn">Cancel</button></a>
    </div>

