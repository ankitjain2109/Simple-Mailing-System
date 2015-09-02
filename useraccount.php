<?php
session_start();
mysql_connect("localhost","root","") or die(mysql_error());;
mysql_select_db("project") or die(mysql_error());
?>
<?php
$log=$_REQUEST['log'];
if($log=="logout")
{
	unset($_SESSION['sid']);
	header("location:signinpage.php");
}
$userid=$_SESSION['sid'];
if($userid=="")
{
header("location:signinpage.php");
}
?>

<!-- theme-->
<?php
$Theme=$_REQUEST['Theme'];
if($Theme)
{
	mysql_query("update registration set bg_name='$Theme' where email='$userid'");

}
?>

<body background="theme/<?php 
$Bg=mysql_query("select * from registration where email='$userid'");
$BG_IMG=mysql_fetch_array($Bg);
echo $BG_IMG['bg_name'];
 ?>">


<body>
<form method="post" enctype="multipart/form-data">


<table width="100%" height="612" border="1" cellpadding="0" cellspacing="0">
  <tr>
  
    <td width="12%" rowspan="2">
	<font face="serif" size="+4" color="#009900" ><font size="6"><a href="useraccount.php" style="text-decoration:none">&nbsp; GMAIL</a></font></font>	</td>
    
	
	<td width="88%" height="39" align="right"><p>Welcome : <?php echo $userid; ?>  ||<a href="useraccount.php?con=profile" style="text-decoration:none"> Profile </a></p></td>
  </tr>
  
  
  <tr>
    <td height="37" align="right"><a href="useraccount.php?con=setting" style="text-decoration:none">setting </a>||<a href="useraccount.php?log=logout" style="text-decoration:none"> Logout </a>||<a href="http://www.google.com" style="text-decoration:none"> Need Help</a> </td>
  </tr>
  
  
  <tr>
    <td rowspan="2" valign="top">
	<p>

<?php
$fname=$_FILES['f1'];
$tmp_name=$_FILES['f1']['tmp_name'];
if($_REQUEST['subprofile'])
{
	$target="account/$userid/profile/$fname";
	move_uploaded_file($tmp_name,$target);
}

?>	
<?php echo "<img src='account/$userid/profile/array' height='100' width='100'>"; ?><br><a href="useraccount.php?con=profile">Edit Profile</a></p>
    
	
	  <p><a href="useraccount.php?con=compose" style="text-decoration:none;">&nbsp;&nbsp;Compose</a></p>
      <p ><a href="useraccount.php?con=inbox" style="text-decoration:none">&nbsp;&nbsp;Inbox</a></p>
      <p ><a href="useraccount.php?con=sent" style="text-decoration:none">&nbsp;&nbsp;Sent</a></p>
      <p ><a href="useraccount.php?con=draft" style="text-decoration:none">&nbsp;&nbsp;Draft</a></p>
      <p ><a href="useraccount.php?con=personal" style="text-decoration:none">&nbsp;&nbsp;Personal</a></p>
      <p ><a href="useraccount.php?con=trash" style="text-decoration:none">&nbsp;&nbsp;Trash</a></p>
      <p ><a href="useraccount.php?con=label" style="text-decoration:none">&nbsp;&nbsp;Label</a></p>

	  <?php
$opdir=opendir("account/$userid/label");
while($lb=readdir($opdir))
{
	if($lb!="." and $lb!="..")
	{
		echo "<a href='useraccount.php?LB=$lb' style='text-decoration:none'>$lb</a>".'<br>';
	}
}	   
	   ?>
	   
	    <font size="-1">
		<br>
	    &nbsp;&nbsp;
<?php
$opdir=opendir("account/$userid/label");
while($lb=readdir($opdir))
{
	if($lb!="." and $lb!="..")
	{
		echo $lb.'<br>';
	}
}
 ?>
<p>Friend list </p>
	

	<!--table-->
	</td><td height="502">
	<?php
		$con=$_REQUEST['con'];
		
		if($con=="compose")
		{
			include("compose.php");
		}
		if($con=="profile")
		{
			include("profile.php");
		}

		if($con=="personal")
		{
			include("personal.php");
		}
		
		if($con=="sent")
		{
			include("sent.php");
		}
		
		if($con=="trash")
		{
			include("trash.php");
		}	
			
		if($con=="inbox")
		{
			include("inbox.php");
		}
		
		if($con=="draft")
		{
			include("draft.php");
		}		
		if($con=="setting")
		{
			include("setting.php");
		}			

		if($con=="chg_pwd")
		{
			include("password.php");
		}	
		if($con=="chg_theme")
		{
			include("theme.php");
		}
		if($con=="label")
		{
			include("label.php");
		}					
					
	?>

<!--Msg Send-->

<?php
$to=$_REQUEST['to'];
$sub=$_REQUEST['sub'];
$msg=$_REQUEST['msg'];
if($_REQUEST['send'])
{
	if($to=="")
	{
		$message= "<script>alert('Enter mail Id')</script>" ;
		echo "message";
	}
	else
	{
		$sql=mysql_query("select * from registration where email='$to'");
		$res=mysql_fetch_array($sql);
		if($res['email']==$to)
		{
			$d= date("d-m-y-h-i-s",time()+19800);
			mysql_query("insert into sent_items values('','','$userid','$to','$sub','$msg','','$d')");	
			$message= "<script>alert('message sent')</script>" ;
			echo "$message";
		}
		else
		{
		$d= date("d-m-y-h-i-s",time()+19800);
		mysql_query("insert into sent_items values('','','$userid','$userid','$sub','$msg','$to-Msg Failed','$d')");	
			$message= "<script>alert('message failed')</script>" ;
			echo "$message";
		}
	}
}	

												//message save

if($_REQUEST['save'])
{
	$d= date("d-m-y-h-i-s",time()+19800);
	mysql_query("insert into draft values('','$userid','$to','$sub','$msg','$d')");
	$message= "<script>alert('Message Saved')</script>";
	echo $message;
}
?>	


												<!--Mss Open-->
<?php
$INB=$_REQUEST['INB'];
if($INB)
{
	$s="select * from sent_items where serial_no='$INB'";
	$d=mysql_query($s);
	$r=mysql_fetch_array($d);
	echo $r['msg'];
}


?>

<?php
$SENT=$_REQUEST['SENT'];
if($SENT)
{
	$s="select * from sent_items where serial_no='$SENT'";
	$d=mysql_query($s);
	$r=mysql_fetch_array($d);
	echo $r['msg'];
}

?>

<?php
$DR=$_REQUEST['DR'];
if($DR)
{
	$s="select * from sent_items where serial_no='$DR'";
	$d=mysql_query($s);
	$r=mysql_fetch_array($d);
	echo $r['msg'];
}
?>

<?php
$TR=$_REQUEST['TR'];
if($TR)
{
	$s="select * from trash where serial_no='$TR'";
	$d=mysql_query($s);
	$r=mysql_fetch_array($d);
	echo $r['msg'];
}
?>



<?php
$PERSONAL=$_REQUEST['PERSONAL'];
if($PERSONAL)
{
	$s="select * from trash where serial_no='$PERSONAL'";
	$d=mysql_query($s);
	$r=mysql_fetch_array($d);
	echo $r['msg'];
}
?>

													<!--Msg Delete-->

<?php
$inb=$_REQUEST['inb'];
if($_REQUEST['inbdl'])
{
	foreach($inb as $v)
	{
		$sel="select * from sent_items where serial_no='$v'";
		$data=mysql_query($sel);
		while($res=mysql_fetch_array($data))
		{		
			$id=$res['serial_no'];
			$sid=$res['sid'];
			$rid=$res['rid'];
			$sub=$res['sub'];
			$msg=$res['msg'];
			$f_id=$res['f_id'];
			$date=$res['date'];
			mysql_query("insert into trash values('$id','$sid','$rid','$sub','$msg','$f_id','$date')");
			mysql_query("delete from sent_items where serial_no='$v'");
		}
	}
	echo "<script>alert('Message Deleted')</script>";
}
?>
<?php
$dr=$_REQUEST['dr'];
if($_REQUEST['drdl'])
{
	foreach($dr as $v)
	{
		$sel="select * from draft where serial_no='$v'";
		$data=mysql_query($sel);
		while($res=mysql_fetch_array($data))
		{
			
			$id=$res['serial_no'];
			$sid=$res['sid'];
			$saved_id=$res['saved_id'];
			$sub=$res['sub'];
			$msg=$res['msg'];
			$date=$res['date'];
			mysql_query("insert into trash values('$id','$sid','$saved_id','$sub','$msg','','$date')");
			mysql_query("delete from draft where serial_no='$v'");
		}
	}
	echo "<script>alert('Message Deleted')</script>";
}
?>
<?php
$personal=$_REQUEST['personal'];
if($_REQUEST['prdl'])
{
	foreach($personal as $v)
	{
		$sel="select * from sent_items where serial_no='$v'";
		$data=mysql_query($sel);
		while($res=mysql_fetch_array($data))
		{		
			$id=$res['serial_no'];
			$sid=$res['sid'];
			$rid=$res['rid'];
			$sub=$res['sub'];
			$msg=$res['msg'];
			$f_id=$res['f_id'];
			$date=$res['date'];
			mysql_query("insert into trash values('$id','$sid','$rid','$sub','$msg','$f_id','$date')");
			mysql_query("delete from sent_items where serial_no='$v'");
		}
	}
	echo "<script>alert('Message Deleted')</script>";
}
?>
<?php
$sent=$_REQUEST['sent'];
if($_REQUEST['sentdl'])
{
	foreach($sent as $v)
	{
		$sel="select * from sent_items where serial_no='$v'";
		$data=mysql_query($sel);
		while($res=mysql_fetch_array($data))
		{
			
			$id=$res['serial_no'];
			$sid=$res['sid'];
			$rid=$res['rid'];
			$sub=$res['sub'];
			$msg=$res['msg'];
			$f_id=$res['f_id'];
			$date=$res['date'];
			mysql_query("insert into trash values('$id','$sid','$rid','$sub','$msg','$f_id','$date')");
			mysql_query("delete from sent_items where serial_no='$v'");
		}
	}
	echo "<script>alert('Message Deleted')</script>";
}
?>
<?php
$tr=$_REQUEST['tr'];
if($_REQUEST['trdl'])
{
	foreach($tr as $v)
	{
		$sel="select * from trash where serial_no='$v'";
		$data=mysql_query($sel);
		while($res=mysql_fetch_array($data))
		{
			
			mysql_query("delete from trash where serial_no='$v'");
		}
	}
	echo "<script>alert('Message Deleted')</script>";
}
?>


												<!-- CHANGE PASSWORD-->

<?php
$opwd=$_REQUEST['opwd'];
$npwd=$_REQUEST['npwd'];
$cpwd=$_REQUEST['cpwd'];
if($_REQUEST['chg_pwd'])
{
	if($opwd=="")
	{
		echo "<script>alert('Enter Old Password')</script>";
	}
	else
	{
		$sql=mysql_query("select * from registration where email='$userid'");
		$res=mysql_fetch_array($sql);
		if($res['password']==$opwd)
	  	{
	  		if($npwd==$cpwd)
			{
			mysql_query("update registration set password='$npwd' where email='$userid'");
		echo "<script>alert('Password change')</script>";
				}
				else
				{
				echo "<script>alert('Confirm Password Not match')</script>";	
				}
	  }
	  else
	  {
	  echo "<script>alert('Old Password Not match')</script>";
	  
	  }
	
	}
	
}
?>


														<!--LABEL CREATE -->

<?php
$label=$_REQUEST['label'];
if($_REQUEST['c_label'])
{
	if($label=="")
	{
		$msg1="Enter Label Name";
			echo $msg1;
	}
	else
	{
		if(is_dir("account/$userid/label/$label"))
		{
			$msg1="Label Already Exists";
			echo $msg1;
		}
		else
		{
			mkdir("account/$userid/label/$label");
			$msg1="Label Create";
			echo $msg1;
		}
	}
	
}


?>

<!--LABEL LIST move-->

<?php
$i=0;
$label_list=$_REQUEST['label_list'];
$inb=$_REQUEST['inb'];
if($_REQUEST['move_label'])
{
	foreach($inb as $v)
	{
		$i++;
		copy("account/$userid/inbox/$v","account/$userid/label/$label_list/$v");
		unlink("account/$userid/inbox/$v");
	}
	echo $i."&nbsp;Msg Move";
}

?>


<?php
$i=0;
$label_list=$_REQUEST['label_list'];
$tr=$_REQUEST['tr'];
if($_REQUEST['move_label'])
{
	foreach($tr as $u)
	{
		$i++;
		copy("account/$userid/trash/$u","account/$userid/label/$label_list/$u");
		unlink("account/$userid/trash/$u");
	}
	echo $i."&nbsp;Msg Move";
}

?>

<?php
$i=0;
$label_list=$_REQUEST['label_list'];
$sent=$_REQUEST['sent'];
if($_REQUEST['move_label'])
{
	foreach($sent as $b)
	{
		$i++;
		copy("account/$userid/sent/$b","account/$userid/label/$label_list/$b");
		unlink("account/$userid/sent/$b");
	}
	echo $i."&nbsp;Msg Move";
}

?>

<?php
$i=0;
$label_list=$_REQUEST['label_list'];
$dr=$_REQUEST['dr'];
if($_REQUEST['move_label'])
{
	foreach($dr as $b)
	{
		$i++;
		copy("account/$userid/draft/$b","account/$userid/label/$label_list/$b");
		unlink("account/$userid/draft/$b");
	}
	echo $i."&nbsp;Msg Move";
}

?>


<?php
$i=0;
$label_list=$_REQUEST['label_list'];
$pr=$_REQUEST['personal'];
if($_REQUEST['move_label'])
{
	foreach($pr as $b)
	{
		$i++;
		copy("account/$userid/personal/$b","account/$userid/label/$label_list/$b");
		unlink("account/$userid/personal/$b");
	}
	echo $i."&nbsp;Msg Move";
}

?>


<?php
$LB=$_REQUEST['LB'];
if($LB)
{
	$opdir=opendir("account/$userid/label/$LB");
	while($res1=readdir($opdir))
	{
		if($res1!="." and $res1!="..")
		{
			echo "<input type='checkbox'>"."<a href=''>$res1</a>".'<br>';
		}
	}
	echo "<input type='submit' value='delete'>";
	
}
?>

<!--hhhh-->

</td>
</tr>
  
<tr>
    <td height="33" align="center"><span dir="ltr">&copy;2014&nbsp;Google</span>&nbsp;-&nbsp;<a href="http://mail.google.com/mail/help/terms.html" target="_blank" style="text-decoration:none">Terms &amp; Privacy</a></td>
  </tr>
</table>
</form>
</body>