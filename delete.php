<?php 
    $servername = "localhost";
    $username = "halest_Lauryn-Pepe";
    $password = "meme123";
    $db_name = "halest_Lauryn-Pepe";
    
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error); 
    }

    if(isset($_POST['title'])){
        $title = $_POST['title']; 
    }

    $sql = "DELETE FROM Books WHERE Title = '$title'"; 
    $result = $conn->query($sql);
?>