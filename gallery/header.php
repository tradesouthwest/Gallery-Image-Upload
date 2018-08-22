<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title><?php echo $site_title; ?></title>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="style.php">
    <!--[if lte IE 9]>
    <script src="inc/html5.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=9"/>
    <![endif]-->
<script src="inc/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="inc/slimbox2.js"></script>
</head>
<body>
<div class="container">
    <div class="row"> 
        <header id="giu-black-header">

            <div class="c8">
                <h1><?php echo $site_title; ?></h1>
                <h2><?php echo $site_motto; ?></h2>
            </div>
                <div class="c4 end">
                    <figure class="logo">
                        <img src="<?php echo $page_logo; ?>" alt="<?php echo $logo_alt; ?>" />
                    </figure>
                </div>

    </header> 
        <nav class="c12" id="header-nav">
<?php
include( '../include/config.php' );
$query = "SELECT page_name, page_ref
          FROM theme_setup 
          ORDER BY id 
          ASC"; 
$result = mysql_query($query) or die(mysql_error());
echo "<div class='page-nav'>";
while($row = mysql_fetch_array($result))
{
echo "<a href='index.php?category={$row['page_name']}'";
echo "title='{$row['page_name']}'";
    echo ">{$row['page_name']}</a>";
}
    echo "</div>";
?>
</nav>
        </nav><!-- ends c12 -->
</div><!-- ends row -->

