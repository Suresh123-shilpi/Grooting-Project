
<?php

$email = $_POST["email"];
$password = $_POST["password"];

$host ="localhost";
$user="root";
$dbPassword="";
$dbname="sureshdb";

$table = "userdata1";

$conn =new mysqli($host,$user,$dbPassword,$dbname);
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
} 
$query = "SELECT * FROM userdata1 WHERE Email ='".$email."' AND Password ='".$password."'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) <= 0) {
    echo "PLease provide valid data";
} else {
    $row = mysqli_fetch_assoc($result);
    setcookie("CurrentUser",$row["Email"]);
    setcookie("CurrentUserEmail",$row["Password"]);
    header("Location: http://localhost/Home1.html"); 
}

$conn->close();
