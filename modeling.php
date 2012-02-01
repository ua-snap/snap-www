<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods", 'Modeling');
$page->openPage();
$page->pageHeader();
?>

    <div id="main_body">
        <div id="main_content" class="methods">
            <h2>Modeling</h2>
<p>
SNAP uses its primary products and derived data as inputs in additional modeling efforts that make use of models created by SNAP researchers and other collaborators.  The resulting linked models offer projections for fire, permafrost, potential evapotranspiration, and biome shifts.
</p>
<h3>ALFRESCO</h3>
<h4>Boreal ALFRESCO (Alaska Frame-Based Ecosystem Code)</h4>
<p>
An understanding of the processes that control wildland fuel accumulation, including the roles played by climate change and fire management activities, is crucial for designing wildland management policies. Boreal ALFRESCO simulates the responses of subarctic and boreal vegetation to transient climatic changes. The model assumptions reflect the hypothesis that fire regime and climate are the primary drivers of landscape-level changes in the distribution of vegetation in the circumpolar arctic/boreal zone. Furthermore, it assumes that vegetation composition and continuity serve as a major determinant of large, landscape-level fires. Boreal ALFRESCO operates on an annual time step, in a landscape composed of 1 &times; 1 km pixels, a scale appropriate for interfacing with mesoscale climate and carbon models. The model simulates five major subarctic/boreal ecosystem types: upland tundra, black spruce forest, white spruce forest, deciduous forest, and grassland-steppe. These ecosystem types represent a generalized classification of the complex vegetation mosaic characteristic of the circumpolar arctic and boreal zones of Alaska. SNAP climate data can be used as ALFRESCO inputs, thus creating projections of the impacts of changing climate on fire regime.
</p>
<h5>Downloads</h5>
<ul class="resources">
<li>ALFRESCO Complete</li>
<li>Fresco Server for Windows</li>
<li>Fresco Client for Windows</li>
<li>Fresco Client for Linux</li>
<li>User Guide</li>
<li>Tutorial Dataset</li>
</ul>
<h5>External Downloads</h5>
<ul class="resources">
<li>R Statistics Package</li>
<li>TextPad</li>
<li><a href="http://www.sublimetext.com/2" target="_blank">Sublime Text 2</a></li>
</ul>
<h5>Model Input Datasets</h5>
<ul class="resources">
<li>National Park Domains</li>
<li>National Wildlife Refuge Domains</li>
<li>Miscellaneous Domains</li>
</ul>
        </div>
    </div>
<?php
$page->closePage();
?>
  
