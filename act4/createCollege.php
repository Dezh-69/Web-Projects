<?php include_once "dbconnection.php"; ?>

    <div class="create">
        <form action="collegeCreation.php" method="post" enctype="multipart/form-data">
            <h2 id ="reg">Register</h2>
            <label class ="cName">College:</label> <input type="text" name="collegeCode" required><br>
            <label class ="cName">Description:</label> <input type="text" name="collgeDescription" required><br>

            <input type="submit" value="Save Record">
        </form>
    </div>
