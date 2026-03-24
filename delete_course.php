<?php

include('db.php');
$id = $_GET['id'];


$query = "DELETE FROM `course_enrollment` WHERE id = '$id'";

if(mysqli_query($conn, $query)){
    header('location: view_all_courses.php?status=success_delete');
} else {
    header('location: view_all_courses.php?status=error');
}

exit();
?>