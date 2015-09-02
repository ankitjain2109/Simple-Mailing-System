<?php

mysql_connect("localhost","root","") or die(mysql_error());;
mysql_select_db("project") or die(mysql_error());

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$pwd=$_REQUEST['pwd'];
$bdate=$_REQUEST['bdate'];
$contact=$_REQUEST['contact'];
$gender=$_REQUEST['gender'];
$location=$_REQUEST['location'];
$conf_pwd=$_REQUEST['conf_pwd'];
$checkbox=$_REQUEST['checkbox'];
$n=$_REQUEST['n'];
$n1=$_REQUEST['n1'];
if($_REQUEST['Register'])
{
	if($name=="" or $email=="" or $pwd=="" or $conf_pwd=="" or $checkbox=="" or $bdate=="" or $location=="" or $contact=="" or $gender=="")
	{
		$msg= "<script>alert('Fill All Fields')</script>";
	}
	else
	{
		$sql=mysql_query("select * from registration where email1='$email'");
		$res=mysql_fetch_array($sql);
		if($res['email']==$email)
		{
			$msg= "<script>alert('Id already exists')</script>";
		}
		else
		{
			$d=date("d/m/y h:i:s",time()+19800);
			mysql_query("insert into registration values('$name','$email','$pwd','$conf_pwd','$gender','$bdate','$location','$contact','$d')");
			$msg= "<script>alert('Registration Succesful')</script>";
				
		}
	}

}


?>



<?php
if($_REQUEST['SIGN_IN'])
{
header("Location: signinpage.php");
}
?>


<form>
<body background="images/Google Backgrounds 2.jpg" style="background-repeat:no-repeat; height:100%;">
</body>

<table >
 <tr>
 <td width="60%" height="60" align="left" style="font-size:25px; color:#FFFFFF"> CREATE YOUR GOOGLE ACCOUNT </td>
 <td width="30%">&nbsp;&nbsp;</td>
 <td align="right" width="10%" height="60" style="font-size:16px"><input type="submit" name="SIGN_IN" value="SIGN IN" style="width:140px; height:40px" ></a></td> 
 </tr>
</table>


<table width="30%" height="530" align="left" border="0" cellpadding="0" cellspacing="0">
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr><td colspan="2" valign="middle" align="center" style="color:#FFFFFF"><?php echo $msg ?></td></tr>

<tr align="left"><td style="font-size:16px; color:#FFFFFF"> &nbsp;&nbsp;NAME </td></tr>
<tr><td>&nbsp;&nbsp;<input type="text" name="name" align="right" placeholder="NAME" style="width:385; height:25" />&nbsp;&nbsp;
</td></tr>
  
  
  <tr align="left"><td style="font-size:16px; color:#FFFFFF" colspan="2">&nbsp;&nbsp;USER ID </td></tr>
  <tr><td>&nbsp;&nbsp;<input type="text" name="email" placeholder="xyz@gmail.com" style="width:385; height:25" />&nbsp;&nbsp;
  </td></tr>
  
  <tr align="left"><td style="font-size:16px;  color:#FFFFFF" colspan="2">&nbsp;&nbsp;PASSWORD </td></tr>
	<tr><td>&nbsp;&nbsp;<input type="password" name="pwd" placeholder="password" style="width:385; height:25"/>&nbsp;&nbsp;
  </td></tr>
  
  <tr align="left"><td style="font-size:16px;  color:#FFFFFF" colspan="2">&nbsp;&nbsp; CONFIRM PASSWORD :</td></tr>
	<tr><td>&nbsp;&nbsp;<input type="password" name="conf_pwd" placeholder="confirm password" style="width:385; height:25"/>&nbsp;&nbsp;
  </td></tr>
  
  <tr align="left"><td style="font-size:16px;  color:#FFFFFF" colspan="2">&nbsp;&nbsp;Birthday  </td></tr>
	<tr><td>&nbsp;&nbsp;<input type="date" name="bdate" style="width:385; height:25"/>&nbsp;&nbsp;
	</td></tr>
  
  <tr align="left"><td style="font-size:16px;  color:#FFFFFF" colspan="2">&nbsp;&nbsp; GENDER  </td></tr>
  <tr><td>&nbsp;&nbsp;<select style="width:385; height:25" name="gender">
		<option>MALE</option>
		<option>FEMALE</option>
		</select>
		&nbsp;&nbsp;
	</td></tr>
  
  <tr align="left"><td style="font-size:18px;  color:#FFFFFF" colspan="2">&nbsp;&nbsp;MOBILE No. </td></tr>
  <tr><td>&nbsp;&nbsp;<input type="text" name="contact" placeholder="mob. no." style="width:385; height:25"/>&nbsp;&nbsp;
  </td></tr>

  <tr align="left"><td style="font-size:18px;  color:#FFFFFF" colspan="2">&nbsp;&nbsp;LOCATION </td></tr>
  <tr><td>&nbsp;&nbsp;<input type="text" name="location" placeholder="location" style="width:385; height:25"/>&nbsp;&nbsp;
  </td></tr>




<tr >
<td align="left" style="font-size:18px;color:#FFFFFF">&nbsp;&nbsp;Prove that you are not a Robot</td>
</tr>


<tr>
<td colspan="2" align="right" width="385" height="40" >
<?php

$a=range("a","z");
$b=range(0,9);
$c=range("A","Z");
$col=array("red","green","blue","purple","#8000FF","#FB7D00","#00D900");
$style=array("Adobe Caslon Pro Bold","Bradley Hand ITC","Brush Script MT","Brush Script Std","Viner Hand ITC","Arial");

$aa=array_rand($a);
$bb=array_rand($b);
$cc=array_rand($c);
$color=array_rand($col);
$font=array_rand($style);

$res= $a[$aa].$b[$bb].$c[$cc];


?>



<input type="image" value="<?php echo $res;  ?>" style="color:<?php echo $col[$color];?>; font-family:<?php  echo $style[$font]; ?>; font-size:56px; border:3px solid #CCCCCC;" width="385" height="80" align="middle">

<br>
<br>
<input  type="text" name="n" placeholder="submit" style="width:385; height:25">&nbsp;&nbsp;
<input type="hidden" name="n1" value="<?php echo $res; ?>">



<?php
$n=$_REQUEST['n'];
$n1=$_REQUEST['n1'];
if($_REQUEST['Register'])
{
	if($n==$n1)
	{	
		echo "<a href='https://www.google.co.in/'>match</a> ";
	}
	else
	{
		echo "<font size='-2' color='#FFFBF0'> CAPTCHA DIDN'T MATCH </font>'";
		
	}
}

?>
</td>
</tr>
  <tr align="left">
    <td colspan="2"><input type="checkbox" name="checkbox" align="left" style="width:40; height:20"><font size="-2" color="#FFFBF0"> I AGREE THE GOOGLE TERMS OF SERVICES AND PRIVACY POLICY</font>&nbsp;&nbsp;</td>
  </tr>


<tr><td align="right">
<input type="submit" name="Register" value="Register" align="right" style="width:100; height:40;">
</td></tr>



  
  <tr>
    <td>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td height="19">&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td height="19">&nbsp;</td>
  </tr>
</table>


</form>