<?php

require_once 'src/Config.php';
require_once 'src/ChartsExporter.php';

try {
	
	$exporter = new ChartsExporter();
	$exporter->setProps($_POST);
	$exporter->export();
	header('Location: /charts/'.$exporter->getFilename());

} catch (SnapException $e) {

	header('HTTP/1.1 400 Bad Request', true, 400);

} catch (Exception $e) {

	header('HTTP/1.1 500 Server Error', true, 500);
}

exit;

?>