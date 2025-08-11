<?php include_once "dbconnection.php"; ?>

    <div class="create">
        <form action="positionCreation.php" method="post" enctype="multipart/form-data">
            <h2 id ="reg">Register</h2>
            <label class ="cName">Position:</label> <input type="text" name="positionCode" required><br>
            <label class ="cName">Description:</label> <input type="text" name="positionDescription" required><br>

            <input type="submit" value="Save Record">
        </form>
    </div>
