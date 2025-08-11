<?php include_once "dbconnection.php"; ?>

        <div class="update">
            
            <form action="updateProcess.php" method="post" enctype="multipart/form-data">
                <?php
                $username = $_GET['username'];
                $prevUsername = $_GET['username'];
                $result = $conn->query("SELECT * FROM account WHERE username='$username'");
                $row = $result->fetch_assoc();
                ?>
                <h2 id="upd">Update Record</h2>
                <input type="hidden" name="prevUsername" value="<?php echo $prevUsername; ?>">
                Username: <input type="text" name="username" value="<?php echo $row['username'];?>"><br>
                Password: <input type="password" name="password" value="<?php echo $row['password'];?>"><br>
                Email: <input type="email" name="email" value="<?php echo $row['email'];?>"><br>
                First Name: <input type="text" name="firstname" value="<?php echo $row['firstname'];?>"><br>
                Last Name: <input type="text" name="lastname" value="<?php echo $row['lastname'];?>"><br>
                Jersey No.: <input type="number" name="jerseyNo" value="<?php echo $row['jerseyNo'];?>"><br>
                Profile Picture: <input type="file" accept="image/*" name="profilePicture"><br>
                Position:
                <select name="position">
                    <?php
                    $posRes = $conn->query("SELECT * FROM position ORDER BY positionCode");
                    foreach($posRes as $posRow) {
                        $posCode = $posRow['positionCode'];
                        $posDesc = $posRow['positionDescription'];
                        
                        if($row['position'] == $posCode) {
                            echo "<option value='$posCode' selected>($posCode) $posDesc</option>";
                        } else {
                            echo "<option value='$posCode'>($posCode) $posDesc</option>";
                        }
                    }
                    ?>
                </select><br>
                College/Office:
                <select name="college">
                    <?php
                    $colOffRes = $conn->query("SELECT * FROM college ORDER BY collegeCode");
                    foreach($colOffRes as $colOffRow) {
                        $colOffCode = $colOffRow['collegeCode'];
                        $colOffDesc = $colOffRow['collegeDescription'];
                        
                        if($row['college'] == $colOffCode) {
                            echo "<option value='$colOffCode' selected>($colOffCode) $colOffDesc</option>";
                        } else {
                            echo "<option value='$colOffCode'>($colOffCode) $colOffDesc</option>";
                        }
                    }
                    ?>
                </select><br>
                <input type="submit" value="Update Record">
            </form>
        </div>
    