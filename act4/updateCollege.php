<?php include_once "dbconnection.php"; ?>

        <div class="update">
          
            
            <form action="collegeUpdating.php" method="post" enctype="multipart/form-data">
                <?php
                $collegeCode = $_GET['collegeCode'];
                $prevCollegeCode = $_GET['collegeCode'];
                $result = $conn->query("SELECT * FROM college WHERE collegeCode='$collegeCode'");
                $row = $result->fetch_assoc();
                ?>
                <h2 id="upd">Update Record</h2>
                <input type="hidden" name="prevCollegeCode" value="<?php echo $prevCollegeCode; ?>">
                College: <input type="text" name="collegeCode" value="<?php echo $row['collegeCode'];?>"><br>
                Description: <input type="text" name="collegeDescription" value="<?php echo $row['collegeDescription'];?>"><br>
                
                <input type="submit" value="Update Record">
            </form>
        </div>
    
