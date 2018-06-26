<?php

// header('Content-Type:application/json');


define('DB_HOST','localhost:3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','indospirit');


$mysqli=new PDO('mysql:host=localhost:3306;dbname=indospirit', 'root', 'root');

if(!$mysqli){
	die("Connection failed:" .$mysqli->error);

}
// $query=sprintf("SELECT SUM(QuantityOrdered) AS QuantityOrdered,Month,Year from industry use index(index_SNo) where Year=2016 GROUP BY Month");
// $query=sprintf("SELECT MAX(QuantityOrdered) AS QuantityOrdered,BrandName from industry use index(index_SNo) GROUP BY BrandName SORT BY DESC LIMIT=5");
 $query="SELECT SUM(QuantityOrdered) AS QuantityOrdered,Month,Year from industry use index(index_SNo) GROUP BY Month,Year";



$result=$mysqli->query($query);


// $followingdata = $result->fetch_assoc();
 // $data=array();
 // foreach($followingdata as $row){
 // 	$data[]=$row;
 // }
// $result->close();
// $mysqli->close();
// print json_encode($data);


?>

<!DOCTYPE html>
	<head>
	</head>
<body>


<form action="test_data.php" method="get">
<select name="year">
<option value"">Select a year</option>
<?php foreach($result->fetchAll() as $user):?>
<option value=""><?php echo $user['Year'];?></option>
<?php endforeach;?>
</select>
</form>
</body>

</html>






 