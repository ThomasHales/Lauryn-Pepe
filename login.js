document.getElementById("login").addEventListener('submit', function(event){event.preventDefault();});
window.onload = checkLogin(); 


function foo(){
    var xmlhttp = new XMLHttpRequest();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    xmlhttp.open("POST", "login.php", true);
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("text").innerHTML = this.responseText;
                document.getElementById("text").style.display = 'inline';
                if(this.responseText != "Invalid User"){
                    document.getElementById("username").style.display = 'none';
                    document.getElementById("password").style.display = 'none';
                    document.getElementById("text").style.display = 'inline';
                    localStorage.setItem("username", username); 
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
        document.getElementById("text").style.display = 'inline';
        document.getElementById("text").innerHTML = namestored + ' Signed In!';
    }
}