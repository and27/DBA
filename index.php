<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="text-center">
<img src="https://cdn1.imggmi.com/uploads/2019/7/16/4ea53eee6a597ee65ab7698f6bc2e495-full.png">
<h1> To do List - Andrés Banda</h1></div>
<div class="container">
<form action="?" method="post">
  <div class="form-row">
	<div class="col">
		<input type="text" class="form-control" name ="task" placeholder="enter task">
	</div>
	<div class="col">
		<input type="text" class="form-control" name="deadline" placeholder="enter date">
	</div>	
	<input type="submit" class="btn btn-primary" value="Insertar">
   </div>
</form>
<div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

$task = $_POST['task'];
$deadline = $_POST['deadline'];
//echo "Your Task Inserted is : ".$task."<br><br>";

$mysqli = new mysqli ($servername, $username, $password, $dbname);
if (!$mysqli){
echo "Error: no establecimos conexion";}
else{
$sql = "Insert into todolist values('$task', '$deadline')";
$mysqli->query($sql);
$mysqli->close();}

$mysqli = new mysqli ($servername, $username, $password, $dbname);
if(!$mysqli){
echo "Error: No logramos conectarnos";
}
else{
$sql = "Select * from todolist";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
echo '<table class=\'table\'><tr><th>Task</ht><th>Deadline</th></tr>';
  while($row = $result->fetch_assoc()) {
	  echo '<tr>';
      echo "<td>" . $row["task"]. "</td> <td>" . $row["deadline"]."</td>";
	  echo '</tr>';
}
echo '</table>';
} else {
    echo "0 results";
}
$mysqli->close();
}


?>

</body>
</html>
