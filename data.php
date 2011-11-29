<?php
include("template.php");
$page = new webPage("SNAP: Data", "", "data");
$page->openPage();
$page->pageHeader();
?>
        <div id="main_body">
            <div id="main_content">
                <div class="subHeader">Maps &amp; Data</div>
             
                <div id="data_overview">
                    <p>All SNAP data, methods, model outputs, and project results are freely available to the public. We do our best to provide data in formats that are accessible to a wide range of users. Currently, all of our basic data are available for download as ASCII files and KML (Google Earth) files. Selected maps and data are available for online browsing and download via our web-based <a href="/maps.php" target="_blank">Map Tool</a> and our <a href="charts.php">Community Charts</a> page.</p>

<p>
Our principal products are downscaled historical and projected monthly climate data, primarily temperature and precipitation.  Projected data are produced for three <a href="http://en.wikipedia.org/wiki/Special_Report_on_Emissions_Scenarios" target="_blank">emission scenarios</a> (B1, A1B, A2).  Additionally, SNAP produces derived data from the above base datasets through various <a href="modeling.php">modeling</a> efforts.  Derived data products include potential <a target="_blank" href="http://en.wikipedia.org/wiki/Evapotranspiration">evapotranspiration</a>, vegetation, fire, permafrost, day of freeze, day of thaw, and the subsequent <a href="http://en.wikipedia.org/wiki/Growing_season" target="_blank">length of growing season</a>, as well as decadal, seasonal, and annual averages.
</p>

<p>
Please visit our <a href="methods.php">Methods</a> section for a description of our <a href="methods.php#downscaling">downscaling procedure</a>.
</p>

<p>
To visualize the data, please visit the <a target="_blank" href="maps.php">map tool</a>.
</p>

<p class="last">
For a full list of our available data, please see below.
</p>
<p>
All of our downloadable data is provided in <a target="_blank" href="http://en.wikipedia.org/wiki/GeoTIFF">GeoTIFF</a> format and georeferenced to the North American Datum of 1983 and projected in Alaska Albers Equal Area Conic in units of meters (NAD83 Alaska Albers).  Geotiffs can be read by many open source and commercial GIS and data manipulation programs including <a target="_blank" href="http://www.esri.com/">ArcGIS</a>, <a target="_blank" href="http://www.qgis.org/">QGIS</a>, <a target="_blank" href="http://www.exelisvis.com/">ENVI</a>, <a target="_blank" href="http://www.erdas.com/Homepage.aspx">ERDAS IMAGINE</a>, <a target="_blank" href="http://www.r-project.org/">R</a> (<a target="_blank" href="http://cran.r-project.org/web/packages/raster/">raster package</a> recommended), <a target="_blank" href="http://www.gdal.org/">GDAL</a>, <a target="_blank" href="http://grass.osgeo.org/">GRASS</a>, and many others.
</p>
<p>
Our data is currently served through zip files.  Once the zip file is uncompressed into a set of individual data files, each data file contains one month of one year of data across the full spatial extent of the file.  In other words, each file represents one time step across the full spatial extent.
</p>
<p>
While it’s hard to have a completely static file naming scheme, we make every attempt to keep some consistency across our various datasets.  This naming scheme outlined below is our general guide, although it does vary depending upon each dataset.  See the full metadata links for details on specific datasets.
</p>
<p><code>
[variable]_[metric]_[units]_[format]_[assessmentReport]_[group]_[model]_[scenario]_[timeFrame].[fileFormat]
</code></p>
                </div>
            </div>
        </div>
<?php
$page->closePage();
?>
