<?
/**
 * GIU style calls
 */
include( '../include/config.php' );
        $query = "SELECT * FROM theme_option ORDER BY id DESC LIMIT 1"; 
        $result = mysql_query($query) or die(mysql_error());
        while($row = mysql_fetch_array($result)){

$theme_width = $row['theme_width'];
$img_width   = $row['img_width'];
$max_imgs    = $row['max_imgs'];
$content     = $row['content'];
$caption     = $row['caption'];

}
mysql_close();

if( $theme_width < 1 ) { $theme_width = "100"; } // width of content id div
if( $img_width < 1 )   { $img_width = "200"; }  // percnt of image box to fill 
if( $max_imgs < 1 )    { $max_imgs = 4;    }   // number of imgs per row
if( $content < 1 )     { $content = "16"; }   // font-size for text on pages
if( $caption < 1 )     { $caption = "3"; }   // margin between image boxes

// width of image box on page
// @option max_imgs
if(    $max_imgs == 10 ) { $img_row   = "10";   } 
elseif( $max_imgs == 6 ) {  $img_row  = "16.66";} 
elseif( $max_imgs == 5 ) {  $img_row  = "20";   } 
elseif( $max_imgs == 4 ) {  $img_row  = "25";   } 
elseif( $max_imgs == 3 ) {  $img_row  = "33.33";}
elseif( $max_imgs == 2 ) {  $img_row  = "50";   } 
elseif( $max_imgs == 9 ) {  $img_row  = "11.11";} 
elseif( $max_imgs == 7 ) {  $img_row  = "14.25";} 
elseif( $max_imgs == 8 ) {  $img_row  = "12.5"; } 
elseif( $max_imgs == 1 ) {  $img_row  = "99.25";   } 
else {                      $img_row  = "25";   } 

$imgrow = ( $img_row - 1.2185 ); // adjust according to padding and margins


header("Content-type: text/css; charset: UTF-8"); 
?>

body {
    font-size: <?php echo $content; ?>px;
}
figure.gimg img {
   width: <?php echo "img_width"; ?>px;
   height: auto !important;
   
}
#gallery-img {
    display: inline-block;
    padding: 0;
    background: rgba(250, 250, 250, .8);
    box-shadow: 1px 1px 1px 1px #444;
    float: left;
    margin: <?php echo $caption; ?>px;
    width: <?php echo $imgrow; ?>%;
}
#content {
   width: <?php echo $theme_width; ?>% !important;
margin: 0 auto;
}