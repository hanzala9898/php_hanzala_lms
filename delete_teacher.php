<?php

include('db.php');
$id = $_GET['id'];


$query = "DELETE FROM `teachers` WHERE id = '$id'";

if(mysqli_query($conn, $query)){
    header('location: view_all_teachers.php?status=success_delete');
} else {
    header('location: view_all_teachers.php?status=error');
}

exit();
?>