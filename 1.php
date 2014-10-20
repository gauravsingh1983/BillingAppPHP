<?php
function writeMsg() {
  echo "Hello world!";
}

writeMsg(); // call the function
include("dbconn.php");
include("db_queries.php");
echo getBillNo($con);
?>

