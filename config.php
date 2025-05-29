<?php
$host = "localhost";
$user = "root";
$password = "";
$db_Name = "timemanagement";

$conn = new mysqli($host,$user,$password,$db_Name);

if($conn){
    // echo "Db connect ...";
}
else{
    echo "Something Error...";
}

?>