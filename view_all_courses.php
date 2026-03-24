<?php
include('db.php');

// Humne 'as' use kiya hai taake student aur teacher ke naam alag pehchane ja sakein
$query = "SELECT 
            course_enrollment.*, 
            students.name AS student_name, 
            teachers.name AS teacher_name 
          FROM `course_enrollment` 
          JOIN students ON course_enrollment.student_id = students.id 
          JOIN teachers ON course_enrollment.teacher_id = teachers.id 
          ORDER BY course_enrollment.id DESC";

$result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View All Enrollments · Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: #0000001a;
            border: solid rgba(0, 0, 0, 0.15);
            border-width: 1px 0;
            box-shadow:
                inset 0 0.5em 1.5em #0000001a,
                inset 0 0.125em 0.5em #00000026;
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -0.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .bi {
            width: 1em;
            height: 1em;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
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
                    <h1 class="h2">All Course Enrollments</h1>
                    <a href="register_course.php" class="btn btn-primary btn-sm">New Enrollment</a>
                </div>

                <div class="mt-3">
                    <?php
                    if (isset($_GET['status'])) {
                        $status = $_GET['status'];

                        // Update ke liye success message
                        if ($status == 'success') {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Updated!</strong> Enrollment record has been updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
                        }
                        // Delete ke liye alert message
                        elseif ($status == 'success_delete') {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Deleted!</strong> Enrollment record removed.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
                        }
                        // Error message
                        elseif ($status == 'error') {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Something went wrong.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>';
                        }
                    }
                    ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Sr.</th>
                                <th>Course Name</th>
                                <th>Student Name</th>
                                <th>Assigned Teacher</th>
                                <th>Enrollment Date</th>
                                <th>Edit</th>
                                <th>Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                $Sn = 1;
                                while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr>
                                        <td><?php echo $Sn; ?></td>
                                        <td><strong><?php echo $data['course_name']; ?></strong></td>
                                        <td><?php echo $data['student_name']; ?></td>
                                        <td><span class="badge bg-info text-dark"><?php echo $data['teacher_name']; ?></span></td>
                                        <td><?php echo date('d-M-Y', strtotime($data['date'])); ?></td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm" href="edit_course.php?id=<?php echo $data['id']; ?>">
                                                Edit Enrollment
                                            </a>
                                        </td>


                                        <td>
                                            <a class="btn btn-outline-danger btn-sm" href="delete_course.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure?');">
                                                Cancel Enrollment
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                    $Sn++;
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="9" class="text-center"><b>No enrollments found</b></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
        </main>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>