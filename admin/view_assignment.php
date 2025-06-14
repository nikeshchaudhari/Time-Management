<?php
session_start();
include("../config.php");

if(!isset($_SESSION['id']) || $_SESSION['role'] != 'teacher'){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ne">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View Assignments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="/timemanagement/css/style.css" />
</head>

<body>

    <section class="container-fluid">
        <div class="row">
            <div class="col-3 side-bar d-md-none d-lg-block">
                <h4 class="text-center">Dashboard</h4>
                <hr />
                <a href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                <a href="add_assignment.php"><i class="fa-solid fa-plus"></i> Add Assignment</a>
                <a href="shedule.php"><i class="fa-regular fa-calendar-days"></i> Class Schedule</a>
                <a href="view_assignment.php"><i class="fa-regular fa-eye"></i> View Assignment</a>
                <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
            </div>

            <div class="col-9 main-content">
                <h4 class="mb-4"><i class="fa-solid fa-book"></i> View Assignments</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Subject</th>
                                <th>Assignment Title</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        // SQL query to join assignment, users and subject tables
                        $sql = "SELECT a.title, a.description, a.subject, a.deadline, u.firstname AS teacher_name
FROM add_assignment a
JOIN users u ON a.teacher_id = u.id
WHERE u.role = 'teacher'
ORDER BY a.deadline DESC";

                        $result = mysqli_query($conn, $sql);
                        $count = 1;

                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>
                                    <td>{$count}</td>
                                    <td>{$row['subject']}</td>
                                    <td>{$row['title']}</td>
                                    <td>{$row['description']}</td>
                                    <td>{$row['deadline']}</td>
                                    <td>{$row['teacher_name']}</td>
                                </tr>";
                                $count++;
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No assignments found</td></tr>";
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>