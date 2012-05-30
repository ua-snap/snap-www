<?php
include("template.php");
$page = new webPage("SNAP: Data", "", "data", 'Data');
$page->openPage();
$page->pageHeader();
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
<div class="ui-widget" style="font-size: 14px">
<div class="ui-state-highlight ui-corner-all" style="margin: 20px 0; padding: 0 .7em;"> 
<p style="margin: 10px 0">
<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
<strong>Notice:</strong> We are aware that users running 32&ndash;bit Windows machines (usually running XP) are experiencing issues downloading and uncompressing files larger than 4GB.  This is a limit imposed by some file systems on those machines.  Please bear with us as we provide a solution to accessing the data.  If you experience other issues, please <a style="color: #06c" href="/people.php?topic=web#contact">contact us</a>. Thank you for your patience.
</div>
</div>
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
</tbody>
</table>

<?php echo Config::$termsOfUse; ?>

<h3>Projected Data</h3>
</div>
<div class="dataAccordionWrapper">

<div class="dataAccordion">
<h3><a href="#dataset=projected_monthly_temperature_and_precipitation_771m">Projected Monthly Temperature and Precipitation - 771m AR4</a></h3>
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
<p><strong>Metadata: </strong><a style="color: #06c" href="<?php echo Config::$geonetworkMetadataUrlBase; ?>34">Projected Monthly Average Temperature 771m AR4</a></p>

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
<a href="/files/data/monthly/tas_AK_771m_5modelAvg_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.5 GB)</td>
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
<a href="/files/data/monthly/tas_AK_771m_ukmo_hadcm3_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.6 GB)</td>
</tr>


</tbody>
</table>


<h4>Precipitation</h4>
<p><strong>Metadata: </strong><a style="color: #06c" href="<?php echo Config::$geonetworkMetadataUrlBase; ?>35">Projected Monthly Total Precipitation 771m AR4</a></p>

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
<a href="/files/data/monthly/pr_AK_771m_5modelAvg_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.2 GB)</td>
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
<a href="/files/data/monthly/pr_AK_771m_ukmo_hadcm3_sresa2_2050_2100.zip">2050&ndash;2100</a> (2.3 GB)</td>
</tr>


</tbody>
</table>


</div>

<h3><a href="#dataset=projected_derived_temperature_771m">Projected Derived Temperature Products - 771m AR4</a></h3>
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
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>39">Projected Decadal Averages of Monthly Mean Temperatures 771m AR4</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>41">Projected Decadal Averages of Annual Mean Temperatures 771m AR4</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>42">Projected Decadal Averages of Seasonal Mean Temperatures 771m AR4</a></li>
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
<p><strong>Metadata: </strong><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>38">Projected Day of Freeze or Thaw 771 AR4 </a></p>

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
<p><strong>Metadata:</strong> <a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>37">Projected Length of Growing Season 771 AR4</a></p>

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

<h3><a href="#dataset=projected_derived_precipitation_771m">Projected Derived Precipitation Products - 771m AR4</a></h3>
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
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>62">Projected Decadal Averages of Monthly Total Precipitation 771m AR4</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>43">Projected Decadal Averages of Annual Total Precipitation 771m AR4</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>36">Projected Decadal Averages of Seasonal Total Precipitation 771m AR4</a></li>
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
<h3><a href="#dataset=projected_monthly_temperature_and_precipitation_2km">Projected Monthly Temperature and Precipitation - 2 km AR4</a></h3>
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
<p><strong>Metadata: </strong><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>29">Projected Monthly Average Temperature 2 km AR4</a></p>

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
<p><strong>Metadata: </strong> <a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>32">Projected Monthly Total Precipitation 2 km AR4</a></p>

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

<h3><a href="#dataset=projected_derived_temperature_2km">Projected Derived Temperature Products - 2 km AR4</a></h3>
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
<a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>22">Projected Decadal Averages of Monthly Mean Temperatures 2km AR4</a>
</li>
<li>
<a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>20">Projected Decadal Averages of Annual Mean Temperatures 2km AR4</a>
</li>
<li>
<a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>24">Projected Decadal Averages of Seasonal Mean Temperatures 2km AR4</a>
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

<p><strong>Metadata: </strong><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>19">Projected Day of Freeze or Thaw 2km AR4</a></p>

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
<p><strong>Metadata: </strong><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>26">Projected Length of Growing Season 2km AR4</a></p>

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
<h3><a href="#dataset=projected_derived_precipitation_2km">Projected Derived Precipitation Products - 2 km AR4</a></h3>
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
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>23">Projected Decadal Averages of Monthly Total Precipitation 2km AR4</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>21">Projected Decadal Averages of Annual Total Precipitation 2km AR4</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>25">Projected Decadal Averages of Seasonal Total Precipitation 2km AR4</a></li>
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
</div>

<div class="methods text">
<h3>Historical Data</h3>
</div>

<div class="dataAccordionWrapper">
<div class="dataAccordion">


<h3><a href="#dataset=historical_monthly_temperature_and_precipitation_771m">Historical Monthly Temperature and Precipitation - 771m</a></h3>
<div>

<p>
Historical (1901&ndash;2009) monthly average temperature and total precipitation from CRU TS 3.1 climate data, downscaled to 771m via the delta method.
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
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>45">Historical Monthly Average Temperature 771m CRUTS3.1</a></td>
<td>
<a href="/files/data/monthly/tas_AK_771m_CRU_TS31_historical.zip">tas_AK_771m_CRU_TS31_historical.zip</a> (5.5 GB)
</td>
</tr>
<tr>
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>44">Historical Monthly Total Precipitation 771m CRUTS3.1</a></td>
<td>
<a href="/files/data/monthly/pr_AK_771m_CRU_TS31_historical.zip">pr_AK_771m_CRU_TS31_historical.zip</a> (4.5 GB)
</td>
</tr>
</tbody>
</table>
</div>


<h3><a href="#dataset=historical_derived_temperature_771m">Historical Derived Temperature Products - 771m</a></h3>
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
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>47">Historical Decadal Averages of Monthly Mean Temperatures 771m CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>49">Historical Decadal Averages of Annual Mean Temperatures 771m CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>51">Historical Decadal Averages of Seasonal Mean Temperatures 771m CRUTS3.1</a></li>
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
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>53">Historical Day of Freeze or Thaw 771m CRUTS3.1</a></td>
<td>
<a href="/files/data/derived/dof_dot_AK_771m_CRU_TS31_historical.zip">dof_dot_AK_771m_CRU_TS31_historical.zip</a> (58 MB)
</td>
</tr>
<tr>
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>55">Historical Length of Growing Season 771m CRUTS3.1</a></td>
<td>
<a>
<a href="/files/data/derived/logs_AK_771m_CRU_TS31_historical.zip">logs_AK_771m_CRU_TS31_historical.zip</a> (35 MB)
</a>
</td>
</tr>
</tbody>
</table>


</div>

<h3><a href="#dataset=historical_derived_precipitation_771m">Historical Derived Precipitation Products - 771m</a></h3>
<div>


<p>
Historical (1910-2009) derived precipitation products from CRU TS 3.1 climate data, downscaled to 2 km via the delta method.
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
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>57">Historical Decadal Averages of Monthly Total Precipitation 771m CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>59">Historical Decadal Averages of Annual Total Precipitation 771m CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>61">Historical Decadal Averages of Seasonal Total Precipitation 771m CRUTS3.1</a></li>
</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/derived/pr_decadal_summaries_AK_771m_CRU_TS31_historical.zip">pr_decadal_summaries_AK_771m_CRU_TS31_historical.zip</a> (655 MB)
</pre>


</div>
</div>
<br/>
<div class="dataAccordion">
<h3><a href="#dataset=historical_monthly_temperature_and_precipitation_2km">Historical Monthly Temperature and Precipitation - 2 km</a></h3>
<div>

<p>
Historical (1901-2009) monthly average temperature and total precipitation from CRU TS 3.1 climate data, downscaled to 2 km via the delta method.
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
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>28">Historical Monthly Average Temperature 2km CRUTS3.1</a></td>
<td>
<a href="/files/data/monthly/tas_AK_CAN_2km_CRU_TS31_historical.zip">tas_AK_CAN_2km_CRU_TS31_historical.zip</a> (2.9 GB)
</td>
</tr>
<tr>
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>31">Historical Monthly Total Precipitation 2km CRUTS3.1</a></td>
<td>
<a>
<a href="/files/data/monthly/pr_AK_CAN_2km_CRU_TS31_historical.zip">pr_AK_CAN_2km_CRU_TS31_historical.zip</a> (2.5 GB)
</a>
</td>
</tr>
</tbody>
</table>



</div>

<h3><a href="#dataset=historical_derived_temperature_2km">Historical Derived Temperature Products - 2 km</a></h3>
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

<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>46">Historical Decadal Averages of Monthly Mean Temperatures 2km CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>48">Historical Decadal Averages of Annual Mean Temperatures 2km CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>50">Historical Decadal Averages of Seasonal Mean Temperatures 2km CRUTS3.1</a></li>

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
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>52">Historical Day of Freeze or Thaw 2km CRUTS3.1</a></td>
<td>
<a href="/files/data/derived/dof_dot_AK_CAN_2km_CRU_TS31_historical.zip">dof_dot_AK_CAN_2km_CRU_TS31_historical.zip</a> (30 MB)
</td>
</tr>
<tr>
<td><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>54">Historical Length of Growing Season 2km CRUTS3.1</a></td>
<td>
<a href="/files/data/derived/logs_AK_CAN_2km_CRU_TS31_historical.zip">logs_AK_CAN_2km_CRU_TS31_historical.zip</a> (19 MB)
</td>
</tr>
</tbody>
</table>

</div>

<h3><a href="#dataset=historical_derived_precipitation_2km">Historical Derived Precipitation Products - 2 km</a></h3>
<div>

<p>
Historical (1910&ndash;2009) derived precipitation products from CRUTS 3.1 climate data, downscaled to 2 km via the delta method.
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

<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>56">Historical Decadal Averages of Monthly Total Precipitation 2km CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>58">Historical Decadal Averages of Annual Total Precipitation 2km CRUTS3.1</a></li>
<li><a href="<?php echo Config::$geonetworkMetadataUrlBase; ?>60">Historical Decadal Averages of Seasonal Total Precipitation 2km CRUTS3.1</a></li>

</ul>

<h5>All products</h5>
<pre class="productDownloads">
<a href="/files/data/derived/pr_decadal_summaries_AK_CAN_2km_CRU_TS31_historical.zip">pr_decadal_summaries_AK_CAN_2km_CRU_TS31_historical.zip</a> (345 MB)
</div>
</div>
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
