<?php
/**
 * GIU
 * page navigation 
 */
?>
<div class="page-more"><ul>
<?php
include( '../include/config.php' );
        include( '../include/config.php' );
        $query = "SELECT ca, category, id FROM fivefields ORDER BY category"; 
        $result = mysql_query($query) or die(mysql_error());
        
while($row = mysql_fetch_array($result)){
  
	?><li><a href="viewer.php?id=<?php echo (int)$row['id']; ?>" title="<?php echo htmlentities($row['ca']); ?>"><?php echo htmlentities($row['category']); ?></a></li> 

<?php
}
?>
</ul></div>
