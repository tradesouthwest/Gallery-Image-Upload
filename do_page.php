<?php
/**  
 * GIU
 * do_page.php - creates a new page to theme
 */ 
session_start();
if( !isset( $_SESSION['user'] ) )
{
header( "Location: login.php" );
}
if( isset( $_SESSION['user'] ) )
{ 

if (isset($_POST['page-submit'])) { 
// create file
include( 'include/config.php' );
    $page_name  =  mysql_real_escape_string( $_POST['page_name'] );
    $page_title =  mysql_real_escape_string( $_POST['page_title'] );
    $page_motto =  mysql_real_escape_string( $_POST['page_motto'] );
    $page_ref   =  mysql_real_escape_string( $_POST['page_ref'] );
    $theme_ref  =  mysql_real_escape_string( $_POST['theme_ref'] );
    
    $query = ("INSERT INTO theme_setup     
             (page_name, page_title, page_motto, page_ref, theme_ref)
             VALUES
             ('$page_name', '$page_title', '$page_motto', '$page_ref', '$theme_ref')
             ");
                 mysql_query($query) or die('Invalid query: ' . mysql_error()); 
                     mysql_close(); 
?>

<?php
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
                    <h4>NEW PAGE CREATED AT: </h4>
                    <h4><?php echo date('M d Y - H:i:s'); ?></h4>
                        <div class="messages-nav">
                            <h4>What would you like to Do?</h4>
                            <h4><a href="controls.php">Create New Page</a></h4>
                            <h4><a href="list-img.php">List Images table</a></h4>
                            <h4><a href="show-img.php">Manage Images page</a></h4>    
                        </div>
                </header>
            </section>
        <section class="center-column">
            <div class="content">
            <h1>Great! - You have just created new page name: <?php echo $page_name; ?></h1>
                  <h4><?php echo $page_title; ?></h4>
                  <h5><?php echo $page_motto; ?><h5>
<?php
}
?>
            <p><label>Back to Control Panel</label>
                <a class="goback" href="index.php" title="GIU Upload" target="_top">Upload another image</a></p>
            <p><label>View all images to reference</label>
                <a class="goback" href="show-img.php" title="GIU Upload">Show All Images</a></p>
            </div>
        </section>
<?php include( 'giu-footer.php' ); } ?>