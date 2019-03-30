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

$pass=$_POST["password"]; 

if(!$pass){
    echo "Pass was not in the form\n"; 
}

$email=$_POST["email"];

if(!$email){
    echo "Email was not in the form\n"; 
}

$sql = "SELECT Username FROM Users WHERE Username = '$uname'"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    echo "Invalid User"; 
} else {
    echo $uname. " Signed in! <br>";
    $sql = "INSERT INTO Users ". "(Username, Password, Email, Level) ". "VALUES ('$uname', '$pass', '$email', 1)";
    $conn->query($sql); 
}

$conn->close(); 
?>