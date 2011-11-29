<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods");
$page->openPage();
$page->pageHeader();
?>

    <div id="main_body">
        <div id="main_content" class="methods">


                    <h2>Methods</h2>
                    <p>SNAP employs a range of methods that have been tested and accepted by the scientific community through large research programs and peer reviewed <a href="/resources.php?type=1">publications</a>.  In order to make global climate data useful for <a href="/planning.php">planning</a>, SNAP <a href="/downscaling.php">downscales</a> global model outputs to the local level.</p>
                    <p>SNAP selects the 5 <a href="http://en.wikipedia.org/wiki/Global_climate_model" target="_blank">General Circulation Models</a> (GCM) that ?perform best? in Alaska and the Arctic and <a href="/downscaling.php">downscales</a> outputs using <a href="http://prism.oregonstate.edu/" target="_blank">PRISM</a> data, which accounts for land features such as slope, elevation, and proximity to coastlines, as baseline climate.   We apply this same methodology to historical Climate Research Unit (CRU) data.  The final products are high resolution monthly climate data from ~1901&ndash;2100 for Alaska and large regions of Canada.  Where PRISM data are not available, we downscale GCM and historical data to other baseline climate datasets such as <a href="http://www.cru.uea.ac.uk/" target="_blank">CRU</a> data products.  Outputs from the 5 models are also averaged in order to reduce the error associated with dependence on a single model.  We continually update our datasets, applying these same methods to other areas of the Arctic and the world.</p>
                    <p>Our principal products are downscaled monthly climate data, primarily temperature and precipitation, for three <a href="http://en.wikipedia.org/wiki/Special_Report_on_Emissions_Scenarios" target="_blank">emission scenarios</a> (B1, A1B, A2). Additionally, SNAP produces <a href="/derived.php">derived data</a> from the above base datasets through various <a href="modeling.php">modeling</a> efforts.  Derived data products include potential <a href="http://en.wikipedia.org/wiki/Evapotranspiration">evapotranspiration</a>, vegetation, fire, permafrost, day of freeze, day of thaw, and the subsequent <a href="http://en.wikipedia.org/wiki/Growing_season" target="_blank">length of growing season</a>, as well as decadal, seasonal, and annual averages.  For a full list of our available data, please visit our <a href="gisdata.php">Data</a> page.  To explore or query the data, please visit the <a href="/maps.php" target="_blank">map tool</a>.</p>
                    <p>As with any data, analysis, or interpretation, multiple sources of <a href="/uncertainty.php">uncertainty</a> are always present.  Understanding the uncertainty inherent in the data can help in interpreting how these climate projections can best be used and interpreted.</p>
                    <p>For additional details on SNAP Methods, please explore our <a href="/downscaling.php">Downscaling</a>, <a href="modeling.php">Modeling</a>, <a href="/derived.php">Derived Data</a>, <a href="/planning.php">Planning</a>, and <a href="/uncertainty.php">Uncertainty</a> sections.</p>
                </div><!-- end-methods-index -->

    </div>
<?php
$page->closePage();
?>
  
