<?php
include("dbconn.php");
header("Cache-Control: no-cache, must-revalidate");;

//$id = $_POST['id'];


$sql_select_item_by_id="SELECT * FROM itemtable order by item";

$result = mysqli_query($con,$sql_select_item_by_id);
//$item = array();
while($row = mysqli_fetch_array($result)) {
  
  $items[] =  $row['Id'] .'|'.$row['Item'];

}
//$_SESSION['items']=$items[];
foreach($items as $val)
{
echo $val;
}
mysqli_close($con);
?> 