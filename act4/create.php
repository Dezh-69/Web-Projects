<?php include_once "dbconnection.php"; ?>

    <div class="create">
        <form action="createProcess.php" method="post" enctype="multipart/form-data">
            <h2 id ="reg">Register</h2>
            <label class ="cName">Username:</label> <input type="text" name="username" required><br>
            <label class ="cName">Password:</label> <input type="password" name="password" required><br>
            <label class ="cName">Email:</label> <input type="email" name="email" required><br>
            <label class ="cName">First Name:</label><input type="text" name="firstname" required><br>
            <label class ="cName">Last Name: </label><input type="text" name="lastname" required><br>
            <label class ="cName">Jersey No.:</label> <input type="number" name="jerseyNo" required><br>
            <label class ="cName">Profile Picture:</label> <input type="file" accept="image/*" name="profilePicture"><br>
            <label class ="cName">Position:</label>
            <select name="position" required>
                <?php
                $posRes = $conn->query("SELECT * FROM position ORDER BY positionCode");
                foreach($posRes as $posRow) {
                    $posCode = $posRow['positionCode'];
                    $posDesc = $posRow['positionDescription'];
                    echo "<option value='$posCode'>($posCode) $posDesc</option>";
                }
                ?>
            </select><br>
            College/Office:
            <select name="college" required>
                <?php
                $colOffRes = $conn->query("SELECT * FROM college ORDER BY collegeCode");
                foreach($colOffRes as $colOffRow) {
                    $colOffCode = $colOffRow['collegeCode'];
                    $colOffDesc = $colOffRow['collegeDescription'];
                    echo "<option value='$colOffCode'>($colOffCode) $colOffDesc</option>";
                }
                ?>
            </select><br>
            <input type="submit" value="Save Record">
        </form>
    </div>

