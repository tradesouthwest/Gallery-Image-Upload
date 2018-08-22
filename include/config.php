<?php
/**
 * GIU config
 * "x"s and urls are just placeholders but are referencing most common configurations
 * replace these with your information.
 */
$hostname = 'localhost';
$username = 'leadspil_cgiadmi';
$password = 'SZC3tiZIyli#';
$database = 'leadspil_giup';

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

// enter relative or absolute url of the folder where images will be uploaded to - WITH trailing slash
$uploaddir_url = "img/";

// enter public url of the folder where images will be uploaded to - WITH trailing slash
$upload_folder = "http://larryjudd.us/gallery/img/";