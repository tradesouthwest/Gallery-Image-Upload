<?php 
/**
 * GIU
 * show-img
 */
include( 'giu-header.php' ); ?>

<div class="content">
    <div id="imagelist">
           <header>
                <h4>Click image to open EXIF data on image | <a href="list-img.php" title="go to image List table">Image List Table</a></h4>
                <h5>Use "Move" link to move image to a new page.</h5>
            </header>
                
                    <?php
                     include('include/config.php');

                     $result = mysql_query("SELECT id, ca, cb, image, category 
                                            FROM fivefields 
                                            ORDER BY category ASC");
                         while($row = mysql_fetch_array($result))
                         {
                    ?>
                   
                <figure>
                    <a href="giu-exif.php?id=<?php echo $row['id'] ?>" title="click on to view EXIF data"><img src="<?php echo $row['image'] ?>" /></a>
                    <div id="short"><a href="selectpages.php?id=<?php echo $row['id']; ?>">move</a> to new page</div>
                    <div id="short">cur.pg.: <?php echo $row['category']; ?></div>
                    <div id="short">cap: <?php echo $row['ca']; ?></div>
                    <div id="short">delete? <a href="remove.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this ?');" title="warning - this deletes file"><?php echo $row['id']; ?></a> id </div>
               </figure>
<?php 
} 
?>

    </div><!-- ends div image-list -->
</div>
<?php include( 'giu-footer.php' ); ?>