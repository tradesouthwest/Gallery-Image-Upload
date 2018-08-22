<?php 
/**
 * GIU
 * login page
 */ 
include('include/config.php');

$user_email = mysql_real_escape_string($_POST['email']);
if ($_POST['Submit']=='Login')
{
$md5pass = md5($_POST['pwd']);
$sql = "SELECT id,user_email FROM user WHERE 
            user_email = '$user_email' AND 
            user_pwd = '$md5pass' AND user_activated='1'"; 			
$result = mysql_query($sql) or die (mysql_error()); 
$num = mysql_num_rows($result);
    if ( $num != 0 ) { 
        // A matching row was found - the user is authenticated. 
       session_start(); 
	   list($user_id,$user_email) = mysql_fetch_row($result);
		// this sets variables in the session 
		$_SESSION['user']= $user_email;  			
		if (isset($_GET['ret']) && !empty($_GET['ret']))
		{
		header("Location: $_GET[ret]");
		} else
		{
		header("Location: index.php");
		}
		//echo "Logged in...";
		exit();
    } 
    header("Location: login.php?msg=Invalid Login");
    //echo "Error:";
exit();		
}
?>
<?php 
include('giu-header.php');
?>
    <section class="left-column">
    <div class="messages">

    <?php if( !isset( $_SESSION['user'] ) ) { echo '<h4>NOT LOGGED IN</h4>'; } 
        else {  $user = $_SESSION['user']; echo '<h4>'; echo $user; echo '</h4>'; } ?>

    </div>
    </section>
            <section class="right-column">
                <div class="messages">
                <h4>GIU Gallery Image Upload</h4>
                </div>
            </section>
        <section class="center-column" id="refresh">
            <div class="content">

<!-- only displays when user logs out -->
<div id="toggle">
    <?php
    $openDiv = $_GET['div'];

    if( ! isset( $openDiv ) ) $Visibility = "none";
    elseif( isset ( $openDiv ) ) $Visibility = "block";
    ?>
    <div style="display: <?php echo $Visibility; ?>">
    <h1 style="display: <?php echo $Visibility; ?>">You are Logged Out and everything is safe now</h1>
    </div>
</div>
<?php
if( isset( $_SESSION['user'] ) )
    {  $user = $_SESSION['user']; }
?>
                <h1>Login Members <?php echo $user; ?></h1>

                <form name="loginform" method="post" action="">

                <p><label>Email: </label> 
                <input name="email" type="text" id="email"></p>
                
                <p><label>Pass:&nbsp;</label>
                <input name="pwd" type="password" id="pwd"></p>

                <p class="login"><label>Login submit Button</label>
                <input type="submit" name="Submit" value="Login">
                <span> New Login* </span>
                <button><a href="<?php echo htmlentities( $_SERVER['PHP_SELF'] ); ?>" title="New Login Please">Refresh Page</a></button></p>

                <p><label>Register New user</label>
                <button><a href="register.php">Register</a></button></p>

                <p><label>Find or Resend Password</label>
                <button><a href="forgot.php">Forgot</a></button></p>
                
 
                <p><label>Be safe and Log Out</label>
                <a href="logout.php" title="LOG OUT"><button>LOG OUT</button></a></p>
</form>
*<small> Security Token would have been deleted after logging out - But you are still on the myaccount page.</small>
            </div>
        </section>
<?php include( 'giu-footer.php' ); ?>