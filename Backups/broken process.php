<?php

session_start();

$mysqli = new mysqli("localhost","ray","password","crud") or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$name = '';
// $classroom = '';
$pacomment = '';
$pbcomment = '';
$pccomment = '';



// if (isset($_POST['save'])){
//     $pacomment = $_POST['pacomment'];
//     $pacomment = $_POST['pbcomment'];
//     $pacomment = $_POST['pccomment'];
    
    
//     $mysqli->query("INSERT INTO data 
//     (pacomment,pbcomment,pccomment) 
//     VALUES
//     ('$pacomment', 
//     '$pbcomment',
//     '$pccomment',
//     ')") 
//     or die($mysqli->error);        
//     $_SESSION['message'] = "Record has been saved!";
//     $_SESSION['msg_type'] = "success";
    
//     header("classroom: index.php");
// }   


// if (isset($_GET['delete'])){
//     $id = $_GET['delete'];
//     $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());
    
//     $_SESSION['message'] = "Record has been deleted!";
//     $_SESSION['msg_type'] = "danger";
    
//     header("classroom: index.php");
// }

// if (isset($_GET['edit'])){
//     $id = $_GET['edit'];
//     $update = true;
//     $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
//     if(isset($result->num_rows) && $result->num_rows > 0) {
//         $row = $result->fetch_array();
//         $name = $row['name'];
//         $classroom = $row['classroom'];
//         $pacomment = $row['pacomment'];
//         $pbcomment = $row['pbcomment'];
//         $pccomment = $row['pccomment'];          
// }
// }

if (isset($_POST['update'])){
    $id = $_POST['id'];
    // $classroom = $_POST['classroom'];
    $pacomment = $_POST['pacomment'];
    // $pbcomment = $_POST['pbcomment'];
    // $pccomment = $_POST['pccomment'];
    
    $mysqli->query("UPDATE data SET 
    pacomment= '$pacomment',
    -- pbcomment= '$pbcomment', 
    -- pccomment = '$pccomment',
    WHERE id=$id") or die($mysqli->error);
    
    header('location: index.php');
}
