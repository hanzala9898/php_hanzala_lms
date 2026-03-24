<?php

include('db.php');
$id = $_GET['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$parent_contact = $_POST['parent_contact'];
$date = $_POST['date'];

$query =  "UPDATE `students` SET
        name = '" . $name . "',
        email = '" . $email . "',
        phone = '" . $phone . "',
        address = '" . $address . "',
        parent_contact = '" . $parent_contact . "',
        date = '" . $date . "' WHERE id = $id ";

if (mysqli_query($conn, $query)) {
    header('location: view_all_students.php?status=success');
} else {
    header('location: view_all_students.php?status=error');
}
exit();
?>
