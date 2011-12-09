<?php

require_once 'SwDb.php';

class ChartsFetcher {
	
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

		$sth = $this->dbh->prepare("SELECT * FROM community_charts WHERE community LIKE ? AND `type`=? AND scenario=? AND daterange=? ORDER BY FIELD(month, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')");
		$sth->execute( array( $this->community, $this->type, $this->scenario, $this->daterange ) );
		return $sth->fetchAll();

	}

	public function byName() {
    	$sth = $this->dbh->prepare("SELECT id,community FROM community_charts WHERE community LIKE :community GROUP BY community");
    	$sth->execute( array( ':community' => '%'.$this->community.'%' ));
    	return $sth->fetchAll();
	}

}

?>