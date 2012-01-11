<?php
require_once 'template.php';
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
var_dump($_SERVER);
$fragments = explode(parse_url($_SERVER['PATH_INFO'], PHP_URL_FRAGMENT), '/');

$state = array(
    'variable' => ( isset($fragments[0]) && !isEmpty($fragments[0] )) ? $fragments[0] : 'temperature',
    'interval' => ( isset($fragments[0]) && !isEmpty($fragments[0] )) ? $fragments[0] : 'decadalAverages',
    'range' => ( isset($fragments[0]) && !isEmpty($fragments[0] )) ? $fragments[0] : '2010-2019',
    'scenario' => ( isset($fragments[0]) && !isEmpty($fragments[0] )) ? $fragments[0] : 'A1B',
    'zoom' => ( isset($fragments[0]) && !isEmpty($fragments[0] )) ? $fragments[0] : 'zoom',
    'latitude' => ( isset($fragments[0]) && !isEmpty($fragments[0] )) ? $fragments[0] : 'latitude',
    'longitude' => ( isset($fragments[0]) && !isEmpty($fragments[0] )) ? $fragments[0] : 'longitude',
);

var_dump($fragments);

// Define menu structure
$menu = array(
    'variables' => array(
        // id => (array: )
        'temperature' => array(
            'name' => 'Average Annual Temperature',
            'description' => 'The average annual precipitation for the given range',
        ),
        'precipitation' => array(
            'name' => 'Average Annual Precipitation',
            'description' => 'This is the average annual temperature calculated for the given range',
        ),
        'dayOfFreeze' => array(
            'name' => 'Day of Freeze',
            'description' => 'placeholder',
        ),
        'dayOfThaw' => array(
            'name' => 'Day of Thaw',
            'description' => 'placeholder',
        ),
        'lengthOfGrowingSeason' => array(
            'name' => 'Length of Growing Season',
            'description' => 'placeholder',
        )
    ),
    'intervals' => array(
        'decadalAverages' => array(
            'name' => '10 Year Averages',
            'description' => 'Data is averaged over a 10 year interval'
        ),
        'spring' => array(
            'name' => '10 Year Averages&mdash;Spring',
            'description' => 'Data from March, April, and May are averaged over a 10 year interval'
        ),
        'summer' => array(
            'name' => '10 Year Averages&mdash;Summer',
            'description' => 'Data from June, July, and August are averaged over a 10 year interval'
        ),
        'fall' => array(
            'name' => '10 Year Averages&mdash;Fall',
            'description' => 'Data from September, October, and November are averaged over a 10 year interval'
        ),
        'winter' => array(
            'name' => '10 Year Averages&mdash;Winter',
            'description' => 'Data from December, January, and February are averaged over a 10 year interval'
        ),
    ),
    'ranges' => array(
        '2010-2019' => array(
            'name' => '2010&ndash;2019',
            'description' => '2010&ndash;2019'
        ),
        '2020-2029' => array(
            'name' => '2020&ndash;2029',
            'description' => '2020&ndash;2029'
        ),
        '2030-2039' => array(
            'name' => '2030&ndash;2039',
            'description' => '2030&ndash;2039'
        ),
        '2040-2049' => array(
            'name' => '2040&ndash;2049',
            'description' => '2040&ndash;2049'
        ),
        '2050-2059' => array(
            'name' => '2050&ndash;2059',
            'description' => '2050&ndash;2059'
        ),
        '2060-2069' => array(
            'name' => '2060&ndash;2069',
            'description' => '2060&ndash;2069'
        ),
        '2070-2079' => array(
            'name' => '2070&ndash;2079',
            'description' => '2070&ndash;2079'
        ),
        '2080-2089' => array(
            'name' => '2080&ndash;2089',
            'description' => '2080&ndash;2089'
        ),
        '2090-2099' => array(
            'name' => '2090&ndash;2099',
            'description' => '2090&ndash;2099'
        ),
    ),
    'scenarios' => array(
        'A2' => array(
            'name' => 'rapid increases in emissions (<span>A2</span>)',
            'description' => 'The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The A2 scenario describes a very heterogeneous world with high population growth, slow economic development and slow technological change.',
        ),
        'A1B' => array(
            'name' => 'mid-range emissions (<span>A1B</span>)',
            'description' => 'The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The Scenario A1B assumes a world of very rapid economic growth, a global population that peaks in mid-century, rapid introduction of new and more efficient technologies, and a balance between fossil fuels and other energy sources.',
        ),
        'B1' => array(
            'name' => 'leveling and declining emissions (<span>B1</span>)',
            'description' => 'The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The B1 scenario describes a convergent world, with the same global population as A1B, but with more rapid changes in economic structures toward a service and information economy.',
        ),                
    ),
    /*
    'models' => array(
        'GCM' => array(
            'name' => 'GCM',
            'description' => 'tbd',
        )
    ),
    'resolutions' => array(
        '2Km' => array(
            'name' => '2Km',
            'description' => '2Km tbd'
        ),
    ),
    */
);

?>

<div id="map_header">
    <div class="container">
        <div id="map_logo">
            <img alt="Map Tool Logo" src="images/logo_snap_maps_stats.png" />
        </div>
        <div id="model_menu">
            <div id="menu_items">
				<div id="currently_viewing">currently viewing</div>
					<div id="mapMenu">
						<div>   
							<div class="menuOption" id="menu_variable">
								<div>
									<span class="menuTitle"><?php echo $menu['variables'][$state['variable']]['name']; ?></span>
								</div>
								<div class="menuSpacer"></div>
								<div class="menuContents">
									<?php echo getSplitMenuHtml($menu['variables'], 'variable'); ?>
								</div>
							</div>

							<div class="menuOption" id="menu_interval">
								<div>as <span class="menuTitle"> <?php echo $menu['intervals'][$state['interval']]['name']; ?> </span></div>
								<div class='menuSpacer'></div>
								<div class='menuContents'> <?php echo getSplitMenuHtml($menu['intervals'], 'interval'); ?> </div>
							</div>
							<div class="menuOption" id="menu_range">
								<div>from <span class="menuTitle"> <?php echo $menu['ranges'][$state['range']]['name']; ?> </span></div>
							<div class='menuSpacer'></div>
							<div class='menuContents'> <?php echo getSplitMenuHtml($menu['ranges'], 'range'); ?> </div>
						</div>
					</div>

					<div id="small_menu_items">
						<div class="menuOption" id="menu_scenario">
							<div>assuming <span class="menuTitle"> <?php echo $menu['scenarios'][$state['scenario']]['name']; ?> </span></div>
							<div class='menuSpacer'></div>
							<div class='menuContents'> <?php echo getSplitMenuHtml($menu['scenarios'], 'scenario'); ?> </div>
						</div>
                        <!--
					<div class='menuOption' id='menu_model'>
						<div>using the <span class="menuTitle"> <?php echo $menu['models'][$state['model']]['name']; ?> </span></div>
						<div class="menuSpacer"></div>
						<div class="menuContents"> <?php echo getSplitMenuHtml($menu['models'],'model'); ?> </div>
					</div>
					<div class="menuOption" id="menu_resolution">
						<div>downscaled to <span class="menuTitle"> <?php echo $menu['resolutions'][$state['resolution']]['name']; ?> </span> resolution</div>
						<div class="menuSpacer"></div>
						<div class="menuContents"> <?php echo getSplitMenuHtml($menu['resolutions'], 'model'); ?> </div>
					</div>
                    -->
				</div>
			</div>
		</div>

		<div id="map_menu_bar" class="map_bar">
			<div id="textLinks"><a href="">Main Menu</a></div>
			<div id="shareBlock" style=""><a class="addthis_button"><img alt="Share" style="margin-left: 20px; margin-right: 20px;" src="/images/share.png" /></a></div>
			<div id="exportBlock">
				<span>This Map: </span>
				<span><a href="" onclick="window.print()">Print</a></span>
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
    window.snap.state.variable = currenthash[0] || '<?php echo $state['variable'] ?>';
    window.snap.state.interval = currenthash[1] || '<?php echo $state['interval'] ?>';
    window.snap.state.range = currenthash[2] || '<?php echo $state['range'] ?>';
    window.snap.state.scenario = currenthash[3] || '<?php echo $state['scenario'] ?>';
    window.snap.state.model = currenthash[4] || '<?php echo $state['model'] ?>';
    window.snap.state.resolution = currenthash[5] || '<?php echo $state['resolution'] ?>';
    var zoom = window.snap.state.zoom = currenthash[6] || <?php echo $state['zoom'] ?>;
    var latitude = window.snap.state.latitude = currenthash[7] || <?php echo $state['latitude'] ?>;
    var longitude = window.snap.state.longitude = currenthash[8] || <?php echo $state['longitude'] ?>;

      google.maps.event.addDomListener(window, 'load', function(){
        init(zoom, latitude, longitude);
        google.maps.event.addListenerOnce(map, 'idle', function(){
            addMap();
            google.maps.event.addListener(map, 'idle', function(){
                writeHash();
            });
        });
    });

    $(window).resize(resize);

    $(".menuContentsLeft > div").hover( 
        function() {
            var tmp = $(this).children("span").html();
            var num = $(this).attr("id").substring(4);
            $(this).parents('.menuContents').children(".menuContentsRight").children("#desc_" + num).show();
        },
        function() {
            $(this).parents('.menuContents').children(".menuContentsRight").children("div[id^='desc_']").hide();
        }
    );

    //On click on the variable, show the menu and options   
    $('#menu_variable').click( function() { showVariable(this); } );
    $('#menu_interval').click( function() { showVariable(this); } );
    $('#menu_range').click( function() { showVariable(this); } );
    $('#menu_scenario').click( function() { showVariable(this); } );
    $('#menu_model').click( function() { showVariable(this); } );
    $('#menu_resolution').click( function() { showVariable(this); } );

    $('.menuContentsLeft div').click( function(e) {

        window.snap.state[$(e.currentTarget).attr('data-variable')] = $(e.currentTarget).attr('data-value');
      
        $(this).parents(".menuOption").find(".menuTitle").html($(this).html());
        addMap(this, $(this).children("span").html());
        
        if ($(this).parents(".menuOption").attr("id") == "menu_variable"){
        //    buildMenu($(this).children("span").html());
        }

//        updateMenu();
    });
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