<!DOCTYPE html>
<html>
    <head>
        <title>Reports</title>
   // ************************************** Begin Setup Page Style *************************************
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
    <body>
    // ************************************** End Setup Page Styles *************************************

    // ************************************** Setup Messages ****************************************
        <?php require_once 'process.php'; ?>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
    <!--**************************************End  Setup Messages ***********************************************  -->

    <!-- ************************************** Begin Connect DB  ************************************************ -->
        <div class="container">
        <?php
            $mysqli = new mysqli("localhost","ray","password","crud") or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
            //pre_r($result); Print $result to see if it holds data
        ?>
    <!-- ************************************** End Connect DB ****************************************************  -->

    <!-- ************************************** Begin Setup Table Headers ******************************************   -->        
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Classroom</th>
                            <th>Participation</th>
                            <th>Behavior</th>
                            <th>Conversation</th>
                            <th>Comprehension</th>
                            <th>Homework</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    
    <!-- ************************************** End Setup Table Headers ******************************************   -->
    
    <!-- ****** Loop thru Every Record From $result Query Variable and get variables and echo each variable into the table rows  **********   -->
            <?php
                while ($row = $result->fetch_assoc()): ?>

    <!-- ************************************** Put data into table rows ******************************************   -->
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['classroom']; ?></td>
                        <td><?php echo $row['pa_part']; ?></td>
                        <td><?php echo $row['pa_bev']; ?></td>
                        <td><?php echo $row['pa_conversation']; ?></td>
                        <td><?php echo $row['pa_comprehension']; ?></td>
                        <td><?php echo $row['pa_homework']; ?></td>

    <!-- **************************************  Setup Edit Button and put in last table row ******************************************   -->
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>                          
                        </td>
                    </tr>
                  
            <?php endwhile; ?>  <!-- ****************** End While() Loop ****************************   --> 
    
                </table> <!-- *************** End of Table  ******************************************   -->

            </div> <!-- ******* End  <div class="row justify-content-center">  **************************   -->

    <!-- ****** Start of php Function to print $array content. '<pre>'is used to enhance readability of output">  ******   -->
            <?php
            function pre_r( $array ) {  
                echo '<pre>'; 
                print_r($array);
                echo '</pre>';
            }
            ?>  <!-- ******* End of php Function to print $array content">  **************************   -->
        
        <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" 
                   value="<?php echo $name; ?>">
            </div>
            <br>

            <!-- <div class="form-group">
            <label>Classroom</label>
            <input type="text" name="classroom" 
                   value="<?php echo $classroom; ?>" class="form-control">
            </div> -->

            <div class="form-group">
            <label>Participation  (between 1 and 5)</label>
            <input type="number" name="pa_part" min="1" max="5"
                   value="<?php echo $pa_part; ?>" class="form-control">
                   
            </div>
            
            <div class="form-group">
            <label>Behavior (between 1 and 5)</label>
            <input type="number" name="pa_bev" min="1" max="5"
                   value="<?php echo $pa_bev; ?>" class="form-control">
            </div>
            

            <div class="form-group">
            <label>Conversation (between 1 and 5)</label>
            <input type="number" name="pa_conversation" min="1" max="5"
                   value="<?php echo $pa_conversation; ?>" class="form-control">
            </div>
            
            <div class="form-group">
            <label>Comprehension (between 1 and 5)</label>
            <input type="number" name="pa_comprehension" min="1" max="5"
                   value="<?php echo $pa_comprehension; ?>" class="form-control">
            </div>
            
            <div class="form-group">
            <label>Homework (between 1 and 5)</label>
            <input type="number" name="pa_homework" min="1" max="5"
                   value="<?php echo $pa_homework; ?>" class="form-control">
            </div>

            <div class="form-group">
            <?php 
            if ($update == true): 
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
        </div>
    </body>