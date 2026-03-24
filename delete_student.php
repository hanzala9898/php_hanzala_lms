<?php

    include('db.php');
    $id = $_GET['id'];

    $query ="DELETE FROM `students` WHERE id = $id";
    
    if(mysqli_query($conn, $query)){
    header('location: view_all_students.php?status=success_delete');
} else {
        header('location: view_all_students.php?status=error');
}
exit(); 

?>