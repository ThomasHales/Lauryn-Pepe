<?php
    $servername = "localhost";
    $username = "halest_Lauryn-Pepe";
    $password = "meme123";
    $db_name = "halest_Lauryn-Pepe";
    
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error); 
    }

    if(isset($_POST['search'])){
        $search_val = $_POST['mc']; 
    }

    $sql = "SELECT Title, Author, Price, imgref, Genre FROM Books"; 
    $result = $conn->query($sql); 
    $book_details = null; 
    $i = 0; 
    while($row = $result->fetch_assoc()){
        if($search_val == "Horror" || $search_val == "Mystery" || $search_val == "Fantasy"){
            switch($search_val){
                case 'Horror': 
                    if($row["Genre"] == 'Horror'){
                        $book_details[$i]["title"] = $row["Title"]; 
                        $book_details[$i]["author"] = $row["Author"]; 
                        $book_details[$i]["price"] = $row["Price"]; 
                        $book_details[$i]["img"] = $row["imgref"]; 
                        $book_details[$i]["genre"] = $row["Genre"];
                    }
                    break; 
                case 'Mystery': 
                    if($row["Genre"] == 'Horror'){
                        $book_details[$i]["title"] = $row["Title"]; 
                        $book_details[$i]["author"] = $row["Author"]; 
                        $book_details[$i]["price"] = $row["Price"]; 
                        $book_details[$i]["img"] = $row["imgref"]; 
                        $book_details[$i]["genre"] = $row["Genre"];
                    }
                    break;
                case 'Fantasy': 
                    if($row["Genre"] == 'Horror'){
                        $book_details[$i]["title"] = $row["Title"]; 
                        $book_details[$i]["author"] = $row["Author"]; 
                        $book_details[$i]["price"] = $row["Price"]; 
                        $book_details[$i]["img"] = $row["imgref"]; 
                        $book_details[$i]["genre"] = $row["Genre"];
                    }
                    break;
            }
        }else if($search_val == "Below $20"){
            if($row["Price"] <= 20.00){
                $book_details[$i]["title"] = $row["Title"]; 
                $book_details[$i]["author"] = $row["Author"]; 
                $book_details[$i]["price"] = $row["Price"]; 
                $book_details[$i]["img"] = $row["imgref"]; 
                $book_details[$i]["genre"] = $row["Genre"];
            }
        }else if($search_val == "Above $20"){
            if($row["Price"] > 20.00){
                $book_details[$i]["title"] = $row["Title"]; 
                $book_details[$i]["author"] = $row["Author"]; 
                $book_details[$i]["price"] = $row["Price"]; 
                $book_details[$i]["img"] = $row["imgref"]; 
                $book_details[$i]["genre"] = $row["Genre"];
            }
        }else{
            $book_details[$i]["title"] = $row["Title"]; 
            $book_details[$i]["author"] = $row["Author"]; 
            $book_details[$i]["price"] = $row["Price"]; 
            $book_details[$i]["img"] = $row["imgref"]; 
            $book_details[$i]["genre"] = $row["Genre"];
        } 
        $i++; 
    }

    
    array_multisort(array_column($book_details, 'author'), SORT_ASC, $book_details); 
    $conn->close(); 
?>


<script type="text/javascript">

<?php foreach($book_details as $key){ ?>
    populate('<?php echo $key["title"]?>', '<?php echo $key["author"]?>', '<?php echo $key["price"]?>', '<?php echo $key["img"]?>');
<?php } ?>

function populate(title, author, price, img){
            document.getElementById("bookimg").src = img; 
            document.getElementById("details").innerHTML = title + " by: " + author + " $" + price + ".";
            var book = document.getElementById("book"); 
            var cln = book.cloneNode(true); 
            document.getElementById("books").appendChild(cln);  
}


document.getElementById("books").firstChild.style.display = 'none';

</script> 