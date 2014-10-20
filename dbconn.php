<?php
$con = mysqli_connect('localhost','root','','sweets');
if (!$con) 
{
  die('Could not connect: ' . mysqli_error($con));
}
$db_selected = mysqli_select_db($con,"sweets");
if (!$db_selected)
{
	die ('Could not select database : ' . mysql_error());
}


//$_SESSION['items']=$items; 

//echo $items;

// set the value of the session variable 'foo'
//$_SESSION['con']=$con;
//$_SESSION['con'] = serialize($con);

?>