<?php

require_once('src/Config.php');

// SnapWeb DB wrapper around PDO
class SwDb {
	
	static public function getInstance() {
		static $db;
		if(!isset($db)) {
			$db = new PDO('mysql:host='.Config::$database['host'].';dbname='.Config::$database['database'], Config::$database['user'], Config::$database['pass']);
		}
		return $db;
	}
}

?>