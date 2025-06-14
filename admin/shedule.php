<?php
session_start();
// print_r($_SESSION);
include("../config.php");
if(!isset($_SESSION['id'])|| $_SESSION['role']!='teacher'){
    header("Location: ../login.php");
    exit;
}
if(isset($_GET['success'])){
    echo "<script>alert('Schedule Added Successfully');</script>";
}
if(isset($_GET['error'])){
        echo "<script>alert('Schedule error');</script>";

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Management || Class Shedule For College</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
                    <div class="form-wrapper">
                        <h4 class="text-center add-title"><i class="fa-solid fa-calendar"></i></i>Class Shedule</h4>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Enter subject name" required>
                            </div>
                            <div class="mb-3">
                                <label for="class_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="class_date" name="class_date" required>
                            </div>
                            <div class="mb-3">
                                <label for="class_time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="class_time" name="class_time" required>
                            </div>
                            <div class="mb-3">
                                <label for="room_no" class="form-label">Room No</label>
                                <input type="text" class="form-control" id="room_no" name="room_no"
                                    placeholder="Enter room no" required>
                            </div>



                            <div class="d-grid gap-2">
                                <button class="btn btn-custom" name="add-shedule" type="submit">Add Shedule</button>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>


        </div>
        </div>

    </section>

    <?php
    
    if(isset($_POST['add-shedule'])){
        $subject = $_POST['subject'];
        $date = $_POST['class_date'];
        $time = $_POST["class_time"];
        $room = $_POST['room_no'];
        $teacher_id = $_SESSION['id'];

        $query = "INSERT INTO shedule(subject,class_date,class_time,room_no,teacher_id)VALUES('$subject','$date','$time','$room','$teacher_id')";

        $data = mysqli_query($conn, $query);
         if($data){
  
    
      header("Location: shedule.php?success=1");
            exit;
         }else{
          

            
    
      header("location: shedule.php?error= ".urlencode (mysqli_error($conn)));
            exit;
         }
        }
    
    
    
    ?>
</body>

</html>