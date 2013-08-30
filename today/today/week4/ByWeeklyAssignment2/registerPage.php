<?php	
require "register.class.php";
//Declaring this variables globally and initializing them 
/*$error_string="";
$error_string1="";
$error_string2="";
$error_string3="";
$error_string4="";
$error_string5="";
$error_string6="";
$error_string7="";
$error_string8="";
$error_string9="";
$error_string10="";
$error_string11="";*/
$msg="";

if($_SERVER['REQUEST_METHOD']=="POST")
   		{


       $name = trim($_POST['name']);
       $surname = trim($_POST['surname']);
       $email = trim($_POST['email']);
	   $username = trim($_POST['username']);
       $password = trim($_POST['password']);
	   $conpassword = trim($_POST['conpassword']);
	   
	   

			if(empty($surname))
			{
				 $error_string1 .= '<br />Surname required';
			}
			 if(!preg_match('/^[A-Za-z \'-]+$/', $surname))
			{
				$error_string2 .= '<br />Surname can only contain letters.';
			}
      		 if(empty($name))
			{
				 $error_string3 .= '<br />Name required';
			}
			 if(!preg_match('/^[A-Za-z \'-]+$/', $name))
			{
				$error_string4 .= '<br />name can only contain letters.';
			}
			if(empty($username))
			{
				 $error_string5 .= '<br />Username required';
			}
		   
			if(empty($email)) 
			{
				 $error_string6 .= '<br />Email required';
			}
			
			if(!preg_match("/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/", $email)) 
      		{
               $error_string7 .=  '<br />The email you have entered is not valid';
      		}
			
			if(empty($password))
			{
				  $error_string8 .= '<br />Password required';
			}

			if(empty($conpassword))
			{
				  $error_string9 .= '<br />Confirmation password required';
			}
			if(strlen($password) >32 || strlen($password) < 8)
			{
				 $error_string10 .= '<br />Your password must be between 8 -32 characters';
			}
			if($password != $conpassword)
			{
				 $error_string11 .= '<br />The password you entered do not match please check';
			}
			
			if(!$name||!$surname||!$username||!$email||!$password||!$conpassword)
			{
				
				$msg="Failed to register";
			}
			else
			{
					$reg = new Register($surname, $name, $username, $email,$password,$conpassword);
					$msg =  $reg -> displayUserInfo($username,$password);
					$reg->save();
			}
		}
     
 ?>

<style type="text/css">
<!--
body {
	background-attachment:scroll;
background-image
; 	background-image: url(pics/5.jpg);	
	
}
.style4 {
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
}
.style6 {font-size: 18px; font-family: "Times New Roman", Times, serif; }
.style10 {
	font-size:xx-large;
	font-weight: bold;
	background-image:url(pics/3.jpg);
	background-position:center;
}
.style11 {
background-image:url(pics/JDSJ608.jpg);
table-layout:auto;
}
.style12 {
background-image:url(pics/3.jpg);
}
.style13 {
background-image:url(pics/1600giviing_2007.jpg);
}
.style14 {
background-image:url(pics/9.jpg);
border-radius:25px;
}
-->
</style>
<table width="1337" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="style14"  >
  <!--DWLayoutTable-->
  <tr>
    <td width="85" height="25">&nbsp;</td>
    <td width="1155">&nbsp;</td>
    <td width="97">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td valign="top" ><h1 align="center" class="style10">*****Registration Form*********</h1></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="467">&nbsp;</td>
    <td valign="top" bgcolor="#FFFFFF" class="style13"   ><form id="form1" name="form1" method="post" action="registerPage.php">
      <p>
        <?php
            if($error_string)
                echo '<font color="red">'.$error_string.'</font>';
        ?>
      </p>
      <p>
        <label><span class="style6">&nbsp;</span></label>
      </p>
      <table width="692" border="0">
        <tr>
          <td width="282"><label><span class="style6"> What is your surname?</span></label>
            <span class="style6"><br />
            <input name="surname" type="text" size="40" />
            </span></td>
          <td width="354"><span class="style6">
            <?php if($error_string1) echo '<font color="red">'.$error_string1.'</font>';
		  													 if($error_string2) echo '<font color="red">'.$error_string2.'</font>';	?>
          </span></td>
        </tr>
        <tr>
          <td><span class="style6">
            <label>&nbsp;What is your name?</label>
            <br/>
            <input name="name" type="text" size="40" />
          </span></td>
          <td><span class="style6">
            <?php if($error_string3) echo '<font color="red">'.$error_string3.'</font>';
		  													 if($error_string4) echo '<font color="red">'.$error_string4.'</font>';	?>
          </span></td>
        </tr>
        <tr>
          <td><span class="style6">
            <label>&nbsp;Please enter your email address</label>
            <br/>
            <input name="email" type="text" size="40" />
          </span></td>
          <td><span class="style6">
            <?php if($error_string6) echo '<font color="red">'.$error_string6.'</font>';
		  													 if($error_string7) echo '<font color="red">'.$error_string7.'</font>';	?>
          </span></td>
        </tr>
        <tr>
          <td><span class="style6">
            <label>&nbsp;Please enter your username </label>
            <br/>
            <input name="username" type="text" size="40" />
          </span></td>
          <td><span class="style6">
            <?php if($error_string5) echo '<font color="red">'.$error_string5.'</font>';	?>
          </span></td>
        </tr>
        <tr>
          <td><span class="style6">
            <label>&nbsp;Please enter your password</label>
            <br/>
            <input name="password" type="password" size="40" />
          </span></td>
          <td><span class="style6">
            <?php if($error_string8) echo '<font color="red">'.$error_string8.'</font>';	
		  													 if($error_string10) echo '<font color="red">'.$error_string10.'</font>';	?>
          </span></td>
        </tr>
        <tr>
          <td><span class="style6">
            <label>&nbsp;Please confirm your password</label>
          </span><span class="style4">
          <label> </label>
          </span><br/>
          <input name="conpassword" type="password" size="40" /></td>
          <td><?php if($error_string9) echo '<font color="red">'.$error_string9.'</font>';	
		  															 if($error_string11) echo '<font color="red">'.$error_string11.'</font>';	?></td>
        </tr>
        <tr>
          <td height="44" onmouseover="clicking"><input name="register" type="submit" id="Submit" value="Register" onmouseover="click to register" /></td>
          <td><input type="reset" name="Submit2" value="Reset" /></td>
        </tr>
      </table>
   
         <?php echo $msg;?>
      </form></td>
   
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td valign="top"><div align="center" class="style12"><strong>&copy 2013 PN MSIZA&nbsp;210127844</strong></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<form id="form1" name="form1" method="post" action="">
</form>
