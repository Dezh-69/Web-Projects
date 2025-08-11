<?php include_once "dbconnection.php"; ?>

        <div class="update">

            
            <form action="eventUpdating.php" method="post" enctype="multipart/form-data">
                <?php
                $eventCode = $_GET['eventCode'];
                $prevEventCode = $_GET['eventCode'];
                $result = $conn->query("SELECT * FROM event WHERE eventCode='$eventCode'");
                $row = $result->fetch_assoc();
                ?>
                <h2 id="upd">Update Record</h2>
                <input type="hidden" name="prevEventCode" value="<?php echo $prevEventCode; ?>">
                Event: <input type="text" name="eventCode" value="<?php echo $row['eventCode'];?>"><br>
                Description: <input type="text" name="eventDescription" value="<?php echo $row['eventDescription'];?>"><br>
                
                <input type="submit" value="Update Record">
            </form>
        </div>
   
