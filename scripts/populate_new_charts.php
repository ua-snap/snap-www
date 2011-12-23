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
			$row['daterange'],
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
	} catch (Exception $e) {
		die($e);
	}
}


?>