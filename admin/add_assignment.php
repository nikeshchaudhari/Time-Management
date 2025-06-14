<?php
session_start();
include("../config.php");
59
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
                    <div class="form-wrapper">
                        <h4 class="text-center add-title"> <i class="fa-solid fa-plus ml-4"></i>Add Assignment</h4>
                        <form method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label ">Assignment title</label>
                                <input type="text" class="form-control" id="title" placeholder="Assignment Title" required name="title">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea  name="description" class="form-control" id="description" rows="4" required
                                    placeholder="Write the assignment details.."></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label ">Subject</label>
                                <input type="text" class="form-control" id="title" placeholder="Subject name" required name="subject">
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label ">File Upload</label>
                                <input type="file" class="form-control" id="title" placeholder="Subject name" required name="upload-file">
                            </div>
                            <div class="mb-3">
                                <label for="deadline" class="form-label ">Deadline</label>
                                <input type="date" class="form-control" id="title" placeholder="Subject name" required name="deadline">
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button class="btn btn-custom" name="submit-assignment" type="submit">Submit Assignment</button>
                                
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>


        </div>
        </div>


    </section>
    <!-- Add Assignmnet Logic -->
    <?php
   
if (isset($_POST['submit-assignment'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $subject = $_POST['subject'];
    $deadline = $_POST['deadline'];
    $teacher_id = $_SESSION['id'];

    
    
   


    $query = "INSERT INTO add_assignment (`title`, `description`, `subject`, `deadline`, `teacher_id`) 
          VALUES ('$title', '$desc', '$subject', '$deadline', '$teacher_id')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Assignment added successfully!";
    } else {
if ($data) {
    header("Location: dashboard.php");
    exit;
} else {
    echo "Failed to add assignment. Error: " . mysqli_error($conn);
}
    }
}
?>

    
    

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    
    </script>
</body>

</html>