<?php
/**
 * Gallery Image Upload 
 * main Controls Panel direct file - redirects to login page.
 *
 * This file must exist in the format below and in the folder 
 * root/gallery/go in order for a user to login to the admin panel.
 * this file provides administrative login via http://yoursite.com/gallery/go.
 * Using that path will take you to a login screen.
 * Using the path http://yoursite.com/gallery will take non-admin and admin
 * to the Gallery Image upload viewing pages (public website).
 */
session_start();
if( !isset( $_SESSION['user'] ) )
{
header( "Location: ../../login.php" );
}
if( isset( $_SESSION['user'] ) )
{ 
header( "Location: ../../login.php" );
}
?>