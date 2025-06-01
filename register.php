<?php
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Management || Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="register-body" >
    <section >
        <div class="container mt-5  d-flex flex-column justify-content-center form ">
            <div class="row">
                <h3 class="mb-4  mt-3 text-center">Register</h3>

                <form method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Enter First name" name="fname" required>


                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control" placeholder="Enter last name" name="lname" required>

                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control" placeholder="Enter phone number " name="phone" required>

                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control" placeholder="Enter your email " name="email" required >

                    </div>
                    <div class="mb-3">

                        <input type="password" class="form-control" placeholder="Enter your password " name="password" required>

                    </div>
                    <div class="mb-3">

                        <select name="role" id="role" onchange=fileds() required>
                            
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>

                    </div>
                    <div class="mb-3" id="studentRoll">

                        <input type="text" class="form-control" placeholder="Enter roll number " name="roll">

                    </div>
                    <div class="mb-3" id="studentCourse">

                        <input type="text" class="form-control" placeholder="Enter course  name " name="course">

                    </div>
                    <div class="mb-3" id="teacherSubject" style="display:none">

                        <input type="text" class="form-control" placeholder="Enter  your subject " name="subject">

                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn" name="btn-register">Submit</button>

                    </div>
                    <div class="mb-3">
                        <p class="text-center">Not Register to go ? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>

        </div>
    </section>

    <!-- Register -->
    <?php
    if(isset($_POST["btn-register"])){
        $fname = $_POST['fname'];
        $lname =$_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $role = $_POST['role'];
        $roll = $_POST['roll'];
        $course = $_POST['course'];
        $subject = $_POST['subject'];
$query= "INSERT INTO users(firstname,lastname,phone,email,password,role,roll,course,subject)VALUES('$fname','$lname','$phone','$email','$password','$role','$roll','$course','$subject')";
$data = mysqli_query($conn,$query);

if($data){
    header("Location: login.php");
    exit;
}else{
    echo"Not Register...";
}

    }
     ?>

    <script>
    function fileds() {
        let role = document.querySelector("#role").value;
        if (role === "student") {
            document.querySelector("#studentRoll").style.display = "block";
            document.querySelector("#studentCourse").style.display = "block";
            document.querySelector("#teacherSubject").style.display = "none";
        } else {
            document.querySelector("#studentRoll").style.display = "none";
            document.querySelector("#studentCourse").style.display = "none";
            document.querySelector("#teacherSubject").style.display = "block";
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>