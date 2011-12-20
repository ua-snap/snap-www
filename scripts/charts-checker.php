#! /usr/bin/php

<?php
require_once 'src/SwDb.php';
/**
Standalone, temporary script for comparing existing Communtiy Charts data against newly generated data.

May also be used to populate the Community Charts database.

sql to populate:
- put it in the /var/lib/mysql/database/ directory
TRUNCATE TABLE `community_charts_new_ingest`;

LOAD DATA INFILE '/var/lib/mysql/snapwww/community_charts_new_ingest.csv'
INTO TABLE `community_charts_new_ingest`
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES;
*/

$db = SwDb::getInstance();
$new = $db->prepare("SELECT * FROM community_charts_new_ingest WHERE region='Alaska'");
$old = $db->prepare('SELECT * FROM community_charts WHERE `community`=? AND `type`=? AND `daterange`=? AND `scenario`=? AND `month` = ?');
$months = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
$new->execute();

$out = '';
print "Community,Type,Scenario,DateRange,JanOld,JanNew,JanSDOld,JanSDNew,FebOld,FebNew,FebSDOld,FebSDNew,MarOld,MarNew,MarSDOld,MarSDNew,AprOld,AprNew,AprSDOld,AprSDNew,MayOld,MayNew,MaySDOld,MaySDNew,JunOld,JunNew,JunSDOld,JunSDNew,JulOld,JulNew,JulSDOld,JulSDNew,AugOld,AugNew,AugSDOld,AugSDNew,SepOld,SepNew,SepSDOld,SepSDNew,OctOld,OctNew,OctSDOld,OctSDNew,NovOld,NovNew,NovSDOld,NovSDNew,DecOld,DecNew,DecSDOld,DecSDNew\n";
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
$count = 0;
while( $count < 1 && $row = $new->fetch() ) {
	++$count;
	$out = $row['community'].','.$row['type'].','.$row['scenario'].','.$row['daterange'].',';
	foreach($months as $month) {
		
		$old->execute(array($row['community'], $row['type'], $dateMap[$row['daterange']], $row['scenario'], $month));
		$res = $old->fetch();
		if( empty($res) ) {
			$out .= 'error,';
		} else {
			$out .= $res['value'].','; // old value
			$out .= $row[$month].','; // new value
			$out .= $res['stddev'].','; // old SD
			$out .= $row[$month.'SD'].','; // new SD
			/*
			$out .= $row[$month] - $res['value'].',';
			$out .= $row[$month.'SD'] - $res['stddev'].',';
			*/
		}
	}

	$out=rtrim($out,',') . "\n";
	print $out;
/* can't compare history yet until the classification of the new history bucket is clarified
	$out = $row['community'].','.$row['type'].','.$row['scenario'].','.$row['daterange'].',';	
	foreach($months as $month) {
		
		$old->execute(array($row['community'], $row['type'], '1961-1990', $row['scenario'], $month));
		$res = $old->fetch();
		if( empty($res) ) {
			$out .= 'error,';
		} else {
			$out .= $row[$month] - $res['value'].',';
			$out .= $row[$month.'SD'] - $res['stddev'].',';
		}
	}

	$out=rtrim($out,',') . "\n";
	print $out;
*/
}

?>