<?php
include("dbconn.php");
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");;

$id = $_POST['id'];


$sql_select_item_by_id="SELECT * FROM itemtable where id = ".$id;

$result = mysqli_query($con,$sql_select_item_by_id);

while($row = mysqli_fetch_array($result)) {

  $responseXML = "<items>";
  $responseXML .= "<id>" . $row['Id'] . "</id>";
  $responseXML .= "<item>" . $row['Item'] . "</item>";
  $responseXML .= "<rate>" . $row['Rate'] . "</rate>";
  $responseXML .= "<vat>" . $row['Vat'] . "</vat>";
  $responseXML .= "<cat>" . $row['Category'] . "</cat>";
  $responseXML .= "</items>";
}

echo $responseXML;
mysqli_close($con);
?> 