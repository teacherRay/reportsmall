<!DOCTYPE html>
<html>
    <head>
        <title>Reports</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style> h1 {text-align: center;}

</style>
    <body>
     <div class="w3-container w3-teal">
        <h1>Home of English Children's Program Report Form</h1>
    </div>



        <?php require_once 'process.php'; ?>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <!-- <div class="container"> -->
        <?php
            $mysqli = new mysqli("localhost","ray","password","crud") or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
           
            ?>

    <div class="w3-cell-row">        
    <div class="w3-container w3-cell"> 
    



            <table class="w3-table-all">
                    <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
            <?php

                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                    
                        <td><?php echo $row['name']; ?></td>
                        <td><a href="indexm.php?edit=<?php echo $row['id']; ?>"
                               class="btn btn-info">Edit</a>                           
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>
            
  <div class="w3-container w3-teal w3-cell"> 
               
        
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required
                   value="<?php echo $name; ?>">
            </div>
          
            <i class="fa fa-table" aria-hidden="true"></i> 

            
            <div class="form-group">
           
            <tr>
            <form action="/action_page.php">
            <label for="pacomment">PA Comment:</label>
            <select id="pacomment" name="pacomment">
                <option value=0></option>
                <option value=1><?php echo $name; ?> has performed exceptionally online.</option>
                <option value=2><?php echo $name; ?> has performed well online.</option>
                <option value=3><?php echo $name; ?> has performed well but needs to improve attendance.</option>
                <option value=4><?php echo $name; ?> has attended all classes; however could put in more effort into their work.</option>
                <option value=5><?php echo $name; ?> regulary turns in incomplete work.</option>
                <option value=6><?php echo $name; ?> completes the required work, but often incorrectly.</option>
                <option value=7><?php echo $name; ?> completes the required work, but often misses deadlines.</option>
                <option value=8><?php echo $name; ?> is a polite and respectful student.</option>
                <option value=9><?php echo $name; ?> is performing adequately, but needs to ask the teacher more questions.</option>
                <option value=10><?php echo $name; ?> rarely attends classes and rarely completes the required lessons.</option>
                <option value=11><?php echo $name; ?> never attends classes and never completes any of the required tasks.</option>
                <option value=12><?php echo $name; ?> joined online classes late but has made a lot of progress.</option>
                <option value=13><?php echo $name; ?> has made a lot of progress.</option>
                <option value=14><?php echo $name; ?> has made little progress.</option>
                <option value=15><?php echo $name; ?> has struggled to complete the required amount of work.</option>            
            </select>
           
            </form>
            </tr>      

            <tr>
            <form action="/action_page.php">
            <label for="pbcomment">PB Comment:</label>
            <select id="pbcomment" name="pbcomment">
                <option value=0></option>
                <option value=1><?php echo $name; ?> has performed exceptionally online.</option>
                <option value=2><?php echo $name; ?> has performed well online.</option>
                <option value=3><?php echo $name; ?> has performed well but needs to improve attendance.</option>
                <option value=4><?php echo $name; ?> has attended all classes; however could put in more effort into their work.</option>
                <option value=5><?php echo $name; ?> regulary turns in incomplete work.</option>
                <option value=6><?php echo $name; ?> completes the required work, but often incorrectly.</option>
                <option value=7><?php echo $name; ?> completes the required work, but often misses deadlines.</option>
                <option value=8><?php echo $name; ?> is a polite and respectful student.</option>
                <option value=9><?php echo $name; ?> is performing adequately, but needs to ask the teacher more questions.</option>
                <option value=10><?php echo $name; ?> rarely attends classes and rarely completes the required lessons.</option>
                <option value=11><?php echo $name; ?> never attends classes and never completes any of the required tasks.</option>
                <option value=12><?php echo $name; ?> joined online classes late but has made a lot of progress.</option>
                <option value=13><?php echo $name; ?> has made a lot of progress.</option>
                <option value=14><?php echo $name; ?> has made little progress.</option>
                <option value=15><?php echo $name; ?> has struggled to complete the required amount of work.</option>            
            </select>
            </form>
            </tr>      
          
            <tr>
            <form action="/action_page.php">
            <label for="pccomment">PC Comment:</label>
            <select id="pccomment" name="pccomment">
                <option value=0></option>
                <option value=1><?php echo $name; ?> has performed exceptionally online.</option>
                <option value=2><?php echo $name; ?> has performed well online.</option>
                <option value=3><?php echo $name; ?> has performed well but needs to improve attendance.</option>
                <option value=4><?php echo $name; ?> has attended all classes; however could put in more effort into their work.</option>
                <option value=5><?php echo $name; ?> regulary turns in incomplete work.</option>
                <option value=6><?php echo $name; ?> completes the required work, but often incorrectly.</option>
                <option value=7><?php echo $name; ?> completes the required work, but often misses deadlines.</option>
                <option value=8><?php echo $name; ?> is a polite and respectful student.</option>
                <option value=9><?php echo $name; ?> is performing adequately, but needs to ask the teacher more questions.</option>
                <option value=10><?php echo $name; ?> rarely attends classes and rarely completes the required lessons.</option>
                <option value=11><?php echo $name; ?> never attends classes and never completes any of the required tasks.</option>
                <option value=12><?php echo $name; ?> joined online classes late but has made a lot of progress.</option>
                <option value=13><?php echo $name; ?> has made a lot of progress.</option>
                <option value=14><?php echo $name; ?> has made little progress.</option>
                <option value=15><?php echo $name; ?> has struggled to complete the required amount of work.</option>            
            </select>
            </form>
            </tr>      
            </table>

          
    </div>
    </body>