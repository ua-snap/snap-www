<?php
require_once 'template.php';
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
?>

<div id="map_header">

    <div class="container">
        <div id="map_logo">
            <img alt="Map Tool Logo" src="images/logo_snap_maps_stats.png" />
        </div>
    </div>

    <div id="model_menu">
        <div id="menu_items">
    		<div id="currently_viewing">currently viewing</div>
    			<div id="mapMenu">
    				   
                 </div>
    		</div>
    	</div>
    </div>

    <div id="map_menu_bar" class="map_bar">
    	<div id="textLinks"><a href="">Main Menu</a></div>
    	<div id="shareBlock" style=""><a class="addthis_button"><img alt="Share" src="/images/share.png" /></a></div>
    	<div id="exportBlock">
    		<span><a href="" onclick="window.print(); return false;">Print</a></span>
    		<span><a href="" >Link</a></span>
    	</div>
    </div>

</div>

<div id="map_wrapper">
    <div id="map_canvas"></div>
    <div id="legend_wrapper">
        <div id="legend_background"></div>
        <div id="legend"></div> 
    </div>
</div>

<div id="map_footer">
    <div class="map_bar">
        <span id="helpBlock"><a href="">Help</a> | <a href="">About this tool</a></span>
        <span class="logoBlock"><a href="http://www.uaf.edu"><img alt="UAF Logo" style="height: 28px;" src="images/UAFLogo_A_white.png" /></a></span>
        <span class="logoBlock"><a href="<?php echo Config::$url ?>"><img alt="SNAP Logo" src="images/snap_acronym_white.png" /></a></span>
    </div>
</div>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">

$(document).ready(function() { 

    var currenthash = window.location.hash.substring(1).split("/");
    window.snap.state.variable = currenthash[0] || 'temperature';
    window.snap.state.interval = currenthash[1] || 'decadalAverages';
    window.snap.state.range = currenthash[2] || '2010-2019';
    window.snap.state.scenario = currenthash[3] || 'A1B';
    window.snap.state.model = currenthash[4] || 'GCM'; // not used yet, only one model
    window.snap.state.resolution = currenthash[5] || '2Km'; // not used yet, only one resolution
    var zoom = window.snap.state.zoom = parseInt(currenthash[6], 10) || 3;
    var latitude = window.snap.state.latitude = parseFloat(currenthash[7], 10) || 65;
    var longitude = window.snap.state.longitude = parseFloat(currenthash[8], 10) || -145;

    updateMenuTitles();

    google.maps.event.addDomListener(window, 'load', function(){
        init(zoom, latitude, longitude);
        google.maps.event.addListenerOnce(map, 'idle', function(){
            addMap();
            google.maps.event.addListener(map, 'idle', function(){
                writeHash();
            });
        });
    });

    // the resize function is defined in the maps.js file.
    $(window).resize(resize);

});

</script>
</body>
</html>

<?php

function getSplitMenuHtml($items, $variable) {
    
    $left = '';
    $right = '';
    foreach($items as $id => $menuItems ) {
        $left .= '<div data-variable="'.$variable.'" data-value="'.$id.'"><span>'.$menuItems['name'].'</span></div>';
        $right .= '<div data-value="'.$id.'" style="display: none;">'.$menuItems['description'].'</div>';
    }
    return <<<html
<div class="menuContentsLeft">$left</div>
<div class="menuContentsRight">$right</div>
html;

}

?>