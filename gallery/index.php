<?php
/**
 * Theme Name: GIU Black
 * ver. 0.1
 * themes@tradesouthwest.com
 */

include( 'giu-theme.php' );

// check to see if no page requested
if( !isset($_GET['category'] ) ) : 

// no home page will display default page
$page = "Image Gallery";

include('../include/config.php');
$query = "SELECT * FROM theme_setup ORDER BY id ASC LIMIT 1"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
    $page_name  = $row['page_name'];
    $page_title = $row['page_title'];
    $page_motto = $row['page_motto'];
    $page_ref   = $row['page_ref'];
    $theme_ref  = $row['theme_ref'];
}

// yes the requested page is valid
else : 
$page =  $_GET['category'];

include('../include/config.php');
$query = "SELECT * FROM theme_setup WHERE page_name ='". $page. "'"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
    $page_title = $row['page_title'];
    $page_motto = $row['page_motto'];
    $page_ref   = $row['page_ref'];
    $theme_ref  = $row['theme_ref'];
    $page_name  = $row['page_name'];
}

endif;
include( 'header.php' );
include( 'theme-content.php' );
include( 'footer.php' );
?>