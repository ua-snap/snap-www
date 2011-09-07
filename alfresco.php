<?php
include("template.php");
$page = new webPage("SNAP: ALFRESCO", "", "data");
$page->openPage();
$page->pageHeader();
?>
		<div id="main_body">

			<div id="main_content">
				<div class="subHeader">Boreal ALFRESCO</div>
				<div style="font-size: 15px; font-weight: bold; margin-bottom: 5px;">What is Boreal ALFRESCO (Alaska Frame Based Ecosystem Code)?</div>
				<div>An understanding of the processes that control wildland fuel accumulation, including the roles played by climate change and fire management activities, is crucial for designing wildland management policies. Boreal ALFRESCO simulates the responses of subarctic and boreal vegetation to transient climatic changes. The model assumptions reflect the hypothesis that fire regime and climate are the primary drivers of landscape-level changes in the distribution of vegetation in the circumpolar arctic/boreal zone. Furthermore, it assumes that vegetation composition and continuity serve as a major determinant of large, landscape-level fires. Boreal ALFRESCO operates on an annual time step, in a landscape composed of 1 x 1 km pixels, a scale appropriate for interfacing with mesoscale climate and carbon models. The model simulates five major subarctic/boreal ecosystem types: upland tundra, black spruce forest, white spruce forest, deciduous forest, and grassland-steppe. These ecosystem types represent a generalized classification of the complex vegetation mosaic characteristic of the circumpolar arctic and boreal zones of Alaska. SNAP climate data can be used as ALFRESCO inputs, thus creating projections of the impacts of changing climate on fire regime.</div>
				<div style="margin-top: 20px; font-weight: bold;">Downloads</div>
				<?php 
					function getFileSize($f){
						$sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
						$file_size = filesize($f);
						$file_size = round($file_size/pow(1024, ($i = floor(log($file_size, 1024)))), $i > 1 ? 1 : 0) . $sizes[$i];	
						return $file_size;
					}

				?>
				<div style="margin-top: 10px;"><a href="files/alfresco/FS1.0.1-package.zip">ALFRESCO Complete</a> (<?php echo getFileSize("files/alfresco/FS1.0.1-package.zip"); ?>) - This download contains Fresco Server, Fresco Client, a user guide, a tutorial dataset and the R statistical software package. You can also download each piece individually below.</div>
				<div style="margin-top: 10px;"><a href="files/alfresco/FrescoServerInstall-1.0.1-windows.msi">Fresco Server for Windows</a> (<?php echo getFileSize("files/alfresco/FrescoServerInstall-1.0.1-windows.msi"); ?>)</div>
				<div style="margin-top: 10px;"><a href="files/alfresco/FrescoClientInstall-1.0.1-windows.msi">Fresco Client for Windows</a> (<?php echo getFileSize("files/alfresco/FrescoClientInstall-1.0.1-windows.msi"); ?>)</div>
				<div style="margin-top: 10px;"><a href="files/alfresco/FrescoClientInstall-1.0.1-linux.tar.gz">Fresco Client for Linux</a> (<?php echo getFileSize("files/alfresco/FrescoClientInstall-1.0.1-linux.tar.gz"); ?>)</div>
				<div style="margin-top: 10px;"><a href="files/alfresco/UserGuide_FS1.0.1.pdf">User Guide</a> (<?php echo getFileSize("files/alfresco/UserGuide_FS1.0.1.pdf"); ?>)</div>
				<div style="margin-top: 10px;"><a href="files/datasets/Kanuti_1.0.zip">Tutorial Dataset</a> (<?php echo getFileSize("files/datasets/Kanuti_1.0.zip"); ?>)</div>
				<div style="margin-top: 20px; font-weight: bold;">External Downloads</div>
				<div style="margin-top: 10px;"><a href="http://www.r-project.org/">R statistics package</a></div>
				<div style="margin-top: 10px;"><a href="http://www.textpad.com/">TextPad</a> - For Windows users, we recommend editing ALFRESCO input files with TextPad, a text editor that saves the input files in a format that ALFRESCO expects.</div>
			</div>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
