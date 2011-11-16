<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods");
$page->openPage();
$page->pageHeader();
?>
    <div id="main_body">
        <div id="main_content">
            <div id="methods">
                <div id="methods-index">
                    <h2>Methods</h2>
                    <p>SNAP employs a range of methods that have been tested and accepted by the scientific community through large research programs and peer reviewed <a href="/resources.php?type=1">publications</a>.  In order to make global climate data useful for <a href="/planning.php">planning</a>, SNAP <a href="/downscaling.php">downscales</a> global model outputs to the local level.</p>
                    <p>SNAP selects the 5 <a href="http://en.wikipedia.org/wiki/Global_climate_model" target="_blank">General Circulation Models</a> (GCM) that ?perform best? in Alaska and the Arctic and <a href="/downscaling.php">downscales</a> outputs using <a href="http://prism.oregonstate.edu/" target="_blank">PRISM</a> data, which accounts for land features such as slope, elevation, and proximity to coastlines, as baseline climate.   We apply this same methodology to historical Climate Research Unit (CRU) data.  The final products are high resolution monthly climate data from ~1901&ndash;2100 for Alaska and large regions of Canada.  Where PRISM data are not available, we downscale GCM and historical data to other baseline climate datasets such as <a href="http://www.cru.uea.ac.uk/" target="_blank">CRU</a> data products.  Outputs from the 5 models are also averaged in order to reduce the error associated with dependence on a single model.  We continually update our datasets, applying these same methods to other areas of the Arctic and the world.</p>
                    <p>Our principal products are downscaled monthly climate data, primarily temperature and precipitation, for three <a href="http://en.wikipedia.org/wiki/Special_Report_on_Emissions_Scenarios" target="_blank">emission scenarios</a> (B1, A1B, A2). Additionally, SNAP produces <a href="/derived.php">derived data</a> from the above base datasets through various <a href="modeling.php">modeling</a> efforts.  Derived data products include potential <a href="http://en.wikipedia.org/wiki/Evapotranspiration">evapotranspiration</a>, vegetation, fire, permafrost, day of freeze, day of thaw, and the subsequent <a href="http://en.wikipedia.org/wiki/Growing_season" target="_blank">length of growing season</a>, as well as decadal, seasonal, and annual averages.  For a full list of our available data, please visit our <a href="gisdata.php">Data</a> page.  To explore or query the data, please visit the <a href="/maps.php" target="_blank">map tool</a>.</p>
                    <p>As with any data, analysis, or interpretation, multiple sources of <a href="/uncertainty.php">uncertainty</a> are always present.  Understanding the uncertainty inherent in the data can help in interpreting how these climate projections can best be used and interpreted.</p>
                    <p>For additional details on SNAP Methods, please explore our <a href="/downscaling.php">Downscaling</a>, <a href="modeling.php">Modeling</a>, <a href="/derived.php">Derived Data</a>, <a href="/planning.php">Planning</a>, and <a href="/uncertainty.php">Uncertainty</a> sections.</p>
                </div><!-- end-methods-index -->
                <div style="display: none;" id="methods-downscaling">
                    <h2>Downscaling</h2>
<ul>
<li><a href="#data_sources">Data Sources</a></li>
<li><a href="#model_selection">Model Selection</a></li>
</ul>
<a id="data_sources"><h3>Data Sources</h3></a>
<p>Downscaling is a procedure that takes known information at large scales to make predictions at local scales.  As such, the output products are essentially value added products of existing datasets.  Therefore, it is essential to give an overview of our data sources.</p>
<h4>Global Circulation Model data</h4>
<p><a href="http://en.wikipedia.org/wiki/Global_climate_model" target="_blank">General Circulation Models</a> (GCM) are developed by various research organizations around the world.  At various times, the United Nations <a href="http://www.ipcc.ch/" target="_blank">Intergovernmental Panel on Climate Change</a> (IPCC) calls upon these climate modelers to submit their latest results in order to summarize and determine the current scientific consensus on global climate change.  There have been <a href="http://www.ipcc.ch/publications_and_data/publications_and_data_reports.shtml#1" target="_blank">4 assessment reports</a> from the IPCC, ocurring in 1990, 1995, 2001, and the most recent fourth assessment report in 2007.  In support of the more recent reports, the <a href="http://www-pcmdi.llnl.gov/projects/cmip/index.php" target="_blank">Coupled Model Intercomparison Project</a> (CMIP) was initiated.  Currently we only have utilized the <a href="http://pcmdi-cmip.llnl.gov/cmip3_overview.html?submenuheader=1" target="_blank">CMIP3</a> model outputs from the <a href="http://www.ipcc.ch/publications_and_data/publications_ipcc_fourth_assessment_report_synthesis_report.htm" target="_blank">IPCC’s fourth assessment report</a> (AR4).  Future outputs will utilize the <a href="http://pcmdi-cmip.llnl.gov/cmip5/index.html?submenuheader=0" target="_blank">CMIP5</a> model outputs from the upcoming <a href="http://www.ipcc.ch/activities/activities.shtml" target="_blank">IPCC’s fifth assessment report</a> (AR5) expected in 2014.  GCM outputs are only one aspect of these reports, but they form the basis for many interpretations of future climate.</p>
<p>SNAP obtains GCM outputs from the Lawrence Livermore National Laboratory Program for <a href="http://www-pcmdi.llnl.gov/" target="_blank">Climate Model Diagnosis and Intercomparison</a> (PCMDI) data portal.  PCMDI supports CMIP and is dedicated to improving methods and tools for the diagnosis and intercomparison of General Circulation Models that simulate global climate.  There are multiple ensemble runs and scenarios available for download from the CMIP3 portal.  SNAP utilizes the first ensemble model run and the <20c3m, B1, A1B, and A2 scenario> datasets for downscaling.  GCM data are downloaded in netCDF format.</p>
<h4>Historical CRU data</h4>
<p>The Climate Research Unit (CRU) at the University of East Anglia in England is one of the leading research organizations for the study of natural and anthropogenic climate change.  CRU hosts a large number of global climate datasets, which are managed by a variety of people and projects. CRU global climate data are based on 3000 monthly temperature stations over land as well as additional sea surface temperature (SST) measurements over water. SNAP obtains CRU data directly from their website or from the British Atmospheric Data Centre.  We utilize CRU 5o x 5o temperature and precipitation data and TS 3.0 high resolution gridded data.</p>
<h4>PRISM historical climatological data</h4>
<p>PRISM (Parameter-elevation Regressions on Independent Slopes Model) data are the highest quality spatial climate data currently available.  PRISM data are developed with a model that accounts for land features such as slope, elevation and coastlines, as well as expert knowledge of local climate experts.  SNAP utilizes temperature and precipitation from the 30 year (1961-1990) monthly climatology data at 2 km spatial resolution covering Alaska and regions of Canada, and ~800 meter spatial resolution from 1971-2000 covering only Alaska.  We have also utilized other PRISM datasets such as the Pacific Islands for specific projects.</p>
<p>PRISM data can be obtained through multiple sources, although the data is produced by the same organization.  Some data are obtained via the PRISM home page, the Alaska 800 meter data is publicly available via the NPS Natural Resource Information Portal (search for PRISM, look for the Wayne Gibson citation), and other data can be purchased through the Climate Source website.</p>
<code>graphics: Logos of GCM candy, IPCC, PCMDI, CRU, PRISM, ERA-40</code>
<p><a href="#top">Back to top</a></p>
<a id="model_selection"><h3>Model Selection</h3></a>
<p>Each General Circulation Model (GCM) has different strengths and weaknesses, and some can be expected to perform better than others for northern regions of the globe.</p>
<p>Dr. John Walsh, a SNAP collaborator, and his team evaluated the performance of a set of fifteen global climate models used in the Coupled Model Intercomparison Project (<Walsh et al 2008>).  They calculated the degree to which each model’s output concurred with actual climate data for the years 1958-2000 for each of three climatic variables (surface air temperature, precipitation, and sea level  pressure) for three overlapping regions (Alaska, Greenland, 60-90°N latitude, and 20-90°N latitude.)</p>
<p>The core statistic of the validation was a root-mean-square error (RMSE) evaluation of the differences between mean model output for each grid point and calendar month, and data from the European Centre for Medium-Range Weather Forecasts (ECMWF) Re-Analysis, ERA-40. The ERA-40 directly assimilates observed air temperature and sea level pressure observations into a product spanning 1958-2000. Precipitation is computed by the model used in the data assimilation. The ERA-40 is one of the most consistent and accurate gridded representations of these variables available.</p>
<p>To facilitate GCM intercomparison and validation against the ERA-40 data, all monthly fields of GCM temperature, precipitation and sea level pressure were interpolated to the common 2.5° × 2.5° latitude–longitude ERA-40 grid. For each model, Walsh et al. calculated RMSEs for each month, each climatic variable, and each region, then added the 108 resulting values (12 months x 3 features x 3 regions) to create a composite score for each model. A lower score indicated better model performance.</p>
<p>The specific models that performed best over the larger domains tended to be the ones that performed best over Alaska. Although biases in the annual mean of each model typically accounted for about half of the models’ RMSEs, the systematic errors differed considerably among the models. There was a tendency for the models with the smaller errors to simulate a larger greenhouse warming over the Arctic, as well as larger increases of Arctic precipitation and decreases of Arctic sea level pressure when greenhouse gas concentrations are increased.</p>
<p>Since several models had substantially smaller systematic errors than the other models, the differences in greenhouse projections implied that the choice of a subset of models might offer a viable approach to narrowing the uncertainty and obtaining more robust estimates of future climate change in regions such as Alaska. Thus, SNAP selected the five best-performing models out of the fifteen: MPI_ECHAM5, GFDL_CM2_1, MIROC3_2_MEDRES, UKMO_HADCM3, and CCCMA_CGCM3_1 These five models are used to generate climate projections independently, as well as in combination, in order to further reduce the error associated with dependence on a single model.</p>
<code>graphics: images/graphs from the model selection paper, John’s headshot?, map showing all modeling centers around the world</code>
<p><a href="#top">Back to top</a></p>
                </div>
            </div>
            <script>
                $('.submenu span').click( function(e) {
                    target = $(e.currentTarget).attr('target');

                    $('#methods div').hide();
                    $('#'+$(e.currentTarget).attr('target')).show();
                });
            </script>
        </div>
    </div>
<?php
$page->closePage();
?>
  
