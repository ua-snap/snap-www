<?php

require_once 'src/ChartsFetcher.php';

include("template.php");
$page = new webPage("SNAP: Community Charts", "charts.css", "data", 'Community Charts');
$page->openPage();
$page->pageHeader();

?>
<div id="main_body">

    <h1>Community Charts<span id="location"></span></h1>

    <div>
        <div id="menu_chart_wrapper">
            
            <div style="float: left; margin: 0">
                <div id="variable_selections">

                    <div id="comm_select_wrapper">
                        <p>To load a chart, type your community&rsquo;s name:</p>
                        <div class="ui-widget" style="z-index: 1001">
                            <input type="hidden" id="comm_select_id" value="" name="comm_select_id" />
                            <input id="comm_select" name="community_selector" type="text" style="border: 1px solid #aaa; width: 95%" value="" placeholder="Type your community..." />
                        </div>
                    </div>

                    <p>Data Set</p>    
                    <div id="variable_buttons" class="buttonset">
                        <input type="radio" id="variable_temperature" name="dataset" value="1" checked="checked"/><label for="variable_temperature">Temperature</label>
                        <input type="radio" id="variable_precipitation" name="dataset" value="2" /><label for="variable_precipitation">Precipitation</label>
                    </div>
                    <p>Emissions Scenario</p>
                    <div id="scenario_buttons" class="buttonset">
                        <input type="radio" id="scenario_b1" name="scenario" value="b1"/><label for="scenario_b1">Low (B1)</label>
                        <input type="radio" id="scenario_a1b" name="scenario" value="a1b" checked="checked"/><label for="scenario_a1b">Medium (A1B)</label>
                        <input type="radio" id="scenario_a2" name="scenario" value="a2" /><label for="scenario_a2">High (A2)</label>
                    </div>
                    <div class="helpbuttons">
                        <button id="dataset_help">About scenarios&hellip;</button>
                    </div>
                    <p>Model Variability</p>
                    <div id="variability_buttons" class="buttonset">
                        <input type="radio" id="variability_off" name="variability" value="0" checked="checked"/><label for="variability_off">Off</label>
                        <input type="radio" id="variability_on" name="variability" value="1"/><label for="variability_on">On</label>
                    </div>
                    <div class="helpbuttons">
                        <button id="variability_help">About variability&hellip;</button>
                    </div>                    
                </div>
            </div>
        </div>
        <div style="float:left;">
        <img id="community_list" src="images/akcanada_extent.gif" style="width: 400px; display: block; margin: 20px 0 0 3em;" />
        <p style="font-size: 8px; color: #888; text-align: center; margin: 1ex 0; padding: 0;">SNAP has created charts for communities in the area shown above.</p>
        </div>
            <div style="float: right;">
                <div style="text-align: right; margin-top: 20px">In cooperation with:<br/>
                    <a href="<?php echo Config::$url ?>/collaborators.php#org_17"><img alt="Cooperative Extension Services" style="height: 135px; vertical-align: top;" src="images/collaborators/ces.jpg" /></a>
                </div>
            </div>
        </div>
        <div class="ui-helper-clearfix"></div>

        <div style="border-top: 1px solid #eee; position: relative; margin-top: 1em; padding-top: 1em">
            <button id="export_options" style="display: none; position: absolute; top: 0right: 0;">Export</button>
                <div id="chart_div"></div>
        </div>
        <div class="methods text">
<h4>Interpreting the Community Charts</h4>
<p>
SNAP community charts can be examined for certain key changes and threshold values. Higher mean monthly temperatures in the spring and fall may be of particular interest. This could signify a longer growing season, a loss of ice and/or frozen ground needed for travel or food storage, or a shift in precipitation from snow to rain, which impacts water storage capacity and surface water availability. Warmer, drier spring weather may also be an indicator for increased fire risk. In many locations, winter temperatures are projected to increase dramatically. Warmer winters may allow for the growth of species that are less cold-hardy (including both desirable crops and invasive species), or it may decrease snowpack and increase the frequency of rain-on-snow events that impact wildlife. Higher temperatures across all seasons will likely impact permafrost and land-fast ice.
</p>

<h4>How the Community Charts Were Derived</h4>
<p>
Information for each community is based on the closest 2 km by 2 km pixel from SNAP's datasets. The charts show mean values of downscaled outputs averaged from five Global Climate Models (GCMs). Results are also averaged across decades. This averaging lessens the influence of normal year-to-year climate variability on projected values, and tends to make overall projection trends clearer. It is important to note that <a href="/uncertainty.php">uncertainty</a> is associated with each of these graphed values. Uncertainty stems from the modeling of atmospheric and oceanic movements used to create GCMs, from the PRISM <a href="/downscaling.php">downscaling</a> process, and from the assumptions made regarding greenhouse gas levels for each emissions scenario.
</p>
<p>
Standard deviation of precipitation between the five models, averaged over space, time, and the three scenarios, ranges from about 5.8 mm to 13.8 mm with a mean of 9.8 mm.  For temperature, this measure ranges from 0.5 degrees C to 2.1 degrees C with a mean of 1.1 degrees C.  This assessment of variability on a scale that encompasses space, time, and scenarios is relatively small, particularly due to the averaging across space. By comparison, it is important to note that standard deviation across the five models for a particular spatial pixel may be as large as 500+ mm or 5+ degrees C.
</p>
<p>
In general, a higher percentage of uncertainty is associated with precipitation values than with temperature values. It should also be noted that although our models project increases in precipitation, water availability may decrease in some areas due to longer growing seasons and warmer weather.
</p>
<p>
For further information on SNAP projections, please explore our <a href="/methods.php">Methods</a> section.
</p>
        </div>
    </div>
</div>

<div id="exportDialog" style="display: none;">

    <fieldset>
    <legend>Link</legend>
    <input style="width: 100%" readonly="readonly" id="export_link" value="linky linky" />
    </fieldset>

    <fieldset>
    <legend>High&ndash;resolution image for print</legend>
    <button id="export_hires_png">Download high-resolution PNG (600 dpi, 10" wide)</button>
    </fieldset>

    <fieldset>
    <legend>Low&ndash;resolution image for web</legend>
    <button id="export_lowres_png">Download low-resolution PNG (800&times;350px)</button>
    </fieldset>

    <fieldset>
    <legend>Vector format for posters (SVG)</legend>
    <p>Programs such as Adobe Illustrator, GIMP, and ImageMagick are needed to work with this file format.</p>
    <button id="export_svg">Download SVG (resolution&ndash;independent)</button>

    </fieldset>

</div>

<div id="processingExportDialog" class="about_dialog" style="display: none;">
<h4><img src="images/ajax-loader-gray.gif"/> Processing image for export&hellip;</h4>
<p>Your download should begin shortly.  High&ndash;resolution PNG images can take up to a minute to process on the server before the download begins.  If you experience problems, please <a href="people.php#contact">let us know</a>.</p>
</div>

<div id="about_scenarios" class="about_dialog" style="display: none;">
 <p>The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions.</p>
    <h4>Emissions leveling and declining (B1)</h4>
    <p>The B1 scenario describes a convergent world, with the same global population as A1B, but with more rapid changes in economic structures toward a service and information economy.</p>

    <h4>Mid-range emissions (A1B)</h4>
    <p>The A1B scenario assumes a world of very rapid economic growth, a global population that peaks in mid&ndash;century, rapid introduction of new and more efficient technologies, and a balance between fossil fuels and other energy sources.</p>

    <h4>Rapid increases in emissions (A2)</h4>
    <p>The A2 scenario describes a very heterogeneous world with high population growth, slow economic development and slow technological change.</p>

</div>

<div id="about_variability" class="about_dialog" style="display: none;">

<h4>Model Variability</h4>
<p>Model variability refers to the standard deviation (SD), which provides a measure of dispersion around the mean. The vertical bars represent the SD across the five models. Their lengths represent one SD above and below this value. A small SD indicates the models are in relative agreement, whereas a large SD suggests choice of model is relatively important. Drawing inferences from overlapping or non-overlapping bars is discouraged. The only comparison to make is of their relative size, as it pertains to changes in the degree of agreement among the models.</p>

</div>

<script type="text/javascript">

window.snapCharts.communities = <?php echo ChartsFetcher::fetchCommunitiesAsJson(); ?>;

</script>

<?php
$page->closePage();
?>
