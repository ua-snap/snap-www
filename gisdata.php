<?php
include("template.php");
$page = new webPage("SNAP: Data Downloads", "", "data");
$page->openPage();
$page->pageHeader();

function getFileSize($f){
	$sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
	$file_size = filesize($f);
	$file_size = round($file_size/pow(1024, ($i = floor(log($file_size, 1024)))), $i > 1 ? 1 : 0) . $sizes[$i];	
	return $file_size;
}
?>
		<div id="main_body">
			<div id="main_content">
				<div class="subHeader">GIS Data</div>
				<div>
					<p>The following datasets are climate projections for the state of Alaska based on downscaled outputs from five IPCC Global Circulation models. They include average monthly air temperature (degrees Celsius) and total monthly precipitation (millimeters; SWE) grids for the state of Alaska, as well as additional grids derived from these data.</p>
					<p>These datasets are formatted as zipped folders, which when unzipped yield delimited text files for ASCII (GIS) use. Each file contains grids for the entire state for the years 1980-2099. The three emission scenarios (A2, A1B and B2) refer to the IPCC emission scenarios used in our modeling, where A1B is the midrange scenario, A2 is more pessimistic (higher emissions) and B1 is more optimistic (lower emissions).</p>
					<p>Due to the fine resolution of the maps, these zipped files are very large. Please allow adequate download time. We are working to make smaller subsets of these datasets and more user-friendly file types available. If you would like to browse these maps, we suggest viewing them in our GoogleEarth format. If you need a small subset of the data or are having trouble downloading, please contact us at nlfresco@alaska.edu.</p>
					<p>Historical datasets are derived from Climate Research Unit (CRU) data and include years 1901-2009 for temperature and 1901-2006 for precipitation. They are downscaled to 2km grid cells.</p>
					<p>Future projections are derived from General Circulation Models (GCMs) used by the Intergovernmental Panel on Climate Change (IPCC). These datasets include years 1980-2099 and are downscaled to 2km grid cells.</p>
					<p>The 5 models available have been ranked as the best (out of 15 used by the IPCC) models for Alaska. Of these five, the rank of the models for overall accuracy in Alaska and the far north was as follows:</p>
					<ol>
<li>ECHAM5</li>
<li>GFDL21</li>
<li>MIROC</li>
<li>HAD</li>
<li>CCCMA</li>
					</ol>
					<p>The five-model composite uses mean values from the outputs of all five models.</p>
					<p>As listed below, there is one set of temperature data and one set of precipitation data available for each model plus the 5-model composite under each of the three climate scenarios. For example, had.prec.a1b.zip refers to the down-scaled precipitation data generated by the Hadley model.</p>
					<p>Derived layers are defined as follows:
Date of thaw and date of freeze were derived by creating a running average of mean monthly values and interpolating on what ordinal day these values crossed the freezing point. Length of growing season is the number of days between these two derived dates. Air temperature and precipitation refer to decadal mean monthly values, e.g. the mean value of May temperatures for 2030-2039. All derived values are based on the five-model composite. Standard deviations reflect the variability between the five model outputs.</p>
					<p>All data should be projected as Alaska Albers Equal Area Conic with the North American Datum 1983.  Please contact us at nlfresco@alaska.edu if you have questions or encounter any problems.</p>
				</div>
				<div style="font-size: 24px; margin-bottom: 10px;">Downloads</div>
				<div style="font-size: 18px; margin-bottom: 10px;">Historical Datasets</div>
				<div style="margin-left: 20px;">
					<div><a href="files/datasets/CRU_2km_1901-2008/akcrutemp_1901-2009.zip">AK CRU Temperature 1901-2009</a> (<?php echo getFileSize(""); ?>)</div>
					<div><a href="files/datasets/CRU_2km_1901-2008/akcruprec_1901-2006.zip">AK CRU Precipitation 1901-2006</a> (<?php echo getFileSize(""); ?>)</div>
				</div>
				<div style="font-size: 18px; margin-top: 20px; margin-bottom: 10px;">Emissions Scenario Datasets</div>
				<div style="margin-left: 20px; margin-bottom: 20px; overflow: hidden;">
					<div style="float: left; margin: 5px; width: 300px;">
						<div style="font-size: 16px; text-align:;">A1B</div>
						<div style="text-align: ;">
							<div style="margin-top: 10px;">Air Temperature</div>
							<div>
								<div><a href="files/datasets/AK_GCM_Data/comp.tave.a1b.zip">5 Model Composite</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/echam5.tave.a1b.zip">ECHAM5</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/gfdl21.tave.a1b.zip">GFDL21</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/miroc.tave.a1b.zip">MIROC</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/had.tave.a1b.zip">HAD</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/cccma.tave.a1b.zip">CCCMA</a> (<?php echo getFileSize(""); ?>)</div>
							</div>
							<div style="margin-top: 10px;">Precipitation</div>
							<div>
								<div><a href="files/datasets/AK_GCM_Data/comp.prc.a1b.zip">5 Model Composite</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/echam5.prc.a1b.zip">ECHAM5</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/gfdl21.prc.a1b.zip">GFDL21</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/miroc.prc.a1b.zip">MIROC</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/had.prc.a1b.zip">HAD</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/cccma.prc.a1b.zip">CCCMA</a> (<?php echo getFileSize(""); ?>)</div>
							</div>
						</div>
					</div>
					<div style="float: left; margin: 5px; width: 300px;">
						<div style="font-size: 16px; text-align: ;">A2</div>
						<div style="text-align: ;">
							<div style="margin-top: 10px;">Air Temperature</div>
							<div>
								<div><a href="files/datasets/AK_GCM_Data/comp.tave.a2.zip">5 Model Composite</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/echam5.tave.a2.zip">ECHAM5</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/gfdl21.tave.a2.zip">GFDL21</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/miroc.tave.a2.zip">MIROC</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/had.tave.a2.zip">HAD</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/cccma.tave.a2.zip">CCCMA</a> (<?php echo getFileSize(""); ?>)</div>
							</div>
							<div style="margin-top: 10px;">Precipitation</div>
							<div>
								<div><a href="files/datasets/AK_GCM_Data/comp.prc.a2.zip">5 Model Composite</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/echam5.prc.a2.zip">ECHAM5</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/gfdl21.prc.a2.zip">GFDL21</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/miroc.prc.a2.zip">MIROC</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/had.prc.a2.zip">HAD</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/cccma.prc.a2.zip">CCCMA</a> (<?php echo getFileSize(""); ?>)</div>
							</div>
						</div>
					</div>
					<div style="float: left; margin: 5px; width: 300px;">
						<div style="font-size: 16px; text-align: ;">B1</div>
						<div style="text-align:;">
							<div style="margin-top: 10px;">Air Temperature</div>
							<div>
								<div><a href="files/datasets/AK_GCM_Data/comp.tave.b1.zip">5 Model Composite</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/echam5.tave.b1.zip">ECHAM5</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/gfdl21.tave.b1.zip">GFDL21</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/miroc.tave.b1.zip">MIROC</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/had.tave.b1.zip">HAD</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/cccma.tave.b1.zip">CCCMA</a> (<?php echo getFileSize(""); ?>)</div>
							</div>
							<div style="margin-top: 10px;">Precipitation</div>
							<div>
								<div><a href="files/datasets/AK_GCM_Data/comp.prc.b1.zip">5 Model Composite</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/echam5.prc.b1.zip">ECHAM5</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/gfdl21.prc.b1.zip">GFDL21</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/miroc.prc.b1.zip">MIROC</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/had.prc.b1.zip">HAD</a> (<?php echo getFileSize(""); ?>)</div>
								<div><a href="files/datasets/AK_GCM_Data/cccma.prc.b1.zip">CCCMA</a> (<?php echo getFileSize(""); ?>)</div>
							</div>
						</div>
					</div>
				</div>
				<div style="font-size: 18px; margin-top: 20px; margin-bottom: 10px; clear: both">Summarized and Derived Datasets</div>
				<div style="margin-left: 20px;">
					<div><a href="files/datasets/AK_GCM_Decadal/grow.decadal.mean.zip">Length of Growing Season - Mean</a> (<?php echo getFileSize(""); ?>)</div>
					<div><a href="files/datasets/AK_GCM_Decadal/grow.decadal.stdv.zip">Length of Growing Season - Standard Deviation</a> (<?php echo getFileSize(""); ?>)</div>
					<div style="margin-top: 10px;"><a href="files/datasets/AK_GCM_Decadal/freeze.decadal.mean.zip">Day of Freeze - Mean</a> (<?php echo getFileSize(""); ?>)</div>
					<div><a href="files/datasets/AK_GCM_Decadal/freeze.decadal.stdv.zip">Day of Freeze - Standard Deviation</a> (<?php echo getFileSize(""); ?>)</div>
					<div style="margin-top: 10px;"><a href="files/datasets/AK_GCM_Decadal/thaw.decadal.mean.zip">Day of Thaw - Mean</a> (<?php echo getFileSize(""); ?>)</div>
					<div><a href="files/datasets/AK_GCM_Decadal/thaw.decadal.stdv.zip">Day of Thaw - Standard Deviation</a> (<?php echo getFileSize(""); ?>)</div>
					<div style="margin-top: 10px;">Air Temperature</div>
					<div style="margin-left: 20px; margin-top: 10px;">
						<div><a href="files/datasets/AK_GCM_Decadal/AirTemperature.5ModelComposite.A1B.Annual.DecadalMean.zip">A1B - Decadal Mean By Year</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="files/datasets/AK_GCM_Decadal/AirTemperature.5ModelComposite.A1B.Monthly.Decadal.zip">A1B - Decadal Mean By Month</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">A2 - Decadal Mean By Year</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">A2 - Decadal Mean By Month</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">B1 - Decadal Mean By Year</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">B1 - Decadal Mean By Month</a> (<?php echo getFileSize(""); ?>)</div>
					</div>
					<div style="margin-top: 10px;">Precipitation</div>
					<div style="margin-left: 20px; margin-top: 10px;">
						<div><a href="files/datasets/AK_GCM_Decadal/Precipitation.5ModelComposite.A1B.Annual.DecadalMean.zip">A1B - Decadal Mean By Year</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="files/datasets/AK_GCM_Decadal/Precipitation.5ModelComposite.A1B.Monthly.Decadal.zip">A1B - Decadal Mean By Month</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">A2 - Decadal Mean By Year</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">A2 - Decadal Mean By Month</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">B1 - Decadal Mean By Year</a> (<?php echo getFileSize(""); ?>)</div>
						<div><a href="http://www.snap.uaf.edu/temporarily-unavailable">B1 - Decadal Mean By Month</a> (<?php echo getFileSize(""); ?>)</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
$page->closePage();
?>