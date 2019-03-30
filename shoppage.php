<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="shop.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body>
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
	  
		<link rel="stylesheet" type="text/css" href="cart.css" />
		<div class="body">
			<main id="page">
				<input type="text" id="myInput1" onkeyup="myFunction('myInput1', 1)" placeholder="Search for Book.." title="Type in a name">
				<input type="text" id="myInput2" onkeyup="myFunction('myInput2', 2)" placeholder="Search for Author.." title="Type in a author">
				
				<select id = "price" onChange="priceFunction(this.value)">
					<optgroup label="Price">
						<option value = 0>Any Price</option>
						<option value = 1>Below $20</option>
						<option value = 2>Above $20</option>
					</optgroup>
				</select>
				
				<table id="myTable" width="100%" border=1 frame=void rules=rows>
					<tr class="header">
						<th>&nbsp;</th>
						<th>Title</th>
						<th>Author</th>						
						<th>Price</th>
						<th>&nbsp;</th>
					</tr>
					<tr>
						<td><img src="andthentherewerenone.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">And Then There Were None</td>
						<td id="author">Agatha Christie</td>
						<td id="price">15.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="dracula.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">Dracula</td>
						<td id="author">Bram Stoker</td>
						<td id="price">20.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="thewitchandthewardrobe.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">The Lion The Witch and The Wardrobe</td>
						<td id="author">C.S. Lewis</td>
						<td id="price">18.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="gameofthrones.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">A Game Of Thrones</td>
						<td id="author">George R.R. Martin</td>
						<td id="price">10.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="gonegirl.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">Gone Girl</td>
						<td id="author">Gillian Flynn</td>
						<td id="price">15.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="harrypotter.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">Harry Potter And The Philosopher's Stone</td>
						<td id="author">J.K. Rowling</td>
						<td id="price">5.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="thegodfather.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">The God Father</td>
						<td id="author">Mario Puzo</td>
						<td id="price">21.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="frankenstein.jpg" alt="" border=3 height=100 width=100></img></td>
						<td id="book-title">Frankenstein</td>
						<td id="author">Mary Shelley</td>
						<td id="price">25.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
				</table>

				<script>
					function myFunction(search, col) {
						var input, filter, table, tr, td, i, txtValue;
						input = document.getElementById(search);
						filter = input.value.toUpperCase();
						table = document.getElementById("myTable");
						tr = table.getElementsByTagName("tr");
						for (i = 0; i < tr.length; i++) {
							td = tr[i].getElementsByTagName("td")[col];
							if (td) {
								txtValue = td.textContent || td.innerText;
								if (txtValue.toUpperCase().indexOf(filter) > -1) {
									tr[i].style.display = "";
								} else {
									tr[i].style.display = "none";
								}
							}       
						}
					}
					
					function priceFunction(choice) {
						var input, filter, table, tr, td, i, txtValue;
						input = document.getElementById("price");
						filter = input.value.toUpperCase();
						table = document.getElementById("myTable");
						tr = table.getElementsByTagName("tr");
						for (i = 0; i < tr.length; i++) {
							td = tr[i].getElementsByTagName("td")[3];
							if (td) {
								txtValue = td.textContent || td.innerText;
								if(choice == 0){
									if (txtValue>0) {
										tr[i].style.display = "";
									} else {
										tr[i].style.display = "none";
									}
								}	
								else if(choice == 1){
									if (txtValue<20) {
										tr[i].style.display = "";
									} else {
										tr[i].style.display = "none";
									}
								}
								else if(choice == 2){
									if (txtValue>20) {
										tr[i].style.display = "";
									} else {
										tr[i].style.display = "none";
									}
								}
							}       
						}
					}
					
				</script>
			</main>
			<div id="subform" style="display: none;">
        <h1>Sign Up</h1>
        <form id="signup" onsubmit="signUp()">
            Username: <input type="text" id="signuser" name="username" required><br>
            Password: <input type="password" id="signpass" name="password" required> <br>
            Email: <input type="text" id="emailuser" name="email" required> <br>
            <input class="button" type="submit" name="signsub" id="signsub" value="Sign Up">
        </form>
    </div>
        </div>
		<script type="text/javascript" src="login.js"></script>
  </body>
</html>
