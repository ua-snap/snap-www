<?php

require_once('src/SwDb.php');
require_once('src/Resource.php');

class ResourceLayout {

    static public $categories = array(
        1 => 'Fact Sheets',
        2 => 'Reports',
        3 => 'Presentations',
        4 => 'Videos'
    );

    static public $imageMap = array(
        1 => 'pub_paper.png',
        2 => 'pub_report.png',
        3 => 'pub_presentation.png',
        4 => 'pub_video.png',
    );

    // If $categories is provided, it should be an array of types => titles.  If not provided, it falls back
    // to the array defined in class.
    public function getResourcesHtml($categories = null) {
        
        $html = '<div class="resources">';
        if( is_array($categories)) { 
            $rc = $categories;
        } else {
            $categories = ResourceLayout::$categories;
            $rc = ResourceLayout::$categories;
        }
        
        // Init the resource cluster arrays
        foreach($rc as $type => $value) {
            $rc[$type] = array();
        }

        // Cluster the resources by type
        foreach( $this->results as $props )
        {
            $rc[$props['type']][] = $props;
        }

        foreach( $categories as $type => $title )
        {
            $imgSrc = ResourceLayout::$imageMap[$type];
            $html .= "<h3><img src='images/$imgSrc' alt=''/>$title</h3><ul>";
            foreach($rc[$type] as $props) {
                $aResource = Resource::factory($props);
                $html .= '<li>'.$aResource->toSummaryHtml().'</li>';
            }
            $html .= '</ul>';
        }
        return $html . '</div>';

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

}

?>
