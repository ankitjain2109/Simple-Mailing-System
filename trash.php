<?php
mysql_connect("localhost","root","") or die(mysql_error());;
mysql_select_db("project") or die(mysql_error());
?>

<?php
include("label_list.php");
?>

<input type="submit" name="trdl" value=" DELETE " />
<br /><hr />

<?php
$sql="select * from trash where rid='$userid'";
$data=mysql_query($sql);
while($res=mysql_fetch_array($data))
{
	$id=$res['serial_no'];	
	$email= $res['email'];	
	$rid= $res['rid'];	
	$sub= $res['sub'];
	$date= $res['date'];
	$f_id= $res['f_id'];
	$saved_id=$res['saved_id'];	
	
	
 echo "&nbsp;&nbsp;<input type='checkbox' name='tr[]' value=$id>&nbsp;&nbsp;"."<a href='useraccount.php?TR=$id'>$rid--$sub--$saved_id--$f_id--$date</a>".'<hr>';

}
?>




