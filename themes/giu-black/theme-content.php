<?php
/** 
 * GIU Black theme
 * theme-content - images template
 */
?>

<div class="row">
    <div class="c12 gallery">
        <div id="content">
            <header id="page-header">
                <h3><?php echo $page_title; ?></h3>
                <h5><?php echo $page_motto; ?></h5>
            </header>
                <div class="inner-content">

<?php

        include( '../include/config.php' );
        $query = "SELECT * FROM fivefields WHERE category ='". $page_name. "'"; 
        $result = mysql_query($query) or die(mysql_error());
        while($row = mysql_fetch_array($result))
{
?>
                <div id="gallery-img">

                    <figure class="gimg">
                       <a href="<?php echo htmlentities($row['image']); ?>" rel="lightbox" title="<? echo $row['ca']; ?>">
<img src="<?php echo $row['image']; ?>" alt="<? echo $row['cb']; ?>" /></a>
                    </figure>

                        <figcaption id="caption">
                            <p class="caption-link"><a href="viewer.php?id=<?php echo (int)$row['id']; ?>" title="View <? echo $row['ca']; ?>"><? echo $row['ca']; ?></a></p>
<div class="more"><a href="viewer.php?id=<?php echo (int)$row['id']; ?>" title="View <? echo $row['ca']; ?>">+</a></div>
                        </figcaption> 
                </div>
<?php } ?>

           

                </div><!-- ends inner content -->
            </div><!-- ends content -->

     </div><!-- ends c12 gallery -->
</div><!-- ends row -->