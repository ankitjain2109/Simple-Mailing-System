<?php
mysql_connect("localhost","root","") or die(mysql_error());;
mysql_select_db("project") or die(mysql_error());
?>


<?php
include("label_list.php");
?>


<input type="submit" name="drdl" value=" Delete " />

<br /><hr />

<?php
$sql="select * from draft where sid='$userid'";
$data=mysql_query($sql);
while($res=mysql_fetch_array($data))
{
	$id=$res['serial_no'];	
	$email= $res['email'];	
	$rid= $res['rid'];	
	$saved_id= $res['saved_id'];	
	$sub= $res['sub'];
	$date= $res['date'];	
	
  echo "&nbsp;&nbsp;<input type='checkbox' name='dr[]' value=$id>&nbsp;&nbsp;"."<a href='useraccount.php?DR=$id'>$rid--$saved_id--$sub--$date</a>".'<hr>';

	
	
}
?>


