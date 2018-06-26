<?php

header('Content-Type:application/json');


define('DB_HOST','localhost:3306');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');
define('DB_NAME','indospirit');


$mysqli=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(!$mysqli){
	die("Connection failed:" .$mysqli->error);

}

// $query=sprintf("SELECT SUM(QuantityOrdered) AS QuantityOrdered,Month,Year from industry use index(index_SNo) where Year=2016 GROUP BY Month");
// $query=sprintf("SELECT MAX(QuantityOrdered) AS QuantityOrdered,BrandName from industry use index(index_SNo) GROUP BY BrandName SORT BY DESC LIMIT=5");
 $query=sprintf("SELECT SUM(QuantityOrdered) AS QuantityOrdered,Channel from industry use index(index_SNo) GROUP BY Channel");


$result=$mysqli->query($query);

$data=array();
foreach($result as $row){
	$data[]=$row;

}
$result->close();
$mysqli->close();
print json_encode($data);


?>








 