<?php include_once "dbconnection.php"; ?>

        <div class="update">

            
            <form action="positionUpdating.php" method="post" enctype="multipart/form-data">
                <?php
                $positionCode = $_GET['positionCode'];
                $prevPositionCode = $_GET['positionCode'];
                $result = $conn->query("SELECT * FROM position WHERE positionCode='$positionCode'");
                $row = $result->fetch_assoc();
                ?>
                <h2 id="upd">Update Record</h2>
                <input type="hidden" name="prevPositionCode" value="<?php echo $prevPositionCode; ?>">
                College: <input type="text" name="positionCode" value="<?php echo $row['positionCode'];?>"><br>
                Description: <input type="text" name="positionDescription" value="<?php echo $row['positionDescription'];?>"><br>
                
                <input type="submit" value="Update Record">
            </form>
        </div>
  
