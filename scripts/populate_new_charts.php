#! /usr/bin/php

<?php

require_once 'src/SwDb.php';

/*
Assumptions: there's a table in the DB matching the structure implied in the charts-checker.php script, and it's been populated with valid data.

This script will build the two tables used to store the relational data for the Community Charts tool.

*/

$communities = array();
$db = SwDb::getInstance();
$sth = $db->prepare("SELECT * FROM community_charts_new_ingest");
$sth->execute();
$count = 0;

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
		$com = $db->prepare(<<<sql

	REPLACE INTO `communities`
	  ( `id`, `region`, `community`, `country`, `population`, `lat_alaska_albers`, `lon_alaska_albers` )
	  VALUES
	  (?, ?, ?, ?, ?, ?, ?)

sql
);
		$com->execute((array($row['id'], $row['region'], $row['community'], $row['country'], $row['population'], $row['lat_albers'], $row['lon_albers'] )));

		$data = $db->prepare(<<<sql

	INSERT INTO `charts_data`
		( `communityId`, `type`, `scenario`, `daterange`, `unit`, 
			`jan`,`janSd`,`feb`,`febSd`,`mar`,`marSd`,`apr`,`aprSd`,`may`,`maySd`,`jun`,`junSd`,`jul`,`julSd`,
			`aug`,`augSd`,`sep`,`sepSd`,`oct`,`octSd`,`nov`,`novSd`,`dec`,`decSd`
		)
		VALUES
		(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?); SHOW WARNINGS;

sql
);

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