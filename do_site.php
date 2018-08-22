<?php
/*  
 * GIU
 * do_site - inserts global site options 
 */ 
session_start();
if( !isset( $_SESSION['user'] ) )
{
header( "Location: login.php" );
}
if( isset( $_SESSION['user'] ) )
{ 

if (isset($_POST['site-submit'])) { 

    $site_title   = $_POST['site_title']; 
    $site_motto   = $_POST['site_motto'];
    $site_created = $_POST['site_created'];
    $site_url     = $_POST['site_url'];
    $admin_email  = $_POST['admin_email']; 
    $current_theme  = $_POST['current_theme']; 

    include( 'include/config.php' );
         $query = ("INSERT INTO admin_setup 
                  (site_title, site_motto, site_created, site_url, admin_email, current_theme) 
                  VALUES 
                  ('$site_title', '$site_motto', '$site_created', '$site_url', '$admin_email', '$current_theme')
                  ");            
            mysql_query($query) or die('Invalid query: ' . mysql_error()); 
            echo "<h3 class='updated'>Updated Information inserted to database and Published";  
            echo "</h3><br><hr>"; 
        mysql_close();
    }
}
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
                <div class="messages">
                    <h4>SITE UPDATED AT: </h4>
                    <h4><?php echo date('M d Y - H:i:s'); ?></h4>
                        <div class="messages-nav">
                            <h4>What would you like to Do?</h4>
                            <h4><a href="controls.php">Create New Page</a></h4>
                            <h4><a href="list-img.php">List Images table</a></h4>
                             <h4><a href="show-img.php">Manage Images page</a></h4>    
                        </div>
               </div>
            </section>

        <section class="center-column">
            <div class="content">
            <h1>Great! - Let's do this again</h1>
            <p><label>Back to Control Panel</label>
                <a class="goback" href="index.php" title="GIU Upload" target="_top">Upload another image</a></p>
            <p><label>View all changes made to theme</label>
                <a class="goback" href="gallery/index.php" title="GIU Upload">View theme changes</a></p>
            </div>
        </section>

<?php 
include( 'giu-footer.php' ); ?>