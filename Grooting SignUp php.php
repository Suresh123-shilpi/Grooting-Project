<?php

    $name = $_POST["name"];
    $email = $_POST["email"];
    
    $host ="localhost";
	$user="root";
	$dbPassword="";
    $dbname="LalitDB";

    $table = "userdata";
    
	$conn =new mysqli($host,$user,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    } 
    $query = "SELECT * FROM userdata WHERE UserName='".$name."' AND UserEmail='".$email."'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) <= 0) {
        echo "PLeae provide valid data";
    } else {
        $row = mysqli_fetch_assoc($result);
        setcookie("CurrentUser",$row["UserName"]);
        setcookie("CurrentUserEmail",$row["UserEmail"]);
        header("Location: http://localhost/result.php"); 
    }

    $conn->close();
?>