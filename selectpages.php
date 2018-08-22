<?php
/**  
 * GIU
 * selectpages - moves images to a new page or achives
 */ 
session_start();

if( !isset( $_SESSION['user'] ) )
{
header( "Location: login.php" );
}
if( isset( $_SESSION['user'] ) )
{

include( 'giu-header.php' );

?>

    <section class="left-column">
        <div class="messages">
            <?php if( isset( $_SESSION['user'] ) )
            {  $user = $_SESSION['user']; echo '<h4>'; echo $user; echo '</h4>'; } else { echo 'NOT LOGGED IN !'; } ?>
            <h4><?php echo $nologin; ?><h4>
        </div>
    </section>

            <section class="right-column">
              
                    <h4><?php echo date('M d Y - H:i:s'); ?></h4>
                     <div class="messages-nav">
                        <h4>What would you like to Do?</h4>
                        <h4><a href="controls.php">Create New Page</a></h4>
                        <h4><a href="list-img.php">List Images table</a></h4>
                         <h4><a href="show-img.php">Manage Images page</a></h4>    
                    </div>
            </section>

    <section class="center-column">
        <div class="content">
        <?php 
       
            $id = $_GET['id'];
            include('include/config.php');

                $result = mysql_query("SELECT * FROM fivefields WHERE id ='". $id . "'"); 
                    while($row = mysql_fetch_array($result))
{
?>

        <form name="page-select" method="post" id="page-select" action="">
        <table>
            
<?php 
echo '<tr><td>Currently Page is: ' . $row['category'] . '</td></tr>';
echo '<tr><td><input type="hidden" name="ca" value="' . $row['ca'] . '" readonly /></td></tr>';
echo '<tr><td><input type="hidden" name="cb" value="' . $row['cb'] . '" readonly /></td></tr>'; 
echo '<tr><td><input type="hidden" name="cc" value="' . $row['cc'] . '" readonly /></td></tr>';
echo '<tr><td><input type="hidden" name="cd" value="' . $row['cd'] . '" readonly /></td></tr>';
echo '<tr><td><input type="hidden" name="ce" value="' . $row['ce'] . '" readonly /></td></tr>';
echo '<tr><td><input type="hidden" name="upstamp" value="' . $row['upstamp'] . '" readonly /></td></tr>';
echo  '<tr><td><input type="hidden" name="image" value="' . $row['image'] . '" readonly /></td></tr>';
echo '<tr><td><input type="hidden" name="cover" value="' . $row['cover'] . '" readonly /></td></tr>';

}
?>
        <tr><td><b>Select page to move image to.</b></td></tr>
        <tr><td>
                    <?php 
                    include( 'include/config.php' );
                    $query = "SELECT page_name
                              FROM theme_setup 
                              ORDER BY id 
                              ASC"; 
                        $result = mysql_query($query) or die(mysql_error());
                            echo "<select  name='page_name'>";
                            while($row = mysql_fetch_array($result)) {
                                echo "<option value = '{$row['page_name']}'";
                                if ($id == $row['page_name'])
                                    echo "selected = 'selected'";
                                    echo ">{$row['page_name']}</option>";
                            }
                            echo "</select>"; ?>
                    </td></tr>
                    <tr><td><input type="submit" name="page-select" id="page-select" value="Move to New Page" /></td></tr>
         </table>

         
<?php
        if (isset($_POST['page-select'])) { 

        $ca        = $_POST['ca'];
        $cb        = $_POST['cb'];
        $cc        = $_POST['cc'];
        $cd        = $_POST['cd'];
        $ce        = $_POST['ce'];
        $upstamp   = $_POST['upstamp'];
        $image     = $_POST['image'];
        $cover     = $_POST['cover'];
        $page_name = $_POST['page_name'];

    include( 'include/config.php' );

    // insert data in mysql database 
    $query = ("INSERT INTO fivefields 
             (ca, cb, cc, cd, ce, upstamp, image, cover, category) 
             VALUES 
             ('$ca', '$cb', '$cc', '$cd', '$ce', '$upstamp', '$image', '$cover', '$page_name')
             ");            
                 mysql_query($query) or die('Invalid query: ' . mysql_error()); 
                     echo "<h3 class='updated'>Image inserted to database and Published to: ";  
                     echo $error;
                     echo "</h3>"; 
                     
    include( 'include/config.php' );
    // now deleted the old image data so it does not take up space on the database
    $id = (int) $_GET['id'];
    mysql_query("DELETE FROM fivefields WHERE `id` = $id") ; 
    echo (mysql_affected_rows()) ? "<h2>Older page related data deleted.</h2>" : "Nothing deleted. See instructions below.<br /> "; 
mysql_close();
}

?>
<h2>Image Moved to New Page! </h2>
<p><a href="show-img.php">BACK TO SAME PAGE (Show all Images)</a></p>
<h3>Your results</h3>
<table>
<?php echo '<tr><td>Page: ' . $page_name . '</td></tr>';
echo '<tr><td>' . $ca . '</td></tr>';
echo '<tr><td>' . $cb . '</td></tr>'; 
echo '<tr><td> - </td></tr>';
echo '<tr><td>' . $cd . '</td></tr>';
echo '<tr><td>' . $ce . '</td></tr>';
echo '<tr><td>' . $upstamp . '</td></tr>';
echo  '<tr><td>' . $image . '</td></tr>';
echo '<tr><td> - </td></tr>';
echo '<tr><td>' . $page_name . '</td></tr>';
?>
</table>


            </div>
        </section>
<?php include( 'giu-footer.php' ); 
}
?>