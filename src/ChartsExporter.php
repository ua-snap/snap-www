<?php

require_once 'src/Exceptions.php';
require_once 'src/SwDb.php';

/**
* Given POST requests, generates a chart in the desired format in the
* location specified in Config::$charts directory (absolute path, must be Apache readable).
* Also needs the Config::$temp directory for a scratch writing location for the initial SVG file.
*/
class ChartsExporter {

	// Maps the incoming type request to the command fragment to run,
	// which is interpolated via sprintf() with the appropriate temp files / static overlay files.
	public $featureMap = array(

		'png/lowres' => array(
			'mime' => 'image/png',
			'command' => 'convert %s -quality 90 -resize 800 %s; composite %s -gravity NorthWest -region +5+5 %s'
		),
		'png/hires' => array(
			'mime' => 'image/png',
			'command' => 'convert -density 600 %s %s'
	  	),
	  	'svg' => array(
		  	'mime' => 'image/svg+xml',
		  	'command' => 'cp %s %s' // just move the SVG file and rename it as appropriate
		)
	
	);

// PICKUP: need to add variable + scenario + variability to filename.

	public $communityId;
	public $dataset;
	public $scenario;
	public $variability;
	public $type;
	public $svg;
	private $community = array();

	/**
	* The point of having this explicit step -- not in the constructor -- is to facilitate testing and to make
	* the script bail loudly if it doesn't get required HTTP params (i.e. don't try and
	* generate anything if provided faulty input)
	*/
	public function setProps($params) {
		if(
			!isset($params['communityId']) ||
			!isset($params['dataset']) ||
			!isset($params['variability']) ||
			!isset($params['scenario']) ||
			!isset($params['svg']) ||
			!isset($params['type'])
		) {
			throw new SnapException('Parameters not set in ChartsExporter->setProps');
		}

		$this->communityId = $params['communityId'];
		$this->dataset = $params['dataset'] == 1 ? 'temp' : 'precip';
		$this->scenario = $params['scenario'];
		$this->variability = $params['variability'] == 1 ? '_var' : '';
		$this->type = $params['type'];
		$this->svg = $params['svg'];
	}

	/**
	* returns assoc array of two items: 'community' and 'region'
	*/
	public function getCommunity() {
		$dbh = SwDb::getInstance();
		$sth = $dbh->prepare("SELECT `community`, `region` FROM communities WHERE id = :id");
		$sth->execute( array( 'id' => $this->communityId ));
		$this->community = $sth->fetch(PDO::FETCH_ASSOC);
		return $this->community;
	}

	/**
	* Do a DB lookup to fetch the correct community name.
	*/
	public function getFilename() {
		
		if(empty($this->community)) { $this->getCommunity(); }

		// TODO: may need to enrich this to protect from special characters
		$base = 'SNAP_Chart_'.$this->community['community'].'_'.$this->community['region'].'_'.$this->dataset.'_'.$this->scenario.$this->variability;

		switch( $this->type ) {

			case 'svg':
				$base .= '.svg';
				break;

			case 'png/hires':
				$base .= '_hires.png';
				break;

			case 'png/lowres':
				$base .= '_lowres.png';
				break;

			default: throw new Exception('filename type not derivable');
		}

		return preg_replace('/\s+/', '_', $base);
	}

	public function export() {
		
		$filename = $this->getFilename();

		// Is the file already in the cache?
		if( false === $this->fileExistsInCache($filename)) {
			$this->writeFileToCache($filename);
		}

	}

	public function writeFileToCache($filename) {

		// Write the SVG to temporary output
		$tempSvg = Config::$temp . '/' . md5($this->svg) . '.svg';
		$chart = Config::$charts . '/' . $filename;

		try {

			// If, for whatever reason, the md5'd SVG exists even though the file isn't in cache, reuse the SVG -- but
			// if not, then write it out.
			if( false === @file_exists($tempSvg)) {
				file_put_contents($tempSvg, $this->svg);
			}
			
			$command = sprintf($this->featureMap[$this->type]['command'], $tempSvg, $chart);

			$result = exec( $command );

			@unlink($tempSvg);
			return $result;
			
		} catch (Exception $e) {
			
			// Cleanup
			if(isset($this->handle) && is_resource($this->handle)) {
				fclose($this->handle);
			}

			if(file_exists($tempSvg)) {
				@unlink($tempSvg);
			}

			// bubble
			throw $e;
		}
	}

	public function fileExistsInCache($filename) {
		return @file_exists( Config::$charts . '/' . $filename);
	}

}

?>