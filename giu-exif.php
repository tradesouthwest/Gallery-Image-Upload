<?php 
/**
 * GFU exif data 
 */
include( 'giu-header.php' ); 

?>
<div class="content">
    <table id="imagelist">
        
<?php
include( 'include/config.php' );
$id = (int) $_GET['id']; 

$result = mysql_query("SELECT * FROM fivefields WHERE `id` = $id");
    while($row = mysql_fetch_array($result))
{
?>

<tr><td colspan="5"><img src="<?php echo $row['image'] ?>" alt="no image" /></td></tr>
<tr>
<td>name: <?php echo $row['image']; ?></td>
<td>cap:  <?php echo $row['ca']; ?></td>
<td>alt:  <?php echo $row['cb']; ?></td>
<td>date: <?php echo $row['upstamp']; ?></td>
<td><a href="remove.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this ?');" title="warning - this deletes file"><?php echo $row['id']; ?></a> <span> file id</span></td>
</tr></table>

<?php
$filename = $row['image'];

$filepath = $filename;
} // ends while loop
?>
    
      <table id="imagelist">      
      <tr><td>
    
<?php
echo $filename . "</td></tr><td>"; 
echo $filepath . "</td></tr>";

//error handler function
function customError($errno, $errstr) {
  echo "<em> Error: </em> [$errno] $errstr | ";
}

//set error handler
set_error_handler("customError");

//trigger error
echo($test);

$info = exif_read_data($filepath);
echo '<tr><td>Image was taken at:       '.$info['FileName'] . '</td></tr>';
echo '<tr><td>Image name:               '.$info['DateTimeOriginal'] . '</td></tr>';
echo '<tr><td>Image height:             '.$info['COMPUTED']['Height'] . '</td></tr>';
echo '<tr><td>Image width:              '.$info['COMPUTED']['Width'] . '</td></tr>';
echo '<tr><td>Camera Model:             '.$info['Model'] . '</td></tr>';
echo '<tr><td>Camera Aperture F Number: '.$info['ApertureFNumber'] . '</td></tr>';
echo '<tr><td>Flash:                    '.$info['Flash'] . '</td></tr>';
echo '<tr><td>Exposure Time:            '.$info['ExposureTime'] . '</td></tr>';
echo '<tr><td>ISOSpeedRatings:          '.$info['ISOSpeedRatings'] . '</td></tr>';
echo '<tr><td>FileDateTime :            '.$info['FileDateTime'] . '</td></tr>';
echo '<tr><td>ImageType:                '.$info[FILE]['MimeType'] . '</td></tr>';
echo '<tr><td>Copyright:                '.$info['COMPUTED']['Copyright'] . '</td></tr>';
echo '<tr><td>FocalLength:              '.$info['FocalLength'] . '</td></tr>';
echo '<tr><td>File Size:                '.$info['FileSize'] . '</td></tr>';

$test=2;
if ($test>1) {
  trigger_error("<br><h3>Some data may not be supported or this is not an Image taken by a camera.</h3>
<h4>Ignore all errors - the program is running fine. These errors are for developer and photographer research.</h4>");
}
?>

    </table><!-- ends table image-list -->
</div>
<?php include( 'giu-footer.php' ); ?>