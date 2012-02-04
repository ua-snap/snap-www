<?php
include("template.php");
$page = new webPage("SNAP: ALFRESCO", "", "data");
$page->openPage();
$page->pageHeader();

                
?>
        <div id="main_body">

            <div id="main_content">
                <div class="subHeader">ALFRESCO</div>
                <div style="font-size: 15px; font-weight: bold; margin-bottom: 5px; ">Boreal ALFRESCO (Alaska Frame Based Ecosystem Code)</div>
                <div>
                <img src="images/alfresco.png" style="float: left; width: 150px; margin-right: 15px;" />
                <p><strong>An understanding</strong> of the processes that control wildland fuel accumulation, including the roles played by climate change and fire management activities, is crucial for designing wildland management policies. Boreal ALFRESCO simulates the responses of subarctic and boreal vegetation to transient climatic changes. The model assumptions reflect the hypothesis that fire regime and climate are the primary drivers of landscape-level changes in the distribution of vegetation in the circumpolar arctic/boreal zone. Furthermore, it assumes that vegetation composition and continuity serve as a major determinant of large, landscape-level fires. Boreal ALFRESCO operates on an annual time step, in a landscape composed of 1 x 1 km pixels, a scale appropriate for interfacing with mesoscale climate and carbon models. The model simulates five major subarctic/boreal ecosystem types: upland tundra, black spruce forest, white spruce forest, deciduous forest, and grassland-steppe. These ecosystem types represent a generalized classification of the complex vegetation mosaic characteristic of the circumpolar arctic and boreal zones of Alaska. SNAP climate data can be used as ALFRESCO inputs, thus creating projections of the impacts of changing climate on fire regime.</p>
                </div>
                <div style="margin-top: 20px; font-weight: bold;">Downloads</div>
                <div style="margin-top: 10px;"><a href="files/alfresco/FS1.0.1-package.zip">ALFRESCO Complete</a> (<?php echo getFileSize("files/alfresco/FS1.0.1-package.zip"); ?>) - This download contains Fresco Server, Fresco Client, a user guide, a tutorial dataset and the R statistical software package. You can also download each piece individually below.</div>
                <div style="margin-top: 10px;"><a href="files/alfresco/FrescoServerInstall-1.0.1-windows.msi">Fresco Server for Windows</a> (<?php echo getFileSize("files/alfresco/FrescoServerInstall-1.0.1-windows.msi"); ?>)</div>
                <div style="margin-top: 10px;"><a href="files/alfresco/FrescoClientInstall-1.0.1-windows.msi">Fresco Client for Windows</a> (<?php echo getFileSize("files/alfresco/FrescoClientInstall-1.0.1-windows.msi"); ?>)</div>
                <div style="margin-top: 10px;"><a href="files/alfresco/FrescoClientInstall-1.0.1-linux.tar.gz">Fresco Client for Linux</a> (<?php echo getFileSize("files/alfresco/FrescoClientInstall-1.0.1-linux.tar.gz"); ?>)</div>
                <div style="margin-top: 10px;"><a href="files/alfresco/UserGuide_FS1.0.1.pdf">User Guide</a> (<?php echo getFileSize("files/alfresco/UserGuide_FS1.0.1.pdf"); ?>)</div>
                <div style="margin-top: 10px;"><a href="files/datasets/Kanuti_1.0.zip">Tutorial Dataset</a> (<?php echo getFileSize("files/datasets/Kanuti_1.0.zip"); ?>)</div>
                <div style="margin-top: 20px; font-weight: bold;">External Downloads</div>
                <div style="margin-top: 10px;"><a href="http://www.r-project.org/">R statistics package</a></div>
                <div style="margin-top: 10px;"><a href="http://www.textpad.com/">TextPad</a> - For Windows users, we recommend editing ALFRESCO input files with TextPad, a text editor that saves the input files in a format that ALFRESCO expects.</div>
                <div style="margin-top: 20px; font-weight: bold; margin-bottom: 5px; font-size: 18px">Datasets</div>
                <div style="margin-bottom: 10px;">The following datasets contain region specific files for use with the Boreal ALFRESCO model. Each of these packages contains the input data for the model at 1 km resolution, including five climate projections used by SNAP and scripts for use in the R statistical package.  </div>
                <div style="width: 350px; height: 200px; margin-right: 5px; float: left; text-align: center;">
                    <div style="font-size: 14px; font-weight: bold; text-align: center; margin: 5px;">National Park Domains</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/BeringLandBridgeNP.zip">Bering Land Bridge National Preserve</a> (<?php echo getFileSize("files/datasets/BeringLandBridgeNP.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/DenaliNPP.zip">Denali National Park</a> (<?php echo getFileSize("files/datasets/DenaliNPP.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/KobukValleyNP.zip">Kobuk Valley National Park</a> (<?php echo getFileSize("files/datasets/KobukValleyNP.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/YukonCharleyRiversNP.zip">Yukon Charley Rivers National Preserve</a> (<?php echo getFileSize("files/datasets/YukonCharleyRiversNP.zip"); ?>)</div>
                </div>
                <div style="width: 340px; height: 300px; margin-left: 5px; margin-right: 5px; float: left; text-align: center;">
                    <div style="font-size: 14px; font-weight: bold; text-align: center; margin: 5px;">National Wildlife Refuge Domains</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/ArcticNWR101.zip">Arctic National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/ArcticNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/InnokoNWR101.zip">Innoku National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/InnokoNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/KanutiNWR101.zip">Kanuti National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/KanutiNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/KenaiNWR101.zip">Kenai National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/KenaiNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/KoyukNowitNInnoNWR101.zip">Koyuk National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/KoyukNowitNInnoNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/SelawikNWR101.zip">Selawik National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/SelawikNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/TetlinNWR101.zip">Tetlin National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/TetlinNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/TogiakNWR101.zip">Togiak National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/TogiakNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/YukonDeltaNWR101.zip">Yukon Delta National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/YukonDeltaNWR101.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/YukonFlatsNWR101.zip">Yukon Flats National Wildlife Refuge</a> (<?php echo getFileSize("files/datasets/YukonFlatsNWR101.zip"); ?>)</div>
                </div>
                <div style="width: 240px; height: 200px; margin-left: 5px; float: left; text-align: center;">
                    <div style="font-size: 14px; font-weight: bold; text-align: center; margin: 5px;">Miscellaneous Domains</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/DaltonHighway.zip">Dalton Highway</a> (<?php echo getFileSize("files/datasets/DaltonHighway.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/DonnellyTrainingArea.zip">Donnelly Training Area</a> (<?php echo getFileSize("files/datasets/DonnellyTrainingArea.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/KenaiLandscapeArea.zip">Kenai Landscape Area</a> (<?php echo getFileSize("files/datasets/KenaiLandscapeArea.zip"); ?>)</div>
                    <div style="font-size: 13px; margin: 5px; margin-left: 15px;"><a href="files/datasets/YMATananaFlats.zip">YMA Tanana Flats</a> (<?php echo getFileSize("files/datasets/YMATananaFlats.zip"); ?>)</div>
                </div>
            </div>
<?php
?>
        </div>
    </div>
<?php
$page->closePage();
?>
