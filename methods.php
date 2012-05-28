<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods");
$page->openPage();
$page->pageHeader();
?>

    <div id="main_body">
        <div id="main_content" class="methods">
        	<h2>Methods</h2>
<p>
    SNAP employs a variety of modeling and research methods that have been approved by the scientific community through large-scale research programs and
peer-reviewed <a href="http://www.snap.uaf.edu/resources.php?type=1">publications</a>. In order to make global climate data useful for    <a href="http://www.snap.uaf.edu/planning.php">planning</a>, SNAP <a href="http://www.snap.uaf.edu/downscaling.php">downscales</a> global
    model outputs to the local level.
</p>
<p>
    <a name="_GoBack"></a>
SNAP selects the 5 <a href="#faq_2">Global Climate Models</a> (GCM) that <a href="http://www.snap.uaf.edu/resource_page.php?resourceid=2">perform best</a> in Alaska and the Arctic. Outputs from these models are then    <a href="http://www.snap.uaf.edu/downscaling.php">downscaled</a> using <a href="http://prism.oregonstate.edu/">PRISM</a> data&#8212;which
    accounts for land features such as slope, elevation, and proximity to coastlines&#8212;as baseline climate data. This same downscaling procedure is applied
    to historical <a href="http://www.cru.uea.ac.uk/">Climate Research Unit</a> (CRU) data. The final products are high resolution monthly climate data
    for ~1901-2100 for Alaska and large regions of Canada. Where PRISM data are not available, GCM and historical data are downscaled to other baseline climate
    datasets such as <a href="http://www.cru.uea.ac.uk/">CRU</a> data products. Outputs are available for individual models and for a 5 model average,
    which reduces some types of errors associated with dependence on a single model. As new data become available, we continually update the SNAP climate
    datasets, applying these same methods to other areas of the Arctic and the world.
</p>
<p>
    Our principal products are downscaled historical and projected monthly climate data, primarily temperature and precipitation. Projected data are produced
    for three <a href="#faq_4">emission scenarios</a> (B1, A1B, A2). Additionally, SNAP produces derived data from the above base datasets through
    various <a href="http://www.snap.uaf.edu/modeling.php">modeling</a> efforts. Derived data products include potential evapotranspiration, vegetation,
    fire, permafrost, day of freeze, day of thaw, the subsequent length of growing season, as well as decadal, seasonal and annual averages. For a full list of
    our available data, please visit the SNAP <a href="http://www.snap.uaf.edu/datamaps.php">Data</a> page. To explore the data with an interactive map,
    please visit the <a href="http://www.snap.uaf.edu/maps.php">map tool</a>.
</p>
<p>
    As with any data, analysis or interpretation, multiple sources of <a href="http://www.snap.uaf.edu/uncertainty.php">uncertainty</a> are always
    present. Understanding the uncertainty inherent in the input and output data can help in determining how these climate projections are best utilized and
    interpreted.
</p>
<p>
For additional details on SNAP Methods, please explore our <a href="http://www.snap.uaf.edu/downscaling.php">Downscaling</a>, <a href="http://www.snap.uaf.edu/modeling.php">Modeling</a>, <a href="http://www.snap.uaf.edu/planning.php">Planning</a>, and <a href="http://www.snap.uaf.edu/uncertainty.php">Uncertainty</a> sections.
</p>
               
               <img style="display: block; margin: 2em auto 1em;" src="images/downscaling_figure_web.png" alt="" />
         </div>
    </div>
<?php
$page->closePage();
?>
  
