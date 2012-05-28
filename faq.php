<?php
include("template.php");
$page = new webPage("SNAP: F.A.Q.", "faq.css", "about", 'F.A.Q.');
$page->openPage();
$page->pageHeader();
?>
        <div id="main_body">
            <div id="main_content" class="text methods">


<h2>Frequently Asked Questions</h2>

<p>Something not clear?  <a href="/people.php#contact">Ask</a> a question and we&rsquo;ll try and clear it up.</p>
<ol>
<li><a href="#faq_1">How should I cite SNAP products?</a></li>
<li><a href="#faq_2">What is a GCM?</a></li>
<li><a href="#faq_3">What is a good non-technical description of modeling and downscaling?</a></li>
<li><a href="#faq_4">What is an emission scenario?</a></li>
</ol>
<h3><a id="faq_1">How should I cite SNAP products?</a></h3>
<p>When the publication medium allows it, please include the SNAP logo and a link back to our home page.  Various versions of our logo can be obtained from our <a href="logos.php">logo page</a>.</p>
<p>For publications, please cite SNAP this way:</p>
<blockquote>
Scenarios Network for Alaska and Arctic Planning (SNAP), University of Alaska, www.snap.uaf.edu, accessed [insert date here]
</blockquote>
<p>
The following are concise suggestions to incorporate into various scientific publications being produced at SNAP or with SNAP data. These are meant as a starting point only, and can easily be modified to suit a particular publication.</p>
<blockquote>
	<h4>Model Selection</h4>
	<p>
	SNAP downscaled data is a value added product derived from global climate model (GCM) output.  By comparing surface temperature, precipitation, and sea level pressure between observation-based ECMWF 40 Year Re-analysis data (ERA-40) and GCM output variables, the five best performing GCM&rsquo;s across Alaska and the Arctic were determined to be: cccma_cgcm31, mpi_echam5, gfdl_cm21, had_cm3, and ccsr_miroc32medres (Walsh et al 2008).  In addition to this, a five model average output was calculated in order to further reduce the error associated with dependence on a single model.
	</p>
	<table>
	<thead>
	<tr>
	<th scope="col">Center</th><th scope="col">Model Name and Version</th><th scope="col">Acronym</th>
	</tr>
	</thead>
	<tbody>
	<tr class="first"><td>Canadian Centre for Climate Modelling and Analysis</td><td>General Circulation Model version 3.1 - t47</td><td class="last"><code>cccma_cgcm31</code></td></tr>

	<tr><td>Max Planck Institute for Meteorology</td><td>European Centre Hamburg Model 5</td><td class="last"><code>mpi_echam5</code></td></tr>

	<tr><td>Geophysical Fluid Dynamics Laboratory</td><td>Coupled Climate Model 2.1</td><td class="last"><code>gfdl_cm21</code></td></tr>


	<tr><td>UK Met Office - Hadley Centre</td><td>Coupled Model 3.0</td><td class="last"><code>ukmo_hadcm3</code></td></tr>
	<tr><td>Center for Climate System Research</td><td>Model for Interdisciplinary Research on Climate (medium resolution)</td><td class="last"><code>miroc3_2_medres</code></td></tr>
	</tbody>
	</table>

	<h4>Projected GCM data downscaled to 2km or 771 meter</h4>
	<p>
	GCM output variables of surface temperature and precipitation were downscaled via the delta method (Hayhoe 2010, Hay et al 2000) utilizing Parameter-Elevation Regressions on Independent Slopes Model (PRISM) 1961&ndash;1990 2km resolution or 1971&ndash;2000 771 meters resolution climate normals as baseline climate across three future climate scenarios (B1, A1B, A2).  The delta method was implemented by calculating climate anomalies applied as differences for temperature or quotients for precipitation between monthly future GCM data and calculated GCM climate normals for 1961&ndash;1990 or 1971&ndash;2000 (i.e., the &ldquo;delta&rdquo;) at a monthly time step.  These coarse resolution anomalies were then interpolated to PRISM spatial resolution via a spline technique, and then added to (temperature) or multiplied by (precipitation) the PRISM climate normals.
	</p>

	<h4>Historical CRU data downscaled to 2km or 771 meter</h4>
	<p>
	Climatic Research Unit TS 3.1 (CRU) output variables of surface temperature and precipitation were downscaled via the delta method (Hayhoe 2010, Hay et al 2000) utilizing Parameter-Elevation Regressions on Independent Slopes Model (PRISM) 1961&ndash;1990 2km resolution or 1971&ndash;2000 771 meters resolution climate normals as baseline climate.  The delta method was implemented by calculating climate anomalies applied as differences for temperature or quotients for precipitation between monthly future GCM data and calculated CRU climate normals for 1961&ndash;1990 or 1971&ndash;2000 (i.e., the &ldquo;delta&rdquo;) at a monthly time step.  These coarse resolution anomalies were then interpolated to PRISM spatial resolution via a spline technique, and then added to (temperature) or multiplied by (precipitation) the PRISM climate normals.
	</p>

	<h4>Projected or Historical Day of Freeze, Day of Thaw, Length of Growing Season</h4>
	<p>
	Estimated Julian days of freeze and thaw were calculated by assuming a linear change in temperature between consecutive months. Mean monthly temperatures were used to represent daily temperature on the 15th day of each month. When consecutive monthly midpoints had opposite sign temperatures, the day of transition (freeze or thaw) was the day between them on which temperature crossed zero degrees C. The length of growing season refers to the number of days between the days of freeze and thaw.
	</p>

	<h5>References</h5>
	<ul class="references">
	<li>
	Walsh, John E.; Chapman, William L.; Romanovsky, Vladimi; Christensen, Jens H.; Stendel, Martin (2008). Global Climate Model Performance over Alaska and Greenland. <span class="journal">Journal of Climate</span> <span class="page">21</span> (23): 6156–74
	</li>
	<li>
	Hayhoe, K. A. (2010). A standardized framework for evaluating the skill of regional climate downscaling  techniques.  Ph.D. thesis, University of Illinois, 153 pp., available at <a href="https://www.ideals.illinois.edu/handle/2142/16044" >https://www.ideals.illinois.edu/handle/2142/16044</a>
	</li>
	<li>
	Hay, L. E. (2000). A comparison of delta change and downscaled GCM scenarios for three mountainous basins in the United States. Journal of the American Water Resources Association, 36(2) 387-397.
	</li>
	<li>
	PRISM Climate Group, Oregon State University, <a href="http://prism.oregonstate.edu" >http://prism.oregonstate.edu</a>, accessed 4 Sept 2011
	</li>
	<li>
	Climatic Research Unit (CRU), University of East Anglia, <a href="http://www.cru.uea.ac.uk/">http://www.cru.uea.ac.uk/</a>, accessed 4 Sept 2011
	</li>
</ul>
</blockquote>

<p><a href="#top">Back to top</a></p>

<h3><a id="faq_2">What is a GCM?</a></h3>
<p>
GCM stands for Global Climate Model. It is a mathematical representation of atmospheric and oceanic circulation in the world. For this reason, it can also be referred to as an Atmosphere-Ocean General Circulation Model. GCMs have the dual-purpose of simulating historical conditions based on known atmospheric values, such as greenhouse gas concentrations, and extrapolating those conditions to the future through the use of greenhouse gas emissions scenarios.
</p>
<p>
SNAP uses coupled atmosphere-ocean GCMs for climate modeling, which are the most complex type.  These models include a wide range of input variables, including surface pressure, horizontal components of velocity in layers, temperature and water vapor in layers, solar radiation, terrestrial long-wave radiation, convection, albedo, cloud cover, and hydrology. Interactions are calculated based on principles of physics, fluid motion, and chemistry.
</p>
<ul>
<li><a href="/downscaling.php#data_sources">SNAP&rsquo;s use of GCMs</a></li>
<li><a href="http://www.ipcc-data.org/ddc_gcm_guide.html" >GCMs on IPCC</a></li>
<li><a href="http://en.wikipedia.org/wiki/Global_climate_model" >GCMs on Wikipedia</a></li>
</ul>
<div style="text-align: center"><img src="images/AtmosphericModelSchematic.png" title="http://celebrating200years.noaa.gov/breakthroughs/climate_model/modeling_schematic.html
" /><p><a href="http://celebrating200years.noaa.gov/breakthroughs/climate_model/modeling_schematic.html" >NOAA 200th Celebration</a> diagram showing a climate model, accessed 30 January 2012</p>
</div>
<p><a href="#top">Back to top</a></p>


<h3><a id="faq_3">What is a good non-technical description of modeling and downscaling?</a></h3>
<p>
This white paper explains how climate models work, describes how some WUCA members have used climate models and downscaling to assess impacts on their systems and develop adaptation options, and makes seven initial recommendations for how climate modeling and downscaling techniques can be improved so that these tools and techniques can be more useful for the water sector.
</p>
<p><a href="http://www.wucaonline.org/assets/pdf/pubs_whitepaper_120909.pdf" class="pdf">Options for Improving Climate Modeling to Assist Water Utility Planning for Climate Change</a><br/>
Source: <a href="http://www.wucaonline.org/html/actions_publications.html" >Water Utility Climate Alliance</a>
</p>
<p><a href="#top">Back to top</a></p>

<h3><a id="faq_4">What is an emission scenario?</a></h3>
<p>
Climate change projections depend on the assumptions we make about the release of greenhouse gases from human activities and land uses changes.  In 2000, the Intergovernmental Panel on Climate Change (IPCC) used data from the Earth Institute at Colombia University to prepare the Special Report on Emissions Scenarios, which outlined a range of possible emission futures.  In order to represent a range of possibilities, SNAP uses model outputs based on three of these: B1, A1B, A2.  
</p>
<p>
The B1 scenario represents a more integrated and more ecologically friendly world:
</p>
<ul>
<li>
Rapid economic growth as in A1B, but with rapid changes towards a service and information economy.
</li>
<li>
Population rising to 9 billion in 2050 and then declining as in A1.
</li>
<li>
Reductions in material intensity and the introduction of clean and resource efficient technologies.
</li>
<li>
An emphasis on global solutions to economic, social and environmental stability.
</li>
</ul>
<p>
The A1B scenario represents a world characterized by: 
</p>
<ul><li>Rapid economic growth.</li>
<li>A global population that reaches 9 billion in 2050 and then gradually declines.</li>
<li>The quick spread of new and efficient technologies.</li>
<li>A convergent world - income and way of life converge between regions.</li>
<li>Extensive social and cultural interactions worldwide.</li>
<li>A balanced emphasis on all energy sources.</li>
</ul>
<p>
The A2 scenario represents a more divided world characterized by:
</p>
<ul>
<li>
A world of independently operating, self-reliant nations.
</li>
<li>Continuously increasing population.</li>
<li>Regionally oriented economic development.</li>
<li>Slower and more fragmented technological changes and improvements to per capita income.</li>
</ul>
<h5>More information</h5>
<ul class="references">
<li>
<a href="http://www.ipcc.ch/pdf/special-reports/spm/sres-en.pdf" >Scenarios on IPCC</a>
</li>
<li>
<a href="http://en.wikipedia.org/wiki/Special_Report_on_Emissions_Scenarios" >Scenarios on Wikipedia</a>
</li>
</ul>
<p><a href="#top">Back to top</a></p>


            </div>
        </div>
<?php
$page->closePage();
?>
