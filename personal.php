<?php
include("label_list.php");
?>


<input type="submit" name="prdl" value=" DELETE " />
<br /><hr />

<?php
$sql="select * from sent_items where sid='$userid'";
$data=mysql_query($sql);
while($res=mysql_fetch_array($data))
{
	$id=$res['serial_no'];	
	$email= $res['email'];	
	$sid= $res['sid'];	
	$saved_id= $res['saved_id'];	
	$sub= $res['sub'];
	$date= $res['date'];	
	
  echo "&nbsp;&nbsp;<input type='checkbox' name='personal[]' value=$id>&nbsp;&nbsp;"."<a href='useraccount.php?PERSONAL=$id'> $saved_id--$sid--$sub--$date</a>".'<hr>';
	
}
?>


