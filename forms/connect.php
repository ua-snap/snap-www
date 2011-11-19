<?php
	require "../src/Config.php";
    mysql_connect(Config::$database['host'], Config::$database['user'], Config::$database['pass']) or die("Unable to Connect to Database");
    mysql_select_db(Config::$database['database']);
?>
