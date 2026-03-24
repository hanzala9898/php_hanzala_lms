<?php
include('db.php');

// 1. URL se ID lena aur purana data fetch karna
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM `course_enrollment` WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        die("Record not found!");
    }
} else {
    die("No ID provided!");
}

// 2. Dropdowns ke liye Students aur Teachers ka data fetch karna
$students_query = mysqli_query($conn, "SELECT id, name FROM students");
$teachers_query = mysqli_query($conn, "SELECT id, name FROM teachers");
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Course Enrollment · Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
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
                    <h1 class="h2">Edit Course Enrollment</h1>
                </div>

                <form method="POST" action="update_course.php?id=<?php echo $row['id']; ?>">

                    <input type="hidden" name="course_id" value="<?php echo $row['id']; ?>">

                    <label class="mb-1 fw-bold">Course Name:</label>
                    <input class="form-control mb-3" type="text" name="course_name"
                        value="<?php echo $row['course_name']; ?>" required>

                    <label class="mb-1 fw-bold">Select Student:</label>
                    <select class="form-select mb-3" name="student_id" required>
                        <option value="">-- Choose Student --</option>
                        <?php while ($s = mysqli_fetch_assoc($students_query)): ?>
                            <option value="<?php echo $s['id']; ?>" <?php if ($s['id'] == $row['student_id']) echo 'selected'; ?>>
                                <?php echo $s['name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label class="mb-1 fw-bold">Select Teacher:</label>
                    <select class="form-select mb-3" name="teacher_id" required>
                        <option value="">-- Choose Teacher --</option>
                        <?php while ($t = mysqli_fetch_assoc($teachers_query)): ?>
                            <option value="<?php echo $t['id']; ?>" <?php if ($t['id'] == $row['teacher_id']) echo 'selected'; ?>>
                                <?php echo $t['name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>

                    <label class="mb-1 fw-bold">Enrollment Date:</label>
                    <input class="form-control mb-3" type="date" name="date"
                        value="<?php echo $row['date']; ?>" required>

                    <a href="view_all_courses.php" class="btn btn-danger btn-sm"> Cancel </a>
                    <button class="btn btn-primary btn-sm" type="submit" name="update">Update Enrollment</button>
                </form>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>