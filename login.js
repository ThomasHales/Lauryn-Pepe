document.getElementById("login").addEventListener('submit', function(event){event.preventDefault();});
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
                if(this.responseText == "Invalid User" || this.responseText == "Invalid Password Format" || this.responseText == "Invalid Username Format"){ //invalidalid User
			                document.getElementById("password").value = "";
			                document.getElementById("text").style.color = "red";
                }else{
			                document.getElementById("username").style.display = 'none';
                    	document.getElementById("password").style.display = 'none';
			                document.getElementById("text").style.color = "black";
                    	document.getElementById("text").style.display = 'inline';
                    	localStorage.setItem("username", username); 
                      var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("POST", "level.php", true);
                        xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        
                         localStorage.setItem("Level", this.responseText); 
                        }
                     };
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
                    xmlhttp.send("username=" + username);
                  
                  
				        }
            }
        };
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("username=" + username +"&password="+ password);

        window.location.reload(true); 
}

function checkLogin(){
	
    var namestored = localStorage.getItem("username"); 
    if(namestored){
        document.getElementById("username").style.display = 'none';
        document.getElementById("password").style.display = 'none';
	document.getElementById("button").style.display = 'inline';
        document.getElementById("text").style.display = 'inline';
        document.getElementById("text").innerHTML = 'Signed In As: '+namestored;
    }else{
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
                document.getElementById("text").innerHTML = this.responseText;
                document.getElementById("text").style.display = 'inline';
                if(this.responseText != "Invalid User"){
                    document.getElementById("username").style.display = 'none';
                    document.getElementById("password").style.display = 'none';
                    document.getElementById("text").style.display = 'inline';
                    localStorage.setItem("username", username); 
                    localStorage.setItem("Level", "1"); 
                    window.location.reload(true);  
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
}

