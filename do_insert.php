<?php
/**  
 * GIU
 * do_insert.php - inserts new image into database and file into folder
 */ 
session_start();
if( !isset( $_SESSION['user'] ) )
{
header( "Location: login.php" );
}
if( isset( $_SESSION['user'] ) )
{ 
include( 'include/config.php' );

if (isset($_POST['do_submit'])) { 
$fileTypeArray = array('.jpg', '.gif', '.png', '.pdf', '.tif', '.tiff', '.swf', '.psd', '.bmp' ); 
$ca       = mysql_real_escape_string( $_POST['ca'] );
$cb       = mysql_real_escape_string( $_POST['cb'] );
$cc       = mysql_real_escape_string( $_POST['cc'] );
$cd       = mysql_real_escape_string( $_POST['cd'] );
$ce       = mysql_real_escape_string( $_POST['ce'] );
$upstamp  = date( 'Y-m-d H:i:s' ); 
$image    = mysql_real_escape_string( $_POST['image'] );
$ext_image = mysql_real_escape_string( $_POST['ext_image'] );
$cover    = mysql_real_escape_string( $_POST['cover'] );
$category = mysql_real_escape_string( $_POST['page_name'] );
$uploaddir = '$uploaddir_url';
$uploadfile = $uploaddir_url . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {


    // file type test
    if (!in_array(strtolower(strrchr($uploadfile,'.')),$fileTypeArray) ) $error .= "<span style='color: red;'>Your file is not a valid file type.</span><br>";

    // scrub characters in the file name
    $uploadfile = stripslashes($uploadfile);
    $uploadfile = preg_replace("#[ ]#","_",$uploadfile);  // change spaces to underscore
    //only parenthesis, underscore, letters, numbers, comma, hyphen, period - others to underscore
    $uploadfile = preg_replace('#[^()\.\-,\w]#','_',$uploadfile);  

    $image = $_FILES['image']['name'];
    }

    // check if image url is external path or upload
    if( empty( $image ) ) { $url = $ext_image; }
    else { $url = $upload_folder . $image; }

    $query = ("INSERT INTO fivefields 
             (ca, cb, cc, cd, ce, upstamp, image, cover, category) 
             VALUES 
             ('$ca', '$cb', '$cc', '$cd', '$ce', '$upstamp', '$url', '$cover', '$category')
             ");            
                 mysql_query($query) or die('Invalid query: ' . mysql_error()); 
                     echo "<h3 class='updated'>Image inserted to database and Published to: ";  
                     echo $error;
                     echo "</h3>"; 
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
                <header class="messages">
                    <h4>UPLOAD OF IMAGE AT: </h4>
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
            <h1>Great! - Let's do this again</h1>
            <p><label>Back to Control Panel</label>
                <a class="goback" href="index.php" title="GIU Upload" target="_top">Upload another image</a></p>
            <p><label>View all images to reference</label>
                <a class="goback" href="show-img.php" title="GIU Upload">Show All Images</a></p>
            </div>
        </section>
<?php 
include( 'giu-footer.php' ); ?>