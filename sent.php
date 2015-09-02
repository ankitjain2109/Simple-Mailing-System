<?php
mysql_connect("localhost","root","") or die(mysql_error());;
mysql_select_db("project") or die(mysql_error());
?>

<?php
include("label_list.php");
?>

<input type="submit" name="sentdl" value=" DELETE " />
<br /><hr />

<?php
$sql="select * from sent_items where sid='$userid'";
$data=mysql_query($sql);
while($res=mysql_fetch_array($data))
{
	$id=$res['serial_no'];
	$email= $res['email'];	
	$rid= $res['rid'];	
	$sub= $res['sub'];
	$date= $res['date'];
	$f_id= $res['f_id'];	
	
  echo "&nbsp;&nbsp;<input type='checkbox' name='sent[]' value=$id>&nbsp;&nbsp;"."<a href='useraccount.php?SENT=$id'>$rid--$sub--$f_id--$date</a>".'<hr>';

}
?>


