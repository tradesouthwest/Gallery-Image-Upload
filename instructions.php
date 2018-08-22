<?php
/**
 * GIU by TSW
 */
include( 'giu-header.php' ); ?>
<div class="row">
    <div class="w960">
        <div class="content">
            <p>eMail for support is at <a href="mailto:themes@tradesouthwest.com" title="mail for support">themes@tradesouthwest.com</a> <br>Please donate online to help in further develpment of GFU: <a href="http://tradesouthwest.com/themeopt.php" title="donate - buy me a cup of coffee for my time helping you" target="_blank">http://tradesouthwest.com/themeopt.php</a></p>
<pre>
<?php
$page = file_get_contents('readme.txt');
echo htmlspecialchars($page);
?>
</pre>
        </div>
    </div>
</div>


<?php include( 'giu-footer.php' ); ?>