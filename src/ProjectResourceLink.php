<?php

require_once('src/SwDb.php');

/**
* Responsibility of this class is to:
*  - fetch links between projects and resources
*  - give back a list of links of either projects or resources for display on the relevant pages
*/
class ProjectResourceLink {

    public function getLinksByResource($resourceId) {
        try {
            $dbh = SwDb::getInstance();
            $sth = $dbh->prepare(<<<sql

SELECT
	projects.id as id, projects.title as title
FROM
	project_resource_link, projects
WHERE
		project_resource_link.project_id = projects.id
	AND
		project_resource_link.resource_id = :resourceId

sql
);
            $sth->execute( array( 'resourceId' => $resourceId ) );
            $links = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e); // bubble
        }
        
        return $links;
    }

    public function getHtmlByResource($resourceId) {
    	$links = $this->getLinksByResource($resourceId);

    	if( 0 === count($links) ) {
    		return '';
    	}

    	$html = '<div id="projectLinks"><h4>Related projects</h4><ul>';
    	foreach( $links as $aLink ) {
    		$html .= '<li><a href="project_page.php?projectid='.$aLink['id'].'">'.$aLink['title'].'</a></li>';
    	}
    	return $html.'</ul></div>';
    }
       
    public function getLinksByProject($projectId) {
        try {
            $dbh = SwDb::getInstance();
            $sth = $dbh->prepare(<<<sql

SELECT
	resources.id as id, resources.title as title
FROM
	project_resource_link, resources
WHERE
		project_resource_link.resource_id = resources.id
	AND
		project_resource_link.project_id = :projectId

sql
);
            $sth->execute( array( 'projectId' => $projectId ) );
            $links = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e); // bubOH ble
        }
        
        return $links;
    }
 	public function getHtmlByProject($projectId) {
    	$links = $this->getLinksByProject($projectId);

    	if( 0 === count($links) ) {
    		return '';
    	}

    	$html = '<div id="resourceLinks"><h4>Related resources</h4><ul>';
    	foreach( $links as $aLink ) {
    		$html .= '<li><a href="resource_page.php?resourceid='.$aLink['id'].'">'.$aLink['title'].'</a></li>';
    	}
    	return $html.'</ul></div>';
    }
}
?>