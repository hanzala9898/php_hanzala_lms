<?php
include('db.php');

// URL se ID lena (Aapke example ke mutabiq $_GET)
$id = $_GET['id'];

// Form se Data lena
$course_name = $_POST['course_name'];
$student_id = $_POST['student_id'];
$teacher_id = $_POST['teacher_id'];
$date = $_POST['date'];

// Update Query
$query = "UPDATE `course_enrollment` SET
          course_name = '" . $course_name . "',
          student_id = '" . $student_id . "',
          teacher_id = '" . $teacher_id . "',
          date = '" . $date . "' WHERE id = $id ";

// Query chalana aur redirect karna
if (mysqli_query($conn, $query)) {
    // Agar success ho
    header('location: view_all_courses.php?status=success');
} else {
    // Agar error aaye
    header('location: view_all_courses.php?status=error');
}
exit();
?>