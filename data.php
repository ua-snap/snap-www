<?php
include("template.php");
$page = new webPage("SNAP: Data", "", "data", 'Data');
$page->openPage();
$page->pageHeader();

function getCruts31DataAlert() {
	return <<<html

<div class="ui-widget cruts-31-data-alert" style="margin: 1em 0;">
	<div class="ui-state-highlight ui-corner-all" style="padding: 1ex;"> 
		<p style="margin: 0; padding: 1ex;"> 
		<span class="ui-icon ui-icon-info" style="float: left; margin-right: 1ex;"></span>
The Climatic Research Unit (CRU) <a href="http://badc.nerc.ac.uk/view/badc.nerc.ac.uk__ATOM__dataent_1256223773328276">discovered a systematic error</a> in their CRUTS v3.1 precipitation data, and have addressed those errors with a new update (v3.1.01).  All previous SNAP products based upon CRUTS v3.1 precipitation have been updated to reflect this update to 3.1.01.  <strong>SNAP encourages users to download this new update and discard the previous CRU TS v3.1 precipitation data</strong>.
	</div>
</div>

html;

}

?>

        <div id="main_body">
            <div id="main_content">
            <div class="methods text">

<h2>Data</h2>

<p>
Our principal products are downscaled historical and projected monthly climate data, primarily temperature and precipitation across Alaska and large regions of Western Canada.  Projected data are produced for three <a href="/faq.php#faq_4">scenarios</a> (B1, A1B, A2).  Additionally, SNAP produces derived data from the above base datasets through various modeling efforts.  Derived data products include potential evapotranspiration, vegetation, fire, permafrost, day of freeze, day of thaw, and the subsequent length of growing season, as well as decadal, seasonal, and annual averages.
</p>

<p>
Please visit our <a href="/methods.php">Methods</a> section for a description of our downscaling procedure.  
</p>

<p>
To visualize a selection of datasets, please visit the <a href="maps.php" target="_blank" >map tool</a>.
</p>

<p>
For a full list of our available data, please see below.
</p>

<hr/>

<p>
All of our downloadable data is provided in <a href="http://trac.osgeo.org/geotiff/">GeoTIFF</a> format, georeferenced to the North American Datum of 1983 and projected in Alaska Albers Equal Area Conic in units of meters (NAD83 Alaska Albers).  Geotiffs can be read by many open source and commercial GIS and data manipulation programs including ArcGIS, QGIS, R (raster package recommended), GDAL, GRASS, and many others.
</p>

<p>
Our data is currently served through zip files.  Once uncompressed, each file represents one time step (month, decade, season, etc) across the full spatial extent for that product.  Currently, spatial extents are Alaska-wide or Alaska-Western Canada (YT, BC, AB, SK, MB).
</p>
<p>
While it&rsquo;s hard to have a completely static file naming scheme, we make every attempt to keep some consistency across our various datasets.  This naming scheme outlined below is our general guide, although it does vary depending upon each dataset.  Please refer to the full metadata for details on specific datasets.
</p>
<p><code>[variable]_[metric]_[units]_[format]_[assessmentReport]_[group]_[model]_[scenario]_[timeFrame].[fileFormat]</code></p>

<table id="key">
<thead>
<tr>
<th scope="col">variable</th><th scope="col">key</th>
</tr></thead>
<tbody>
<tr><th scope="row">tas</th><td>temperature</td></tr>
<tr><th scope="row">pr</th><td>precipitation</td></tr>
<tr><th scope="row">dot</th><td>day of thaw</td></tr>
<tr><th scope="row">dof</th><td>day of freeze</td></tr>
<tr><th scope="row">logs</th><td>length of growing season</td></tr>
<tr><th scope="row">pet</th><td>potential evapotranspiration</td></tr>
<tr><th scope="row">fs</th><td>snow-day fraction</td></tr>
</tbody>
</table>

<?php echo Config::$termsOfUse; ?>

<h3>Projected Data</h3>
</div>
<div class="dataAccordionWrapper">

<div class="dataAccordion">
<h3><a href="#dataset=projected_monthly_temperature_and_precipitation_771m">Projected Monthly Temperature and Precipitation - 771m CMIP3/AR4</a></h3>
<div>
<p>Projected (2001-2100: B1, A1B, and A2 scenarios) monthly average temperature and total precipitation from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 771m via the delta method.  A 5-Model Average is also included.</p>
<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Monthly</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Temperature</h4>
<p><strong>Metadata: </strong><a href="#" class="metadataLink"  data-geonetwork-metadata-id="34">Projected Monthly Average Temperature 771m AR4</a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/monthly/tas_AK_771m_5modelAvg_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_5modelAvg_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td>
<a href="/files/data/monthly/tas_AK_771m_5modelAvg_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_5modelAvg_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_771m_5modelAvg_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_5modelAvg_sresa2_2050_2099.zip">2050&ndash;2099</a> (2.5 GB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/monthly/tas_AK_771m_cccma_cgcm3_1_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_cccma_cgcm3_1_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td>
<a href="/files/data/monthly/tas_AK_771m_cccma_cgcm3_1_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_cccma_cgcm3_1_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_771m_cccma_cgcm3_1_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_cccma_cgcm3_1_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/monthly/tas_AK_771m_gfdl_cm2_1_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_gfdl_cm2_1_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td>
<a href="/files/data/monthly/tas_AK_771m_gfdl_cm2_1_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_gfdl_cm2_1_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_771m_gfdl_cm2_1_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_gfdl_cm2_1_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
</tr>


<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/monthly/tas_AK_771m_miroc3_2_medres_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_miroc3_2_medres_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td>
<a href="/files/data/monthly/tas_AK_771m_miroc3_2_medres_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_miroc3_2_medres_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_771m_miroc3_2_medres_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_miroc3_2_medres_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
</tr>
<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/monthly/tas_AK_771m_mpi_echam5_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_mpi_echam5_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td>
<a href="/files/data/monthly/tas_AK_771m_mpi_echam5_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_mpi_echam5_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_771m_mpi_echam5_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_mpi_echam5_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/monthly/tas_AK_771m_ukmo_hadcm3_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_ukmo_hadcm3_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td>
<a href="/files/data/monthly/tas_AK_771m_ukmo_hadcm3_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_ukmo_hadcm3_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_771m_ukmo_hadcm3_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.5 GB)<br/>
<a href="/files/data/monthly/tas_AK_771m_ukmo_hadcm3_sresa2_2050_2099.zip">2050&ndash;2099</a> (2.6 GB)</td>
</tr>


</tbody>
</table>


<h4>Precipitation</h4>
<p><strong>Metadata: </strong><a href="#" class="metadataLink"  data-geonetwork-metadata-id="35">Projected Monthly Total Precipitation 771m AR4</a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/monthly/pr_AK_771m_5modelAvg_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_5modelAvg_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.2 GB)</td>
<td>
<a href="/files/data/monthly/pr_AK_771m_5modelAvg_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_5modelAvg_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_771m_5modelAvg_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_5modelAvg_sresa2_2050_2099.zip">2050&ndash;2099</a> (2.2 GB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/monthly/pr_AK_771m_cccma_cgcm3_1_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_cccma_cgcm3_1_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.2 GB)</td>
<td>
<a href="/files/data/monthly/pr_AK_771m_cccma_cgcm3_1_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_cccma_cgcm3_1_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_771m_cccma_cgcm3_1_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_cccma_cgcm3_1_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/monthly/pr_AK_771m_gfdl_cm2_1_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_gfdl_cm2_1_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td>
<a href="/files/data/monthly/pr_AK_771m_gfdl_cm2_1_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_gfdl_cm2_1_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_771m_gfdl_cm2_1_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_gfdl_cm2_1_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
</tr>


<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/monthly/pr_AK_771m_miroc3_2_medres_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_miroc3_2_medres_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td>
<a href="/files/data/monthly/pr_AK_771m_miroc3_2_medres_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_miroc3_2_medres_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_771m_miroc3_2_medres_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_miroc3_2_medres_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
</tr>
<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/monthly/pr_AK_771m_mpi_echam5_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_mpi_echam5_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.2 GB)</td>
<td>
<a href="/files/data/monthly/pr_AK_771m_mpi_echam5_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_mpi_echam5_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_771m_mpi_echam5_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_mpi_echam5_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/monthly/pr_AK_771m_ukmo_hadcm3_sresb1_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_ukmo_hadcm3_sresb1_2050_2100.zip">2050&ndash;2100</a> (2.2 GB)</td>
<td>
<a href="/files/data/monthly/pr_AK_771m_ukmo_hadcm3_sresa1b_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_ukmo_hadcm3_sresa1b_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_771m_ukmo_hadcm3_sresa2_2001_2049.zip">2001&ndash;2049</a> (2.1 GB)<br/>
<a href="/files/data/monthly/pr_AK_771m_ukmo_hadcm3_sresa2_2050_2099.zip">2050&ndash;2099</a> (2.3 GB)</td>
</tr>


</tbody>
</table>


</div>

<h3><a href="#dataset=projected_derived_temperature_771m">Projected Derived Temperature Products - 771m CMIP3/AR4</a></h3>
<div>

<p>
Projected (2010&ndash;2100: B1, A1B, and A2 scenarios) derived temperature products from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 771m via the delta method.  A 5-Model Average is also included.</p>
<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />


<h4>Decadal Summaries by Month, Year, or Season</h4>

<h5>Metadata by product</h5>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="39">Projected Decadal Averages of Monthly Mean Temperatures 771m AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="41">Projected Decadal Averages of Annual Mean Temperatures 771m AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="42">Projected Decadal Averages of Seasonal Mean Temperatures 771m AR4</a></li>
</ul>
<h5>All products by model and scenario</h5>


<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_5modelAvg_sresb1.zip">2001&ndash;2100</a> (638 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (637 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_5modelAvg_sresa2.zip">2001&ndash;2100</a> (637 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (639 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (639 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (638 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (637 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (637 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (637 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (641 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (640 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (640 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (639 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (640 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (640 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (642 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (642 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_771m_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (642 MB)</td>
</tr>

</tbody>
</table>

<h4>Day of Freeze, Thaw, Length of Growing Season</h4>
<p>
Estimated Julian days of freeze and thaw (dof, dot) are calculated by assuming a linear change in temperature between consecutive months. Mean monthly temperatures are used to represent daily temperature on the 15th day of each month. When consecutive monthly midpoints have opposite sign temperatures, the day of transition (freeze or thaw) is the day between them on which temperature crosses zero degrees C. The length of growing season (logs) refers to the number of days between the days of freeze and thaw.  More detailed explanations are discussed in the metadata.
</p>

<h5>Date of Freeze, Thaw</h5>
<p><strong>Metadata: </strong><a href="#" class="metadataLink"  data-geonetwork-metadata-id="38">Projected Day of Freeze or Thaw 771 AR4 </a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/dof_dot_AK_771m_5modelAvg_sresb1.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_5modelAvg_sresa2.zip">2001&ndash;2100</a> (52 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/dof_dot_AK_771m_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (52 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (52 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (52 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/dof_dot_AK_771m_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (52 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (52 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/dof_dot_AK_771m_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (51 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/dof_dot_AK_771m_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (52 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/dof_dot_AK_771m_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (52 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (51 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_771m_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (52 MB)</td>
</tr>

</tbody>
</table>

<h5>Length of Growing Season</h5>
<p><strong>Metadata:</strong> <a href="#" class="metadataLink"  data-geonetwork-metadata-id="37">Projected Length of Growing Season 771 AR4</a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>


<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/logs_AK_771m_5modelAvg_sresb1.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_5modelAvg_sresa2.zip">2001&ndash;2100</a> (31 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/logs_AK_771m_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (32 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/logs_AK_771m_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (31 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/logs_AK_771m_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (30 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (31 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/logs_AK_771m_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (30 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (31 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/logs_AK_771m_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (32 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (31 MB)</td>
<td><a href="/files/data/derived/logs_AK_771m_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (32 MB)</td>
</tr>

</tbody>
</table>

</div>

<h3><a href="#dataset=projected_derived_precipitation_771m">Projected Derived Precipitation Products - 771m CMIP3/AR4</a></h3>
<div>

<p>
Projected (2010-2100: B1, A1B, and A2 scenarios) derived precipitation products from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 771m via the delta method.  A 5-Model Average is also included.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Decadal Summaries by month, year, or season</h4>

<h5>Metadata by product</h5>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="62">Projected Decadal Averages of Monthly Total Precipitation 771m AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="43">Projected Decadal Averages of Annual Total Precipitation 771m AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="36">Projected Decadal Averages of Seasonal Total Precipitation 771m AR4</a></li>
</ul>

<h5>All products by model and scenario</h5>


<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_5modelAvg_sresb1.zip">2001&ndash;2100</a> (612 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (619 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_5modelAvg_sresa2.zip">2001&ndash;2100</a> (619 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (612 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (618 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (621 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (618 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (626 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (623 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (613 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (618 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (618 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (609 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (617 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (614 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (610 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (621 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_771m_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (620 MB)</td>
</tr>

</tbody>
</table>

</div>
</div>

<br/>
<div class="dataAccordion">
<h3><a href="#dataset=projected_monthly_temperature_and_precipitation_2km">Projected Monthly Temperature and Precipitation - 2 km CMIP3/AR4</a></h3>
<div>

<p>
Projected (2001&ndash;2100: B1, A1B, and A2 scenarios) monthly temperature and precipitation from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 2 km via the delta method.  A 5-Model Average is also included.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Monthly</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<h4>Temperature</h4>
<p><strong>Metadata: </strong><a href="#" class="metadataLink"  data-geonetwork-metadata-id="29">Projected Monthly Average Temperature 2 km AR4</a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>


<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_5modelAvg_sresb1.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_5modelAvg_sresa2.zip">2001&ndash;2100</a> (2.6 GB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (2.6 GB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (2.6 GB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (2.6 GB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (2.6 GB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (2.7 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (2.6 GB)</td>
<td><a href="/files/data/monthly/tas_AK_CAN_2km_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (2.7 GB)</td>
</tr>

</tbody>
</table>

<h4>Precipitation</h4>
<p><strong>Metadata: </strong> <a href="#" class="metadataLink"  data-geonetwork-metadata-id="32">Projected Monthly Total Precipitation 2 km AR4</a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>


<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_5modelAvg_sresb1.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_5modelAvg_sresa2.zip">2001&ndash;2100</a> (2.3 GB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (2.4 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (2.3 GB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (2.4 GB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (2.3 GB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (2.4 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (2.4 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (2.4 GB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (2.3 GB)</td>
<td><a href="/files/data/monthly/pr_AK_CAN_2km_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (2.3 GB)</td>
</tr>

</tbody>
</table>


</div>

<h3><a href="#dataset=projected_derived_temperature_2km">Projected Derived Temperature Products - 2 km CMIP3/AR4</a></h3>
<div>

<p>
Projected (2010&ndash;2100: B1, A1B, and A2 scenarios) derived temperature products from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 771m via the delta method.  A 5-Model Average is also included.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<h4>Decadal Summaries by month, year, or season</h4>

<h5>Metadata by product</h5>
<ul>
<li>
<a href="#" class="metadataLink"  data-geonetwork-metadata-id="22">Projected Decadal Averages of Monthly Mean Temperatures 2km AR4</a>
</li>
<li>
<a href="#" class="metadataLink"  data-geonetwork-metadata-id="20">Projected Decadal Averages of Annual Mean Temperatures 2km AR4</a>
</li>
<li>
<a href="#" class="metadataLink"  data-geonetwork-metadata-id="24">Projected Decadal Averages of Seasonal Mean Temperatures 2km AR4</a>
</li>
</ul>

<h5>All products by model and scenario</h5>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_5modelAvg_sresb1.zip">2001&ndash;2100</a> (375 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (375 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_5modelAvg_sresa2.zip">2001&ndash;2100</a> (376 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (333 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (333 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (333 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (332 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (332 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (332 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (332 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (334 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (336 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (332 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (333 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (332 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (334 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (336 MB)</td>
<td><a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (336 MB)</td>
</tr>

</tbody>
</table>

<h4>Day of Freeze, Thaw, Length of Growing Season</h4>
<p>
Estimated Julian days of freeze and thaw (dof, dot) are calculated by assuming a linear change in temperature between consecutive months. Mean monthly temperatures are used to represent daily temperature on the 15th day of each month. When consecutive monthly midpoints have opposite sign temperatures, the day of transition (freeze or thaw) is the day between them on which temperature crosses zero degrees C. The length of growing season (logs) refers to the number of days between the days of freeze and thaw.  More detailed explanations are discussed in the metadata.
</p>

<h5>Day of Freeze, Thaw</h5>

<p><strong>Metadata: </strong><a href="#" class="metadataLink"  data-geonetwork-metadata-id="19">Projected Day of Freeze or Thaw 2km AR4</a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_5modelAvg_sresb1.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_5modelAvg_sresa2.zip">2001&ndash;2100</a> (27 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (27 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (27 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (27 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (27 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (27 MB)</td>
<td><a href="/files/data/derived/dof_dot_AK_CAN_2km_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (27 MB)</td>
</tr>

</tbody>
</table>

<h5>Length of Growing Season</h5>
<p><strong>Metadata: </strong><a href="#" class="metadataLink"  data-geonetwork-metadata-id="26">Projected Length of Growing Season 2km AR4</a></p>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/logs_AK_CAN_2km_5modelAvg_sresb1.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_5modelAvg_sresa2.zip">2001&ndash;2100</a> (17 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/logs_AK_CAN_2km_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (17 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/logs_AK_CAN_2km_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (17 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/logs_AK_CAN_2km_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (17 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/logs_AK_CAN_2km_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (17 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/logs_AK_CAN_2km_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (17 MB)</td>
<td><a href="/files/data/derived/logs_AK_CAN_2km_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (17 MB)</td>
</tr>

</tbody>
</table>

</div>
<h3><a href="#dataset=projected_derived_precipitation_2km">Projected Derived Precipitation Products - 2 km CMIP3/AR4</a></h3>
<div>

<p>
Projected (2010-2100: B1, A1B, and A2 scenarios) derived precipitation products from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 771m via the delta method.  A 5-Model Average is also included.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<h4>Decadal Summaries by month, year, and season</h4>

<h5>Metadata by product</h5>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="23">Projected Decadal Averages of Monthly Total Precipitation 2km AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="21">Projected Decadal Averages of Annual Total Precipitation 2km AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="25">Projected Decadal Averages of Seasonal Total Precipitation 2km AR4</a></li>
</ul>

<h5>All products by model and scenario</h5>

<table class="downloadsTable">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">B1</th>
<th scope="col">A1B</th>
<th scope="col">A2</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">5&ndash;model Average</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_5modelAvg_sresb1.zip">2001&ndash;2100</a> (351 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_5modelAvg_sresa1b.zip">2001&ndash;2100</a> (353 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_5modelAvg_sresa2.zip">2001&ndash;2100</a> (353 MB)</td>
</tr>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_cccma_cgcm3_1_sresb1.zip">2001&ndash;2100</a> (318 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2100</a> (320 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_cccma_cgcm3_1_sresa2.zip">2001&ndash;2100</a> (321 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_gfdl_cm2_1_sresb1.zip">2001&ndash;2100</a> (319 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2100</a> (321 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_gfdl_cm2_1_sresa2.zip">2001&ndash;2100</a> (320 MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_miroc3_2_medres_sresb1.zip">2001&ndash;2100</a> (317 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2100</a> (319 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_miroc3_2_medres_sresa2.zip">2001&ndash;2100</a> (319 MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_mpi_echam5_sresb1.zip">2001&ndash;2100</a> (318 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_mpi_echam5_sresa1b.zip">2001&ndash;2100</a> (320 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_mpi_echam5_sresa2.zip">2001&ndash;2100</a> (320 MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_ukmo_hadcm3_sresb1.zip">2001&ndash;2100</a> (318 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2100</a> (320 MB)</td>
<td><a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_ukmo_hadcm3_sresa2.zip">2001&ndash;2100</a> (320 MB)</td>
</tr>

</tbody>
</table>

</div>

</div>

<br/>
<div class="dataAccordion">


<h3><a href="#dataset=projected_monthly_potential_evapostranspiration_2km">Projected Monthly Potential Evapotranspiration -  2km CMIP3/AR4</a></h3>
<div>
	<p>Projected (2001-2099: A1B scenario) monthly total potential evapotranspiration from 5 AR4 GCMs that perform best across Alaska and the Arctic, utilizing 2km downscaled temperature as model inputs.
</p>
<p>These potential evapotranspiration (PET) estimates were produced using the Hamon equation, which calculates PET as a function of temperature and day length.  Potential evapotranspiration may also be influenced by cloud cover, humidity, and wind speed.  The Hamon equation can not explicitly account for variability in these aspects of weather and climate, so it may over or underestimate changes in PET if humidity, cloud cover, or wind speeds change substantially.  In addition, the Hamon equation was developed to calculate daily potential evapotranspiration, and so these estimates, based on monthly data, may differ from those calculated from daily data. We can also provide PET estimated by the Priestley-Taylor equation and standard equations for estimating the surface radiation budget from temperature. Priestley-Taylor data come with a much longer list of assumptions, including those that apply to the Hamon equation.  Scripts used to produce both the Harmon and Priestley-Taylor versions are <a href="https://github.com/ua-snap/potential-evapotranspiration" rel="external">available online</a>.
</p>


<table class="overview">
	<tbody>
		<tr>
			<th scope="row">Baseline Reference Climate</th>
			<td>1961–1990 PRISM</td>
		</tr>
		<tr>
			<th scope="row">Spatial Resolution</th>
			<td>2km</td>
		</tr>
		<tr>
			<th scope="row">Temporal Resolution</th>
			<td>Monthly</td>
		</tr>
		<tr>
			<th scope="row">Spatial Extent</th>
			<td>Alaska</td>
		</tr>
	</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Metadata by product</h4>

<p><strong>Metadata:</strong> <a href="#" class="metadataLink"  data-geonetwork-metadata-id="69">Projected Monthly Total Potential Evapotranspiration 2km AR4</a></p>
<p><strong>Equations used to derive data:</strong> <a href="attachments/Hamon_PET_equations.pdf">Hamon PET equations</a> (PDF, 597KB)</p>

<h4>Data</h4>

<table class="downloadsTable" style="width: auto">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">A1B</th>
</tr>
</thead>
<tbody>


<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="files/data/pet/pet_AK_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2099</a> (757 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="files/data/pet/pet_AK_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2099</a> (759MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="files/data/pet/pet_AK_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2099</a> (770MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="files/data/pet/pet_AK_2km_mpi_echam5_sresa1b.zip">2001&ndash;2099</a> (769MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="files/data/pet/pet_AK_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2099</a> (762MB)</td>
</tr>

</tbody>
</table>

</div>

<h3><a href="#dataset=projected_derived_potential_evapostranspiration_2km">Projected Derived Potential Evapotranspiration -  2km CMIP3/AR4</a></h3>
<div>
	<p>Projected (2001-2099: A1B scenario) monthly total potential evapotranspiration from 5 AR4 GCMs that perform best across Alaska and the Arctic, utilizing 2km downscaled temperature as model inputs.
</p>
<p>These potential evapotranspiration (PET) estimates were produced using the Hamon equation, which calculates PET as a function of temperature and day length.  Potential evapotranspiration may also be influenced by cloud cover, humidity, and wind speed.  The Hamon equation can not explicitly account for variability in these aspects of weather and climate, so it may over or underestimate changes in PET if humidity, cloud cover, or wind speeds change substantially.  In addition, the Hamon equation was developed to calculate daily potential evapotranspiration, and so these estimates, based on monthly data, may differ from those calculated from daily data. We can also provide PET estimated by the Priestley-Taylor equation and standard equations for estimating the surface radiation budget from temperature. Priestley-Taylor data come with a much longer list of assumptions, including those that apply to the Hamon equation.  Scripts used to produce both the Harmon and Priestley-Taylor versions are <a href="https://github.com/ua-snap/potential-evapotranspiration" rel="external">available online</a>.
</p>


<table class="overview">
	<tbody>
		<tr>
			<th scope="row">Baseline Reference Climate</th>
			<td>1961–1990 PRISM</td>
		</tr>
		<tr>
			<th scope="row">Spatial Resolution</th>
			<td>2km</td>
		</tr>
		<tr>
			<th scope="row">Temporal Resolution</th>
			<td>Decadal</td>
		</tr>
		<tr>
			<th scope="row">Spatial Extent</th>
			<td>Alaska</td>
		</tr>
	</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Decadal Summaries by Month, Year, or Season</h4>
<h5>Metadata by product</h5>

<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="73">Projected Decadal Averages of Monthly Total Potential Evapotranspiration 2km AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="74">Projected Decadal Averages of Annual Total Potential Evapotranspiration 2km AR4</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="75">Projected Decadal Averages of Seasonal Total Potential Evapotranspiration 2km AR4</a></li>
</ul>

<p><strong>Equations used to derive data:</strong> <a href="attachments/Hamon_PET_equations.pdf">Hamon PET equations</a> (PDF, 597KB)</p>

<h4>Data</h4>

<table class="downloadsTable" style="width: auto">
<thead>
<tr>
<td>&nbsp;</td>
<th scope="col" colspan="3">Scenario</th>
</tr>
<tr>
<th scope="col" style="text-align: left;">Model</th>
<th scope="col">A1B</th>
</tr>
</thead>
<tbody>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="files/data/pet/pet_decadal_summaries_AK_2km_cccma_cgcm3_1_sresa1b.zip">2001&ndash;2099</a> (188MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="files/data/pet/pet_decadal_summaries_AK_2km_gfdl_cm2_1_sresa1b.zip">2001&ndash;2099</a> (187MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="files/data/pet/pet_decadal_summaries_AK_2km_miroc3_2_medres_sresa1b.zip">2001&ndash;2099</a> (188MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="files/data/pet/pet_decadal_summaries_AK_2km_mpi_echam5_sresa1b.zip">2001&ndash;2099</a> (189MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="files/data/pet/pet_decadal_summaries_AK_2km_ukmo_hadcm3_sresa1b.zip">2001&ndash;2099</a> (189MB)</td>
</tr>




</tbody>
</table>

</div>

</div>


<br/>
<div class="dataAccordion">


<h3><a href="#dataset=projected_monthly_snow_day_fraction_771m">Projected Decadal Averages Of Monthly Snow-day Fraction 771m CMIP3/AR4</a></h3>
<div>
  <p>
  These snow-day fraction estimates were produced by applying equations relating decadal average monthly temperature to snow-day fraction to downscaled decadal average monthly temperature. Separate equations were used to model the relationship between decadal monthly average temperature and the fraction of wet days with snow for seven geographic regions in the state: Arctic, western Alaska, Interior, Cook Inlet, SW Islands, SW Interior, and the Gulf of Alaska coast.
</p><p>
Although the equations developed here provide a reasonable fit to the data, model evaluation demonstrated that some stations are consistently less well described by regional models than others. It is unclear why this occurs, but it is like related to localized climate conditions. Very few weather stations with long records are located above 500m elevation in Alaska, so the equations used here were developed primarily from low-elevation weather stations. It is not clear whether the equations will be completely appropriate in the mountains. Finally, these equations summarize a long-term monthly relationship between temperature and precipitation type that is the result of short-term weather variability. In using these equations to make projections of future snow, as assume that these relationships remain stable over time, and we do not know how accurate that assumption is.
</p>
  <p>Read the <a href="/files/data/snow_day_fraction/snow_fraction_data_users_guide.pdf">user&rsquo;s guide for this data set</a> (PDF, 1.5MB) for information on methodology and validation.</p>

<table class="overview">
  <tbody>
    <tr>
      <th scope="row">Baseline Reference Climate</th>
      <td>1971&ndash;2000 PRISM</td>
    </tr>
    <tr>
      <th scope="row">Spatial Resolution</th>
      <td>771m</td>
    </tr>
    <tr>
      <th scope="row">Temporal Resolution</th>
      <td>Monthly</td>
    </tr>
    <tr>
      <th scope="row">Spatial Extent</th>
      <td>Alaska</td>
    </tr>
  </tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Metadata by product</h4>

<p><strong>Metadata:</strong> <a href="#" class="metadataLink"  data-geonetwork-metadata-id="84">Projected Decadal Averages Of Monthly Snow-day Fraction 771m AR4</a></p>


<h4>Data</h4>

<table class="downloadsTable" style="width: auto">
<thead>
<tr><th scope="col">Model</th>
<th scope="col">Data</th></tr>
</thead>
<tbody>

<tr>
<th scope="row">cccma_cgcm31</th>
<td><a href="files/data/snow_day_fraction/fs_decadal_mean_monthly_mean_pct_cccma_cgcm3_1_2010_2099.zip">2010&ndash;2099</a> (479 MB)</td>
</tr>

<tr>
<th scope="row">gfdl_cm2_1</th>
<td><a href="files/data/snow_day_fraction/fs_decadal_mean_monthly_mean_pct_gfdl_cm2_1_2010_2099.zip">2010&ndash;2099</a> (491MB)</td>
</tr>

<tr>
<th scope="row">miroc3_2_medres</th>
<td><a href="files/data/snow_day_fraction/fs_decadal_mean_monthly_mean_pct_miroc3_2_medres_2010_2099.zip">2010&ndash;2099</a> (461MB)</td>
</tr>

<tr>
<th scope="row">mpi_echam5</th>
<td><a href="files/data/snow_day_fraction/fs_decadal_mean_monthly_mean_pct_mpi_echam5_2010_2099.zip">2010&ndash;2099</a> (476MB)</td>
</tr>

<tr>
<th scope="row">ukmo_hadcm3</th>
<td><a href="files/data/snow_day_fraction/fs_decadal_mean_monthly_mean_pct_ukmo_hadcm3_2010_2099.zip">2010&ndash;2099</a> (470MB)</td>
</tr>

</tbody>
</table>

</div>
</div>

</div>

<!-- HistoricalData -->

<div class="methods text">
<h3>Historical Data</h3>
</div>

<div class="dataAccordionWrapper">
<div class="dataAccordion">

<h3><a href="#dataset=historical_monthly_temperature_and_precipitation_771m_CRUTS30">Historical Monthly Temperature and Precipitation - 771m CRU TS 3.0</a></h3>
<div>

<p>
Historical (1901&ndash;2006) monthly average temperature and total precipitation from CRU TS 3.0 climate data, downscaled to 771m via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Monthly</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Downloads</h4>

<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="45">Historical Monthly Average Temperature 771m CRUTS3.0/3.1</a></td>
<td>
<a href="/files/data/CRUTS3.0/tas_AK_771m_CRU_TS30_historical_1901_1949.zip">1901&ndash;1949</a> (2.5 GB)
<a href="/files/data/CRUTS3.0/tas_AK_771m_CRU_TS30_historical_1950_2006.zip">1950&ndash;2006</a> (2.9 GB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="44">Historical Monthly Total Precipitation 771m CRUTS3.0/3.1.01</a></td>
<td>
<a href="/files/data/CRUTS3.0/pr_AK_771m_CRU_TS30_historical_1901_1949.zip">1901&ndash;1949</a> (2.1 GB)
<a href="/files/data/CRUTS3.0/pr_AK_771m_CRU_TS30_historical_1950_2006.zip">1950&ndash;2006</a> (2.4 GB)
</td>
</tr>
</tbody>
</table>
</div>


<h3><a href="#dataset=historical_monthly_temperature_and_precipitation_771m">Historical Monthly Temperature and Precipitation - 771m CRU TS 3.1/3.1.01</a></h3>
<div>

<p>
Historical (1901&ndash;2009) monthly average temperature and total precipitation from CRU TS 3.1.01 climate data, downscaled to 771m via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Monthly</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Downloads</h4>

<?php echo getCruts31DataAlert(); ?>

<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="45">Historical Monthly Average Temperature 771m CRUTS3.1</a></td>
<td>
<a href="/files/data/monthly/tas_AK_771m_CRU_TS31_historical_1901_1949.zip">1901&ndash;1949</a> (2.5 GB)
<a href="/files/data/monthly/tas_AK_771m_CRU_TS31_historical_1950_2009.zip">1950&ndash;2009</a> (3.0 GB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="44">Historical Monthly Total Precipitation 771m CRUTS3.1.01</a></td>
<td>
<a href="/files/data/monthly/pr_AK_771m_CRU_TS31_historical_1901_1949.zip">1901&ndash;1949</a> (2.1 GB)
<a href="/files/data/monthly/pr_AK_771m_CRU_TS31_historical_1950_2009.zip">1950&ndash;2009</a> (2.5 GB)
</td>
</tr>
</tbody>
</table>
</div>

<h3><a href="#dataset=historical_derived_temperature_771m_CRUTS30">Historical Derived Temperature Products - 771m CRU TS 3.0</a></h3>
<div>

<p>
Historical (1910&ndash;1999) derived temperature products from CRU TS 3.0 climate data, downscaled to 771m via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Decadal summaries by month, year, and season</h4>

<h5>Metadata by product</h5>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="47">Historical Decadal Averages of Monthly Mean Temperatures 771m CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="49">Historical Decadal Averages of Annual Mean Temperatures 771m CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="51">Historical Decadal Averages of Seasonal Mean Temperatures 771m CRUTS3.0</a></li>
</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/CRUTS3.0/tas_decadal_summaries_AK_771m_CRU_TS30_historical.zip">tas_decadal_summaries_AK_771m_CRU_TS30_historical.zip</a> (593 MB)
</pre>

<h4>Day of freeze, thaw, length of growing season</h4>
<p>
Estimated Julian days of freeze and thaw (dof, dot) are calculated by assuming a linear change in temperature between consecutive months. Mean monthly temperatures are used to represent daily temperature on the 15th day of each month. When consecutive monthly midpoints have opposite sign temperatures, the day of transition (freeze or thaw) is the day between them on which temperature crosses zero degrees C. The length of growing season (logs) refers to the number of days between the days of freeze and thaw. More detailed explanations are discussed in the metadata.
</p>

<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="53">Historical Day of Freeze or Thaw 771m CRUTS3.0</a></td>
<td>
<a href="/files/data/CRUTS3.0/dof_dot_AK_771m_CRU_TS30_historical.zip">dof_dot_AK_771m_CRU_TS30_historical.zip</a> (52 MB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="55">Historical Length of Growing Season 771m CRUTS3.0</a></td>
<td>
<a href="/files/data/CRUTS3.0/logs_AK_771m_CRU_TS30_historical.zip">logs_AK_771m_CRU_TS30_historical.zip</a> (32 MB)
</td>
</tr>
</tbody>
</table>


</div>

<h3><a href="#dataset=historical_derived_temperature_771m">Historical Derived Temperature Products - 771m CRU TS 3.1</a></h3>
<div>


<p>
Historical (1910&ndash;2009) derived temperature products from CRU TS 3.1 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Decadal summaries by month, year, and season</h4>

<h5>Metadata by product</h5>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="47">Historical Decadal Averages of Monthly Mean Temperatures 771m CRUTS3.1</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="49">Historical Decadal Averages of Annual Mean Temperatures 771m CRUTS3.1</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="51">Historical Decadal Averages of Seasonal Mean Temperatures 771m CRUTS3.1</a></li>
</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/derived/tas_decadal_summaries_AK_771m_CRU_TS31_historical.zip">tas_decadal_summaries_AK_771m_CRU_TS31_historical.zip</a> (707 MB)
</pre>

<h4>Day of freeze, thaw, length of growing season</h4>
<p>
Estimated Julian days of freeze and thaw (dof, dot) are calculated by assuming a linear change in temperature between consecutive months. Mean monthly temperatures are used to represent daily temperature on the 15th day of each month. When consecutive monthly midpoints have opposite sign temperatures, the day of transition (freeze or thaw) is the day between them on which temperature crosses zero degrees C. The length of growing season (logs) refers to the number of days between the days of freeze and thaw.  More detailed explanations are discussed in the metadata.
</p>


<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="53">Historical Day of Freeze or Thaw 771m CRUTS3.1</a></td>
<td>
<a href="/files/data/derived/dof_dot_AK_771m_CRU_TS31_historical.zip">dof_dot_AK_771m_CRU_TS31_historical.zip</a> (58 MB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="55">Historical Length of Growing Season 771m CRUTS3.1</a></td>
<td>
<a>
<a href="/files/data/derived/logs_AK_771m_CRU_TS31_historical.zip">logs_AK_771m_CRU_TS31_historical.zip</a> (35 MB)
</a>
</td>
</tr>
</tbody>
</table>


</div>

<h3><a href="#dataset=historical_derived_precipitation_771m_CRUTS30">Historical Derived Precipitation Products - 771m CRU TS 3.0</a></h3>
<div>


<p>
Historical (1910&ndash;1999) derived precipitation products from CRUTS 3.0 climate data, downscaled to 771m via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />


<h4>Decadal summaries by month, year, and season</h4>

<h5>Metadata by product</h5>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="57">Historical Decadal Averages of Monthly Total Precipitation 771m CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="59">Historical Decadal Averages of Annual Total Precipitation 771m CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="61">Historical Decadal Averages of Seasonal Total Precipitation 771m CRUTS3.0</a></li>
</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/CRUTS3.0/pr_decadal_summaries_AK_771m_CRU_TS30_historical.zip">pr_decadal_summaries_AK_771m_CRU_TS30_historical.zip</a> (593 MB)
</pre>
</div>

<h3><a href="#dataset=historical_derived_precipitation_771m">Historical Derived Precipitation Products - 771m CRU TS 3.1.01</a></h3>
<div>

<p>
Historical (1910-2009) derived precipitation products from CRU TS 3.1.01 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1971&ndash;2000 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>771m</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska</td></tr>
</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Decadal summaries by month, year, and season</h4>

<?php echo getCruts31DataAlert(); ?>

<h5>Metadata by product</h5>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="57">Historical Decadal Averages of Monthly Total Precipitation 771m CRUTS3.1.01</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="59">Historical Decadal Averages of Annual Total Precipitation 771m CRUTS3.1.01</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="61">Historical Decadal Averages of Seasonal Total Precipitation 771m CRUTS3.1.01</a></li>
</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/derived/pr_decadal_summaries_AK_771m_CRU_TS31_historical.zip">pr_decadal_summaries_AK_771m_CRU_TS31_historical.zip</a> (655 MB)
</pre>


</div>
</div>
<br/>
<div class="dataAccordion">



<h3><a href="#dataset=historical_monthly_temperature_and_precipitation_2km_CRUTS30">Historical Monthly Temperature and Precipitation - 2 km CRU TS 3.0</a></h3>
<div>

<p>
Historical (1901-2009) monthly average temperature and total precipitation from CRU TS 3.0 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Monthly</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="28">Historical Monthly Average Temperature 2km CRUTS3.0</a></td>
<td>
<a href="/files/data/CRUTS3.0/tas_AK_CAN_2km_CRU_TS30_historical.zip">tas_AK_CAN_2km_CRU_TS30_historical.zip</a> (2.6 GB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="31">Historical Monthly Total Precipitation 2km CRUTS3.0</a></td>
<td>
<a>
<a href="/files/data/CRUTS3.0/pr_AK_CAN_2km_CRU_TS30_historical.zip">pr_AK_CAN_2km_CRU_TS30_historical.zip</a> (2.2 GB)
</a>
</td>
</tr>
</tbody>
</table>

</div>

<h3><a href="#dataset=historical_monthly_temperature_and_precipitation_2km">Historical Monthly Temperature and Precipitation - 2 km CRU TS 3.1/3.1.01</a></h3>
<div>

<p>
Historical (1901-2009) monthly average temperature and total precipitation from CRU TS 3.1/3.1.01 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Monthly</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<?php echo getCruts31DataAlert(); ?>

<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="28">Historical Monthly Average Temperature 2km CRUTS 3.1</a></td>
<td>
<a href="/files/data/monthly/tas_AK_CAN_2km_CRU_TS31_historical.zip">tas_AK_CAN_2km_CRU_TS31_historical.zip</a> (2.9 GB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="31">Historical Monthly Total Precipitation 2km CRUTS 3.1.01</a></td>
<td>
<a>
<a href="/files/data/monthly/pr_AK_CAN_2km_CRU_TS31_historical.zip">pr_AK_CAN_2km_CRU_TS31_historical.zip</a> (2.5 GB)
</a>
</td>
</tr>
</tbody>
</table>

</div>

<h3><a href="#dataset=historical_derived_temperature_2km_CRUTS30">Historical Derived Temperature Products - 2 km CRU TS 3.0</a></h3>
<div>

<p>
Historical (1910-2009) derived temperature products from CRU TS 3.0 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<h4>Decadal summaries by month, year, and season</h4>
<h5>Metadata by product</h5>

<ul>

<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="46">Historical Decadal Averages of Monthly Mean Temperatures 2km CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="48">Historical Decadal Averages of Annual Mean Temperatures 2km CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="50">Historical Decadal Averages of Seasonal Mean Temperatures 2km CRUTS3.0</a></li>

</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/CRUTS3.0/tas_decadal_summaries_AK_CAN_2km_CRU_TS30_historical.zip">tas_decadal_summaries_AK_CAN_2km_CRU_TS30_historical.zip</a> (331 MB)
</pre>

<h4>Day of freeze, thaw, length of growing season</h4>
<p>
Estimated Julian days of freeze and thaw (dof, dot) are calculated by assuming a linear change in temperature between consecutive months. Mean monthly temperatures are used to represent daily temperature on the 15th day of each month. When consecutive monthly midpoints have opposite sign temperatures, the day of transition (freeze or thaw) is the day between them on which temperature crosses zero degrees C. The length of growing season (logs) refers to the number of days between the days of freeze and thaw.  More detailed explanations are discussed in the metadata.
</p>

<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="52">Historical Day of Freeze or Thaw 2km CRUTS3.0</a></td>
<td>
<a href="/files/data/CRUTS3.0/dof_dot_AK_CAN_2km_CRU_TS30_historical.zip">dof_dot_AK_CAN_2km_CRU_TS30_historical.zip</a> (27 MB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="54">Historical Length of Growing Season 2km CRUTS3.0</a></td>
<td>
<a href="/files/data/CRUTS3.0/logs_AK_CAN_2km_CRU_TS30_historical.zip">logs_AK_CAN_2km_CRU_TS30_historical.zip</a> (17 MB)
</td>
</tr>
</tbody>
</table>

</div>


<h3><a href="#dataset=historical_derived_temperature_2km">Historical Derived Temperature Products - 2 km CRU TS 3.1</a></h3>
<div>

<p>
Historical (1910-2009) derived temperature products from CRU TS 3.1 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<h4>Decadal summaries by month, year, and season</h4>

<?php echo getCruts31DataAlert(); ?>

<h5>Metadata by product</h5>

<ul>

<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="46">Historical Decadal Averages of Monthly Mean Temperatures 2km CRUTS3.1</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="48">Historical Decadal Averages of Annual Mean Temperatures 2km CRUTS3.1</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="50">Historical Decadal Averages of Seasonal Mean Temperatures 2km CRUTS3.1</a></li>

</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/derived/tas_decadal_summaries_AK_CAN_2km_CRU_TS31_historical.zip">tas_decadal_summaries_AK_CAN_2km_CRU_TS31_historical.zip</a> (368 MB)
</pre>

<h4>Day of freeze, thaw, length of growing season</h4>
<p>
Estimated Julian days of freeze and thaw (dof, dot) are calculated by assuming a linear change in temperature between consecutive months. Mean monthly temperatures are used to represent daily temperature on the 15th day of each month. When consecutive monthly midpoints have opposite sign temperatures, the day of transition (freeze or thaw) is the day between them on which temperature crosses zero degrees C. The length of growing season (logs) refers to the number of days between the days of freeze and thaw.  More detailed explanations are discussed in the metadata.
</p>

<table class="downloadsTable">
<thead>
<tr>
<th scope="col">Metadata</th>
<th scope="col">Data</th>
</tr>
</thead>
<body>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="52">Historical Day of Freeze or Thaw 2km CRUTS3.1</a></td>
<td>
<a href="/files/data/derived/dof_dot_AK_CAN_2km_CRU_TS31_historical.zip">dof_dot_AK_CAN_2km_CRU_TS31_historical.zip</a> (30 MB)
</td>
</tr>
<tr>
<td><a href="#" class="metadataLink"  data-geonetwork-metadata-id="54">Historical Length of Growing Season 2km CRUTS3.1</a></td>
<td>
<a href="/files/data/derived/logs_AK_CAN_2km_CRU_TS31_historical.zip">logs_AK_CAN_2km_CRU_TS31_historical.zip</a> (19 MB)
</td>
</tr>
</tbody>
</table>

</div>

<h3><a href="#dataset=historical_derived_precipitation_2km_CRUTS30">Historical Derived Precipitation Products - 2 km CRU TS 3.0</a></h3>
<div>

<p>
Historical (1910&ndash;2009) derived precipitation products from CRUTS 3.0 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<h4>Decadal summaries by month, year, and season</h4>
<h5>Metadata by product</h5>

<ul>

<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="56">Historical Decadal Averages of Monthly Total Precipitation 2km CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="58">Historical Decadal Averages of Annual Total Precipitation 2km CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="60">Historical Decadal Averages of Seasonal Total Precipitation 2km CRUTS3.0</a></li>

</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/CRUTS3.0/pr_decadal_summaries_AK_CAN_2km_CRU_TS30_historical.zip">pr_decadal_summaries_AK_CAN_2km_CRU_TS30_historical.zip</a> (312 MB)
</div>

<h3><a href="#dataset=historical_derived_precipitation_2km">Historical Derived Precipitation Products - 2 km CRU TS 3.1.01</a></h3>
<div>

<p>
Historical (1910&ndash;2009) derived precipitation products from CRUTS 3.1.01 climate data, downscaled to 2 km via the delta method.
</p>

<table class="overview">
<tbody>
<tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990 PRISM</td></tr>
<tr><th scope="row">Spatial Resolution</th><td>2 km</td></tr>
<tr><th scope="row">Temporal Resolution</th><td>Decadal</td></tr>
<tr><th scope="row">Spatial Extent</th><td>Alaska and Western Canada (YT, BC, AB, SK, MB)</td></tr>
</tbody>
</table>
<img src="images/akcanada_extent.png" alt="" />

<h4>Decadal summaries by month, year, and season</h4>

<?php echo getCruts31DataAlert(); ?>

<h5>Metadata by product</h5>

<ul>

<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="56">Historical Decadal Averages of Monthly Total Precipitation 2km CRUTS3.1.01</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="58">Historical Decadal Averages of Annual Total Precipitation 2km CRUTS3.1.01</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="60">Historical Decadal Averages of Seasonal Total Precipitation 2km CRUTS3.1.01</a></li>

</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_CRU_TS31_historical.zip">pr_decadal_summaries_AK_CAN_2km_CRU_TS31_historical.zip</a> (345 MB)
</div>
</div>

<br/>
<div class="dataAccordion">


<h3><a href="#dataset=historical_monthly_potential_evapotranspiration_2km">Historical Monthly Potential Evapotranspiration -  2km CRUTS3.0</a></h3>
<div>
<p>Historical (1901-2006) monthly total potential evapotranspiration utilizing CRU TS 3.0 climate data downscaled to 2 km via the delta method.</p>

<p>These potential evapotranspiration (PET) estimates were produced using the Hamon equation, which calculates PET as a function of temperature and day length.  Potential evapotranspiration may also be influenced by cloud cover, humidity, and wind speed.  The Hamon equation can not explicitly account for variability in these aspects of weather and climate, so it may over or underestimate changes in PET if humidity, cloud cover, or wind speeds change substantially.  In addition, the Hamon equation was developed to calculate daily potential evapotranspiration, and so these estimates, based on monthly data, may differ from those calculated from daily data. We can also provide PET estimated by the Priestley-Taylor equation and standard equations for estimating the surface radiation budget from temperature. Priestley-Taylor data come with a much longer list of assumptions, including those that apply to the Hamon equation.  Scripts used to produce both the Harmon and Priestley-Taylor versions are <a href="https://github.com/ua-snap/potential-evapotranspiration" rel="external">available online</a>.</p>


<table class="overview">
	<tbody>
		<tr>
			<th scope="row">Baseline Reference Climate</th>
			<td>1961–1990 PRISM</td>
		</tr>
		<tr>
			<th scope="row">Spatial Resolution</th>
			<td>2km</td>
		</tr>
		<tr>
			<th scope="row">Temporal Resolution</th>
			<td>Monthly</td>
		</tr>
		<tr>
			<th scope="row">Spatial Extent</th>
			<td>Alaska</td>
		</tr>
	</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />


<h4>Metadata</h4>
<p><strong>Metadata:</strong> <a href="#" class="metadataLink"  data-geonetwork-metadata-id="67">Historical Monthly Total Potential Evapotranspiration 2km CRUTS3.0</a></p>
<p><strong>Equations used to derive data:</strong> <a href="attachments/Hamon_PET_equations.pdf">Hamon PET equations</a> (PDF, 597KB)</p>

<h4>Data</h4>
<ul><li><a href="files/data/pet/pet_AK_2km_CRU_TS30_historical.zip">1901&ndash;2006</a> (726MB)</li></ul>

</div>


<h3><a href="#dataset=historical_derived_potential_evapotranspiration_2km">Historical Derived Potential Evapotranspiration -  2km CRUTS3.0</a></h3>
<div>

<p>Historical (1910-1999) monthly total potential evapotranspiration utilizing CRU TS 3.0 climate data downscaled to 2 km via the delta method.</p>

<p>These potential evapotranspiration (PET) estimates were produced using the Hamon equation, which calculates PET as a function of temperature and day length.  Potential evapotranspiration may also be influenced by cloud cover, humidity, and wind speed.  The Hamon equation can not explicitly account for variability in these aspects of weather and climate, so it may over or underestimate changes in PET if humidity, cloud cover, or wind speeds change substantially.  In addition, the Hamon equation was developed to calculate daily potential evapotranspiration, and so these estimates, based on monthly data, may differ from those calculated from daily data. We can also provide PET estimated by the Priestley-Taylor equation and standard equations for estimating the surface radiation budget from temperature. Priestley-Taylor data come with a much longer list of assumptions, including those that apply to the Hamon equation.  Scripts used to produce both the Harmon and Priestley-Taylor versions are <a href="https://github.com/ua-snap/potential-evapotranspiration" rel="external">available online</a>.</p>

<table class="overview">
	<tbody>
		<tr>
			<th scope="row">Baseline Reference Climate</th>
			<td>1961–1990 PRISM</td>
		</tr>
		<tr>
			<th scope="row">Spatial Resolution</th>
			<td>2km</td>
		</tr>
		<tr>
			<th scope="row">Temporal Resolution</th>
			<td>Decadal</td>
		</tr>
		<tr>
			<th scope="row">Spatial Extent</th>
			<td>Alaska</td>
		</tr>
	</tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />


<h4>Metadata by product</h4>
<ul>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="70">Historical Decadal Averages of Monthly Total Potential Evapotranspiration 2km CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="71">Historical Decadal Averages of Annual Total Potential Evapotranspiration 2km CRUTS3.0</a></li>
<li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="72">Historical Decadal Averages of Seasonal Total Potential Evapotranspiration 2km CRUTS3.0</a></li>
</ul>
<p><strong>Equations used to derive data:</strong> <a href="attachments/Hamon_PET_equations.pdf">Hamon PET equations</a> (PDF, 597KB)</p>

<h4>All products by model and scenario</h4>
<ul><li><a href="files/data/pet/pet_decadal_summaries_AK_2km_CRU_TS30_historical.zip">1910&ndash;1999</a> (181MB)</li></ul>

</div>

</div>

<br/>
<div class="dataAccordion">


<h3><a href="#dataset=historical_monthly_snow_day_fraction_771m">Historical Decadal Averages Of Monthly Snow-day Fraction 771m CRU TS 3.1</a></h3>
<div>
  <p>
  These snow-day fraction estimates were produced by applying equations relating decadal average monthly temperature to snow-day fraction to downscaled decadal average monthly temperature. Separate equations were used to model the relationship between decadal monthly average temperature and the fraction of wet days with snow for seven geographic regions in the state: Arctic, western Alaska, Interior, Cook Inlet, SW Islands, SW Interior, and the Gulf of Alaska coast.
</p><p>
Although the equations developed here provide a reasonable fit to the data, model evaluation demonstrated that some stations are consistently less well described by regional models than others. It is unclear why this occurs, but it is like related to localized climate conditions. Very few weather stations with long records are located above 500m elevation in Alaska, so the equations used here were developed primarily from low-elevation weather stations. It is not clear whether the equations will be completely appropriate in the mountains. Finally, these equations summarize a long-term monthly relationship between temperature and precipitation type that is the result of short-term weather variability. In using these equations to make projections of future snow, as assume that these relationships remain stable over time, and we do not know how accurate that assumption is.
</p>
<p>Read the <a href="/files/data/snow_day_fraction/snow_fraction_data_users_guide.pdf">user&rsquo;s guide for this data set</a> (PDF, 1.5MB) for information on methodology and validation.</p>
  
<table class="overview">
  <tbody>
    <tr>
      <th scope="row">Baseline Reference Climate</th>
      <td>1971&ndash;2000 PRISM</td>
    </tr>
    <tr>
      <th scope="row">Spatial Resolution</th>
      <td>771m</td>
    </tr>
    <tr>
      <th scope="row">Temporal Resolution</th>
      <td>Monthly</td>
    </tr>
    <tr>
      <th scope="row">Spatial Extent</th>
      <td>Alaska</td>
    </tr>
  </tbody>
</table>
<img src="images/ak_extent.jpg" alt="" />

<h4>Metadata by product</h4>

<p><strong>Metadata:</strong> <a href="#" class="metadataLink"  data-geonetwork-metadata-id="83">Historical Decadal Averages Of Monthly Snow-day Fraction 771m CRUTS3.1</a></p>

<h4>Data</h4>
<p><a href="/files/data/snow_day_fraction/fs_decadal_mean_monthly_mean_pct_cru_TS31_historical_1910_2009.zip">1910-2009</a> (250MB)</p>


</div>

</div>

<script>

$(function() {
        
    $('.dataAccordion').each( function(index) { 
        $(this).accordion({
        	navigation: true,
        	autoHeight: false,
        	collapsible: true,
        	active: false
        	});
    });

    if( window.location.hash ) {
    	$.scrollTo($('a[href="'+window.location.hash+'"]'), 300, { offset: -50 });
    	window.location.hash = ''; // clear this to prevent user from seeing dissonance between url + opened folds
    }

});
</script>

            </div>
        </div>
<?php
$page->closePage();
?>

<div id="metadataModal"></div>

<script type="text/javascript">
$('.metadataLink')
			.click( function(e) {

				$('#metadataModal')
					.html('<iframe height="600px" width="100%" src="<?php echo Config::$geonetworkMetadataUrlBase; ?>'+$(e.target).data('geonetwork-metadata-id')+'"></iframe>')
					.dialog({
						draggable: false,
						resizable: false,
						title: 'Metadata',
						minWidth: 800,
						minHeight: 600,
						modal: true
					});
				return false; // prevent page reload
			});
</script>
