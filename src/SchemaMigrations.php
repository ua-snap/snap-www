<?php

require_once 'src/Migrations.php';

class SchemaMigrations
{
    public $migrations;
    public function __construct()
    {
        $this->migrations = array(
        
            1 => new Migration(
                array(
                    'version' => 1,
                    'up' => <<<sql
CREATE  TABLE `schema` (
  `version` INT NOT NULL ,
  PRIMARY KEY (`version`) ,
  UNIQUE INDEX `version_UNIQUE` (`version` ASC) );
sql
,                   'fixtures' => <<<sql
INSERT INTO `schema` VALUES (1);
sql
,                   'down' => <<<sql
DROP TABLE `schema`;
sql
                )
            ),
            2 => new Migration(
                array(
                    'version' => 2,
                    'up' => <<<sql

CREATE TABLE `tileset_descriptions` (
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(4096) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `tileset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable` varchar(50) DEFAULT NULL,
  `dateinterval` varchar(20) DEFAULT NULL,
  `daterange` varchar(20) DEFAULT NULL,
  `scenario` varchar(10) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `resolution` varchar(10) DEFAULT NULL,
  `tilepath` varchar(255) DEFAULT NULL,
  `legend` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

CREATE TABLE `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `summary` text,
  `updatedate` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `accap` tinyint(1) DEFAULT NULL,
  `fsc` tinyint(1) DEFAULT NULL,
  `snap` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

CREATE TABLE `resource_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) DEFAULT NULL,
  `resourceid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

CREATE TABLE `resource_personnel` (
  `resourceid` int(11) DEFAULT NULL,
  `peopleid` int(11) DEFAULT NULL,
  `scientist` tinyint(1) DEFAULT NULL,
  `contact` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `resource_collaborators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collaboratorid` int(11) DEFAULT NULL,
  `resourceid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `summary` text,
  `createdate` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_source` varchar(255) DEFAULT NULL,
  `snap` tinyint(1) DEFAULT NULL,
  `accap` tinyint(1) DEFAULT NULL,
  `fsc` tinyint(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

CREATE TABLE `project_tags` (
  `tag` varchar(255) DEFAULT NULL,
  `projectid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `project_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) DEFAULT NULL,
  `photographer` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `project_personnel` (
  `projectid` int(11) DEFAULT NULL,
  `peopleid` int(11) DEFAULT NULL,
  `scientist` tinyint(1) DEFAULT NULL,
  `contact` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `project_collaborators` (
  `collaboratorid` int(11) DEFAULT NULL,
  `projectid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(50) DEFAULT NULL,
  `middle` varchar(50) DEFAULT NULL,
  `last` varchar(50) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `staffgroup` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `summary` text,
  `organization` varchar(50) DEFAULT NULL,
  `snap` tinyint(1) DEFAULT NULL,
  `accap` tinyint(1) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

CREATE TABLE `community_charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `community` varchar(255) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `daterange` varchar(50) DEFAULT NULL,
  `value` float DEFAULT NULL,
  `stddev` float DEFAULT NULL,
  `type` int(5) DEFAULT NULL,
  `scenario` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=381025 DEFAULT CHARSET=latin1;

CREATE TABLE `collaborators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `description` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `resourceid` int(11) DEFAULT NULL,
  `submitdate` date DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sortorder` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lowres` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
sql
,                   'fixtures' => '',
                    'down' => <<<sql
DROP TABLE `attachments`;
DROP TABLE `collaborators`;
DROP TABLE `community_charts`;
DROP TABLE `people`;
DROP TABLE `project_collaborators`;
DROP TABLE `project_personnel`;
DROP TABLE `project_photos`;
DROP TABLE `project_tags`;
DROP TABLE `projects`;
DROP TABLE `regions`;
DROP TABLE `resources`;
DROP TABLE `resource_collaborators`;
DROP TABLE `resource_personnel`;
DROP TABLE `resource_tags`;
DROP TABLE `tileset`;
DROP TABLE `tileset_descriptions`;
sql
                  )
        ),
        3 => new Migration(
          array(
          'version' => 3,
          'up' =><<<sql
CREATE  TABLE `snapwww`.`video_resource` (
  `resource_id` INT NOT NULL ,
  `embedded_url` TEXT NULL ,
  `embedded_title` TEXT NULL ,
  `embedded_user_url` TEXT NULL ,
  `embedded_user` TEXT NULL ,
  `linked_url` TEXT NULL ,
  `linked_title` TEXT NULL ,
  `file_video_href` TEXT NULL ,
  `file_video_title` TEXT NULL ,
  `file_video_type` TEXT NULL ,
  `file_video_size` TEXT NULL ,
  PRIMARY KEY (`resource_id`) ,
  UNIQUE INDEX `resource_id_UNIQUE` (`resource_id` ASC) )
COMMENT = 'Properties of video resources, FK to resources.id' ;
sql
,         'fixtures' => "INSERT INTO `snapwww`.`video_resource` (`resource_id`, `embedded_url`, `embedded_title`, `embedded_user_url`, `embedded_user`, `linked_url`, `linked_title`, `file_video_href`, `file_video_title`, `file_video_type`, `file_video_size`) VALUES (15, 'http://player.vimeo.com/video/4515275', 'A thousand shades of white', 'http://vimeo.com/icescapestv', 'icescapes', 'http://www.youtube.com/watch?v=u5DiHp76gjs&feature=results_main&playnext=1&list=PLBBDD34F33BAF19CD', 'Alaskan Native thoughts on climate change', 'attachments/path_to_nowhere.mp4', 'Alaskan Native thoughts on climate change', '.mp4', '20 MB');",
          'down' => 'DROP TABLE `video_resource`;'
        )
      ),
        4 => new Migration(
          array(
          'version' => 4,
          'up' => '',
          'fixtures' => <<<sql
UPDATE `snapwww`.`people` SET `summary`="Scott Rupp is the Director of the Scenarios Network for Alaska & Arctic Planning (SNAP), principal investigator for the Department of Interior's Alaska Climate Science Center, and co-PI for the NOAA funded Alaska Center for Climate Assessment and Policy. Rupp is a well-established forest ecologist with specialized experience in ecological modeling. He has authored more than 50 peer-reviewed journal articles and book chapters. Rupp received a BS (1993) in Forest Management from Pennsylvania State University and a Ph.D. (1998) in Forest Ecology from UAF. He is a Professor of Forestry and has been a faculty member at UAF since 2001." WHERE `id`='1';
sql
,
          'down' => ''
        )
            ),
 5 => new Migration(
          array(
          'version' => 5,
          'up' => '',
          'fixtures' => <<<sql
INSERT INTO `snapwww`.`people` (`id`, `first`, `middle`, `last`, `title`, `position`, `email`, `phone`, `fax`, `staffgroup`, `summary`, `organization`, `snap`, `accap`, `status`) values ('22', 'Bruce', NULL, 'Crevensten', '', 'Web Programmer', 'becrevensten@alaska.edu', '9074747134', '9074747151', '3', "Bruce Crevensten joined SNAP as a Web Programmer in October, 2011, and works with SNAP's IT team to publish web content and implement web applications to facilitate access to data and services.  His background in software development includes complex web applications, testing and QA initiatives, project and technology management.  Bruce holds a B.S. (2002) in mathematics from Portland State University, enjoys origami and other intersections between art and mathematics, and has an interest in high performance scientific computing frameworks and architectures.", 'SNAP', '1', '0', '1');
sql
,
          'down' => 'DELETE FROM `snapwww`.`people` WHERE `id`=22 LIMIT 1;'
        )
            ),
             6 => new Migration(
          array(
          'version' => 6,
          'up' => '',
          'fixtures' => <<<sql
INSERT INTO `snapwww`.`people` (`id`, `first`, `middle`, `last`, `title`, `position`, `email`, `phone`, `fax`, `staffgroup`, `summary`, `organization`, `snap`, `accap`, `status`) values ('23', 'Carson', NULL, 'Baughman', '', 'Graduate Student Research Assistant', 'cabaughman2@alaska.edu', '9074745750', '9074747151', '2', "Carson Baughman is a Master of Science candidate and research assistant at SNAP.  His thesis is focused on quantifying the relationships between climate and peat rich soils within the Arctic Foothills region of Alaska’s North Slope.  Specifically he is looking at how the amount of peat found on the landscape varies with changes in above ground mean annual temperature.  This relationship is important because high latitude peat represents a significant pool of carbon that can act as a source or sink depending on global climate.  After defining these relationships using field based data, Carson will develop a model that can be used to predict peat thickness within the study region based on climate scenario data. This work will increase the understanding of predicted climate change consequences for Alaska’s sub-arctic ecosystems.\nCarson hails from the Nevada high desert, received his Bachelors degree in Ecology from the University of Montana, Missoula in 2008. He arrived in Alaska the summer of 2009.  When not indoors, he can be found piloting canoes and tandem bicycles, frolicking with his chickens,￼and procuring nutriment from the land by various manners.", 'SNAP', '1', '0', '1');
sql
,
          'down' => 'DELETE FROM `snapwww`.`people` WHERE `id`=23 LIMIT 1;'
        )
            ),
            7 => new Migration(
          array(
          'version' => 7,
          'up' => <<<sql

CREATE  TABLE `snapwww`.`project_resource_link` (
  `project_resource_link_id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NULL ,
  `resource_id` INT NULL ,
  PRIMARY KEY (`project_resource_link_id`) ,
  INDEX `index` (`project_id` ASC, `resource_id` ASC) );

sql
,
          'fixtures' => <<<sql

INSERT INTO `snapwww`.`project_resource_link` (`project_id`, `resource_id`) VALUES (1, 1);
INSERT INTO `snapwww`.`project_resource_link` (`project_id`, `resource_id`) VALUES (1, 2);
INSERT INTO `snapwww`.`project_resource_link` (`project_id`, `resource_id`) VALUES (2, 1);
INSERT INTO `snapwww`.`project_resource_link` (`project_id`, `resource_id`) VALUES (2, 2);
sql
,
          'down' => 'DROP TABLE `snapwww`.`project_resource_link`;'
        )
            ),                  
            8 => new Migration(
          array(
          'version' => 8,
          'up' => '',
          'fixtures' => <<<sql

UPDATE `snapwww`.`projects` SET `image`='/images/projects/BiomeShift.jpg' WHERE `id`='8';
sql
,
          'down' => ''
        )
            ),
            9 => new Migration(
              array(
                'version' => 9,
                'up' => <<<sql

ALTER TABLE `snapwww`.`attachments` 
ADD INDEX `resource` (`resourceid` ASC, `category` ASC, `sortorder` ASC, `name` ASC);
ALTER TABLE `snapwww`.`project_collaborators` 
ADD INDEX `index` (`collaboratorid` ASC, `projectid` ASC) ;
ALTER TABLE `snapwww`.`community_charts` 
ADD INDEX `charts` (`community` ASC, `type` ASC, `daterange` ASC, `scenario` ASC) ;
ALTER TABLE `snapwww`.`project_personnel` 
ADD INDEX `index` (`projectid` ASC, `peopleid` ASC) ;
ALTER TABLE `snapwww`.`project_photos` 
ADD INDEX `index` (`projectid` ASC) ;
ALTER TABLE `snapwww`.`project_resource_link` 
ADD INDEX `index2` (`project_id` ASC, `resource_id` ASC) ;
ALTER TABLE `snapwww`.`projects` 
ADD INDEX `index2` (`snap` ASC, `accap` ASC, `fsc` ASC) ;

sql
,
                'fixtures' => '',
                'down' => ''
              )
            ),
            10 => new Migration(
              array(
                'version' => 10,
                'up' => <<<sql
ALTER TABLE `snapwww`.`community_charts` CHANGE COLUMN `value` `value` DECIMAL(2) NULL DEFAULT NULL  ;
ALTER TABLE `snapwww`.`community_charts` CHANGE COLUMN `stddev` `stddev` DECIMAL(2) NULL DEFAULT NULL  ;

sql
,
                'fixtures' => '',
                'down' => ''
              )
            ),
        );
    }
}

?>
