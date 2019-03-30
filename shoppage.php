<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body>
  <div>
      <div id="banner">
          <h1 id="title">Lauryn-Pepe Online Bookstore</h1>
      </div>
      <div class="navbar">
          <a href="index.html">Main Page</a>
          <a class="active" href="#Screen">Shop Screen</a>
          <a href="contact.html">Contact Us</a>
          <form id="login" onsubmit="foo()">
	    <p id="text" style="display: none;"></p>
	    <button type="button" id="cart" onclick="location.href='cart.html'"><i class="fas fa-shopping-cart"></i></button>
            <input type="text" id="username" name="username" value="" placeholder="Username" size = "10" required>
            <input type="password" id="password" name="password" value="" placeholder="Password" size = "10" required> 
            <input type="submit" style="display:none;">
	          <button type="button" id="button" style="display:none;" onclick="signOut()">Sign Out</button>
          </form>
      </div>

      <link rel="stylesheet" type="text/css" href="shop.css">
      <main id="page">
        <form class="mcq" id="mcq">
          <p class="ques">Search by:</p>
          <input type="hidden" name="var" value="value">
          <select name="mc" id="mc">
            <optgroup label="Author">
              <option value="val1">By Name</option>
            </optgroup>
            <optgroup label="Genre">
              <option value="val1">Horror</option>
              <option value="val2">Mystery</option>
              <option value="val3">Fantasy</option>
            </optgroup>
            <optgroup label="Price">
              <option value="val1">Below $20</option>
              <option value="val2">Above $20</option>
            </optgroup>
          </select>
          <div class="button">
            <input type="submit" id="submit" name="Button1" value="Search">
          </div>
        </form>
      <div id="books" class="books"><div id="book"><img id="bookimg" src=" "><a href="template.html"><p id="details">Title by Author $Price </p></a></div>
      </main>
    </div>

    <div id="subform" style="display: none;">
        <h1>Sign Up</h1>
        <form id="signup" onsubmit="signUp()">
            Username: <input type="text" id="signuser" name="username" required><br>
            Password: <input type="password" id="signpass" name="password" required> <br>
            Email: <input type="text" id="emailuser" name="email" required> <br>
            <input class="button" type="submit" name="signsub" id="signsub" value="Sign Up">
        </form>
    </div>
    <script type="text/javascript" src="login.js"></script>
    <?php include 'shop.php'; ?>
  </body>
</html>

<style>
main{
  width: 100%;
  flex: 1 1 none;
  color: #000;
  background-color: #FFF;
  border-radius: 0.5em;
  padding: 0.25ex 1em 0.25ex 1em;
}

.ques{
  font-size: 35px;
  text-align: left;
}

select{
  font-size: 2em;
}

.button #submit{
  display: flex;
  border-radius: 5px; 
  border: none;
  background-color: black;
  color: white;
  padding: 10px 32px;
  margin-top: 10px; 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.button #signsub{
  display: flex;
  border-radius: 5px; 
  border: none;
  background-color: black;
  color: white;
  padding: 10px 32px;
  margin-top: 10px; 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.books{
  text-align: center; 
  align: center; 
  display: flex;
  flex-flow: row; 
  flex-wrap: wrap; 
  padding: 10px;
  margin-top: 10px;
}

#book{
  padding-left: 10px; 
}

#book a:link{
  color: black; 
}

#book a:visited{
  color: lightgray; 
}
</style>
