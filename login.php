<?php

$servername = "localhost";
$username = "halest_Lauryn-Pepe";
$password = "meme123";
$db_name = "halest_Lauryn-Pepe";
$formErr = array("Invalid User","Invalid Password Format","Invalid Username Format");
$E = 0;

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error); 
}

$uname=$_POST["username"]; 

if(!$uname){
    echo "Uname was not in the form\n"; 
} else{
    if(!preg_match('/^[a-zA-Z0-9_-]+$/i', $uname)) {
        $E=2;
    } 
}

$pass=$_POST["password"]; 

if(!$pass){
    echo "Pass was not in the form\n"; 
} else{
    if(!preg_match('/^[a-zA-Z0-9_-]+$/i', $pass)) {
        $E++;
    } 
}

$sql = "SELECT Username, Password FROM Users"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($uname == $row["Username"] && $pass == $row["Password"]){
            echo "Signed In As: $uname <br>"; 
        }else{
	    if ($E >= 2){
	        echo $formErr[2];
	    } else if ($E == 1){
	        echo $formErr[1];
	    } else if ($E == 0){
	        echo $formErr[0];
	    }
        }
    }
} else {
    echo "Empty Database";
}

$conn->close(); 

?>
