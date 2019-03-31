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

    if(isset($_POST['author'])){
        $author = $_POST['author']; 
    }

    if(isset($_POST['genre'])){
        $genre = $_POST['genre']; 
    }

    if(isset($_POST['price'])){
        $price = $_POST['price']; 
    }

    if(isset($_POST['imgref'])){
        $imgref = $_POST['imgref']; 
    }

    $sql = "INSERT INTO Books ". "(Title, Author, price, Genre, imgref) ". "VALUES ('$title', '$author', '$price', '$genre', '$imgref')";
    $result = $conn->query($sql);
?>