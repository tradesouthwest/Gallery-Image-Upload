<?php
/**
 * Gallery Image Upload 
 * main index file - collects form data to upload and save.
 */
session_start();
if( !isset( $_SESSION['user'] ) )
{
header( "Location: gallery/index.php" );
}
if( isset( $_SESSION['user'] ) )
{ 

include( 'giu-header.php' );  
include( 'include/config.php' );
$result = mysql_query("SELECT image FROM fivefields"); 
$imgcount = mysql_num_rows($result); 
?>
    <section class="left-column">
        <div class="messages">
            <h3>Messages</h3>
<h4><?php if( !isset( $_SESSION['user'] ) ) { echo 'NOT LOGGED IN'; } 
                  else { $user = $_SESSION['user']; echo $user; } ?></h4>
            <h5>Suggestions: <h5>
            <h6>&#8226; <b>Options+Controls</b> to make a new page</h6>
            <h6>&#8226; Image position can be adjusted from <b>O+C</b></h6>
            <h6>&#8226; Move an image to new page <b>Manage Images</b></h6>

        </div>
    </section>
            <section class="right-column">
                <div class="messages">
                    <h3>Information</h3>
                    <h4><?php echo date('M d Y - H:i:s'); ?></h4>
                    <h4>Total Images: <span> <a href="list-img.php" title="list current files" target="_blank"><?php echo $imgcount; ?></a></span><br><small><em>click count to view image data</em></small></h4>

                    <div class="messages-nav">
                        <h4>What would you like to Do?</h4>
                        <h4><a href="controls.php">Create New Page</a></h4>
                        <h4><a href="show-img.php">Manage Images</a></h4>    
                        <h4><a href="list-img.php">image list table</a></h4>
                    </div>
                </div>
            </section>
        <section class="center-column">
            <div class="content">

                <form id="do_insert" name="do_insert" method="post" action="do_insert.php" enctype="multipart/form-data">
    
	        <p><label>Choose a file for uploading</label>
                <input type="file" name="image" class="search_button" id="image" /></p>
             
                <p><label>Or alternative URL for image</label> 
                <input type="text" name="ext_image" id="image" /></p>

                <p><label>Caption <span>Also is anchor title</span></label>
                <input name="ca" id="ca" type="text" /></p>
    
                <p><label>Alt Text/Tags</label>
                <input name="cb" id="cb" type="text" /></p>

                <p><label>Story Line <span>Image page text</span></label>
                <textarea name="cc" id="cc"></textarea>

    	        <p><label>Page to display image on: </label>
                <span class="select-page"> 
                
<?php

$query = "SELECT page_name
          FROM theme_setup 
          ORDER BY id 
          ASC"; 
$result = mysql_query($query) or die(mysql_error());
echo "<select  name='page_name'>";
while($row = mysql_fetch_array($result))
{
echo "<option value = '{$row['page_name']}'";
    if ($id == $row['page_name'])
    echo "selected = 'selected'";
    echo ">{$row['page_name']}</option>";
}
    echo "</select>";
?>
</span>  <input class="search_button" type="submit" name="do_submit" id="do_submit" value="Upload Image" /></p>

                <!-- <input class="search_button" type="reset" name="reset" value="Reset"  /> -->
               
                
                <p class="notation">Date and Time Stamped Automatically &#8226; page opened at: <span>

                    <?php // update your time-zone and calendar format here
                          $date = date('M/d/Y h:i:s a', time()); echo $date; ?></span>

                <input name="upstamp" type="hidden" value="<?php // update your time-zone and calendar format here
                    echo date('Y-m-d \ T H:i:s',$timestamp); ?>"/></p>

	        </form><br><br>

            </div>
        </section>
<?php include( 'giu-footer.php' ); } ?>