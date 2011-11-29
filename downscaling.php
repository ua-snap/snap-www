<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods");
$page->openPage();
$page->pageHeader();
?>

    <div id="main_body">
        <div id="main_content" class="methods">


                    <h2>Downscaling</h2>
<ul>
<li><a href="#data_sources">Data Sources</a></li>
<li><a href="#model_selection">Model Selection</a></li>
</ul>
<h3><a id="data_sources">Data Sources</a></h3>
<p>Downscaling is a procedure that takes known information at large scales to make predictions at local scales.  As such, the output products are essentially value added products of existing datasets.  Therefore, it is essential to give an overview of our data sources.</p>
<h4>Global Circulation Model data</h4>
<p><a href="http://en.wikipedia.org/wiki/Global_climate_model" target="_blank">General Circulation Models</a> (GCM) are developed by various research organizations around the world.  At various times, the United Nations <a href="http://www.ipcc.ch/" target="_blank">Intergovernmental Panel on Climate Change</a> (IPCC) calls upon these climate modelers to submit their latest results in order to summarize and determine the current scientific consensus on global climate change.  There have been <a href="http://www.ipcc.ch/publications_and_data/publications_and_data_reports.shtml#1" target="_blank">4 assessment reports</a> from the IPCC, ocurring in 1990, 1995, 2001, and the most recent fourth assessment report in 2007.  In support of the more recent reports, the <a href="http://www-pcmdi.llnl.gov/projects/cmip/index.php" target="_blank">Coupled Model Intercomparison Project</a> (CMIP) was initiated.  Currently we only have utilized the <a href="http://pcmdi-cmip.llnl.gov/cmip3_overview.html?submenuheader=1" target="_blank">CMIP3</a> model outputs from the <a href="http://www.ipcc.ch/publications_and_data/publications_ipcc_fourth_assessment_report_synthesis_report.htm" target="_blank">IPCC’s fourth assessment report</a> (AR4).  Future outputs will utilize the <a href="http://pcmdi-cmip.llnl.gov/cmip5/index.html?submenuheader=0" target="_blank">CMIP5</a> model outputs from the upcoming <a href="http://www.ipcc.ch/activities/activities.shtml" target="_blank">IPCC’s fifth assessment report</a> (AR5) expected in 2014.  GCM outputs are only one aspect of these reports, but they form the basis for many interpretations of future climate.</p>
<p>SNAP obtains GCM outputs from the Lawrence Livermore National Laboratory Program for <a href="http://www-pcmdi.llnl.gov/" target="_blank">Climate Model Diagnosis and Intercomparison</a> (PCMDI) data portal.  PCMDI supports CMIP and is dedicated to improving methods and tools for the diagnosis and intercomparison of General Circulation Models that simulate global climate.  There are multiple ensemble runs and scenarios available for download from the CMIP3 portal.  SNAP utilizes the first ensemble model run and the <20c3m, B1, A1B, and A2 scenario> datasets for downscaling.  GCM data are downloaded in netCDF format.</p>
<h4>Historical CRU data</h4>
<p>The <a href="http://www.cru.uea.ac.uk/" target="_blank">Climate Research Unit</a> (CRU) at the University of East Anglia in England is one of the leading research organizations for the study of natural and anthropogenic climate change.  CRU hosts a large number of global climate datasets, which are managed by a variety of people and projects. CRU global climate data are based on 3000 monthly temperature stations over land as well as additional sea surface temperature (SST) measurements over water. SNAP obtains CRU data directly from their website or from the <a target="_blank" href="http://badc.nerc.ac.uk/home/">British Atmospheric Data Centre</a>.  We utilize CRU 5&deg; &times; 5&deg; <a target="_blank" href="http://www.cru.uea.ac.uk/cru/data/temperature/">temperature</a> and <a href="http://www.cru.uea.ac.uk/cru/data/precip/" target="_blank">precipitation</a> data and <a target="_blank" href="http://www.cru.uea.ac.uk/cru/data/hrg/">TS 3.0 high resolution gridded data</a>.</p>
<h4>PRISM historical climatological data</h4>
<p><a href="http://prism.oregonstate.edu/" target="_blank">PRISM</a> (Parameter-elevation Regressions on Independent Slopes Model) data are the highest quality spatial climate data currently available.  PRISM data are developed with a model that accounts for land features such as slope, elevation and coastlines, as well as expert knowledge of local climate experts.  SNAP utilizes temperature and precipitation from the 30 year (1961-1990) monthly climatology data at 2 km spatial resolution covering Alaska and regions of Canada, and ~800 meter spatial resolution from 1971-2000 covering only Alaska.  We have also utilized other PRISM datasets such as the Pacific Islands for specific projects.</p>
<p>PRISM data can be obtained through multiple sources, although the data is produced by the same organization.  Some data are obtained via the <a href="http://prism.oregonstate.edu/" target="_blank">PRISM home page</a>, the Alaska 800 meter data is publicly available via the <a href="https://irma.nps.gov/App/Reference/Search" target="_blank">NPS Natural Resource Information Portal</a> (search for PRISM, look for the Wayne Gibson citation), and other data can be purchased through the <a href="http://www.climatesource.com/" target="_blank">Climate Source website</a>.</p>
<code>graphics: Logos of GCM candy, IPCC, PCMDI, CRU, PRISM, ERA-40</code>
<p><a href="#top">Back to top</a></p>

<h3><a id="model_selection">Model Selection</a></h3>
<p>Each General Circulation Model (GCM) has different strengths and weaknesses, and some can be expected to perform better than others for northern regions of the globe.</p>
<p>Dr. John Walsh, a SNAP collaborator, and his team evaluated the performance of a set of fifteen global climate models used in the Coupled Model Intercomparison Project (<a href="resource_page.php?resourceid=2">Walsh et al 2008</a>).  They calculated the degree to which each model’s output concurred with actual climate data for the years 1958-2000 for each of three climatic variables (surface air temperature, precipitation, and sea level  pressure) for three overlapping regions (Alaska, Greenland, 60-90°N latitude, and 20-90°N latitude.)</p>
<p>The core statistic of the validation was a root-mean-square error (RMSE) evaluation of the differences between mean model output for each grid point and calendar month, and data from the European Centre for Medium-Range Weather Forecasts (ECMWF) Re-Analysis, <a target="_blank" href="http://www.ecmwf.int/products/data/archive/descriptions/e4/index.html">ERA-40</a>. The ERA-40 directly assimilates observed air temperature and sea level pressure observations into a product spanning 1958-2000. Precipitation is computed by the model used in the data assimilation. The ERA-40 is one of the most consistent and accurate gridded representations of these variables available.</p>
<p>To facilitate GCM intercomparison and validation against the ERA-40 data, all monthly fields of GCM temperature, precipitation and sea level pressure were interpolated to the common 2.5&deg; × 2.5&deg; latitude–longitude ERA-40 grid. For each model, Walsh et al. calculated RMSEs for each month, each climatic variable, and each region, then added the 108 resulting values (12 months &times; 3 features &times; 3 regions) to create a composite score for each model. A lower score indicated better model performance.</p>
<p>The specific models that performed best over the larger domains tended to be the ones that performed best over Alaska. Although biases in the annual mean of each model typically accounted for about half of the models’ RMSEs, the systematic errors differed considerably among the models. There was a tendency for the models with the smaller errors to simulate a larger greenhouse warming over the Arctic, as well as larger increases of Arctic precipitation and decreases of Arctic sea level pressure when greenhouse gas concentrations are increased.</p>
<p>Since several models had substantially smaller systematic errors than the other models, the differences in greenhouse projections implied that the choice of a subset of models might offer a viable approach to narrowing the uncertainty and obtaining more robust estimates of future climate change in regions such as Alaska. Thus, SNAP selected the five best-performing models out of the fifteen:</p>

<table>
<thead>
<tr>
<th scope="col">Center</th><th scope="col">Model Name and Version</th><th scope="col">Acronym</th>
</tr>
</thead>
<tbody>
<tr class="first"><td>Canadian Centre for Climate Modelling and Analysis</td><td>General Circulation Model version 3.1 - t47</td><td class="last">cccma_cgcm31</td></tr>
<tr><td>Max Planck Institute for Meteorology</td><td>European Centre Hamburg Model 5</td><td class="last">mpi_echam5</td></tr>
<tr><td>Geophysical Fluid Dynamics Laboratory</td><td>Coupled Climate Model 2.1</td><td class="last">gfdl_cm21</td></tr>
<tr><td>UK Met Office - Hadley Centre</td><td>Coupled Model 3.0</td><td class="last">ukmo_hadcm3</td></tr>
<tr><td>Center for Climate System Research</td><td>Model for Interdisciplinary Research on Climate medium resolution</td><td class="last">miroc3_2_medres</td></tr>
</tbody>
</table>
<p>These five models are used to generate climate projections independently, as well as in combination, in order to further reduce the error associated with dependence on a single model.</p>
<code>graphics: images/graphs from the model selection paper, John’s headshot?, map showing all modeling centers around the world</code>
<p><a href="#top">Back to top</a></p>

        </div>
    </div>
<?php
$page->closePage();
?>
  
