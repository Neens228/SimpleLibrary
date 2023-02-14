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
  background-color: #FFFFFF;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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


.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color: #FFFFFF;
  color: black;
  height: 40px;
}

	</style>


</head>
<body>
	

<div id="main">
  <div class="container" style="text-align: center;">
    <h2 style="color:black; font-family: Lucida Console; text-align: center"><b>Добавить новую книгу</b></h2>
    
    <form class="book" action="" method="post">
        
         
        <input type="text" name="name" class="form-control" placeholder="Название" required=""><br>
        <input type="text" name="authors" class="form-control" placeholder="Автор" required=""><br>
        <input type="text" name="edition" class="form-control" placeholder="Издание" required=""><br>
        <input type="number" name="year" class="form-control" placeholder="Год" required=""><br>

        <button style="text-align: center;"  type="submit" name="submit">Добавить</button>
    </form>
  </div>
<?php
if (isset($_POST['submit'])) {
    mysqli_query($db, "INSERT INTO books VALUES ( '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[year]') ;");
    ?>
          <script type="text/javascript">
            alert("Book Added Successfully.");
          </script>

        <?php
}
?>
</div>


</body>
