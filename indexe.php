
<?php require_once 'process.php'; ?>

 <!--************************************** Setup Messages **************************************** -->
<?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

  <!--**************************************End  Setup Messages ***********************************************  -->        

<!DOCTYPE html>
<html>
    <head>
        <title>Online Reports</title>
<!-- ************************************** Begin Setup Page Style ************************************* -->
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
    <body>
 <!--************************************** End Setup Page Styles ************************************* -->

 <?php $resultcomment = $mysqli->query("SELECT EnglishComment FROM comments"); ?>

    <divclass="container">
    <div class="row justify-content-center">
        <form class="form-inline" action="/action_page.php">
    <div class="form-group">
        <label for="classroom">Select Classroom:</label>
    <select name="classrooms" id="classrooms">
        <option value="103i">303i</option>
        <option value="104i">104i</option>
        <option value="201i">201i</option>
    </select>

    </div>
    <div class="checkbox">
        <label><input type="checkbox">AM</label>
        <label><input type="checkbox">PM</label>
  </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

    <!-- ************************************** Begin Connect DB  ************************************************ -->
    
        <!-- <div class="container">
        <?php
            // $mysqli = new mysqli("localhost","ray","password","reports")or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data WHERE classroom = '101i'AND classtime = 'am'") or die($mysqli->error);
             // Print $result to see if it holds data
            // pre_r($result); 
           
        ?> -->
    <!-- ************************************** End Connect DB ****************************************************  -->

    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <h1><label><?php echo $name?></label></h1>
            </div>
            <div class="form-group">
                <h3><label><?php echo $classroom ,' ' ,$classtime?></label></h3>
            </div>

    <div class="form-group">     
            <form action="process.php"  method="post">
            <label for="pacomment">PA Comment:</label>
            <select id="pacomment" name="pacomment">         
                <option value=0></option>
                <option value='has performed exceptionally online.'><?php echo $name; ?> has performed exceptionally online.</option>
                <option value='has performed well online.'><?php echo $name; ?> has performed well online.</option>
                <option value='has performed well but needs to improve attendance.'><?php echo $name; ?> has performed well but needs to improve attendance.</option>
                <option value='has attended all classes; however could put in more effort into their work.'><?php echo $name; ?> has attended all classes; however could put in more effort into their work.</option>
                <option value='regulary turns in incomplete work.'><?php echo $name; ?> regulary turns in incomplete work.</option>
                <option value='completes the required work, but often incorrectly.'><?php echo $name; ?> completes the required work, but often incorrectly.</option>
                <option value='completes the required work, but often misses deadlines.'><?php echo $name; ?> completes the required work, but often misses deadlines.</option>
                <option value='is a polite and respectful student.'><?php echo $name; ?> is a polite and respectful student.</option>
                <option value='is performing adequately, but needs to ask the teacher more questions.'><?php echo $name; ?> is performing adequately, but needs to ask the teacher more questions.</option>
                <option value='rarely attends classes and rarely completes the required lessons.'><?php echo $name; ?> rarely attends classes and rarely completes the required lessons.</option>
                <option value='never attends classes and never completes any of the required tasks.'><?php echo $name; ?> never attends classes and never completes any of the required tasks.</option>
                <option value='joined online classes late but has made a lot of progress.'><?php echo $name; ?> joined online classes late but has made a lot of progress.</option>
                <option value='has made a lot of progress.'><?php echo $name; ?> has made a lot of progress.</option>
                <option value='has made little progress.'><?php echo $name; ?> has made little progress.</option>
                <option value='has struggled to complete the required amount of work.'><?php echo $name; ?> has struggled to complete the required amount of work.</option> 
            </select>  

            <div class="form-group">
            <?php 
            if ($update == true): 
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <!-- <button type="submit" class="btn btn-primary" name="save">Save</button> -->
            <?php endif; ?>
            </div>
        </form>

    <!-- ************************************** Begin Setup Table Headers ******************************************   -->        
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <!-- <th>Classroom</th>
                            <th>Classtime</th> -->
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    
    <!-- ************************************** End Setup Classlist Table Headers ******************************************   -->
    
    <!-- ****** Loop thru Every Record From $result Query Variable and get variables and echo each variable into the table rows  **********   -->
            <?php
                while ($row = $result->fetch_assoc()): ?>

            <tr>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>                          
                        </td>
    <!-- ************************************** Put data into Classlist table rows ******************************************   -->
                    
                        <td><?php echo $row['studentid']; ?></td>
                        <td><?php echo $row['name']." ".$row['pacomment'] ?></td>
                        

    <!-- **************************************  Setup Edit Button and put in last table column ******************************************   -->
                        <!-- <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>                          
                        </td> -->
                    </tr>
                  
            <?php endwhile; ?>  <!-- ****************** End While() Loop ****************************   --> 
    
                </table> <!-- *************** End of Classlist Table  ******************************************   -->

            </div> <!-- ******* End  <div class="row justify-content-center">  **************************   -->

    <!-- ****** Start of php Function to print $array content. '<pre>'is used to enhance readability of output">  ******   -->
            <?php

            function pre_r( $array ) {  
                echo '<pre>'; 
                print_r($array);
                echo '</pre>';
            }
            ?>  <!-- ******* End of php Function to print $array content">  **************************   -->
        
   
        </div>
        </div>
    </body>