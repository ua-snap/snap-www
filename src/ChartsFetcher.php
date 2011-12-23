<?php

require_once 'SwDb.php';

class ChartsFetcher {
	public $community;
	public $type;
	public $scenario;
	public $daterange;
	private $dbh;

	public function __construct($community, $type = null, $scenario = null, $daterange = null) {
		$this->community = $community;
		$this->type = $type;
		$this->scenario = $scenario;
		$this->daterange = $daterange;
		$this->dbh = SwDb::getInstance();
	}

	public function rowByType($type) {
		$sth = $this->dbh->prepare( 'SELECT max(value),min(value) FROM community_charts WHERE community LIKE ? AND `type`=?' );
		$sth->execute( array( $this->community, $type ));
		return $sth->fetch();		
	}

	public function byTemperature() {
		
		return $this->rowByType(1);

	}

	public function byPrecipitation() {

		return $this->rowByType(2);
		
	}

	public function fetch() {

		$sth = $this->dbh->prepare("SELECT * FROM communities, charts_data WHERE `communities`.`id` = ? AND `charts_data`.`type`=? AND `charts_data`.`scenario`=? AND `charts_data`.`daterange`=? AND `communities`.`id` = `charts_data`.`communityId` LIMIT 1");
		$sth->execute( array( $this->community, $this->type, $this->scenario, $this->daterange ) );
		return $sth->fetchAll();

	}

	static public function fetchCommunity($comm) {
		$dbh = SwDb::getInstance();
		$sth = $dbh->prepare('SELECT * FROM `communities` WHERE id=?');
		$sth->execute(array($comm));
		return $sth->fetch();
	}

	static public function fetchCommunitiesAsJson() {
		
		$dbh = SwDb::getInstance();

		// rename columns to match jQueryUI autocompleter plugin data source
		$sth = $dbh->prepare('SELECT `id`, `community` FROM communities');
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();

		// loop to cast carefully to utf8
		$arr = array();
		while( $row = $sth->fetch() ) {
			$arr[] = array( 
				'value' => utf8_encode($row['id']),
				'label' => utf8_encode($row['community'])
			);
		}
		return json_encode($arr);
	}

	static public function fetchChart($community, $dataset, $scenario, $variability) {

		$yAxisTitle = (1 === $dataset) ? 'Temperature &deg;F' : 'Total precipitation in inches';
		switch ($scenario) {
			case 'a2':
				$subtitle = "5 Model Average, High-range emissions (A2)";
				break;
			
			case 'b1':
				$subtitle = "5 Model Average, Low-range emissions (B1)";
				break;

			case 'a1b': //fallthru
			default:
				$subtitle = "5 Model Average, Mid-range emissions (A1B)";
				break;
		}

		$dbh = SwDb::getInstance();

		$sth = $dbh->prepare("SELECT * FROM communities WHERE `id`=:community");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->bindParam(':community', $community, PDO::PARAM_INT);
		$sth->execute();
		$res = $sth->fetch();

		$title = (1 === $dataset) ? 'Historical and Projected Average Monthly Temperature for ' : 'Historical and Projected Average Monthly Precipitation for ';
		$title .= $res['community'].', '.$res['region'].' '.$res['country'];

		$json = array(

			'variability' => $variability,
			'dataset' => $dataset,
			'scenario' => $scenario,
			'communityId' => $community,
			'communityName' => $res['community'],
			'communityRegion' => $res['region'],
			'communityCountry' => $res['country'],
			'yAxisTitle' => $yAxisTitle,
			'subtitle' => $subtitle,
			'title' => $title
		);

		$sth = $dbh->prepare("SELECT * FROM charts_data WHERE `communityId` = :community AND `type`=:dataset AND `scenario`=:scenario");

		$sth->bindParam(':community', $community, PDO::PARAM_INT);
		$sth->bindParam(':dataset', $dataset, PDO::PARAM_INT);
		$sth->bindParam(':scenario', $scenario, PDO::PARAM_STR);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();

		while( $row = $sth->fetch() ) {
			$json['series'][$row['daterange']] = $row;
		}

		return json_encode($json);

		/*
		function() {
					if( 1 === snapCharts.data.dataset ) {
						return 'Temperature &deg;F';
					} else {
						return 'Total precipitation in inches';
					}
				};

plotBands: function() {
					if( 1 === snapCharts.data.dataset ) {
						return [
							{	
								value: 32, 
								color: '#000000', 
								width: 1.5, 
								label: { 
									text: '32&deg;', 
									align: 'right', 
									style: { 
										fontSize: '10px' 
									} 
								} 
							}
						];
					}
				},

function() {
					switch( snapCharts.data.dataset ) {

						case 'B1' : return '5 Model Average, Low-range emissions (B1)';
						case 'A1B' : return '5 Model Average, Mid-range emissions (A1B)';

						case 'B1' : return '';
						case 'A1B' : return '';
						case 'A2' : return '5 Model Average, High-range emissions (A2)';
					}
				}
function() {
					if( 1 === snapCharts.data.dataset ) {
						return 'Historical and Projected Average Monthly Temperature for ' + snapCharts.data.communityName;
					} else {
						return 'Historical and Projected Average Monthly Precipitation for ' + snapCharts.data.communityName;
					}
				}

*/
	}

}

?>