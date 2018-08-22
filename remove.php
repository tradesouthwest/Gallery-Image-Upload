<?php
/**
 * GIU
 * do_insert.php - delets image from database
 * but not from local folder
 */ 
session_start();
if( !isset( $_SESSION['user'] ) )
{
header( "Location: login.php" );
}
if( isset( $_SESSION['user'] ) )
{ 

include( 'giu-header.php' ); ?>

    <section class="left-column">
        <div class="messages">
            <?php if( isset( $_SESSION['user'] ) )
            {  $user = $_SESSION['user']; echo '<h4>'; echo $user; echo '</h4>'; } else { echo 'NOT LOGGED IN !'; } ?>
            <h4><?php echo $nologin; ?><h4>
        </div>
    </section>

            <section class="right-column">
                <header class="messages">
                    <h4>DELETION OF IMAGE AT: </h4>
                    <h4><?php echo date('M d Y - H:i:s'); ?></h4>
                        <div class="messages-nav">
                            <h4>What would you like to Do?</h4>
                            <h4><a href="controls.php">Create New Page</a></h4>
                            <h4><a href="show-img.php">Manage Images page</a></h4>   
                            <h4><a href="list-img.php">image list table</a></h4>
                             
                        </div>
                </header>
            </section>
        <section class="center-column">
            <div class="content">

<?php
include( 'include/config.php' );
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM fivefields WHERE `id` = $id") ; 
echo (mysql_affected_rows()) ? "<h2>Row deleted.</h2><br /> " : "Nothing deleted. See instructions below.<br /> "; 

}
?>

            <h1>Great! - Let's go back to the Control Panel</h1>
        
                <p><label>Back to Control Panel</label>
                <a class="goback" href="index.php" title="GIU Upload">Manage another image</a></p>
                <p><label>View all images to reference</label>
                <a class="goback" href="show-img.php" title="GIU Upload">Show All Images</a></p>
  
        </section>
            
<?php include( 'giu-footer.php' ); ?>