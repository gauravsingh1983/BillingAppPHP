<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>
 Billing App        
</title>

<script type="text/javascript">
function getTodayReport(){
window.open("reports.jsp");
}
function check3(){
    val = document.getElementsByName("inputName");
if(val.length==0){
   alert("No Item to be printed!!");
    return false;
   }
  return true;
}
function a(){
     document.getElementById('inputText').focus();       
}

function setFocus(e){
    
    var theEvent = e || window.event;
   //alert(theEvent.charCode);
    if(theEvent.ctrlKey && theEvent.keyCode == 13) {
        if(check3()){
	document.frm.submit();
         }
       }
    if(theEvent.shiftKey && theEvent.keyCode == 0) {
   reset();
       }
    if(theEvent.altKey && theEvent.keyCode == 0) {
	document.getElementById('inputPrice').focus();
        document.getElementById('inputPrice').readOnly=false;
       }
    if(theEvent.altKey && theEvent.shiftKey && theEvent.charCode == 68){
    window.open('deleteOrders.php','location','top=150,left=230,toolbars=no,maximize=yes,resize=yes,width=700,height=450,location=no,scrollbars=yes');
    }
 }
function getQ(val){
    var qty=0;
    var rate=(document.getElementById('inputRate').value-0);
    qty =val/rate;
   return  Math.round(qty*1000)/1000;   
 }
function getP(val){
    var price;
    var rate=(document.getElementById('inputRate').value-0);
    price=rate*val;
    return Math.round(price*100)/100;   
 }    
function handleQ(price) {
    if(document.getElementById('inputText').value!="")
	{
	if(!isNaN(getQ(price))){
        document.getElementById('inputQty').value =getQ(price);
        document.getElementById('inputPrice').readOnly=true;
        insertRowToTable();
         }else{
         alert("please enter numeric value amt!!");
         document.getElementById('inputPrice').focus();
           // document.getElementById('inputPrice').value="0.0";
         }
        }
}
function handleP(qty) {
    if(document.getElementById('inputText').value!="")
	{
         if(!isNaN(getP(qty)))
         {document.getElementById('inputPrice').value =getP(qty);
        document.getElementById('inputPrice').readOnly=true;
        insertRowToTable();
        }else{
            alert("please enter numeric value Qty!!");
            document.getElementById('inputQty').focus(); 
        // document.getElementById('inputQty').value="0.0";
            }
        }
        //alert('nikji');
}
</script>
<script type="text/javascript" src="suggest.js"></script>
<script type="text/javascript" src="getDetails.js"></script>
<script type="text/javascript" src="tabledeleterow.js"></script>
<link href="style/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style3 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
    }
    
.style2 {
        font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 20px;
	color: #333333;
	font-weight: bold;
}
</style>

</head>
<!--body background="images/sweetshop.jpg" onclick="emptySuggestions();" onkeydown="handleTab(event);"-->

<body onkeypress="setFocus(event)" onload="a(),fillInRows();">
<div width="20" align="left" class="style3">
<?php
session_start();
$user = $_SESSION['username'];
echo "Hi!  ".$user;
?>
</div>
 <fieldset>   
    <!--H1 ALIGN="CENTER" class="style3">BILLING SYSTEM</H1-->
 <form name ="frm" action="Controller" method="post"> 
  <p>
 <!--input type="button" name="print" value="print" onclick="window.open('printOrder.jsp')" />      
<input type="submit" name="Submit" value="Submit"/--> 
<!--a href="#" onclick="getTodayReport">get today report</a-->
</p>

<div width="200" align="center">


<table  border="0" id="tblSample">
<thead>
<tr class="left-column-header style3">
<th>SNO</th><th>ITEM</th><th>RATE</th><th>CATEGORY</th><th>QUANTITY</th><th>AMOUNT</th><th>DELETE</th>
</tr>
</thead>
<tbody >
<tr class="classy1">
<td>1</td>
<td>
<!--input type="text" id="inputText" name="inputItem" size="40" onchange="showDetails(document.getElementById('inputTextId').value),document.getElementById('inputQty').focus()" onfocus="resetCurrentLi();" onkeyup="handleInput(event, this.value);" />
<input type="hidden" id="inputTextId" name="inputTextId" /-->
<?php
include("dbconn.php");

$result = mysqli_query($con,"SELECT * FROM itemtable order by item");
//$item = array();
while($row = mysqli_fetch_array($result)) {
  $items[] =  $row['Id'] .'|'.$row['Item'];
}
?> 
<select id="inputText" name="inputItem" onchange="showDetails(this.value.split('|')),document.getElementById('inputQty').focus()">
   <option value="">-</option>
 <?php
 foreach($items as $val)
 {
 $printval = explode('|', $val);
 echo "<option  value=".$val.">".$printval[1]."</option>";
 }
mysqli_close($con);
?> 
</select>
<td><input type="text" id="inputRate" name="inputRate" size="10" readonly /></td>
<td><input type="text" id="inputCat" name="inputCat" size="20" readonly /></td>
<td><input type="text" id="inputQty" name="inputQty" size="10" maxlength="7" onchange="handleP(this.value);"/></td>
<td><input type="text" id="inputPrice" name="inputPrice" size="10" maxlength="7" readonly onchange="handleQ(this.value);"/></td>
<td>&nbsp;</td>

</tr>
<tr class="classy1">
  <td colspan="5"><div align="right">TOTAL</div></td>
  <td><div align="center" class="style2" id="tval"></div></td>
  <td colspan="1">&nbsp;</td>
  </tr>
  <tr><td colspan="6"><div align="justify">
</div></td>
<td colspan="1">
    
    <div align="right"><a href="logout.php">logout</a><div align="right">
    
</td></tr>  
</tbody>
</table>
 </div>    
  
  <p><div class="style24 style68" align="center">Copyright &copy; 2014 itsgauravsingh Solutions ALL Rights Reserved</div></p>
 </form>
  </fieldset>        
             
  </body>
</html>