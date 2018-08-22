<?php 
/**
 * GIU
 * controls form
 */
session_start();
include('giu-header.php');
?>

    <section class="left-column">
        <header class="messages">
           <h3>Messages</h3>
            <?php if( isset( $_SESSION['user'] ) )
            {  $user = $_SESSION['user']; echo '<h4>'; echo $user; echo '</h4>'; } else { echo 'NOT LOGGED IN !'; } ?>
            <h4><?php echo $nologin; ?><h4>
        </header>
<div class="messages">
<p>Keep title short because the <b>Page Title</b> will be the link buttons in the bottom of the page. You can make the <b>Sub Title</b> as long as you would like.</p>
</div>
<div class="messages">
<p>   </p>
</div>
<div class="messages">
<p>  </p>
</div>
<div class="messages">
<p>Submit Options with the <b>"Update Options" button</b> specifically for the section you are working in.</p>
</div>
<div class="messages">
<p> </p>
</div>
<div class="messages">
<p> </p>
</div>
<div class="messages">
<p>  </p>
</div>
<div class="messages">
<p>   </p>
</div>
<div class="messages">
<p>  </p>
</div>
<div class="messages">
<p>   </p>
</div>
<div class="messages">
<p>If images do not span across page the exact number you selected then you should change the <b>Image Box Spacing</b>.</p>
</div>
<div class="messages">
<p>  </p>
</div>
<div class="messages">
<p>   </p>
</div>
    </section>
            <section class="right-column">
                <header class="messages">
                    <h3>Information</h3>
                    <div class="messages-nav">
                        <h4>What would you like to Do?</h4>
                        <h4><a href="#page-option">Create New Page</a></h4>
                        <h4><a href="#theme-option">Theme-Options</a></h4>
                        <h4><a href="#site-option">Site-Setup</a></h4>
                        
                    </div>
                    <h4><?php echo date('M d Y - H:i:s'); ?></h4>
                </header>
            </section>
        <section class="center-column" id="controls">
            <div class="content">
                <h1>Theme Controls and Site Setup</h1>
    
            <form name="page-form" method="post" id="page-form" action="do_page.php">
            <fieldset id="page-option"><legend>Page Options </legend>
                <h3>Create a New Page for Images</h3>

                <p><label>Register New Page Name</label>
                <input name="page_name" type="text" id="page_name" /><br>
                <small>NO SPACES (use dash or underscore) - <span>e.g., "bandcamp fun time" would be</span> bandcamp-fun-time </small></p>

                <p><label>Title of Page</label>
                <input name="page_title" type="text" id="page_title" /><br>
                <small>Title of page shows in top header - <span>e.g., Things We Did at Band Camp</span></small></p>

                <p><label>Sub-Title of Page</label>
                <input name="page_motto" type="text" id="page_motto" /><br>
                <small>Sub-Title just below Title - <span>e.g, Me and my friends having fun after practice.</small></p>
                
                <p><label>Custom Value</label>
                <input name="theme_ref" type="text" id="theme_ref" /><br>
                <small>This is a custom value reserved for linking themes.</small></p>

                 <div class="form-submit">
                     <p><input type="submit" name="page-submit" id="page-submit" value="Update Options" /></p>
                 </div>
             </fieldset>
             </form>

<form name="theme-form" method="post" id="theme-form" action="do_theme.php">  
            <?php
            include( 'include/config.php' ); 
            $query = "SELECT * FROM theme_option ORDER BY id DESC LIMIT 1"; 
            $result = mysql_query($query) or die(mysql_error());
            while($row = mysql_fetch_array($result)){
            ?>              
            <fieldset id="theme-option"><legend>Customize Theme and Image Options</legend> 
 
                 <p><label>Width of Theme in Percentage</label>
                 <input name="theme_width" type="number" min="75" max="100" /><br>
                 <small><span>Current value: </span><?= $row['theme_width']; ?></small>
                 <small>fluid width values represent the percentage of page width.</small></p>
                 <input name="theme_width_set" type="hidden" value="<?= $row['theme_width']; ?>" />

                 <p><label>Image Width</label>
                 <input type="number" name="img_width" min="0" max="9999" /><br>
                 <small><span>Current value - <em>Has no effect on some themes</em>: </span><?= $row['img_width']; ?> </small></p>
                 <input name="img_width_set" type="hidden" value="<?= $row['img_width']; ?>" />

                 <p><label>Number of Images per row</label>
                 <input type="number" name="max_imgs" min="0" max="10" /><br>
                 <small><span>Current value: </span><?= $row['max_imgs']; ?></small></p>
                 <input name="max_imgs_set" type="hidden" value="<?= $row['max_imgs']; ?>" />

                 <p><label>Image Box Spacing</label>
                 <input type="number" name="caption" min="0" max="65" /><br>
                 <small><span>Current value: </span><?= $row['caption']; ?></small></p>
                 <input name="caption_set" type="hidden" value="<?= $row['caption']; ?>" />

                 <p><label>Font Size</label>
                 <input type="number" name="content" min="5" max="40" /><br>
                 <small><span>Current value: </span><?= $row['content']; ?></small></p>
                 <input name="content_set" type="hidden" value="<?= $row['content']; ?>" />

                     <div class="form-submit">
                         <p><input type="submit" name="theme-submit" id"theme-submit" value="Update Options" /></p>
                     </div>
<?php } ?>
            </form>
            </fieldset>

        <form name="site-form" method="post" id="site-form" action="do_site.php">
        <?php
        include( 'include/config.php' ); 
        $query = "SELECT * FROM admin_setup ORDER BY id DESC LIMIT 1"; 
        $result = mysql_query($query) or die(mysql_error());
        while($row = mysql_fetch_array($result)){
        ?>
        <fieldset id="site-option"><legend> Site Setup and Dialogue </legend>
            <p><label> site_title</label> 
            <input name="site_title" type="text" value="<?= $row['site_title']; ?>" /> <br> 
            <small><span>Current value: </span><?= $row['site_title']; ?></small></p>

            <p><label> site_motto</label> 
            <input name="site_motto" type="text" value="<?= $row['site_motto']; ?>" /><br> 
            <small><span>Current value: </span><?= $row['site_motto']; ?></small></p>

            <p><label> site_created</label> 
            <input name="site_created" type="text" value="<?= $row['site_created']; ?>" /> <br>
            <small><span>Current value: </span><?= $row['site_created']; ?></small></p>

            <p><label>Relative Site Path - URL</label>
            <input name="site_url" type="text" value="<?= $row['site_url']; ?>" />  <br>
            <small><span>Current value: </span><?= $row['site_url']; ?></small></p>

            <p><label> admin_email</label>
            <input name="admin_email" type="text" value="<?= $row['admin_email']; ?>" /> <br> 
            <small><span>Current value: </span><?= $row['admin_email']; ?></span></small></p>

            <p><label> Current Active Theme</label>
            <input name="current_theme" type="text" value="<?= $row['current_theme']; ?>" /> <br> 
            <small><span>Current value: </span><?= $row['current_theme']; ?></span></small></p>

<div class="row">
                 <div class="form-submit c9">
                     <p><input type="submit" name="site-submit" id"site-submit" value="Update Options" /></p>
                 </div>
                         <nav class="footnotes-nav c3 end">
                             <ul><li><a href="">Change theme</a><br><span>Reserved for future use</span></li></ul>
                         </nav>
</div>

        </fieldset>
        </form>

<?php
}
mysql_close();
?>

            </div>
        </section>

<?php include( 'giu-footer.php' ); ?>