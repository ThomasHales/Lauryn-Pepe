document.getElementById("login").addEventListener('submit', function(event){event.preventDefault();});
var addform = document.getElementById("addForm"); 
if(addform){
    addform.addEventListener('submit', function(event){event.preventDefault();});
}
window.addEventListener("load", checkLogin());


function foo(){
    var xmlhttp = new XMLHttpRequest();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    xmlhttp.open("POST", "login.php", true);
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("text").innerHTML = this.responseText;
                document.getElementById("text").style.display = 'inline';
                if(this.responseText == "Invalid User" || this.responseText == "Invalid Password Format" || this.responseText == "Invalid Username Format"){ //invalid User
			        document.getElementById("password").value = "";
					document.getElementById("text").style.color = "red";
					document.getElementById("text").style.fontSize = "small";
                }else{
			        document.getElementById("username").style.display = 'none';
                    document.getElementById("password").style.display = 'none';
                    localStorage.setItem("username", username); 
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("POST", "level.php", true);
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {   
                            localStorage.setItem("Level", this.responseText); 
                        }
                     };
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
                    xmlhttp.send("username=" + username)
					 window.location.reload(true);
				}
            }
        };
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("username=" + username +"&password="+ password);
}

function checkLogin(){
    var namestored = localStorage.getItem("username"); 
    if(namestored){
    document.getElementById("username").style.display = 'none';
    document.getElementById("password").style.display = 'none';
	document.getElementById("button").style.display = 'inline';
	document.getElementById("text").style.display = 'none';
    document.getElementById("text2").style.display = 'inline';
    document.getElementById("text2").innerHTML = 'Signed In As: '+namestored;
    document.getElementById("cart").innerHTML = "<i class='fas fa-shopping-cart'></i>"
    var shop = document.getElementById("shop"); 
    if(shop){
        setTimeout(function(){
        var lv = localStorage.getItem("Level");
        if(lv.localeCompare("3") == 0){
            var button = document.getElementsByClassName("delete"); 
            for(var i = 0; i < button.length; ++i){
                button[i].style.display = 'inline';
            }
            document.getElementById("addForm").style.display = 'inline';
        }}, 100);
    }

    }else{
		document.getElementById("cart").innerHTML = "<i class=''>Sign Up</i>"
        var page = document.getElementById("page"); 
        var subform = document.getElementById("subform"); 
        if(subform){
            page.style.display = 'none'; 
            subform.style.display = 'inline';
        }
    }
}

function signUp(){
    var xmlhttp = new XMLHttpRequest();
    var username = document.getElementById("signuser").value;
    var password = document.getElementById("signpass").value;
    var email = document.getElementById("emailuser").value;
    xmlhttp.open("POST", "signup.php", true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("text3").innerHTML = this.responseText;
            document.getElementById("text3").style.display = 'inline';
            if(this.responseText == "Invalid Email Format" || this.responseText == "Invalid Password Format" || this.responseText == "Invalid Username Format"){ //invalid User
				document.getElementById("text1").style.color = "red";
            } else {
				document.getElementById("username").style.display = 'none';
                document.getElementById("password").style.display = 'none';
                document.getElementById("text").style.display = 'inline';
                localStorage.setItem("username", username); 
                localStorage.setItem("Level", "1"); 
                window.history.go(-1); 
			}
        }
    };
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("username=" + username +"&password="+ password + "&email=" + email);
}


function signOut(){
	document.getElementById("username").style.display = 'inline';
    document.getElementById("password").style.display = 'inline';
    document.getElementById("button").style.display = 'none';
	document.getElementById("text").style.display = 'none';
    localStorage.clear();
    window.location.reload(true);
}

function deleteItem(e){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "delete.php", true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.reload(true);
        }
    };
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("title=" + e);
}

function addBook(){
    var xmlhttp = new XMLHttpRequest();
    var title = document.getElementById("addtitle").value; 
    var author = document.getElementById("addauthor").value;
    var genre = document.getElementById("addgenre").value;
    var price = document.getElementById("addprice").value;
    var imgref = document.getElementById("addimgref").value;
    xmlhttp.open("POST", "add.php", true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.reload(true);
        }
    };
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("title=" + title + "&author=" + author + "&genre=" + genre + "&price=" + price + "&imgref=" + imgref);
}

function addToCart(name){
    var books;
    if(!localStorage.getItem('cartList')){
        books={name: 1};
    } else {
        books = JSON.parse(localStorage.getItem('cartList'));
        if(books[name]){
            books[name]+=1;
        }else{
            books[name] = 1;  
        }
    }
    localStorage.setItem('cartList', JSON.stringify(books));
}

function removeFromCart(name){
    var books = JSON.parse(localStorage.getItem('cartList'));
    if(books[name]>1){
        books[name]-=1;
    } else{
        delete books[name];
    }
    localStorage.setItem('cartList', JSON.stringify(books));
    window.location.reload(true);
}

function checkout(){
    localStorage.removeItem('cartList');
    window.location.reload(true);
}