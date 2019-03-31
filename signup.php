<?php 
$servername = "localhost";
$username = "halest_Lauryn-Pepe";
$password = "meme123";
$db_name = "halest_Lauryn-Pepe";
$formErr = array("Invalid Email Format","Invalid Password Format","Invalid Username Format");
$E = 0;

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error); 
}

$uname=$_POST["username"]; 

if($uname){
    if(!preg_match('/^[a-zA-Z0-9_-]+$/i', $uname)) {
        $E=4;
    } 
}

$pass=$_POST["password"]; 

if($pass){
    if(!preg_match('/^[a-zA-Z0-9_-]+$/i', $pass)) {
        $E+2;
    } 
}

$email=$_POST["email"];

if($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $E++;
    } 
}

$sql = "SELECT Username FROM Users WHERE Username = '$uname'"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
	if ($E >= 4){
        echo $formErr[2];
	} else if ($E < 4 && $E > 1){
	    echo $formErr[1];
	} else if ($E == 1){
	    echo $formErr[0];
	}
} else {
    echo "Signed In As: $uname <br>"; 
    $sql = "INSERT INTO Users ". "(Username, Password, Email, Level) ". "VALUES ('$uname', '$pass', '$email', 1)";
    $conn->query($sql); 
}

$conn->close(); 
?>