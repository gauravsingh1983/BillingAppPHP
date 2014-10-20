<?php
session_start();
include("dbconn.php");
//$con = unserialize($_SESSION['con']);
$user = $_POST['username'];
$pwd = $_POST['password'];

if(!empty($user) && !empty($pwd))
{

$sql_select_from_login="SELECT * FROM LOGIN WHERE USERNAME = '".$user."'";

$result = mysqli_query($con,$sql_select_from_login);

$row = mysqli_fetch_assoc($result);

$usernm = $row['UserName'] ;
$passwd = $row['Password'] ;
$usrtyp = $row['UserType'] ;

$_SESSION['username']=$usernm;
$_SESSION['password']=$passwd;
$_SESSION['usertype']=$usrtyp;




if($passwd == $pwd)
{
	   header( 'Location: http://localhost/testphp/index.php' ) ;
}
else
{
	   header( 'Location: http://localhost/testphp/login.php' ) ;
}

}
else
{
 header( 'Location: http://localhost/testphp/login.php' ) ;
}

?>

