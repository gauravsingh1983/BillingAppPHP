<?php
include("dbconn.php");
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");;

$q = $_POST['id'];


$sql_select_item_by_id="SELECT * FROM itemtable WHERE id = '".$q."'";

$result = mysqli_query($con,$sql_select_item_by_id);

while($row = mysqli_fetch_array($result)) {
  
  $responseXML = "<?xml version='1.0'?>";
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