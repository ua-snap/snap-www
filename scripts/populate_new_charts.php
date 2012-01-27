#! /usr/bin/php

<?php

require_once 'src/SwDb.php';

/*

Assumptions: there's a table in the DB matching the structure implied in the charts-checker.php script, 
and it's been populated with valid data.

Create syntax for the community_charts_new_ingest table is this:
CREATE TABLE `community_charts_new_ingest` (
  `id` int(11) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `community` varchar(255) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `lon_albers` decimal(14,6) DEFAULT NULL,
  `lat_albers` decimal(14,6) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `daterange` varchar(255) DEFAULT NULL,
  `scenario` varchar(10) DEFAULT NULL,
  `Jan` decimal(10,2) DEFAULT NULL,
  `JanSD` decimal(10,2) DEFAULT NULL,
  `Jan-90` decimal(10,2) DEFAULT NULL,
  `Feb` decimal(10,2) DEFAULT NULL,
  `FebSD` decimal(10,2) DEFAULT NULL,
  `Feb-90` decimal(10,2) DEFAULT NULL,
  `Mar` decimal(10,2) DEFAULT NULL,
  `MarSD` decimal(10,2) DEFAULT NULL,
  `Mar-90` decimal(10,2) DEFAULT NULL,
  `Apr` decimal(10,2) DEFAULT NULL,
  `AprSD` decimal(10,2) DEFAULT NULL,
  `Apr-90` decimal(10,2) DEFAULT NULL,
  `May` decimal(10,2) DEFAULT NULL,
  `MaySD` decimal(10,2) DEFAULT NULL,
  `May-90` decimal(10,2) DEFAULT NULL,
  `Jun` decimal(10,2) DEFAULT NULL,
  `JunSD` decimal(10,2) DEFAULT NULL,
  `Jun-90` decimal(10,2) DEFAULT NULL,
  `Jul` decimal(10,2) DEFAULT NULL,
  `JulSD` decimal(10,2) DEFAULT NULL,
  `Jul-90` decimal(10,2) DEFAULT NULL,
  `Aug` decimal(10,2) DEFAULT NULL,
  `AugSD` decimal(10,2) DEFAULT NULL,
  `Aug-90` decimal(10,2) DEFAULT NULL,
  `Sep` decimal(10,2) DEFAULT NULL,
  `SepSD` decimal(10,2) DEFAULT NULL,
  `Sep-90` decimal(10,2) DEFAULT NULL,
  `Oct` decimal(10,2) DEFAULT NULL,
  `OctSD` decimal(10,2) DEFAULT NULL,
  `Oct-90` decimal(10,2) DEFAULT NULL,
  `Nov` decimal(10,2) DEFAULT NULL,
  `NovSD` decimal(10,2) DEFAULT NULL,
  `Nov-90` decimal(10,2) DEFAULT NULL,
  `Dec` decimal(10,2) DEFAULT NULL,
  `DecSD` decimal(10,2) DEFAULT NULL,
  `Dec-90` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

'Valid Data' means data in the format M. Lindgren provided me, where a single row looks like this:

411,Alaska,Pile Bay Village,0,USA,-153.8819,59.7789,6609.056314,1087571.255,tas,2020_2029,sresb1,19.2,2.7,16.5,21.2,3.4,17.9,24.4,3.1,22.2,33.8,0.9,31.6,44.8,1.8,43.2,53.1,0.9,51.9,56.5,0.7,55.4,56.3,1.3,54.8,49.5,0.5,47.6,36,1.1,34.1,27,2.2,24,18.3,2.3,15.8

This script will build the two tables used to store the relational data for the Community Charts tool.

Some notes on the input data:
- 'type' field means: 1 === Temperature, 2 === Precipitation
- it's OK if population is 0.

*/

$args = getopt('', array(
 	'communityId::', // Allow a single community ID to be ingested,
));

$communities = array();
$db = SwDb::getInstance();

$sourceSql = ( isset($args['communityId']) && is_numeric($args['communityId'] ) ) ? 
	"SELECT * FROM community_charts_new_ingest WHERE id={$args['communityId']}"
	: "SELECT * FROM community_charts_new_ingest";

$sth = $db->prepare( $sourceSql );
$sth->execute();
$count = 0;

// Munge the date ranges.
$dateMap = array(
	'2010_2019' => '2011-2020',
	'2020_2029' => '2021-2030',	
	'2030_2039' => '2031-2040',	
	'2040_2049' => '2041-2050',
	'2050_2059' => '2051-2060',
	'2060_2069' => '2061-2070',	
	'2070_2079' => '2071-2080',	
	'2080_2089' => '2081-2090',	
	'2090_2099' => '2091-2100',	
);

while( $row = $sth->fetch() ) {
	
	try {
		// Replace Into won't create duplicates or cause noise about primary key duplicates
		// This really could/should be outside of this loop (the community insert runs some 50-odd
		// times, and only matters once) but this script is going to be rarely run / no performance
		// consequences, so ignore the complexity of the coding and move on for now.
		$updateCommunity = 
		<<<sql

	REPLACE INTO `communities`
	  ( `id`, `region`, `community`, `country`, `population`, `lat_alaska_albers`, `lon_alaska_albers` )
	  VALUES
	  (?, ?, ?, ?, ?, ?, ?);

sql;

		$com = $db->prepare($updateCommunity);
		$com->execute((array($row['id'], $row['region'], $row['community'], $row['country'], $row['population'], $row['lat_albers'], $row['lon_albers'] )));

		$updateChartsData = <<<sql

	INSERT INTO `charts_data`
		( `communityId`, `type`, `scenario`, `daterange`, `unit`, 
			`jan`,`janSd`,`feb`,`febSd`,`mar`,`marSd`,`apr`,`aprSd`,`may`,`maySd`,`jun`,`junSd`,`jul`,`julSd`,
			`aug`,`augSd`,`sep`,`sepSd`,`oct`,`octSd`,`nov`,`novSd`,`dec`,`decSd`
		)
		VALUES
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?); SHOW WARNINGS;

sql;

		$data = $db->prepare($updateChartsData);

		$data->execute(array(
			$row['id'],
			$row['type'],
			$row['scenario'],
			$dateMap[$row['daterange']],
			( 1 == $row['type']) ? 'F' : 'in',
			$row['Jan'],
			$row['JanSD'],
			$row['Feb'],
			$row['FebSD'],
			$row['Mar'],
			$row['MarSD'],
			$row['Apr'],
			$row['AprSD'],
			$row['May'],
			$row['MaySD'],
			$row['Jun'],
			$row['JunSD'],
			$row['Jul'],
			$row['JulSD'],
			$row['Aug'],
			$row['AugSD'],
			$row['Sep'],
			$row['SepSD'],
			$row['Oct'],
			$row['OctSD'],
			$row['Nov'],
			$row['NovSD'],
			$row['Dec'],
			$row['DecSD']
		));

$history = $db->prepare(<<<sql

	REPLACE INTO `charts_data`
		( `communityId`, `type`, `scenario`, `daterange`, `unit`, 
			`jan`,`janSd`,`feb`,`febSd`,`mar`,`marSd`,`apr`,`aprSd`,`may`,`maySd`,`jun`,`junSd`,`jul`,`julSd`,
			`aug`,`augSd`,`sep`,`sepSd`,`oct`,`octSd`,`nov`,`novSd`,`dec`,`decSd`
		)
		VALUES
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);

sql
);

		$history->execute(array(
			$row['id'],
			$row['type'],
			$row['scenario'],
			'Historical',
			( 1 == $row['type']) ? 'F' : 'in',
			$row['Jan-90'],
			0,
			$row['Feb-90'],
			0,
			$row['Mar-90'],
			0,
			$row['Apr-90'],
			0,
			$row['May-90'],
			0,
			$row['Jun-90'],
			0,
			$row['Jul-90'],
			0,
			$row['Aug-90'],
			0,
			$row['Sep-90'],
			0,
			$row['Oct-90'],
			0,
			$row['Nov-90'],
			0,
			$row['Dec-90'],
			0
		));

	} catch (Exception $e) {
		die($e);
	}
}

?>