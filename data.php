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
<p>SNAP data includes downscaled historically observed, modeled historical, as well as modeled projected data out to 2100 across several top ranked GCM's and scenarios (SRES or RCPs). Data is produced on a project specific basis, but when time and feasibility allows, we try and extend analyses to the greatest spatial and temporal extent possible to allow the greatest applicability to other projects as well. In the broadest sense, our data extends from the mid&ndash;1800s to 2100, across multiple spatial extents including: Alaska, Alaska-Western Canada, Polar, and worldwide.
</p>
<p>The list of variables is always expanding, so please explore below to see what we currently have available.</p>

<p>All of our downloadable data is provided in GeoTIFF format. We've standardized on geotiff thus far because it is a stable and compressed format that can be easily read by many open source and commercial GIS and data manipulation programs including ArcGIS, QGIS, R (raster package recommended), GDAL, GRASS, and many others.</p>

<p>While it&rsquo;s hard to have a completely static file naming scheme, we make every attempt to keep some consistency across our various datasets. This naming scheme outlined below is our general guide, although it does vary depending upon each dataset. Please refer to the full metadata for details on specific datasets.</p>

<p><pre>[variable][metric][units][format][assessmentReport][group][model][scenario][timeFrame].[fileFormat]</pre></p>

<?php echo Config::$termsOfUse; ?>

<h3 id="Projected">Projected Data</h3>
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
Projected (2010&ndash;2100: B1, A1B, and A2 scenarios) derived temperature products from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 2km via the delta method.  A 5-Model Average is also included.
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
Projected (2010-2100: B1, A1B, and A2 scenarios) derived precipitation products from 5 AR4 GCMs that perform best across Alaska and the Arctic, downscaled to 2km via the delta method.  A 5-Model Average is also included.
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
  <p>Detailed information on the construction of this data and its implications is available in <a href="/attachments/McAfee2013_snowDay.pdf">this paper.</a> (PDF, 3.27MB)</p>

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

<div class="methods text" id="Historical">
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
<p>Detailed information on the construction of this data and its implications is available in <a href="/attachments/McAfee2013_snowDay.pdf">this paper.</a> (PDF, 3.27MB)</p>  
  
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


            </div>

<!-- start IEM -->



<div class="methods text" id="Research">
<h3>Research Data</h3>
</div>

<p>Data listed in this section are being developed specifically for several broad scale modeling projects. Overviews can be found on their respective project pages including all collaborators and funding sources.</p>

<p>These broad&ndash;scale modeling projects have very specific input data requirements. These include a 1&times;1km pixel resolution, spatial coverage across data poor regions of Alaska, the Yukon Territories, and parts of northern British Columbia, and temporal coverage of monthly data from the early 1900&rsquo;s to 2100. In addition, because these datasets are being developed as input to specific models, they also require adherence to model specific requirements in order to produce plausible outputs. Because existing input data did not already exist at this level of detail, our approach has been to downscale the variables of interest to an intermediate resolution when available and then to apply common raster resampling methods down to 1&times;1km pixel sizes. Care has also been taken to keep the range of the data within accepted bounds and consistent across related variables.</p>

<p>This data is preliminary and is constantly being vetted and updated by our research group. Use of these datasets should be limited to these modeling projects only, but are shared here for stakeholder review and general communication of our data efforts.</p>

<div><img src="images/IEM_web_thumbnail.png" style="width: 300px;"/></div>




<div class="dataAccordionWrapper">
<div class="dataAccordion">

<h3><a href="#dataset=IEM_ancillary">Ancillary Data: Elevation, Slope, Slope Complexity, Aspect, Land Cover, Fire History (Burned Area)</a></h3>
<div>

<table class="overview iem" style="display: static;">
<thead>
  <tr><th scope="col">Data Set</th><th scope="col">Original Spatial Resolution</th><th scope="col">Final Spatial Resolution</th><th scope="col">Temporal Resolution</th></tr>
</thead>
<tbody>
  <tr><td>Elevation, Slope, Slope Complexity, Aspect</td><td>2km</td><td>1km</td><td>&nbsp;</td></tr>
  <tr><td>Land Cover</td><td>500m</td><td>1km</td><td>2005, but highly modified classes</td></tr>
  <tr><td>Fire History (Burned Area)</td><td>vector format</td><td>1km</td><td>1917&mdash;2011</td></tr>
</tbody>
</table>

<div style="clear: both"></div>
<h3 style="margin-top: 1em">Metadata</h3>
<ul>
  <li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="86">Elevation</a></li>
  <li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="88">Slope</a></li>
  <li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="98">Slope Complexity</a></li>
  <li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="87">Aspect</a></li>
  <li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="91">Land Cover</a></li>
  <li><a href="#" class="metadataLink"  data-geonetwork-metadata-id="90">Fire History (Burned Area)</a></li>
</ul>
<h3 style="margin-top: 1em">Downloads</h3>
<p><a href="/files/data/iem/ancillary/iem_ancillary_data.zip">Ancillary IEM Data</a>, 35MB</p>

    </div>
  </div>


<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=IEM_historical_temperature">Historical Temperature</a></h3>
    <div>
      <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>0.5&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>1901 - 2009</td></tr>
        </tbody>
      </table>
      <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="93">Historical Temperature</a></p>
      <h3 style="margin-top: 1em">Downloads</h3>
      <p><a href="/files/data/iem/cru_ts31/tas_mean_C_iem_cru_TS31_1901_2009.zip">Historical Temperature</a>, 6.6 GB</p>
    </div>
  </div>
</div>


<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=IEM_historical_precipitation">Historical Precipitation</a></h3>
    <div>
            <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>0.5&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>1901 - 2009</td></tr>
        </tbody>
      </table>
            <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="94">Historical Precipitation</a></p>
      <h3 style="margin-top: 1em">Downloads</h3>
      <p><a href="/files/data/iem/cru_ts31/pr_total_mm_iem_cru_TS31_1901_2009.zip">Historical Precipitation</a>, 3.0 GB</p>
    </div>
  </div>
</div>

<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=IEM_historical_radiation">Historical Surface Downwelling Shortwave Radiation</a></h3>
    <div>
            <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>0.5&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>1901 - 2009</td></tr>
        </tbody>
      </table>
            <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="85">Historical Surface Downwelling Shortwave Radiation</a></p>
      <h3 style="margin-top: 1em">Downloads</h3>
      <p><a href="/files/data/iem/cru_ts31/rsds_mean_MJ-m2-d1_iem_cru_TS31_1901_2009.zip">Historical Surface Downwelling Shortwave Radiation</a>, 6.3 GB</p>
    </div>
  </div>
</div>

<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=IEM_historical_vapor">Historical Vapor Pressure</a></h3>
    <div>      <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>0.5&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>1901 - 2009</td></tr>
        </tbody>
      </table>
      <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="80">Historical Vapor Pressure</a></p>      
      <h3 style="margin-top: 1em">Downloads</h3>
      <p><a href="/files/data/iem/cru_ts31/vap_mean_hPa_iem_cru_TS31_1901_2009.zip">Historical Vapor Pressure</a>, 2.4 GB</p>
    </div>
  </div>
</div>

<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=IEM_projected_temperature">Projected Temperature</a></h3>
    <div>
      <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>1.875&ndash;3.75&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>2001&ndash;2100</td></tr>
        </tbody>
      </table>
            <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="89">Projected Temperature</a></p>
      <h3 style="margin-top: 1em">Downloads</h3><ul>
      <li><a href="/files/data/iem/a1b/tas_mean_C_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip">tas_mean_C_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip</a>,  6.2 GB</li>
      <li><a href="/files/data/iem/a1b/tas_mean_C_iem_mpi_echam5_sresa1b_2001_2100.zip">tas_mean_C_iem_mpi_echam5_sresa1b_2001_2100.zip</a>, 6.2 GB</li>
      <li><a href="/files/data/iem/a2/tas_mean_C_iem_cccma_cgcm3_1_sresa2_2001_2100.zip">tas_mean_C_iem_cccma_cgcm3_1_sresa2_2001_2100.zip</a>, 7.0 GB</li>
      <li><a href="/files/data/iem/a2/tas_mean_C_iem_mpi_echam5_sresa2_2001_2100.zip">tas_mean_C_iem_mpi_echam5_sresa2_2001_2100.zip</a>, 6.2 GB</li>
      <li><a href="/files/data/iem/b1/tas_mean_C_iem_cccma_cgcm3_1_sresb1_2001_2100.zip">tas_mean_C_iem_cccma_cgcm3_1_sresb1_2001_2100.zip</a>, 7.0 GB</li>
      <li><a href="/files/data/iem/b1/tas_mean_C_iem_mpi_echam5_sresb1_2001_2100.zip">tas_mean_C_iem_mpi_echam5_sresb1_2001_2100.zip</a>, 7.0 GB</li></ul>
    </div>
  </div>
</div>

<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=IEM_projected_precipitation">Projected Precipitation</a></h3>
    <div>
            <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>1.875&ndash;3.75&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>2001&ndash;2100</td></tr>
        </tbody>
      </table>
            <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="92">Historical Precipitation</a></p>
      <h3 style="margin-top: 1em">Downloads</h3><ul>
      <li><a href="/files/data/iem/a1b/pr_total_mm_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip">pr_total_mm_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip</a>, 6.1 GB</li>
      <li><a href="/files/data/iem/a1b/pr_total_mm_iem_mpi_echam5_sresa1b_2001_2100.zip">pr_total_mm_iem_mpi_echam5_sresa1b_2001_2100.zip</a>, 6.0 GB</li>
      <li><a href="/files/data/iem/a2/pr_total_mm_iem_cccma_cgcm3_1_sresa2_2001_2100.zip">pr_total_mm_iem_cccma_cgcm3_1_sresa2_2001_2100.zip</a>, 6.7 GB</li>
      <li><a href="/files/data/iem/a2/pr_total_mm_iem_mpi_echam5_sresa2_2001_2100.zip">pr_total_mm_iem_mpi_echam5_sresa2_2001_2100.zip</a>, 6.0 GB</li>
      <li><a href="/files/data/iem/b1/pr_total_mm_iem_cccma_cgcm3_1_sresb1_2001_2100.zip">pr_total_mm_iem_cccma_cgcm3_1_sresb1_2001_2100.zip</a>, 6.6 GB</li>
      <li><a href="/files/data/iem/b1/pr_total_mm_iem_mpi_echam5_sresb1_2001_2100.zip">pr_total_mm_iem_mpi_echam5_sresb1_2001_2100.zip</a>, 6.0 GB</li></ul>
    </div>
  </div>
</div>

<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=IEM_projected_radiation">Projected Surface Downwelling Shortwave Radiation</a></h3>
    <div>
            <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>1.875&ndash;3.75&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>2001&ndash;2100</td></tr>
        </tbody>
      </table>
            <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="82">Historical Surface Downwelling Shortwave Radiation</a></p>
      <h3 style="margin-top: 1em">Downloads</h3><ul>
      <li><a href="/files/data/iem/a1b/rsds_mean_MJ-m2-d1_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip">rsds_mean_MJ-m2-d1_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip</a>, 5.8 GB</li>
      <li><a href="/files/data/iem/a1b/rsds_mean_MJ-m2-d1_iem_mpi_echam5_sresa1b_2001_2100.zip">rsds_mean_MJ-m2-d1_iem_mpi_echam5_sresa1b_2001_2100.zip</a>, 5.8 GB</li>
      <li><a href="/files/data/iem/a2/rsds_mean_MJ-m2-d1_iem_cccma_cgcm3_1_sresa2_2001_2100.zip">rsds_mean_MJ-m2-d1_iem_cccma_cgcm3_1_sresa2_2001_2100.zip</a>, 5.8 GB</li>
      <li><a href="/files/data/iem/a2/rsds_mean_MJ-m2-d1_iem_mpi_echam5_sresa2_2001_2100.zip">rsds_mean_MJ-m2-d1_iem_mpi_echam5_sresa2_2001_2100.zip</a>, 5.8 GB</li>
      <li><a href="/files/data/iem/b1/rsds_mean_MJ-m2-d1_iem_cccma_cgcm3_1_sresb1_2001_2100.zip">rsds_mean_MJ-m2-d1_iem_cccma_cgcm3_1_sresb1_2001_2100.zip</a>, 5.8 GB</li>
      <li><a href="/files/data/iem/b1/rsds_mean_MJ-m2-d1_iem_mpi_echam5_sresb1_2001_2100.zip">rsds_mean_MJ-m2-d1_iem_mpi_echam5_sresb1_2001_2100.zip</a>, 5.8 GB</li></ul>   
  	</div>
  </div>
</div>

<div class="dataAccordionWrapper">
  <div class="dataAccordion">
    <h3><a href="#dataset=projected_vapor">Projected Vapor Pressure</a></h3>
    <div>
            <table>
        <tbody>
          <tr><th scope="row">Baseline Reference Climate</th><td>1961&ndash;1990</td></tr>
          <tr><th scope="row">Original Spatial Resolution</th><td>1.875&ndash;3.75&deg;</td></tr>
          <tr><th scope="row">Final Spatial Resolution</th><td>1 km</td></tr>
          <tr><th scope="row">Temporal Resolution</th><td>2001&ndash;2100</td></tr>
        </tbody>
      </table>
      <h3 style="margin-top: 1em">Metadata</h3>
      <p><a href="#" class="metadataLink"  data-geonetwork-metadata-id="81">Historical Vapor Pressure</a></p>
      <h3 style="margin-top: 1em">Downloads</h3>
      <ul>
     <li><a href="/files/data/iem/a1b/vap_mean_hPa_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip">vap_mean_hPa_iem_cccma_cgcm3_1_sresa1b_2001_2100.zip</a>, 2.2 GB</li>
     <li><a href="/files/data/iem/a1b/vap_mean_hPa_iem_mpi_echam5_sresa1b_2001_2100.zip">vap_mean_hPa_iem_mpi_echam5_sresa1b_2001_2100.zip</a>, 2.2 GB</li>
     <li><a href="/files/data/iem/a2/vap_mean_hPa_iem_cccma_cgcm3_1_sresa2_2001_2100.zip">vap_mean_hPa_iem_cccma_cgcm3_1_sresa2_2001_2100.zip</a>, 2.2 GB</li>
     <li><a href="/files/data/iem/a2/vap_mean_hPa_iem_mpi_echam5_sresa2_2001_2100.zip">vap_mean_hPa_iem_mpi_echam5_sresa2_2001_2100.zip</a>, 2.2 GB</li>
     <li><a href="/files/data/iem/b1/vap_mean_hPa_iem_cccma_cgcm3_1_sresb1_2001_2100.zip">vap_mean_hPa_iem_cccma_cgcm3_1_sresb1_2001_2100.zip</a>, 2.2 GB</li>
     <li><a href="/files/data/iem/b1/vap_mean_hPa_iem_mpi_echam5_sresb1_2001_2100.zip">vap_mean_hPa_iem_mpi_echam5_sresb1_2001_2100.zip</a>, 2.2 GB</li></ul>
    </div>
  </div>
</div>








<?php
$page->closePage();
?>

<div id="metadataModal"></div>

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
      $.scrollTo($('a[href="'+window.location.hash+'"]'), 1000, { offset: -50 });
      window.location.hash = ''; // clear this to prevent user from seeing dissonance between url + opened folds
    }

});
</script>

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
