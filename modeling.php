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
<li><a href="/alfresco/FS1.0.1-package.zip">ALFRESCO Complete</a> (<?php echo getFileSize("/alfresco/FS1.0.1-package.zip"); ?>) - This download contains Fresco Server, Fresco Client, a user guide, a tutorial dataset and the R statistical software package. You can also download each piece individually below.</li>
<li><a href="/alfresco/FrescoServerInstall-1.0.1-windows.msi">Fresco Server for Windows</a> (<?php echo getFileSize("/alfresco/FrescoServerInstall-1.0.1-windows.msi"); ?>)</li>
<li><a href="/alfresco/FrescoClientInstall-1.0.1-windows.msi">Fresco Client for Windows</a> (<?php echo getFileSize("/alfresco/FrescoClientInstall-1.0.1-windows.msi"); ?>)</li>
<li><a href="/alfresco/FrescoClientInstall-1.0.1-linux.tar.gz">Fresco Client for Linux</a> (<?php echo getFileSize("/alfresco/FrescoClientInstall-1.0.1-linux.tar.gz"); ?>)</li>
<li><a href="/alfresco/UserGuide_FS1.0.1.pdf">User Guide</a> (<?php echo getFileSize("/alfresco/UserGuide_FS1.0.1.pdf"); ?>)</li>
<li><a href="/datasets/Kanuti_1.0.zip">Tutorial Dataset</a> (<?php echo getFileSize("/datasets/Kanuti_1.0.zip"); ?>)</li>
</ul>
<h5>External Downloads</h5>
<ul class="resources">
<li><a href="http://www.r-project.org/">R statistics package</a></li>
<li><a href="http://www.textpad.com/">TextPad</a>: text editor for preparing input files for ALFRESCO</li>
<li><a href="http://www.sublimetext.com/2" >Sublime Text 2</a>: text editor for preparing input files for ALFRESCO</li>
</ul>
<h5>Model Input Datasets</h5>
<ul class="resources">
<li>National Park Domains
<ul>
<li><a href="/datasets/BeringLandBridgeNP.zip">Bering Land Bridge National Preserve</a> (<?php echo getFileSize("/datasets/BeringLandBridgeNP.zip"); ?>)</li>
<li><a href="/datasets/DenaliNPP.zip">Denali National Park</a> (<?php echo getFileSize("/datasets/DenaliNPP.zip"); ?>)</li>
<li><a href="/datasets/KobukValleyNP.zip">Kobuk Valley National Park</a> (<?php echo getFileSize("/datasets/KobukValleyNP.zip"); ?>)</li>
<li><a href="/datasets/YukonCharleyRiversNP.zip">Yukon Charley Rivers National Preserve</a> (<?php echo getFileSize("/datasets/YukonCharleyRiversNP.zip"); ?>)</li>
</ul>
</li>
<li>National Wildlife Refuge Domains
<ul>
<li><a href="/datasets/ArcticNWR101.zip">Arctic National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/ArcticNWR101.zip"); ?>)</li>
<li><a href="/datasets/InnokoNWR101.zip">Innoku National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/InnokoNWR101.zip"); ?>)</li>
<li><a href="/datasets/KanutiNWR101.zip">Kanuti National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/KanutiNWR101.zip"); ?>)</li>
<li><a href="/datasets/KenaiNWR101.zip">Kenai National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/KenaiNWR101.zip"); ?>)</li>
<li><a href="/datasets/KoyukNowitNInnoNWR101.zip">Koyuk National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/KoyukNowitNInnoNWR101.zip"); ?>)</li>
<li><a href="/datasets/SelawikNWR101.zip">Selawik National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/SelawikNWR101.zip"); ?>)</li>
<li><a href="/datasets/TetlinNWR101.zip">Tetlin National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/TetlinNWR101.zip"); ?>)</li>
<li><a href="/datasets/TogiakNWR101.zip">Togiak National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/TogiakNWR101.zip"); ?>)</li>
<li><a href="/datasets/YukonDeltaNWR101.zip">Yukon Delta National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/YukonDeltaNWR101.zip"); ?>)</li>
<li><a href="/datasets/YukonFlatsNWR101.zip">Yukon Flats National Wildlife Refuge</a> (<?php echo getFileSize("/datasets/YukonFlatsNWR101.zip"); ?>)</li>
</ul>
</li>
<li>Miscellaneous Domains
<ul>
<li><a href="/datasets/DaltonHighway.zip">Dalton Highway</a> (<?php echo getFileSize("/datasets/DaltonHighway.zip"); ?>)</li>
<li><a href="/datasets/DonnellyTrainingArea.zip">Donnelly Training Area</a> (<?php echo getFileSize("/datasets/DonnellyTrainingArea.zip"); ?>)</li>
<li><a href="/datasets/KenaiLandscapeArea.zip">Kenai Landscape Area</a> (<?php echo getFileSize("/datasets/KenaiLandscapeArea.zip"); ?>)</li>
<li><a href="/datasets/YMATananaFlats.zip">YMA Tanana Flats</a> (<?php echo getFileSize("/datasets/YMATananaFlats.zip"); ?>)</li>
</ul>
</li>
</ul>
        </div>
    </div>
<?php
$page->closePage();
?>
  
