<?php 
$servername = "localhost";
$username = "halest_Lauryn-Pepe";
$password = "meme123";
$db_name = "halest_Lauryn-Pepe";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error); 
}

$uname=$_POST["username"]; 

if(!$uname){
    echo "Uname was not in the form\n"; 
}

$sql = "SELECT Level FROM Users WHERE Username = '$uname'"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    $res = $result->fetch_assoc(); 
    $lv = $res["Level"]; 
    echo $lv; 
} else {
    echo "Invalid User"; 
}

$conn->close(); 

?>