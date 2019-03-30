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
			<main>
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
						<td>And Then There Were None</td>
						<td>Agatha Christie</td>
						<td>15.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="dracula.jpg" alt="" border=3 height=100 width=100></img></td>
						<td>Dracula</td>
						<td>Bram Stoker</td>
						<td>20.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="thewitchandthewardrobe.jpg" alt="" border=3 height=100 width=100></img></td>
						<td>The Lion The Witch and The Wardrobe</td>
						<td>C.S. Lewis</td>
						<td>18.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="gameofthrones.jpg" alt="" border=3 height=100 width=100></img></td>
						<td>A Game Of Thrones</td>
						<td>George R.R. Martin</td>
						<td>10.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="gonegirl.jpg" alt="" border=3 height=100 width=100></img></td>
						<td>Gone Girl</td>
						<td>Gillian Flynn</td>
						<td>15.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="harrypotter.jpg" alt="" border=3 height=100 width=100></img></td>
						<td>Harry Potter And The Philosopher's Stone</td>
						<td>J.K. Rowling</td>
						<td>5.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="thegodfather.jpg" alt="" border=3 height=100 width=100></img></td>
						<td>The God Father</td>
						<td>Mario Puzo</td>
						<td>21.99</td>
						<td class = "add"><button type="button" id="cart" onclick="">Add to Cart</button>
					</tr>
					<tr>
						<td><img src="frankenstein.jpg" alt="" border=3 height=100 width=100></img></td>
						<td>Frankenstein</td>
						<td>Mary Shelley</td>
						<td>25.99</td>
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
        </div>
		<script type="text/javascript" src="login.js"></script>
  </body>
</html>