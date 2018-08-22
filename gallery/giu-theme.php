<?php
/**
 * Settings for theme GIU-Black
 * package is GIU 
 */
include( '../include/config.php' );
        $query = "SELECT * FROM fivefields WHERE `cover` = 1"; 
        $result = mysql_query($query) or die(mysql_error());
        while($row = mysql_fetch_array($result))
{          
        $page_logo = $row['image'];
        $logo_alt = $row['cb'];
}

//include( '../include/config.php' );
$query = "SELECT * FROM admin_setup ORDER BY id DESC LIMIT 1";
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result)){

$site_title   = $row['site_title'];
$site_motto   = $row['site_motto'];
$site_created = $row['site_created'];
$site_url     = $row['site_url'];
$admin_email  = $row['admin_email'];
}