<?php
$username = $_GET['username'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
?>
        <div class="delete">
        <p>Are you sure you want to delete the record of <b><?php echo $firstname . ' ' . $lastname . ' (' . $username . ')'; ?></b>?</p>
        <a href="deleteProcess.php?username=<?php echo $username; ?>"><button class="btn delete-btn">Delete</button></a>
        <a href="main.php"><button class="btn cancel-btn">Cancel</button></a>
    </div>