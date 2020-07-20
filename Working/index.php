<!-- <?php require_once 'conndb.php'; ?> -->
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
    <title>Home of English Reports</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>= 
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #008080;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>

</head>
<body style="background-color:linen;">
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
</div>

 <!--************************************** End Setup Page Styles ************************************* -->

 <?php $resultcomment = $mysqli->query("SELECT EnglishComment FROM comments"); ?>

    <!-- ************************************** Begin Connect DB  ************************************************ -->
    
        <div class="container" align-content-center>
        <?php
            // $mysqli = new mysqli("localhost","ray","password","reports")or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data WHERE classroom = '101i'AND classtime = 'am'") or die($mysqli->error);
             // Print $result to see if it holds data
            // pre_r($result); 
           
        ?>
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


            <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <h3><label>PA Teacher's Comment</label></h3> <select name = "pacomment">
               <?php
                    while($rows = $resultcomment-> fetch_assoc())
                    {
                        $EnglishComment = $rows['EnglishComment'];
                        echo "<option value='$EnglishComment'>$name.$EnglishComment</option>";
                    }
                    ?></h2> 
                </select><br>
                <p>

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
                <table class="table" width = "20%" border = "5" cellpadding = "1";>
                    <thead>
                        <tr>
                            <th><center>Action</center></th>
                            <th><center>ID</center></th>
                            <th>Name and Comment</th>
                        </tr>
                    </thead>
                    
    <!-- ************************************** End Setup Classlist Table Headers ******************************************   -->
    
    <!-- ****** Loop thru Every Record From $result Query Variable and get variables and echo each variable into the table rows  **********   -->
            <?php
                while ($row = $result->fetch_assoc()): ?>

            <tr>
                        <td>
                        <center><a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Assess</a></center>                         
                        </td>
    <!-- ************************************** Put data into Classlist table rows ******************************************   -->
                    
                        <td><center><?php echo $row['studentid']; ?></center></td>
                        <td><?php echo $row['name']." ".$row['pacomment'] ?></td>
                        

    <!-- **************************************  Setup Edit Button and put in last table column ******************************************   -->
                        <!-- <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>                          
                        </td> -->
                    </tr>
                  
            <?php endwhile; ?>  <!-- ****************** End While() Loop ****************************   --> 
    
                </table> <!-- *************** End of Classlist Table  ******************************************   -->

            </div> 
   
        </div>
        </div>
    </body>