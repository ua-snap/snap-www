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
  `Jan` decimal(12,4) DEFAULT NULL,
  `JanSD` decimal(12,4) DEFAULT NULL,
  `Jan-90` decimal(12,4) DEFAULT NULL,
  `Feb` decimal(12,4) DEFAULT NULL,
  `FebSD` decimal(12,4) DEFAULT NULL,
  `Feb-90` decimal(12,4) DEFAULT NULL,
  `Mar` decimal(12,4) DEFAULT NULL,
  `MarSD` decimal(12,4) DEFAULT NULL,
  `Mar-90` decimal(12,4) DEFAULT NULL,
  `Apr` decimal(12,4) DEFAULT NULL,
  `AprSD` decimal(12,4) DEFAULT NULL,
  `Apr-90` decimal(12,4) DEFAULT NULL,
  `May` decimal(12,4) DEFAULT NULL,
  `MaySD` decimal(12,4) DEFAULT NULL,
  `May-90` decimal(12,4) DEFAULT NULL,
  `Jun` decimal(12,4) DEFAULT NULL,
  `JunSD` decimal(12,4) DEFAULT NULL,
  `Jun-90` decimal(12,4) DEFAULT NULL,
  `Jul` decimal(12,4) DEFAULT NULL,
  `JulSD` decimal(12,4) DEFAULT NULL,
  `Jul-90` decimal(12,4) DEFAULT NULL,
  `Aug` decimal(12,4) DEFAULT NULL,
  `AugSD` decimal(12,4) DEFAULT NULL,
  `Aug-90` decimal(12,4) DEFAULT NULL,
  `Sep` decimal(12,4) DEFAULT NULL,
  `SepSD` decimal(12,4) DEFAULT NULL,
  `Sep-90` decimal(12,4) DEFAULT NULL,
  `Oct` decimal(12,4) DEFAULT NULL,
  `OctSD` decimal(12,4) DEFAULT NULL,
  `Oct-90` decimal(12,4) DEFAULT NULL,
  `Nov` decimal(12,4) DEFAULT NULL,
  `NovSD` decimal(12,4) DEFAULT NULL,
  `Nov-90` decimal(12,4) DEFAULT NULL,
  `Dec` decimal(12,4) DEFAULT NULL,
  `DecSD` decimal(12,4) DEFAULT NULL,
  `Dec-90` decimal(12,4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

'Valid Data' means data in the format M. Lindgren provided me, where a single row looks like this:

411,Alaska,Pile Bay Village,0,USA,-153.8819,59.7789,6609.056314,1087571.255,tas,2020_2029,sresb1,19.2,2.7,16.5,21.2,3.4,17.9,24.4,3.1,22.2,33.8,0.9,31.6,44.8,1.8,43.2,53.1,0.9,51.9,56.5,0.7,55.4,56.3,1.3,54.8,49.5,0.5,47.6,36,1.1,34.1,27,2.2,24,18.3,2.3,15.8

This script will build the two tables used to store the relational data for the Community Charts tool.

To load the new data, run this after copying the csv into /var/lib/mysql/snapwww/filename

TRUNCATE TABLE `community_charts_new_ingest`;

LOAD DATA INFILE '/var/lib/mysql/snapwww/filename
INTO TABLE `community_charts_new_ingest`
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES; -- to skip the header, if there is one

Some notes on the input data:
- 'type' field means: 1 === Temperature, 2 === Precipitation
- it's OK if population is 0.
- date field should be YYYY_YYYY (see the definition of the $dateMap below to see expected inputs)

*/

$args = getopt('', array(
 	'communityId::', // Allow a single community ID to be ingested,
));

$communities = array();
$db = SwDb::getInstance();

// Flush the existing tables
$truncateSql = 'TRUNCATE TABLE `communities`';
$sth = $db->prepare($truncateSql);
$sth->execute();

$truncateSql = 'TRUNCATE TABLE `charts_data`';
$sth = $db->prepare($truncateSql);
$sth->execute();

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

// WORKAROUND: munge the incoming type string to a numeral (1 = temp, 2 = precip)
$typeMap = array(
	'tas' => 1,
	'pr' => 2
);

// WORKAROUND: munge the incoming scenario strings to the choice the UI recognizes
$scenarioMap = array(
	'sresa2' => 'a2',
	'sresa1b' => 'a1b',
	'sresb1' => 'b1'
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
			$typeMap[$row['type']],
			$scenarioMap[$row['scenario']],
			$dateMap[$row['daterange']],
			( 1 == $typeMap[$row['type']]) ? 'F' : 'in',
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
			$typeMap[$row['type']],
			$scenarioMap[$row['scenario']],
			'Historical',
			( 1 == $typeMap[$row['type']]) ? 'F' : 'in',
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