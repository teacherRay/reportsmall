<?php

session_start();

$mysqli = new mysqli("localhost","ray","password","crud") or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$classroom = '';
$classtime = '';
$pacomment = '';
// $pbcomment = '';



if (isset($_POST['save'])){
    $name = $_POST['name'];
    $classroom = $_POST['classroom'];
    $classtime = $_POST['classtime'];

    $pacomment = $_POST['pacomment'];
    $pbcomment = $_POST['pbcomment'];
       
    $mysqli->query("INSERT INTO data (name, pacomment, pbcomment ) VALUES  ('$name, '$pacomment', '$pbcomment')") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
    
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if(isset($result->num_rows) && $result->num_rows > 0) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $classroom = $row['classroom'];
        $classtime = $row['classtime'];
        $pacomment = $row['pacomment'];
        $pbcomment = $row['pbcomment'];      
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $pacomment = $_POST['pacomment'];
    // $pbcomment = $_POST['pbcomment'];
   
    $mysqli->query("UPDATE data SET pacomment= '$pacomment' WHERE id=$id") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: index.php');

}