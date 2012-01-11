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
sql
                  )
        ),
        3 => new Migration(
          array(
          'version' => 3,
          'up' =><<<sql
CREATE  TABLE `video_resource` (
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
,         'fixtures' => '',
          'down' => 'DROP TABLE `video_resource`;'
        )
      ),
 
      4 => new Migration(
        array(
          'version' => 4,
          'up' => <<<sql

CREATE  TABLE `project_resource_link` (
  `project_resource_link_id` INT NOT NULL AUTO_INCREMENT,
  `project_id` INT NULL ,
  `resource_id` INT NULL ,
  PRIMARY KEY (`project_resource_link_id`) ,
  INDEX `index` (`project_id` ASC, `resource_id` ASC) );

sql
,
          'fixtures' => '',
          'down' => 'DROP TABLE `project_resource_link`;'
        )
            ),                  
      5 => new Migration(
        array(
          'version' => 5,
          'up' => '',
          'fixtures' => '',
          'down' => ''
        )
            ),
      6 => new Migration(
              array(
                'version' => 6,
                'up' => <<<sql

ALTER TABLE `attachments` 
ADD INDEX `resource` (`resourceid` ASC, `category` ASC, `sortorder` ASC, `name` ASC);
ALTER TABLE `project_collaborators` 
ADD INDEX `index` (`collaboratorid` ASC, `projectid` ASC) ;
ALTER TABLE `community_charts` 
ADD INDEX `charts` (`community` ASC, `type` ASC, `daterange` ASC, `scenario` ASC) ;
ALTER TABLE `project_personnel` 
ADD INDEX `index` (`projectid` ASC, `peopleid` ASC) ;
ALTER TABLE `project_photos` 
ADD INDEX `index` (`projectid` ASC) ;
ALTER TABLE `project_resource_link` 
ADD INDEX `index2` (`project_id` ASC, `resource_id` ASC) ;
ALTER TABLE `projects` 
ADD INDEX `index2` (`snap` ASC, `accap` ASC, `fsc` ASC) ;

sql
,
                'fixtures' => '',
                'down' => ''
              )
            ),
        7 => new Migration(
              array(
                'version' => 7,
                'up' => <<<sql

ALTER TABLE `community_charts` CHANGE COLUMN `value` `value` DECIMAL(2) NULL DEFAULT NULL  ;
ALTER TABLE `community_charts` CHANGE COLUMN `stddev` `stddev` DECIMAL(2) NULL DEFAULT NULL  ;

sql
,
                'fixtures' => '',
                'down' => ''
              )
            ),

            8 => new Migration(
                array(
                  'version' => 8,
                  'up' => <<<sql

CREATE TABLE `communities` (
  `id` int(11) unsigned NOT NULL,
  `country` varchar(32) DEFAULT NULL,
  `region` varchar(32) DEFAULT NULL,
  `community` varchar(256) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `lat_alaska_albers` decimal(12,4) DEFAULT NULL,
  `lon_alaska_albers` decimal(12,4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `community` (`community`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `charts_data` (
  `communityId` int(11) unsigned NOT NULL,
  `type` int(4) NOT NULL,
  `scenario` enum('a1b','a2','b1') NOT NULL DEFAULT 'a1b',
  `daterange` varchar(16) NOT NULL DEFAULT '',
  `unit` varchar(16) NOT NULL DEFAULT '',
  `jan` decimal(12,4) NOT NULL,
  `janSd` decimal(12,4) NOT NULL,
  `feb` decimal(12,4) NOT NULL,
  `febSd` decimal(12,4) NOT NULL,
  `mar` decimal(12,4) NOT NULL,
  `marSd` decimal(12,4) NOT NULL,
  `apr` decimal(12,4) NOT NULL,
  `aprSd` decimal(12,4) NOT NULL,
  `may` decimal(12,4) NOT NULL,
  `maySd` decimal(12,4) NOT NULL,
  `jun` decimal(12,4) NOT NULL,
  `junSd` decimal(12,4) NOT NULL,
  `jul` decimal(12,4) NOT NULL,
  `julSd` decimal(12,4) NOT NULL,
  `aug` decimal(12,4) NOT NULL,
  `augSd` decimal(12,4) NOT NULL,
  `sep` decimal(12,4) NOT NULL,
  `sepSd` decimal(12,4) NOT NULL,
  `oct` decimal(12,4) NOT NULL,
  `octSd` decimal(12,4) NOT NULL,
  `nov` decimal(12,4) NOT NULL,
  `novSd` decimal(12,4) NOT NULL,
  `dec` decimal(12,4) NOT NULL,
  `decSd` decimal(12,4) NOT NULL,
 PRIMARY KEY (`communityId`,`type`,`scenario`,`daterange`,`unit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

sql
,
                  'fixtures' => '',
                  'down' => 'drop table `communities`; drop table `charts_data`;'
                )
              ),
        );
    }
}

?>
