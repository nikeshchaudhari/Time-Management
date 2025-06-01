<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Management || login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section>
        <div class="container mt-5  d-flex flex-column justify-content-center form ">
            <div class="row">
                <h3 class="mb-4  mt-3 text-center">Login</h3>

                <form method="POST">


                    <div class="mb-3">

                        <input type="text" class="form-control" placeholder="Enter your email " name="email" required>

                    </div>
                    <div class="mb-3">

                        <input type="password" class="form-control" placeholder="Enter your password " name="password"
                            required>

                    </div>
                    <div class="text-center mb-3">
                        <button type="submit" class="btn" name="btn-login">Submit</button>

                    </div>
                    <div class="mb-3">
                        <p class="text-center">Already Register ? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </div>

        </div>
    </section>
    <?php
    if(isset($_POST["btn-login"])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT *FROM users WHERE email ='$email'";
        $data = mysqli_query($conn,$query);
        $result = mysqli_num_rows($data);
        if($data && $result >0){
            $user = mysqli_fetch_assoc($data);
            if(password_verify($password,$user['password'])){
                $_SESSION['id'] = $_POST['id'];
                $_SESSION['role']= $_POST['role'];
                if($user['role']=='student'){
                    header("Location.student.php");
                    exit;
                }
                elseif($user['role']=='teacher'){
  header("location: teacher.php");
                    exit;
                }
                  
                else{
                    echo "Unknown user && role";
                }
            }else{
                echo "email or password incorrect";
            }

        }else{
            echo "User not found";
        }
    };
//     if(isset($_POST["btn-login"])){
//         $email = $_POST["email"];
//         $password = $_POST["password"];
// $query="SELECT * FROM users WHERE email = '$email'";
// $data = mysqli_query($conn,$query);

// if($data && mysqli_num_rows($data)){
//     $user = mysqli_fetch_assoc($data);

//     if(password_verify($password,$user['password'])){
//         $_SESSION['id']=$_POST['id'];
//         $_SESSION['role']=$_POST['role'];

//         if($user['role']=='student'){
//             header ("Location : student.php");
//             exit;
//         }elseif($user['role']=='teaacher'){
//             header("Location : teacher.php");
//             exit;
//         }else{
//         echo "Unknown role";
//     }
//     }else{
//     echo "Invalid password..";
// }
  

// }     
//     }
    ?>
</body>

</html>