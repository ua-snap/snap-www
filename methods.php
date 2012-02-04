<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods");
$page->openPage();
$page->pageHeader();
?>

    <div id="main_body">
        <div id="main_content" class="methods">
            <h2>Methods</h2>

<p>SNAP employs a variety of modeling and research methods that have been approved by the scientific community through large-scale research programs and peer reviewed <a href="/resources.php?type=1">publications</a>.  In order to make global climate data useful for <a href="/planning.php">planning</a>, SNAP <a href="/downscaling.php">downscales</a> global model outputs to the local level.</p>

<p>SNAP selects the 5 <a href="/faq.php#faq_2">Global Climate Models</a> (GCM) that <a href="/resource_page.php?resourceid=2">perform best</a> in Alaska and the Arctic. Outputs from these models are then <a href="/downscaling.php">downscaled</a> using <a href="http://prism.oregonstate.edu/" >PRISM</a> data&mdash;which accounts for land features such as slope, elevation, and proximity to coastlines&mdash;as baseline climate data.  This same downscaling procedure is applied to historical <a href="http://www.cru.uea.ac.uk/" >Climate Research Unit</a> (CRU) data.  The final products are high resolution monthly climate data for ~1901-2100 for Alaska and large regions of Canada.  Where PRISM data are not available, GCM and historical data are downscaled to other baseline climate datasets such as <a href="http://www.cru.uea.ac.uk/" >CRU</a> data products.  Outputs from the 5 models are averaged in order to reduce the error associated with dependence on a single model.  As new data become available, we continually update the SNAP climate datasets, applying these same methods to other areas of the Arctic and the world.</p>

<p>Our principal products are downscaled historical and projected monthly climate data, primarily temperature and precipitation.  Projected data are produced for three <a href="/faq.php#faq_4">emission scenarios</a> (B1, A1B, A2).  Additionally, SNAP produces derived data from the above base datasets through various <a href="modeling.php">modeling</a> efforts.  Derived data products include potential evapotranspiration, vegetation, fire, permafrost, day of freeze, day of thaw, the subsequent length of growing season, as well as decadal, seasonal and annual averages.  For a full list of our available data, please visit the SNAP <a href="datamaps.php">Data</a> page.  To explore the data with an interactive map, please visit the <a  href="maps.php">map tool</a>.</p>

<p>As with any data, analysis or interpretation, multiple sources of <a href="uncertainty.php">uncertainty</a> are always present.  Understanding the uncertainty inherent in the input and output data can help in determining how these climate projections are best utilized and interpreted.</p>

 <p>For additional details on SNAP Methods, please explore our <a href="/downscaling.php">Downscaling</a>, <a href="/modeling.php">Modeling</a>, <a href="/planning.php">Planning</a>, and <a href="/uncertainty.php">Uncertainty</a> sections.</p>
               
               <img style="display: block; margin: 2em 0 1em;" src="images/HOME_downscaling.png" alt="" />
         </div>
    </div>
<?php
$page->closePage();
?>
  
