<?php
include('db.php');
$id = $_GET['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$degree_level = $_POST['degree_level'];
$qualification = $_POST['qualification'];
$date = $_POST['date'];

$query = "UPDATE `teachers` SET
        name = '" . $name . "',
        email = '" . $email . "',
        phone = '" . $phone . "',
        degree_level = '" . $degree_level . "',
        qualification = '" . $qualification . "',
        date = '" . $date . "' WHERE id = $id ";

if (mysqli_query($conn, $query)) {
    header('location: view_all_teachers.php?status=success');
} else {
    header('location: view_all_teachers.php?status=error');
}
exit();
?>