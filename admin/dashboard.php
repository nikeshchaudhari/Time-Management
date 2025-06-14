<?php
session_start();
include("../config.php");

if(!isset($_SESSION['id'])|| ($_SESSION['role']) != 'teacher'){
    header("Location: ../login.php");
    exit;
}

// admin count
$query_admin ="SELECT COUNT(*) AS total_users FROM users WHERE role='teacher'";
$data_admin = mysqli_query($conn,$query_admin);
$result_admin = mysqli_fetch_assoc($data_admin);

if($data_admin){
    $total_users = $result_admin['total_users'];
}

// User count
$query_users = "SELECT COUNT(*)AS user_count FROM users WHERE role='student'";
$data_user = mysqli_query($conn,$query_users);
$result_user = mysqli_fetch_assoc($data_user);

if($data_user){
    $user_count = $result_user['user_count'];
}

// total subject count
$query_subject = "SELECT COUNT(DISTINCT subject) AS count_subject FROM users WHERE subject IS NOT NULL AND subject != '' ";
$dat_subject = mysqli_query($conn,$query_subject);
$result_subject = mysqli_fetch_assoc($dat_subject);
if($dat_subject){
    $total_sub = $result_subject['count_subject'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Time Management || Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/timemanagement/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/timemanagement/css/style.css">
</head>

<body>
    <section>
        <div class="container-fluid  ">
            <div class="row">
                <div class="col-3 side-bar d-md-none d-lg-block ">
                    <h4 class="text-center">Dashboard</h4>
                    <hr>
                    <a href="dashboard.php"><i class="fa-solid fa-house"></i>Home</a>
                    <a href="add_assignment.php"><i class="fa-solid fa-plus"></i> Add Assignment</a>
                    <a href="shedule.php"> <i class="fa-regular fa-calendar-days"></i> Class Shedule </a>
                    <a href="view_assignment.php"><i class="fa-regular fa-eye"></i> View Assignment </a>
                    <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout </a>
                </div>
                <div class="col-9">
                    <h4 class=" text-center mt-4 fs-1">WELCOME, <?php echo $_SESSION["firstname"] ?></h4>
                    <div class="dashboard-card">
                        <div class="card text-white mb-3 add-card" style="width:300px">
                            <div class="card-header text-center">
                                <h4>Admin</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <?php echo $total_users?>
                                </h5>
                            </div>
                        </div>
                        <div class="card text-white mb-3 add-card1" style="width:300px">
                            <div class="card-header text-center">
                                <h4>Users</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $user_count?></h5>
                            </div>
                        </div>
                        <div class="card text-white mb-3 add-card2" style="width:300px">
                            <div class="card-header text-center">
                                <h4>Total Subject</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $total_sub?></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        </div>


    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $(".user-count").click(function() {
            $(".user-count").animated({
                left: '100px'
            })
        })
    })
    </script>
</body>

</html>