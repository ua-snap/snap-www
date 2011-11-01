<?php

class ResourceLayout {

    public function setRequests($reqs) {
        if(!empty($reqs['tags'])) { $this->reqs['tags'] = $reqs['tags']; }
        if(!empty($reqs['collab'])) { $this->reqs['collab'] = $reqs['collab']; }
        if(!empty($reqs['sort'])) { $this->reqs['sort'] = $reqs['sort']; }
        if(!empty($reqs['type'])) { $this->reqs['type'] = $reqs['type']; }
    }

    public function getResultsCount() {
        //no-op
    }

    public function getSortCriteria() {
        //no-op
    }

    public function formRestriction($field, $req) {
        return $field . ' = "'.$this->reqs[$req].'"';
    }

    public function getQueryString() {

        $where = array();
        $whereQuery = '';
        $order = '';
        
        // prevent sql injection
        foreach( array('tags' => 'pt.tag', 'collab'=>'pc.collaboratorid', 'type'=>'pubs.type' ) as $key => $column) {
            if( !empty($this->reqs[$key])) {
                array_push( $where, $this->formRestriction( $column, $this->reqs[$key] ));
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
}

?>