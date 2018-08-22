<?php
/** 
 * GFU Black theme
 * viewer-content - individual image display page template
 * theme-viewer is included inside of viewer
 */
$id = (int) $_GET['id']; 
?>

<div class="row">
    <div class="c12 gallery">
        <div id="content">
        <?php
        include( '../include/config.php' );
        $query = "SELECT * FROM fivefields WHERE `id` = $id"; 
        $result = mysql_query($query) or die(mysql_error());
        while($row = mysql_fetch_array($result))
{

?>
			
        <div id="gallery-view">
            <figure>
                <img src="<?php echo $row['image']; ?>" alt="<? echo $row['cb']; ?>" /></a>
            </figure>
            <figcaption id="storycaption"><td><h2><? echo $row['ca']; ?></h2></figcaption>
        </div>
    </div><!-- ends c12 gallery -->
</div><!-- ends row -->

    <div class="row">
        <div class="c2">
            <nav class="giu-black-nav left">
                <p><a href="index.php?category=<?php echo htmlentities($row['category']); ?>" ><?php echo $row['category']; ?></a></p>
                
            </nav>
        </div>
            <div class="c8">
                <div class="storyline" role="main">
                    <div class="story">
                        <? echo $row['cc']; ?>
                    </div>
                </div>
            </div>
                <div class="c2 end">
                    <div class="giu-black-nav right">
                        <p><?php echo $row['alt']; ?></p>
                    </div>
                </div>
                    <div class="c12">
                        <?php include( 'page-nav.php' ); ?>
                    </div>
    </div><!-- ends row -->
	
<?php
}
?>
		
        </div><!-- ends width of limits -->
    </div><!-- ends content -->
</div>