<?php

class ResourceLayout {

    public function setRequests($reqs) {
        if(isset($reqs['tags']) && !empty($reqs['tags'])) { $this->get['tags'] = $reqs['tags']; }
        if(isset($reqs['collab']) && !empty($reqs['collab'])) { $this->get['collab'] = $reqs['collab']; }
        if(isset($reqs['sort']) && !empty($reqs['sort'])) { $this->get['sort'] = $reqs['sort']; }
        if(isset($reqs['type']) && !empty($reqs['type'])) { $this->get['type'] = $reqs['type']; }
    }

    public function getResultsCount() {
        //no-op
    }
    
    public function getSortCriteria() {
        //no-op
    }
}

?>