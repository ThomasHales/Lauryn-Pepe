<?php 
$servername = "localhost";
$username = "halest_Lauryn-Pepe";
$password = "meme123";
$db_name = "halest_Lauryn-Pepe";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error); 
}

$title=$_POST["title"]; 

if(!$title){
    echo "Title was not in form"; 
}

$sql = "SELECT Price FROM Books WHERE Title = '$title'"; 
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    $res = $result->fetch_assoc();
    echo $res["Price"]; 
} else {
    echo "-1"; 
}

$conn->close(); 

?>
