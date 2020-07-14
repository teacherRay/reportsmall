<?php

session_start();

$mysqli = new mysqli("localhost","ray","password","crud") or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
$location = '';
$pa_part ='';


if (isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $pa_part = $_POST['pa_part'];
    
    $mysqli->query("INSERT INTO data (name, location, pa_part) VALUES('$name', '$location',$pa_part)") or
            die($mysqli->error);
        
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
        $location = $row['location'];
        $pa_part = $row['pa_part'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $pa_part = $_POST['pa_part'];
    

    
    $mysqli->query("UPDATE data SET name='$name', location='$location', pa_part= '$pa_part' WHERE id=$id") or
            die($mysqli->error);
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: index.php');
}