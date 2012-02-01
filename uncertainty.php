<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods", 'Uncertainty');
$page->openPage();
$page->pageHeader();
?>

    <div id="main_body">
        <div id="main_content" class="methods">
            <h2>Uncertainty</h2>

<p>Data&mdash;including its analysis and interpretation&mdash;can almost never be 100% certain.  Multiple sources of uncertainty are inherent to SNAP&rsquo;s work.  Understanding these sources can help in effectively and appropriately using our products
</p>
<p>

All models involve simplification of real-world interactions (e.g. ocean currents are not modeled at the level of individual H2O molecules).  Most models rely on incomplete input data (e.g. historical climate data exists only for sites with climate stations).  In addition, climate modeling deals with some inherently unpredictable variables (e.g. the exact location and timing of lightning strikes). Multiple sources of uncertainty can combine to have multiplicative effects.   In some cases, uncertainty yields a range of possible outcomes that occur on a continuum, such as a projected temperature increase of 2 to 5 degrees.  In other cases, uncertainty involves thresholds or tipping points, as can be the case with fire, insect outbreaks, or permafrost thaw.  Depending on the project and the needs of planners, land managers researchers, or local residents, it can be best to examine a range of possible yet divergent outcomes.
</p>

<p>The outline below breaks down and discusses some of the primary sources of uncertainty in SNAP&rsquo;s modeling efforts.</p>

<h3>Raw climate projections</h3>
<p>
SNAP&rsquo;s most basic climate data are our monthly mean values for temperature and precipitation, available for every month of every year from 1900&ndash;2006 (historical data) and 1980&ndash;2099 (projected data).  The projected data are available for five different models and three different emission scenarios.
</p>
<h4>Historical and projected datasets</h4>
<p>
The historical and projected datasets are both subject to uncertainty based on interpolation, gridding and downscaling, as well as uncertainty based on the inherent variability of weather from month to month and year to year.  Historical datasets are based on weather station data that has been interpolated to a relatively coarse-scale grid using algorithms from Climate Research Unit (CRU), and then further downscaled to a finer grid by SNAP using the Parameter-Regression on Independent Slopes Model (PRISM).  Projected datasets are downscaled by interpolation between large scale grid cells (splining) followed by PRISM downscaling.
</p>
<h4>Interpolation, gridding and downscaling</h4>
<ul>
<li>
Climate stations are very sparse in the far north, and precipitation in particular can vary enormously over very small areas and time frames, so interpolation is challenging and imperfect regardless of method
</li>
<li>
PRISM uses point data, a digital eleva­tion model, and other spatial data sets to generate gridded estimates
</li>
<li>
CRU data uses different algorithms from PRISM, and does not utilize data on slope and aspect and proximity to coastlines.</li>

<li>
Overall, PRISM seems to do the best job of capturing fine-scale landscape climate variability
</li>
</ul>
<h4>Natural variability</h4>
<ul>
<li>Even when trends (e.g. warming climate) are occurring, they can be obscured by normal ups and downs in weather patterns
</li>
<li>
GCM outputs simulate this normal variability, but the variations cannot be expected to match actual swings
</li>
<li>
Uncertainty is inevitably greater for precipitation than for temperature, since natural variability across both time and space is greater for precipitation
</li>
</ul>
<h3>Projected data</h3>
<p>
Projected data are also subject to uncertainty related to the accuracy of the Global Circulation Models upon which they are based; historical data are not subject to this source of uncertainty.
</p>

<h4>Inputs to GCMs</h4>
<ul>
<li>Solar radiation is essentially a known quantity</li>
<li>Future levels of greenhouse gases are uncertain, but accounted for by varying emissions scenarios (see emission scenarios in FAQs, with link)</li>
</ul>
<h4>GCM algorithms</h4>
<ul>
<li>Although SNAP uses the best Global Circulation Models, produced by international teams of scientists and relied upon by the IPCC, oceanic and atmospheric circulation are extremely hard to predict and model
</li>
<li>
Interactions modeled in GCMs  include thresholds (tipping points) such as ocean currents shifting or shutting down
</li>
<li>
GCMs don&rsquo;t fully account for short-term phenomena such as the Pacific Decadal Oscillation (PDO), which can affect Alaska&rsquo;s climate over time periods of years or even decades
</li>
</ul>

<h3>Processed data and linked models</h3>
<p>
SNAP products that link our raw data (monthly climate data) to other models must be interpreted in the context of the combined uncertainty of the raw data and the models to which these data are  linked.  The list below is not exhaustive, since new projects are continually being developed.
</p>
<h4>Fire</h4>
<p>
The ALFRESCO model uses SNAP input to project fire on the landscape.  This model is well-calibrated to match historical climate conditions to historical fire records.  However, all future projections are inherently uncertain because they depends on assumptions and estimates regarding the frequency and location of fire starts as well as the calculated relationship between climate, forest age and type, and fire spread.
</p>
<h4>Permafrost</h4>
<p>
SNAP permafrost modeling has been performed in conjunction with experts at the Geophysical Institute Permafrost Lab (GIPL).  Algorithms to determine the depth of active layer are dependent on calculations of the insulating properties of varying ground cover and soil types, as well as on climate variables.  Although GIPL researchers have used the best available data for all inputs, some datasets are incomplete.
</p>
<h4>Vegetation change</h4>
<p>
SNAP has worked with multiple partners in the US and Canada to predict potential landscape shifts driven by climate change.  These projections are dependent upon the linkages between vegetation and climate, as well as the ability of various species to shift across the landscape under either gradual or threshold-driven change. Multiple sources of uncertainty stem from incomplete data on existing species ranges, behaviors, and dispersal, and incomplete data on the relationship between climate and habitat variables.
</p>

<h3>Dealing with uncertainty</h3>
<p>
Multiple options exist for dealing with uncertainty&mdash;either by lessening it, or by describing a range of possible futures, or both.  These choices are heavily dependent on the needs of the stakeholders involved in any particular project.  
</p>
<h4>Natural variability</h4>
<ul>
<li>
Averaging across all five models (using the composite model) can reduce the ups and downs built into the models
</li>
<li>
Averaging across years (decadal averages) can reduce uncertainty due to natural variability
</li>
<li>
Both these methods reduce  the ability to examine extreme events
</li>
</ul>
<h4>GCM uncertainty</h4>
<ul>
<li>The five GCMs the SNAP used have been tested for accuracy in the north</li>
<li>GCMs have been widely used and referenced in the scientific literature</li>
<li>Variation between models can be used as a proxy for uncertainty in GCM algorithms</li>
<li>Averaging across all five models (using the composite model) can reduce any potential bias, but reduced the ability to examine extreme events</li>
<li>SNAP&rsquo;s model validation study depicts uncertainty by region, model, and data type based on comparisons between model results and actual station data</li>
</ul>

<h4>Interpolation, gridding, and downscaling</h4>
<ul>
<li>
Both CRU and PRISM have been validated in other studies, available in the literature
</li>
<li>
In some cases, differences between CRU and PRISM data can be viewed as a proxy for uncertainty  in downscaling
</li>
</ul>
<h4>Linked models</h4>
<ul>
<li>
Approaching the same question using multiple linked models can serve as a form of validation
</li>
<li>
Ground-truthing using historical data is important&mdash;as has been done in all ALFRESCO runs as a means of calibration
</li>
<li>
<a href="planning.php">Scenarios planning</a> (allowing for more than one possible future) allows for greater flexibility in the face of high uncertainty.
</li>
</ul>
        </div>
    </div>
<?php
$page->closePage();
?>
  
