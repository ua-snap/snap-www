<?php

require_once 'src/ChartsFetcher.php';

include("template.php");
$page = new webPage("SNAP: Community Charts", "charts.css", "data");
$page->openPage();
$page->pageHeader();

?>
<div id="main_body">

    <h1>Community Charts<span id="location"></span></h1>

    <div style="margin: auto;">
        <div style="height: 150px; margin: auto; padding-bottom: 5px; margin-bottom: 20px; width: 950px;">
            <div style="width: 300px; float: left; position: relative; left: -5px">
                <img id="community_list" src="images/akcanada_extent.png" style="display: block; position: absolute; top: -25px; z-index: -10" />
                <div>
                    <div class="ui-widget" style="padding: 0 5px 10ex; margin-bottom: 10px; position: relative; top: 120px; z-index: 10000">
                        <input type="hidden" id="comm_select_id" value="" name="comm_select_id" />
                        <label for="comm_select">Enter your community&rsquo;s name:</label>
                        <input id="comm_select" name="community_selector" type="text" style="border: 1px solid #aaa; width: 95%" value="" placeholder="Enter your community name here" />
                    </div>
                </div>
                
            </div>
            <div style="width: 426px; margin-left: 10px; height: 140px; float: left;  border: 1px solid #ffffff;">
                <?php
                if (!isset($_GET['community'])){
                ?>
                <div id="comm_block" style="position: absolute; width: 426px; height: 160px; background-color: #ffffff; text-align: center;">
                    <div style="text-align: center; font-size: 18px; width: 250px; margin: auto; margin-top: 50px; color: #996600;">Select a Community to open a chart and access options</div>
                </div>
                <?php } ?>
                <div style="color: #666666; margin: auto; font-size: 14px; text-align: center; margin-top: 0px;">
                    Data Set
                </div>
                <div id="dataset" style="margin: auto; font-size: 18px; text-align: center; margin-bottom: 15px;">
                    <?php if ($_GET['dataset'] == '1' || !isset($_GET['dataset'])){
                         echo "<span class=\"selected_option\" id=\"temp\">Temperature</span>";
                          } else {
                         echo "<span id=\"temp\"><a>Temperature</a></span>";
                          }
                    ?>
                     | 
                    <?php if ($_GET['dataset'] == '2'){
                         echo "<span class=\"selected_option\" id=\"precip\">Precipitation</span>";
                          } else {
                         echo "<span id=\"precip\"><a>Precipitation</a></span>";
                          }
                    ?>
                    <script type="text/javascript">
                        $('#temp').click( function() { 
                            snapCharts.data.dataset = 1;
                            snapCharts.changeParams();
                            $('#temp').html("Temperature");
                            $('#temp').addClass("selected_option");
                            $('#precip').html("<a>Precipitation</a>");
                            $('#precip').removeClass("selected_option");
                        });
                        $('#precip').click( function() { 
                            snapCharts.data.dataset = 2;
                            snapCharts.changeParams();
                            $('#temp').html("<a>Temperature</a>");
                            $('#temp').removeClass("selected_option");
                            $('#precip').html("Precipitation");
                            $('#precip').addClass("selected_option");
                        });
                    </script>
                </div>
                <div style="color: #666666; margin: auto; font-size: 14px; text-align: center; margin-top: 0px;">Emissions Scenario</div>
                <div style="margin: auto; font-size: 18px; text-align: center; margin-bottom: 15px;">
                    <?php if ($_GET['scenario'] == 'b1'){
                         echo "<span class=\"selected_option\"  id=\"scen_low\">Low</span>";
                          } else {
                         echo "<span id=\"scen_low\"><a>Low</a></span>";
                          }
                    ?>
                    <div id="scen_low_hover" class="variableHover">
                        <div>
                            <h4>Emissions leveling and declining (B1)</h4>
                            <p>The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The B1 scenario describes a convergent world, with the same global population as A1B, but with more rapid changes in economic structures toward a service and information economy.</p>
                        </div>
                    </div>
                     | 
                    <?php if ($_GET['scenario'] == 'a1b' || !isset($_GET['scenario'])){
                         echo "<span class=\"selected_option\" id=\"scen_med\">Medium</span>";
                          } else {
                         echo "<span id=\"scen_med\"><a>Medium</a></span>";
                          }
                    ?>
                    <div id="scen_med_hover" class="variableHover">
                        <div>
                            <h4>Mid-range emissions (A1B)</h4>
                            <p>The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The Scenario A1B assumes a world of very rapid economic growth, a global population that peaks in mid-century, rapid introduction of new and more efficient technologies, and a balance between fossil fuels and other energy sources.</p>
                        </div>
                    </div>
                     | 
                    <?php if ($_GET['scenario'] == 'a2'){
                         echo "<span class=\"selected_option\" id=\"scen_high\">High</span>";
                          } else {
                         echo "<span id=\"scen_high\"><a>High</a></span>";
                          }
                    ?>
                    <div id="scen_high_hover" class="variableHover">
                        <div>
                            <h4>Rapid increases in emissions (A2)</h4>
                            <p>The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The A2 scenario describes a very heterogeneous world with high population growth, slow economic development and slow technological change.</p>
                        </div>
                    </div>
                    <script type="text/javascript">
                        function showScenario() { $(this).next().fadeIn(); }
                        function hideScenario() { $(this).next().fadeOut(); }
                        $('#scen_low').hoverIntent({ over: showScenario, timeout: 500, out: hideScenario });
                        $('#scen_med').hoverIntent({ over: showScenario, timeout: 500, out: hideScenario });
                        $('#scen_high').hoverIntent({ over: showScenario, timeout: 500, out: hideScenario });
                        $('#scen_low').click( function() { 
                            snapCharts.data.scenario='b1';
                            snapCharts.changeParams();
                            $('#scen_low').html("Low");
                            $('#scen_low').addClass("selected_option");
                            $('#scen_med').html("<a>Medium</a>");
                            $('#scen_med').removeClass("selected_option");
                            $('#scen_high').html("<a>High</a>");
                            $('#scen_high').removeClass("selected_option");
                        });
                        $('#scen_med').click( function() { 
                            snapCharts.data.scenario='a1b';
                            snapCharts.changeParams();                            
                            $('#scen_low').html("<a>Low</a>");
                            $('#scen_low').removeClass("selected_option");
                            $('#scen_med').html("Medium");
                            $('#scen_med').addClass("selected_option");
                            $('#scen_high').html("<a>High</a>");
                            $('#scen_high').removeClass("selected_option");
                        });
                        $('#scen_high').click( function() { 
                            snapCharts.data.scenario='a2';
                            snapCharts.changeParams(); 
                            $('#scen_low').html("<a>Low</a>");
                            $('#scen_low').removeClass("selected_option");
                            $('#scen_med').html("<a>Medium</a>");
                            $('#scen_med').removeClass("selected_option");
                            $('#scen_high').html("High");
                            $('#scen_high').addClass("selected_option");
                        });
                    </script>
                </div>
                <div style="color: #666666; margin: auto; font-size: 14px; text-align: center; margin-top: 0px;">Model Variability</div>
                <div style="margin: auto; font-size: 18px; text-align: center; margin-bottom: 5px;">
                    <?php if ($_GET['variability'] == '0' || !isset($_GET['variability'])){
                         echo "<span class=\"selected_option\" id=\"model_vari_off\">Off</span>";
                          } else {
                         echo "<span id=\"model_vari_off\"><a>Off</a></span>";
                          }
                    ?>
                    <div id="vari_hover" style="z-index: 100; display: none; position: absolute; margin-left: 50px; background-color: #f8f8f8; border: 1px solid #999999;">
                        <div style="width: 350px; left: 50px; font-size: 12px; padding: 10px;">
                            <div style="padding: 3px; border-bottom: 1px solid #0066cc; font-size: 14px; ">Model Variability</div>
                            <div style="text-align: left; margin-top: 5px;">Model variability refers to the standard deviation (SD), which provides a measure of dispersion around the mean. The vertical bars represent the SD across the five models. Their lengths represent one SD above and below this value. A small SD indicates the models are in relative agreement, whereas a large SD suggests choice of model is relatively important. Drawing inferences from overlapping or non-overlapping bars is discouraged. The only comparison to make is of their relative size, as it pertains to changes in the degree of agreement among the models.</div>
                        </div>
                    </div>
                     | 
                    <?php if ($_GET['variability'] == '1'){
                         echo "<span class=\"selected_option\" id=\"model_vari_on\">On</span>";
                          } else {
                         echo "<span id=\"model_vari_on\"><a>On</a></span>";
                          }
                    ?>
                    <div id="vari_hover" class="variableHover">
                        <div>
                            <h4>Model Variability</h4>
                            <p>Model variability refers to the standard deviation (SD), which provides a measure of dispersion around the mean. The vertical bars represent the SD across the five models. Their lengths represent one SD above and below this value. A small SD indicates the models are in relative agreement, whereas a large SD suggests choice of model is relatively important. Drawing inferences from overlapping or non-overlapping bars is discouraged. The only comparison to make is of their relative size, as it pertains to changes in the degree of agreement among the models.</p>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('#model_vari_off').hoverIntent({ over: showScenario, timeout: 500, out: hideScenario });
                        $('#model_vari_on').hoverIntent({ over: showScenario, timeout: 500, out: hideScenario });
                        $('#model_vari_on').click( function() { 
                            snapCharts.data.variability = 1;
                            snapCharts.changeParams();
                            $('#model_vari_on').html("On");
                            $('#model_vari_on').addClass("selected_option");
                            $('#model_vari_off').html("<a>Off</a>");
                            $('#model_vari_off').removeClass("selected_option");
                        });
                        $('#model_vari_off').click( function() { 
                            snapCharts.data.variability = 0;
                            snapCharts.changeParams();                            
                            $('#model_vari_on').html("<a>On</a>");
                            $('#model_vari_on').removeClass("selected_option");
                            $('#model_vari_off').html("Off");
                            $('#model_vari_off').addClass("selected_option");
                        });
                    </script>
                </div>
            </div>
            <div style="width: 188px; margin-left: 10px; height: 120px; float: left; ">
                <div style="text-align: right">In cooperation with:</div>
                <div style="text-align: right;"><a href="<?php echo Config::$url ?>/collaborators.php#org_17"><img alt="Cooperative Extension Services" style="height: 135px; vertical-align: top;" src="images/collaborators/ces.jpg" /></a></div>
            <div id="export_options" style="margin-top: 0px; z-index: 10; display: none; text-align: right; font-size: 12px;">
            Export as: <a id="export_link">Link</a>, 
                <a id="export_image_png">PNG</a>, 
                <a id="export_image_svg">SVG</a>, 
                <a id="export_pdf">PDF</a>
            </div>
            <script type="text/javascript">
                $('#export_link').click( function() {
                    $('#link_field').val(window.location.href);
                    $('#link_box').fadeIn();
                    $('#link_field').focus().select();
                });
                $('#export_image_png').click( function() { window.snapCharts.exportChart('image/png'); } );
                $('#export_image_svg').click( function() { window.snapCharts.exportChart('image/svg+xml'); });
                $('#export_image_pdf').click( function() { window.snapCharts.exportChart('application/pdf'); });
            </script>

                
            </div>
            <div class="ui-helper-clearfix"></div>
        </div>
        <div style="position: relative; margin: 15px auto; clear: both; auto; border: 1px solid #999999; width: 950px; height: 460px;">
            <div id="link_box" style="background-color: #f5f5f5; display: none; position: absolute; z-index: 20; right: 0px; width: 300px; height: 50px; border: 1px solid #787878;">
                <div style="position: absolute; width: 15px; height: 15px; right: 2px; top: 2px; background-color: #ffffff; text-align: center;"><a id="link_close">X</a></div>
                <div style="margin: 13px;">Link: <input id="link_field" type="text" style="width: 220px;" value="" /></div>
                <script type="text/javascript">
                    $('#link_close').click( function() { $('#link_box').fadeOut(); });
                </script>
            </div>
            <div style="top: 20px; position: absolute; width: 950px;" id="display">
                <img alt="Sample Chart" id="placeholderImage" style="margin: auto; width: 920px; opacity: 0.4; margin-left: 15px;" src="/images/def_chart.png" />
                <div style="position: absolute; top: 20px; width: 930px; height: 420px; margin-left: 20px;" id="chart_div"></div>
            </div>
        </div>
        <div>
            <div style="font-size: 18px; margin-bottom: 10px; margin-top: 10px;">Interpreting the Community Charts</div>
            <p>These community charts can be examined for certain key changes and threshold values. Higher mean monthly temperatures in the spring and fall may be of particular interest. This could signify a longer growing season, a loss of ice and/or frozen ground needed for travel or food storage, or a shift in precipitation from snow to rain, which impacts water storage capacity and surface water availability. Warmer, drier spring weather may also be an indicator for increased fire risk. In many locations, winter temperatures are projected to increase dramatically. Warmer winters may allow for the growth of species that are less cold-hardy (including both desirable crops and invasive species), or it may decrease snowpack and increase the frequency of rain-on-snow events that impact wildlife. Higher temperatures across all seasons will likely impact permafrost and land-fast ice.</p>

            <div style="font-size: 18px; margin-bottom: 10px; margin-top: 10px;">How the Community Charts Data Were Derived</div>

            <p>SNAP’s community charts show mean values of downscaled outputs averaged from five Global Circulation <a href="models.php">Models</a> (GCMs). Results are also averaged across decades. This averaging lessens the influence of normal year-to-year climate variability on projection values, and tends to make overall projection trends clearer. It is important to note that uncertainty is associated with each of these graphed values. Uncertainty stems from the modeling of atmospheric and oceanic movements used to create GCMs, from the PRISM <a href="downscaling.php">downscaling</a> process, and from the assumptions made regarding greenhouse gas levels for each emissions scenario. Variability between the five GCMs is in the range of 0&ndash;47&deg;F for temperature and 0&ndash;0.7 inches for precipitation. In general, a higher percentage of uncertainty is associated with precipitation values than with temperature values. It should also be noted that although our models project increases in precipitation, water availability may decrease in some areas due to longer growing seasons and warmer weather.</p>
            <p>Information for each community is based on the closest 2 km by 2 km grid square from SNAP's statewide datasets. For further information on SNAP projections, please explore our <a href="methods.php">Methods</a> section.</p>

        </div>
    </div>
</div>

<script type="text/javascript">
$(function() {
    
    window.snapCharts.communities = <?php echo ChartsFetcher::fetchCommunitiesAsJson(); ?>;

    $('#comm_select').focus().autocomplete(
        {
            source: function(req, responseFn) {
                var re = $.ui.autocomplete.escapeRegex(req.term);
                var matcher = new RegExp( "^" + re, "i" );
                var a = $.grep( window.snapCharts.communities, function(item,index){
                    return matcher.test(item.label);
                });
                responseFn( a );
            }
        }
    ).bind('autocompletechange', function(event, ui) {
        if( false === _.isUndefined(ui.item) ) {
            $('#comm_select').val(ui.item.label);
            $('#comm_select_id').val(ui.item.value);
            window.snapCharts.data.community = ui.item.value;
        }
    }).bind('autocompletefocus', function(event, ui) {
        if( false == _.isUndefined(ui.item) ) {
            event.preventDefault();
            $('#comm_select').val(ui.item.label);
            $('#comm_select_id').val(ui.item.value);
            window.snapCharts.data.community = ui.item.value;
        }
    }).bind('autocompleteselect', function(event, ui) {
        event.preventDefault();
        $('#comm_select').val(ui.item.label);
        $('#comm_select_id').val(ui.item.value);
        window.snapCharts.data.community = ui.item.value;
        window.snapCharts.changeParams();
    }).keypress(function(e) {
        // if the enter key is pressed, try and search if there's a valid community id.
        if( 13 === e.which ) {
            if( false === _.isNull( window.snapCharts.data.community )) {
                window.snapCharts.data.community = $('#comm_select_id').val();
                snapCharts.changeParams();
            }
        }
    });

    $('#export_button').click(function() { 
        window.snapCharts.chart.exportChart(null, { 
            chart: {
                backgroundColor: '#eeffff' 
            }
        }, 
        function (chart){
            window.snapCharts.chart.renderer.image(snapConfig.url + '/images/snap_acronym_rgb.png', 0, 0, 150, 45).add();
            window.snapCharts.chart.renderer.image(snapConfig.url + '/images/snap_acronym_rgb.png', 0, 0, 150, 45).add();
        });
    });

});

</script>

<?php
$page->closePage();
?>
