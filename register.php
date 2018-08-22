<?php 
session_start();

include ('include/config.php'); 

if ($_POST['Submit'] == 'Register')
{
   if (strlen($_POST['email']) < 5)
   {
    die ("Incorrect email. Please enter valid email address..");
    }
   if (strcmp($_POST['pass1'],$_POST['pass2']) || empty($_POST['pass1']) )
	{ 
	//die ("Password does not match");
	die("ERROR: Password does not match or empty..");

	}
	if (strcmp(md5($_POST['user_code']),$_SESSION['ckey']))
	{ 
			 die("Invalid code entered. Please enter the correct code as shown in the Image");
  		} 
	$rs_duplicates = mysql_query("select id from user where user_email='$_POST[email]'");
	$duplicates = mysql_num_rows($rs_duplicates);
	
	if ($duplicates > 0)
	{	
	//die ("ERROR: User account already exists.");
	header("Location: register.php?msg=ERROR: User account already exists..");
	exit();
	}
	
		
		
	
	$md5pass = md5($_POST['pass2']);
	$activ_code = rand(1000,9999);
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	mysql_query("INSERT INTO user
	              (`user_email`,`user_pwd`,`country`,`joined`,`activation_code`,`full_name`)
				  VALUES
				  ('$_POST[email]','$md5pass','$_POST[country]',now(),'$activ_code','$_POST[full_name]')") or die(mysql_error());
	
	$message = 
"Thank you for registering an account with $server. Here are the login details...\n\n
User Email: $_POST[email] \n
Password: $_POST[pass2] \n
Activation Code: $activ_code \n
____________________________________________
*** ACTIVATION LINK ***** \n
Activation Link: http://$host$uri/activate.php?usr=$_POST[email]&code=$activ_code \n\n
_____________________________________________
Thank you. This is an automated response. PLEASE DO NOT REPLY.
";

	mail($_POST['email'] , "Login Activation", $message,
    "From: \"Auto-Response\" <notifications@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());
	unset($_SESSION['ckey']);
	echo("Registration Successful! An activation code has been sent to your email address with an activation link...
             <a href='login.php'>Login Page</a>");	
	
	exit;
	}	

?> 
<? include('giu-header.php'); ?>
<div id="content">
<?php if (isset($_GET['msg'])) { echo "<div class=\"msg\"> $_GET[msg] </div>"; } ?>
<p>&nbsp;</p>
<table id="imagelist"><form name="form1" method="post" action="register.php" style="padding:5px;">
    <tr><th><strong><font size="5">Register Account</font></strong></th> <th> </th></tr>
  
    <tr><td>Name:            </td><td> <input name="full_name" type="text" id="full_name"> Ex. Jane Wilson</td></tr>
    <tr><td>Email:           </td><td> <input name="email" type="text" id="email"> Ex. jane@domain.com</td></tr>
    <tr><td>Password:        </td><td> <input name="pass1" type="password" id="pass1"></td></tr>
    <tr><td>Retype Password: </td><td> <input name="pass2" type="password" id="pass2"></td></tr>
        
    <tr><td>Country: 
          <select name="country" id="select8">
            <option value="Mexico">Mexico</option>
            <option value="South Africa">South Africa</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Taiwan ">Taiwan </option>
            <option value="Thailand">Thailand</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Ukraine">Ukraine</option>
            <option value="UAE">UAE</option>
            <option value="UK">UK</option>
            <option value="USA">USA</option>
            <option value="Virgin Islands (GB)">Virgin Islands (GB)</option>
            <option value="Virgin Islands (U.S.) ">Virgin Islands (U.S.) </option>
          
          </select>
     </td><td> <input name="user_code" type="text" size="10"> Validation code.</td></tr>
     <tr><td> &nbsp; <input type="submit" name="Submit" value="Register"></td><td><img src="pngimg.php" align="middle"> </td></tr>
     
     <tr><td><a href="login.php">Log In Here</a></td><td></td></tr>
 </form>
</table>
</div>
<? include('giu-footer.php'); ?>