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

$sql = "SELECT Username, Password FROM Users"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($uname == $row["Username"] && $pass == $row["Password"]){
            echo $uname. " Signed in! <br>"; 
        }else{
            echo "Invalid User";
        }
    }
} else {
    echo "Empty Database";
}

$conn->close(); 

?>