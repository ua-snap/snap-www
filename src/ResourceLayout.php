<?php

require_once('src/SwDb.php');
require_once('src/Resource.php');

class ResourceLayout {

    public function setRequests($reqs)
    {
        $this->reqs = array();
        if(!empty($reqs['tags'])) { $this->reqs['tags'] = $reqs['tags']; }
        if(!empty($reqs['collab'])) { $this->reqs['collab'] = $reqs['collab']; }
        if(!empty($reqs['sort'])) { $this->reqs['sort'] = $reqs['sort']; }
        if(!empty($reqs['type'])) { $this->reqs['type'] = $reqs['type']; }

    }

    public function getResultsCount()
    {
        if( empty($this->resultsCount) ) {
            return '<div id="noResults">There are no results for the criteria you selected.</div>';  
        } else {
            return '<span>Displaying '.count($this->results).' result'.((count($this->results) > 1) ? 's': '').'</span>';
        }
    }

    public function getFilterReset()
    {
        if (!empty($this->reqs['tags']) || !empty($this->reqs['type']) || !empty($this->reqs['collab'])){    
            return '<span> | <a href="resources.php">Show All</a></span>';
        }
    }

    public function getSortCriteria() {

        $persist = array();
        foreach( array('tags','collab','type') as $key ) {
            if( !empty($this->reqs[$key]) ) {
                array_push($persist, $key.'='.$this->reqs[$key]);
            }
        }
        if(!empty($persist)) {
            $persist = implode('&amp;', $persist);
        } else {
            $persist = '';
        }

        return ( !empty($this->reqs['sort']) && 'oldest' == $this->reqs['sort'] ) ? '<span id="sortWidget"> Sort by <a href="resources.php?'.$persist.'">Newest First</a> | Oldest First</span>' : '<span id="sortWidget"> Sort by Newest First | <a href="resources.php?'.$persist.'&amp;sort=oldest">Oldest First</a></span>';

    }

    public function getResourceSummaryHtml() {

        return $this->getResourcesHtml();

    }

    public function getResourcesHtml() {
        
        $html = '';
        foreach( $this->results as $aResource )
        {
            $r = Resource::factory($aResource); 
            $html .= $r->toSummaryHtml();
        }
        return $html;

    }

    public function fetchResources() {
    
        try {
            $dbh = SwDb::getInstance();
            $sth = $dbh->query($this->getQueryString());
            $this->results = $sth->fetchAll();
            $this->resultsCount = $sth->rowCount();
        } catch (Exception $e) {
            throw new Exception($e); // bubble
        }
    
    }

    public function getQueryString() {

        // Was dynamic to allow sorting/etc, is now static.

        return <<<sql

SELECT title, type, pubs.id, summary FROM resources pubs LEFT JOIN resource_tags AS pt ON pubs.id=pt.resourceid LEFT JOIN resource_collaborators AS pc ON pubs.id=pc.resourceid  GROUP BY pubs.id ORDER BY pubs.type ASC, pubs.title ASC

sql;
        
    }

    protected function formRestriction($field, $req) {
        return $field . " = '".$this->reqs[$req]."'";
    }

}

?>
