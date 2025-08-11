<?php
$collegeCode = $_GET['collegeCode'];
$collegeDesc = $_GET['collegeDesc'];
?>
        <div class="delete">
        <p>Are you sure you want to delete the record of <b><?php echo $collegeDesc . ' (' . $collegeCode . ')'; ?></b>?</p>
        <a href="collegeDeletion.php?collegeCode=<?php echo $collegeCode; ?>"><button class="btn delete-btn">Delete</button></a>
        <a href="main.php"><button class="btn cancel-btn">Cancel</button></a>
    </div>

