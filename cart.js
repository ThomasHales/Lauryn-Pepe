var books = JSON.parse(localStorage.getItem('cartList'));

function populate(title,i){
			var table = document.getElementById("myTable");
			var row = table.insertRow(i+1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);

            var price, img;
            var xmlhttp = new XMLHttpRequest();
             xmlhttp.open("POST", "getImg.php", true);
             xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {   
                    img = this.responseText; 
                }
             };
             xmlhttp.send();
             
             xmlhttp = new XMLHttpRequest();
             xmlhttp.open("POST", "getPrice.php", true);
             xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {   
                    price = this.responseText; 
                }
             };
             xmlhttp.send();

			cell1.innerHTML = "<img src=" + "'" + img + "'" + "border=3 height=100 width=100/>";
			cell2.innerHTML = title;
			cell3.innerHTML = price;
            cell4.innerHTML = books[title];
            cell5.innerHTML = '<button name="deletebutton" type="button" style="display: none;" class="delete" onclick="(\'' + title + '\')" >Delete</button>'; 
}

var count = 0;
for(i in books){
    populate(i,count);
    count+=1;
}