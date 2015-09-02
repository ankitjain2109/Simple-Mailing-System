<select name="label_list">
<?php
$opdir=opendir("account/$userid/label");
while($lb=readdir($opdir))
{
	if($lb!="." and $lb!="..")
	{
		echo "<option>$lb</option>";
	}
}
	  
?>
</select>

<input type="submit" name="move_label" value=" Move to Label ">