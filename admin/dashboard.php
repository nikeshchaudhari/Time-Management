<?php
session_start();
include("../config.php");

if(!isset($_SESSION['id'])|| ($_SESSION['role']) != 'teacher'){
    header("Location: ../login.php");
    exit;
}

$query ="SELECT COUNT(*) AS total_users FROM users";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);

if($data){
    $total_users = $result['total_users'];
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
                <div class="col-2 side-bar d-md-none d-lg-block ">
                    <h4 class="text-center">Dashboard</h4>
                    <hr>
                    <a href="#"><i class="fa-solid fa-house"></i>Home</a>
                    <a href="#"><i class="fa-solid fa-plus"></i> Add Assignment</a>
                    <a href="#"> <i class="fa-regular fa-calendar-days"></i> Class Shedule </a>
                    <a href="#"><i class="fa-regular fa-eye"></i> View Assignment </a>
                    <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout </a>
                </div>
                <div class="col-9 wrapper">
                    <h2 class="text-center mt-3 text-md-center">Welcome, <?php echo $_SESSION["firstname"];?></h2>
                    <div class="card text-white mb-3 mt-4 ad-card" style="max-width: 18rem;">
                        <div class="card-header text-center fs-1 user-count">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="card-body user-count">
                            <h4 class="card-title text-center"><?php echo $total_users?></h4>

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