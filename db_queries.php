<?php
function get_bill_no($con)
{
	$sql_get_bill_no="SELECT count(distinct orderid) as billno FROM OrderTable ";
	$result = mysqli_query($con,$sql_get_bill_no);
	$row = mysqli_fetch_assoc($result);
	$billno = $row['billno'];
	return $billno;
}


function get_pwd($con, $user)
{
	$sql_get_password="select password from login where username=".$user;
	$result = mysqli_query($con,$sql_get_password);
	$row = mysqli_fetch_assoc($result);
	$pwd = $row['password'];
	return $pwd;
}

function insert_order_table()
{

}
?>

