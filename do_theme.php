<?php
/**
 * GIU
 * do_theme - inserts new theme options
 */ 
session_start();
if( !isset( $_SESSION['user'] ) )
{
header( "Location: login.php" );
}
if( isset( $_SESSION['user'] ) )
{ 
include( 'include/config.php' );

if (isset($_POST['theme-submit'])) { 
$theme_width     = (int) $_POST['theme_width'];
$theme_width_set = (int) $_POST['theme_width_set'];
$img_width       = (int) $_POST['img_width'];
$img_width_set   = (int) $_POST['img_width_set'];
$max_imgs        = (int) $_POST['max_imgs'];
$max_imgs_set    = (int) $_POST['max_imgs_set'];
$caption         = (int) $_POST['caption'];
$caption_set     = (int) $_POST['caption_set'];
$content         = (int) $_POST['content'];
$content_set     = (int) $_POST['content_set'];

if( $theme_width < 1 ) { $theme_width = $theme_width_set; }

if( $img_width < 1 ) { $img_width = $img_width_set; }

if( $max_imgs < 1 ) { $max_imgs = $max_imgs_set; }

if( $caption < 1 ) { $caption = $caption_set; }

if( $content < 1 ) { $content = $content_set; }
    
    $query = ("INSERT INTO theme_option   
             (theme_width, img_width, max_imgs, caption, content)  
             VALUES 
             ('$theme_width', '$img_width', '$max_imgs', '$caption', '$content')
             ");
                     mysql_query($query) or die('Invalid query: ' . mysql_error()); 
                     mysql_close(); 
}
?>

<?php include( 'giu-header.php' ); ?>

    <section class="left-column">
        <header class="messages">
            <?php if( isset( $_SESSION['user'] ) )
            {  $user = $_SESSION['user']; echo '<h4>'; echo htmlspecialchars($user); echo '</h4>'; } else { echo 'NOT LOGGED IN !'; } 
            ?>
            <h4><?php echo $nologin; ?><h4>
        </header>
    </section>

            <section class="right-column">
                <header class="messages">
                    <h4>NEW OPTION UPDATED AT: </h4>
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
            <h1>Theme options have been updated successfully.</h1>
            <p><label>Back to theme Controls</label>
                <a class="goback" href="controls.php" title="GIU Upload" target="_top">Add another Theme Control Option</a></p>
            <p><label>View all changes made to theme</label>
                <a class="goback" href="gallery/index.php" title="GIU Upload">View theme changes</a></p>
            </div>
        </section>

<?php include( 'giu-footer.php' ); } ?>