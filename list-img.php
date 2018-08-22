<?php 
/**
 * GIU
 * list-img
 */

include( 'giu-header.php' ); ?>

<div class="content">
    <table id="imagelist">
        <tr>
        <th>Name [View]</th>
        <th>Size</th>
        <th class="td-short">Caption</th>
        <th class="td-short">Alternative Text</th>
        <th class="td-short">Date</th>
        <th>DELETE</th>
        </tr>
<?php
function remote_file_size ($url) 
{
   $head = "";
   $url_p = parse_url($url);
   $host = $url_p["host"];
   $path = $url_p["path"];

   $fp = fsockopen($host, 80, $errno, $errstr, 20);
   if(!$fp) 
   { return false; } 
   else 
   {
       fputs($fp, "HEAD ".$url." HTTP/1.1\r\n");
       fputs($fp, "HOST: dummy\r\n");
       fputs($fp, "Connection: close\r\n\r\n");
       $headers = "";
       while (!feof($fp)) {
           $headers .= fgets ($fp, 128);
       }
   }
   fclose ($fp);
   $return = false;
   $arr_headers = explode("\n", $headers);
   foreach($arr_headers as $header) {
       $s = "Content-Length: ";
       if(substr(strtolower ($header), 0, strlen($s)) == strtolower($s)) {
           $return = substr($header, strlen($s));
           break;
       }
   } 
   return $return;
}
include('include/config.php');

$result = mysql_query("SELECT * FROM fivefields");
    while($row = mysql_fetch_array($result))
{


?>

<tr>
<td><a href="giu-exif.php?id=<?php echo $row['id']; ?>" title="show image and EXIF data"><?php echo $row['image']; ?></a></td>

<td class="td-size"><?php 

print number_format(remote_file_size($row['image']));
?></td>

<td class="td-short"><?php echo $row['ca']; ?></td>
<td class="td-short"><?php echo $row['cb']; ?></td>
<td class="td-short"><?php echo $row['upstamp']; ?></td>
<td class="td-del"><a href="remove.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure to delete this ?');" title="warning - this deletes file"><?php echo $row['id']; ?></a> <span> file id</span></td>
</tr>
<?php
}
?>
    </table><!-- ends d\\table image-list -->


</div>
<?php include( 'giu-footer.php' ); ?>