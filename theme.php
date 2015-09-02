<?php /*?><?php
$fname=$_FILES['f1']['name'];
$tmp_name=$_FILES['f1']['tmp_name'];
if($_REQUEST['sub1'])
{
	$target="theme/$fname";
	move_uploaded_file($tmp_name,$target);
	echo "File Uploaded";
}
?><?php */?>
<?php
$sql=mysql_query("select * from theme");
while($res=mysql_fetch_array($sql))
{
	echo "<a href='useraccount.php?Theme=$res[img_name]'><img src='theme/$res[img_name]' height='100' width='100'></a>&nbsp;&nbsp;";
}
?>


<hr />
<form method="post" enctype="multipart/form-data">
<input type="file" name="f1" />
<input type="submit" name="sub1" value="Submit" />
</form>


