<?php
mysql_connect("localhost","root","") or die(mysql_error());;
mysql_select_db("project") or die(mysql_error());


session_start();
$email=$_REQUEST['email'];
$pwd=$_REQUEST['pwd'];
if($_REQUEST['login'])
{
	if($email=="" or $pwd=="")
	{
		$error= "<script>alert(' Enter Id and Password')</script>";
	}
	elseif($check=="")
	{
		$error= "<script>alert(' All the terms should be agreed')</script>";
	}
	else
	{
		$sql=mysql_query("select password from registration where email='$email'");
		$res=mysql_fetch_array($sql);
		if($res['password']==$pwd)
		{
			$_SESSION['sid']=$email;
			header("location:useraccount.php");
		}
		else
		{	
			$error= "<script>alert('Id and Password Not Match')</script>";
			 
		}
	}
}

?>


<form>

<table align="center"><tr>
    <td height="10" style="font-size:35px; color:#616161;">One account. All of Google.</td>
  </tr>
  </table>

<table width="563px" height="500" align="center" border="0" cellpadding="0" cellspacing="0" background="images/backsignin.jpg" border="0" vspace="50px">

<tr><td colspan="2" valign="middle" align="center" style="color:#FFFFFF"><?php echo $error ?></td></tr>



<tr align="center">
<td align="center" colspan="3">
<font face="serif" size="+10" color="#0000FF">G</font>
<font face="serif" size="+10" color="#FF0000">o</font>
<font face="serif" size="+10" color="#FFFF00">o</font>
<font face="serif" size="+10" color="#0000FF">g</font>
<font face="serif" size="+10" color="#009900">l</font>
<font face="serif" size="+10" color="#FF0000">e</font>
</td>
</tr>

<tr>
    <td height="180" colspan="3" align="right" style="color:#FF0000">SIGN IN TO GMAIL ACCOUNT&nbsp;&nbsp;</td>
  </tr>
  
  <td>&nbsp;</td>
  <td>&nbsp;</td><td>&nbsp;</td>
  <td>&nbsp;</td><td>&nbsp;</td>
  <tr>
    <td>&nbsp;&nbsp;<input type="text" align="left" name="email" placeholder=" EMAIL ID" border="1" height="25" width="200" style="border-radius:4px"></td>
    
  </tr>
  
  <tr>
    <td>&nbsp;&nbsp;<input type="password" align="left" name="pwd" placeholder=" PASSWORD" border="1" style="border-radius:4px"></td>
  </tr>
  
    <tr>
    <td>&nbsp;<input type="checkbox" name="check" align="left"><font size="-1">&nbsp; I AGREE ALL THE TERMS</font></td>
  </tr>
  
  
  <tr>
    <td width="145">&nbsp;&nbsp;<input type="submit" width="20%" align="left" name="login" value="SIGN IN" style="height:33px; width:130px; background-color:#4888f0; color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;"></td>
   <!-- <td width="126"><a href="http://localhost/project/signinpage.php"> need help?</a></td>-->
  </tr>
    
  <tr>
    <td width="100">&nbsp;&nbsp;<a href="http://localhost/project/signinpage.php" style="text-decoration:none"> need help?</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="registration.php" style="text-decoration:none"> need an account?</a></td>
    </tr>
  
  
  <tr>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
</table>

</form>

