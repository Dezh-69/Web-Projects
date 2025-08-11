<?php include_once "dbconnection.php"; ?>

    <div class="create">
        <form action="eventCreation.php" method="post" enctype="multipart/form-data">
            <h2 id ="reg">Register</h2>
            <label class ="cName">Event:</label> <input type="text" name="eventCode" required><br>
            <label class ="cName">Description:</label> <input type="text" name="eventDescription" required><br>

            <input type="submit" value="Save Record">
        </form>
    </div>
