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
            return '<div style="font-size: 16px;">There are no results for the criteria you selected.</div>';  
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

        return ( !empty($this->reqs['sort']) && 'oldest' == $this->reqs['sort'] ) ? '<span style="margin-left: 50px;"> Sort by <a href="resources.php?'.$persist.'">Newest First</a> | Oldest First</span>' : '<span style="margin-left: 50px;"> Sort by Newest First | <a href="resources.php?'.$persist.'&amp;sort=oldest">Oldest First</a></span>';

    }

    public function getResourceSummaryHtml() {

        try {
            $dbh = SwDb::getInstance();
            $sth = $dbh->query($this->getQueryString());
            $this->results = $sth->fetchAll();
            $this->resultsCount = $sth->rowCount();
        } catch (Exception $e) {
            throw new Exception($e); // bubble
        }

        return $this->getResultsCount().$this->getSortCriteria().$this->getFilterReset().$this->getResourcesHtml();

    }

    public function getResourcesHtml() {
        
        $html = '';
        foreach( $this->results as $aResource )
        {
            $r = Resource::factory($aResources); 
            $html .= $r->toSummaryHtml();
        }
        return $html;

    }

    public function getQueryString() {

        $where = array();
        $whereQuery = '';
        $order = '';

        // TODO: prevent sql injection
        foreach( array('tags' => 'pt.tag', 'collab'=>'pc.collaboratorid', 'type'=>'pubs.type' ) as $key => $column) {
            if( !empty($this->reqs[$key])) {
                array_push( $where, $this->formRestriction( $column, $key ));
            }
        }

        if (!empty($where) ) {
            $whereQuery = ' WHERE '.join( ' AND ', $where);
        }

        if ( !empty($this->reqs['sort']) && "oldest" == $this->reqs['sort'] ) {
            $order = " DESC";
        }

        return "SELECT title,type,pubs.id,summary FROM resources pubs LEFT JOIN resource_tags AS pt ON pubs.id=pt.resourceid LEFT JOIN resource_collaborators AS pc ON pubs.id=pc.resourceid $whereQuery GROUP BY pubs.id ORDER BY pubs.createdate $order";
        
    }

    protected function formRestriction($field, $req) {
        return $field . " = '".$this->reqs[$req]."'";
    }

}

?>