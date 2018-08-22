<? include('giu-header.php'); ?>
    <section class="left-column">
        <div class="messages">
            <h3>Messages</h3>
            <?php if( isset( $_SESSION['user'] ) )
            {  $user = $_SESSION['user']; echo '<h4>'; echo $user; echo '</h4>'; } else { echo 'NOT LOGGED IN !'; } ?>
            <h4><?php echo $nologin; ?><h4>
        </div>
    </section>
            <section class="right-column">
                <div class="messages">
                    <h3>Information</h3>
                    <h4><?php echo date('M d Y - H:i:s'); ?></h4>
                    <h4>Total Images: <span> <a href="list-img.php" title="list current files" target="_blank"><?php echo $imgcount; ?></a></span><br><small><em>click count to view image data</em></small></h4>
                </div>
            </section>
<?php
include ( 'include/config.php' );

$user_email = $_GET['usr'];
$code = $_GET['code'];

$sql = "SELECT id,user_email,user_activated FROM user WHERE 
            user_email = '$user_email'  
            AND user_activated='0'"; 			
$result = mysql_query($sql) or die (mysql_error()); 
$num = mysql_num_rows($result);
    if ( $num != 0 ) { 
	
	mysql_query("UPDATE user set user_activated='1' where user_email='$user_email'");
	$host = "Your New GIU Gallery Image Upload Website Application";
	$message = 
"You have succesfully registered at $host. \n\n You may now login...\n\n
User Name: $_POST[user_email] \n\n
GIU Gallery Image Upload Website Application \n\n
To Login: http://$host/login.php \n\n
Thank you. This is an automated response. PLEASE DO NOT REPLY.
";

	mail($_POST['email'], "New Login Details", $message,
    "From: \"Auto-Response\" <robot@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());
	 
?>

        <section class="center-column">
            <div class="content">
            <?php echo $message; ?>
<h1><a href="login.php" title="login">You should now be able to login </a></h1>

<?php
die("Thank you. You have succesfully registered");


} else die("Account with given email does not exist - or you have already been activated.");
?>
</div>
</section>
</div>
<? include('giu-footer.php'); ?>
