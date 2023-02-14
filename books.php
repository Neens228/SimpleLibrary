<style>
	body{
		background-color: #FFFFFF;
	}
</style>
<?php
  include "connection.php";
  include "navbar.php";
?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
   background-color: #FFFFFF;
}

button {
  appearance: none;
  background-color: #FAFBFC;
  border: 1px solid rgba(27, 31, 35, 0.15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
  box-sizing: border-box;
  color: #24292E;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
  font-size: 14px;
  font-weight: 500;
  line-height: 20px;
  list-style: none;
  padding: 6px 16px;
  position: relative;
  transition: background-color 0.2s cubic-bezier(0.3, 0, 0.5, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
  word-wrap: break-word;
}

button:hover {
  background-color: #F3F4F6;
  text-decoration: none;
  transition-duration: 0.1s;
}

button:disabled {
  background-color: #FAFBFC;
  border-color: rgba(27, 31, 35, 0.15);
  color: #959DA5;
  cursor: default;
}
button:active {
  background-color: #EDEFF2;
  box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
  transition: none 0s;
}

.button:focus {
  outline: 1px transparent;
}

button:before {
  display: none;
}

button:-webkit-details-marker {
  display: none;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
	
<div id="main">
  
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="title" placeholder="Название..." >
				<input class="form-control" type="text" name="authors" placeholder="Автор..." >
				<input class="form-control" type="text" name="edition" placeholder="Издание..." >
				<input class="form-control" type="text" name="year" placeholder="Год..." >
				<button style="background-color: #FFFFFF;" type="submit" name="submit" >
					<span class="glyphicon glyphicon-search"></span>  Поиск
				</button>
		</form>
		<form class="navbar-form" method="post" name="form1">
				</button>
		</form>
	</div>
	<h2>Библиотека</h2>
	<?php
	
	if(!empty($_POST['title']) or !empty($_POST['authors']) or !empty($_POST['edition']) or !empty($_POST['year'])){
		$check = false;
		$str = null;
		if(!empty($_POST['title'])){
			$title = $_POST['title'];
			if($title[0] =='-'){
				$mlg = trim($_POST['title'],'-');
				$str = $str . " name = '{$mlg}'";
			}
			else{
				$str = $str . " name LIKE '%$title%'";
			}
			$check = true;
		}
		if(!empty($_POST['authors'])){
			$authors = $_POST['authors'];
			if($check){
				$str = $str . " and ";
			}
			if($authors[0] =='-'){
				$mlg = trim($_POST['authors'],'-');
				$str = $str . " authors = '{$mlg}'";
			}
			else{
				$str = $str . " authors LIKE '%$authors%'";
			}
	
			$check = true;
		}
		if(!empty($_POST['edition'])){
			$edition = $_POST['edition'];
			if($check){
				$str = $str . " and ";
			}
			if($edition[0] =='-'){
				$mlg = trim($_POST['edition'],'-');
				$str = $str . " edition = '{$mlg}'";
			}
			else{
				$str = $str . " edition LIKE '%$edition%'";
			}
			
			$check = true;
		}
		if(!empty($_POST['year'])){
			$year = $_POST['year'];
			if($check){
				$str = $str . " and ";
			}
			if(str_ends_with($year,"0")){
				$mlg = substr($mlg,0,-1).'%';
				echo $mlg;
			}
			if($year[0] =='-'){
				$mlg = trim($_POST['year'],'-');
				$str = $str . " year = '{$mlg}'";
			}
			else{
				$str = $str . " year LIKE '%$year%'";
			}
			$check = true;
		}
		
		
		
	}
		
		if(isset($_POST['submit']))
		{
				$q = mysqli_query($db,"SELECT * from books where ".$str);
			
			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #FFFFFF;'>";
				//echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Название";  echo "</th>";
				echo "<th>"; echo "Автор";  echo "</th>";
				echo "<th>"; echo "Издание";  echo "</th>";
				echo "<th>"; echo "Год"; echo "</th>";
			
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				//echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['year']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
		
			
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #FFFFFF;'>";
			
				//echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Название";  echo "</th>";
				echo "<th>"; echo "Автор";  echo "</th>";
				echo "<th>"; echo "Издание";  echo "</th>";
				echo "<th>"; echo "Год"; echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				//echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['year']; echo "</td>";
				echo "</tr>";
			}
		echo "</table>";
		}
	?>
</div>
</body>
</html>