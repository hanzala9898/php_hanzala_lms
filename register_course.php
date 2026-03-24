<?php
include('db.php');

// 1. Data Save Karne ki Logic
if (isset($_POST['submit'])) {
    $course_name = $_POST['course_name'];
    $student_id = $_POST['student_id'];
    $teacher_id = $_POST['teacher_id'];
    $date = $_POST['date'];

    $query = "INSERT INTO `course_enrollment` (course_name, student_id, teacher_id, date) VALUES ('$course_name', '$student_id', '$teacher_id', '$date')";

    if (mysqli_query($conn, $query)) {
        header("Location: view_all_courses.php?status=success");
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// 2. Dropdowns ke liye data fetch karna
$students_query = mysqli_query($conn, "SELECT id, name FROM students");
$teachers_query = mysqli_query($conn, "SELECT id, name FROM teachers");
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Course Enrollment Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Jo CSS aapne register student wale page me di thi */
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="container-fluid">
        <div class="row">

            <?php include('sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">New Course Enrollment</h1>
                </div>

                <form method="POST" action="">


                    <input class="form-control mb-3" type="text" name="course_name" placeholder="Enter Course Name" required>


                    <select class="form-select mb-3" name="student_id" required>
                        <option value="">-- Choose Student --</option>
                        <?php while ($s = mysqli_fetch_assoc($students_query)): ?>
                            <option value="<?php echo $s['id']; ?>"><?php echo $s['name']; ?></option>
                        <?php endwhile; ?>
                    </select>


                    <select class="form-select mb-3" name="teacher_id" required>
                        <option value="">-- Choose Teacher --</option>
                        <?php while ($t = mysqli_fetch_assoc($teachers_query)): ?>
                            <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                        <?php endwhile; ?>
                    </select>


                    <input class="form-control mb-3" type="date" name="date" required>

                    <a href="view_all_courses.php"><button class="btn btn-danger btn-sm" type="reset"> Cancel </button></a>
                    <a href="view_all_courses.php"> <button class="btn btn-success btn-sm" type="submit" name="submit">Submit Enrollment</button></a>
                </form>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>