<?php
session_start();
include("../config.php");

if(!isset($_SESSION['id'])|| ($_SESSION['role']) != 'teacher'){
    header("Location: ../login.php");
    exit;
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
</head>

<body>
    <section>
        <div class="container-fluid  ">
            <div class="row">
                <div class="col-6 side-bar d-md-none d-lg-block ">
                    <h4 class="text-center">Dashboard</h4>
                    <hr>
                    <a href="#"><i class="fa-solid fa-house"></i>Home</a>
                    <a href="#"><i class="fa-solid fa-plus"></i> Add Assignment</a>
                    <a href="#"> <i class="fa-regular fa-calendar-days"></i> Class Shedule </a>
                    <a href="#"><i class="fa-regular fa-eye"></i> View Assignment </a>
                    <a href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout </a>
                </div>
                <div class="col-6 wrapper">
                  <h2 class="text-center mt-3 text-md-center">Welcome, <?php echo $_SESSION["firstname"];?></h2>
                  
                </div>

            </div>
        </div>

     
    </section>
</body>

</html>