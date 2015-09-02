<?php
mysql_connect("localhost","root","") or die(mysql_error());;
mysql_select_db("project") or die(mysql_error());
include("label_list.php");
?>
<input type="submit" name="inbdl" value=" DELETE " />
<br /><hr />

<?php
$sql="select * from sent_items where rid='$userid'";
$data=mysql_query($sql);
while($res=mysql_fetch_array($data))
{
	$id=$res['serial_no'];	
	$sid=$res['sid'];	
	$sub=$res['sub'];
	$date=$res['date'];
	$f_id=$res['f_id'];	
	
	echo "<input type='checkbox' name='inb[]' value='$id'>"."<a href='useraccount.php?INB=$id'>&nbsp;&nbsp;$sid--$sub--$f_id--$date</a>".'<hr>';	
	
}
?>



