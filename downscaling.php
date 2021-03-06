<?php
require_once 'template.php';
$page = new webPage("SNAP: Methods", "", "methods", 'Downscaling');
$page->openPage();
$page->pageHeader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<html>
<head>
  <meta name="generator" content=
  "HTML Tidy for Linux (vers 14 June 2007), see www.w3.org">

  <title></title>
</head>

<body>
  <div id="main_body">
    <div id="main_content" class="methods downscaling">
      <h2>Downscaling</h2>

      <ul class="index">
        <li><a href="#data_sources">Data Sources</a></li>

        <li><a href="#model_selection">Model Selection</a></li>

        <li><a href="#delta_method">Delta Method Downscaling Procedure</a></li>
      </ul>

      <h3><a id="data_sources" name="data_sources">Data Sources</a></h3>

      <p>Downscaling takes known information at large scales to make
      projections at local scales. As such, the output products are essentially
      value-added products of existing datasets. It is therefore essential to
      give an overview of our data sources.</p>

      <h4>Projected Global Climate Model data</h4><img src="images/ipcc2.jpg"
      alt="" style="width: 150px" class="right">

      <p><a href="#faq_2">Global Climate Models</a> (GCM) are developed by
      various research organizations around the world. At various times, the
      United Nations <a href="http://www.ipcc.ch/">Intergovernmental Panel on
      Climate Change</a> (IPCC) calls upon these organizations to submit their
      latest modeling results in order to summarize and determine the current
      scientific consensus on global climate change. There have been <a href=
      "#1">4 assessment reports</a> from the IPCC: in 1990, 1995, 2001 and
      2007. In support of the more recent reports, the <a href=
      "http://www-pcmdi.llnl.gov/projects/cmip/index.php">Coupled Model
      Intercomparison Project</a> (CMIP) was initiated. Currently we only have
      utilized the <a href=
      "http://pcmdi-cmip.llnl.gov/cmip3_overview.html?submenuheader=1">CMIP3</a>
      model outputs from the <a href=
      "http://www.ipcc.ch/publications_and_data/publications_ipcc_fourth_assessment_report_synthesis_report.htm">
      IPCC&rsquo;s Fourth Assessment Report</a> (AR4). Future outputs will
      utilize the <a href=
      "http://pcmdi-cmip.llnl.gov/cmip5/index.html?submenuheader=0">CMIP5</a>
      model outputs from the upcoming <a href=
      "http://www.ipcc.ch/activities/activities.shtml">IPCC Fifth Assessment
      Report</a> (AR5) expected in 2014. GCM outputs are only one aspect of
      these reports, but they form the basis for many interpretations of future
      climate.</p>

      <p>SNAP obtains GCM outputs from the Lawrence Livermore National
      Laboratory <a href="http://www-pcmdi.llnl.gov/">Program for Climate Model
      Diagnosis and Intercomparison</a> (PCMDI) data portal. PCMDI supports
      CMIP and is dedicated to improving methods and tools for the diagnosis
      and intercomparison of Global Climate Models that simulate global
      climate. There are multiple ensemble runs and scenarios available for
      download from the CMIP3 portal. SNAP utilizes the first ensemble model
      run and the historical 20c3m scenario as well as the projected B1, A1B,
      and A2 datasets for downscaling. GCM data are downloaded in netCDF
      format.</p>

      <h4>Historical CRU data</h4><img src="/images/crulogo_110x90.gif" alt=""
      class="right">

      <p>The <a href="http://www.cru.uea.ac.uk/">Climate Research Unit</a>
      (CRU) at the University of East Anglia in England is one of the leading
      research organizations for the study of natural and anthropogenic climate
      change. CRU hosts a large number of global climate datasets, which are
      managed by a variety of people and projects. CRU global climate data are
      based on 3000 monthly temperature stations over land as well as
      additional sea surface temperature (SST) measurements over water. SNAP
      obtains CRU data directly from their website or from the <a href=
      "http://badc.nerc.ac.uk/home/">British Atmospheric Data Centre</a>. We
      utilize CRU <a href="http://www.cru.uea.ac.uk/cru/data/hrg/">TS 3.0/3.1
      high resolution (0.5&deg; x 0.5&deg;) gridded data</a>.</p>

      <h4>Historical PRISM climatological data</h4><img src=
      "images/prism_group.jpg" alt="" style="width: 150px" class="right">

      <p><a href="http://prism.oregonstate.edu/">PRISM</a> (Parameter-elevation
      Regressions on Independent Slopes Model) data are some of the the highest
      resolution spatial climate data currently available across large extents.
      PRISM data are developed with a statistical model that accounts for land
      features such as slope, elevation and coastlines, as well as knowledge of
      local climate experts. SNAP utilizes temperature and precipitation from
      the 30- year (1961&ndash;1990) monthly climatology at 2 km spatial
      resolution covering Alaska and regions of Canada, and 771 meter spatial
      resolution from 1971&ndash;2000 covering only Alaska. We have also
      utilized other PRISM datasets such as the Pacific Islands for specific
      projects.</p>

      <p>PRISM data can be obtained through multiple sources, although the data
      is produced by the same organization. Some data are obtained via
      the<a href="http://prism.oregonstate.edu/">PRISM home page</a>, the
      Alaska 771 meter data is publicly available via the <a href=
      "https://irma.nps.gov/App/Reference/Welcome">NPS Natural Resource
      Information Portal</a> (search for PRISM, look for the Wayne Gibson
      citation), and other data can be purchased through the <a href=
      "http://www.climatesource.com/">Climate Source website</a>.</p>

      <p><a href="#top">Back to top</a></p>

      <h3><a name="model_selection">Model Selection</a></h3>

      <p>Each GCM has different strengths and weaknesses, and some can be
      expected to perform better than others for northern regions of the globe.
      While it is possible to downscale the full suite of available GCM
      datasets, SNAP has chosen to focus on a subset of models that perform
      best in Alaska and the Arctic.</p>

      <p>Dr. John Walsh, a SNAP collaborator, and his team evaluated the
      performance of a set of fifteen global climate models used in the Coupled
      Model Intercomparison Project (<a href=
      "http://www.snap.uaf.edu/resource_page.php?resourceid=2">Walsh et al.
      2008</a>). They calculated the degree to which each model&rsquo;s output
      concurred with actual climate data for the years 1958&ndash;2000 for each
      of three climate variables (surface air temperature, precipitation, and
      sea level pressure) for three overlapping regions (Alaska, Greenland,
      60&ndash;90&deg;N latitude, and 20&ndash;90&deg;N latitude.)</p><img src=
      "/images/ecmwf_logo_web.gif" alt="" class="right">

      <p>The core statistic of the validation was a root-mean-square error
      (RMSE) evaluation of the differences between mean model output for each
      grid point and calendar month, and data from the European Centre for
      Medium-Range Weather Forecasts (ECMWF) Reanalysis, <a href=
      "http://www.ecmwf.int/products/data/archive/descriptions/e4/index.html">ERA-40</a>.
      ERA-40 is one of the most consistent and accurate gridded representations
      of these variables available. ERA-40 directly assimilates observed air
      temperature and sea level pressure observations into a product spanning
      September 1957 through August 2002. Precipitation is computed by the
      model used in the data assimilation. Data from 1958-2000 were used in
      this selection procedure.</p>

      <p>To facilitate GCM intercomparison and validation against the ERA-40
      data, all monthly fields of GCM temperature, precipitation and sea level
      pressure were interpolated to the common 2.5&deg; &times; 2.5&deg;
      latitude&ndash;longitude ERA-40 grid. For each model, Walsh et al.
      calculated RMSEs for each month, each climatic variable, and each region,
      then added the 108 resulting values (12 months &times; 3 features &times;
      4 regions) to create a composite score for each model. A lower score
      indicated better model performance.</p>

      <p>The specific models that performed best over the larger domains tended
      to be the ones that performed best over Alaska. Although biases in the
      annual mean of each model typically accounted for about half of the
      models&rsquo; RMSEs, the systematic errors differed considerably among
      the models. There was a tendency for the models with the smaller errors
      to simulate a larger greenhouse warming over the Arctic, as well as
      larger increases of Arctic precipitation and decreases of Arctic sea
      level pressure when greenhouse gas concentrations are increased.</p>

      <p>Since several models had substantially smaller systematic errors than
      the other models, the differences in greenhouse projections implied that
      the choice of a subset of models might offer a viable approach to
      narrowing the uncertainty and obtaining more robust estimates of future
      climate change in regions such as Alaska. Thus, SNAP selected the five
      best-performing models out of the fifteen, which are listed in the table
      below.</p>

      <p>We provide downscaled projections for each of the five individual
      models, as well as for the average of all five models. In general, the
      average of a set of GCMs reproduces observed average monthly climate
      better than any individual model. It&rsquo;s possible that averaging
      model projections together might produce a better estimate of average
      future climate. That said, whether it&rsquo;s better to use the
      five-model average or individual model projections will depend on how the
      data are being used.</p>

      <table>
        <thead>
          <tr>
            <th scope="col">Center</th>

            <th scope="col">Model Name and Version</th>

            <th scope="col">Acronym</th>
          </tr>
        </thead>

        <tbody>
          <tr class="first">
            <td>Canadian Centre for Climate Modelling and Analysis</td>

            <td>General Circulation Model version 3.1 - t47</td>

            <td class="last"><code>cccma_cgcm31</code></td>
          </tr>

          <tr>
            <td>Max Planck Institute for Meteorology</td>

            <td>European Centre Hamburg Model 5</td>

            <td class="last"><code>mpi_echam5</code></td>
          </tr>

          <tr>
            <td>Geophysical Fluid Dynamics Laboratory</td>

            <td>Coupled Climate Model 2.1</td>

            <td class="last"><code>gfdl_cm21</code></td>
          </tr>

          <tr>
            <td>UK Met Office - Hadley Centre</td>

            <td>Coupled Model 3.0</td>

            <td class="last"><code>ukmo_hadcm3</code></td>
          </tr>

          <tr>
            <td>Center for Climate System Research</td>

            <td>Model for Interdisciplinary Research on Climate (medium
            resolution)</td>

            <td class="last"><code>miroc3_2_medres</code></td>
          </tr>
        </tbody>
      </table>

      <p style=
      "font-size: 10px; color: #888; text-align: center; margin: 1ex 2em 2em; padding: 0;">
      We acknowledge the World Climate Research Programme&rsquo;s Working Group
      on Coupled Modeling, which is responsible for CMIP, and we thank all the
      climate modeling groups for producing and making available their model
      output. For CMIP the U.S. Department of Energy's Program for Climate
      Model Diagnosis and Intercomparison provides coordinating support and
      leads development of software infrastructure in partnership with the
      Global Organization for Earth System Science Portals.</p>

      <p><a href="#top">Back to top</a></p>

      <h3><a name="delta_method">Delta Method Downscaling Procedure</a></h3><img src=
      "images/SNAP_delta_method_graphic.png" alt="" style="width: 250px;">

      <p>SNAP currently employs a statistical downscaling approach often
      referred to as the &ldquo;delta method&rdquo; or the &ldquo;change factor
      method&rdquo;. This method has proven robust and popular, most likely
      because it is straightforward and relatively easy to understand. At its
      root, the delta method involves nothing more complex than subtraction and
      division, which helps in interpreting and explaining downscaling results.
      Due to its low computational demand, the delta method allows for rapid
      and efficient downscaling of multiple GCMs and emission scenarios over
      hundreds of years. For a thorough review of other downscaling methods,
      please see <a href=
      "http://www.snap.uaf.edu/resource_page.php?resourceid=15">Katherine
      Hayhoe&rsquo;s dissertation</a>. Additional references to the delta
      method can be found <a href=
      "http://www.snap.uaf.edu/resource_page.php?resourceid=16">here</a> and
      <a href=
      "http://www.snap.uaf.edu/resource_page.php?resourceid=17">here</a>.</p>

      <p>The delta method involves calculating changes in monthly temperature
      or precipitation projected by the model in relation to the model&rsquo;s
      average climate during the time period for which PRISM data are
      available. Then those changes are interpolated so that they match PRISM
      resolution and adding them to (for temperature) or multiplying them by
      (for precipitation) the PRISM averages.</p>

      <p>While we currently employ the delta method for our base datasets, we
      are exploring other techniques for downscaling a wider variety of
      climatic variables of interest to stakeholders.</p>

      <p>Note that the following description refers to downscaling GCM data
      with PRISM data as the baseline climate, though SNAP applies the same
      methodology to other datasets. Where PRISM data are not available, we
      downscale GCM and historical data to other baseline climate datasets such
      as <a href="http://www.cru.uea.ac.uk/">CRU</a> data products.</p>

      <h4>Data Standardization</h4>

      <p>Once all GCM and PRISM data are successfully downloaded from the data
      sources listed above, the data must be converted to a standard format.
      Some of this preparation is specific to our processing environment within
      the <a href="http://www.r-project.org/">R statistical software
      package</a>. We first input all of the GCM data, then rotate the grid and
      set latitude and longitude values to the standard WGS84
      (Greenwich-centered) geographic coordinate system. This sets North as the
      top of the grid and converts original lat/long values from 0&rarr;360 to
      &minus;180&rarr;180.</p>

      <p>All GCM units are converted to more common units. For example,
      temperature is converted from Kelvin to degrees Celsius (i.e., Kelvin
      &minus; 273.15) and precipitation values are converted from
      kilograms/meters&sup2;/second to millimeters/month (i.e., kg/m&sup2;/s
      &times; 86400 &times; #days in given month). Also, because many GCMs use
      non-square grid cells, all GCM processing uses point data rather than
      raster data.</p>

      <h4>GCM Climatologies Calculation</h4>

      <p>In order to determine projected changes in climate and the amount of
      model bias inherent in that change, we need to first determine a
      reference state of the climate according to the GCMs. The first step is
      to utilize twentieth-century (20c3m) scenario GCM data values to
      calculate climatologies for the same temporal range used in the high
      resolution data we are downscaling to (e.g. 1961&ndash;1990 PRISM,
      1971&ndash;2000 PRISM). These climatologies are simply GCM mean monthly
      values across a reference period (usually 30 years) from the 20c3m
      scenario outputs. The values represent modeled data and contain an
      expected model bias which is adjusted, as described below. This
      calculation is completed for a worldwide extent at the coarse GCM spatial
      resolution, which ranges from 1.875 to 3.75 degrees.</p>

      <h4>Anomaly Calculation</h4>

      <p>Next, we calculate monthly absolute (for temperature) or proportional
      (for precipitation) anomalies by taking the future monthly value (e.g.
      May 2050 A1B scenario) and subtracting the 20c3m climatology for
      temperature or divide by the 20c3m climatology for precipitation. This
      calculation is completed for a worldwide extent at the coarse GCM spatial
      resolution.</p>

      <p>We prefer using a proportional anomaly for precipitation because it
      reduces the possibility of projecting negative precipitation in the
      future. With absolute anomalies this could occur if wet biases in the
      model lead to circumstances where the absolute reduction in precipitation
      is greater than the observed average precipitation. However, there are
      complications with the proportional method as well. In arid areas (where
      climatological precipitation is close to zero) dividing by a very small
      number could produce unreasonably large precipitation increases. In the
      rare instances when this does occur, we truncate the top 0.5% of anomaly
      values to the 99.5 percentile value for each anomaly grid.</p>

      <p>This results in:</p>

      <ol>
        <li><strong>no change</strong> for the bottom 99.5% of values,</li>

        <li><strong>little change</strong> for the top 0.5% in grids where the
        top 0.5% of values are not extreme, and</li>

        <li><strong>substantial change</strong> only when actually needed, i.e.
        in cases where a grid contains one or more cells with unreasonably
        large values resulting from dividing by near-zero.</li>
      </ol>

      <p>No attempt is made to omit precipitation anomaly values of a certain
      magnitude, rather a quantile, based on data distribution, is used to
      truncate the most extreme values. The 99.5% cutoff was chosen after
      careful consideration of the ability of various quantiles to capture
      extreme outliers. This adjustment allows the truncation value to be
      different for each grid because it is based on the distribution of values
      across a given grid.</p>

      <h4>Downscaling and Bias Removal</h4>

      <p>Temperature and precipitation anomalies are then interpolated with a
      first-order bilinear spline technique across an extent larger than our
      high-resolution climatology dataset. A larger extent is used to account
      for the climatic variability outside of the bounds of our final
      downscaled extent. References for choosing the spline technique can be
      found <a href=
      "http://www.snap.uaf.edu/resource_page.php?resourceid=20">here</a> and
      <a href=
      "http://www.snap.uaf.edu/resource_page.php?resourceid=21">here</a>.</p>

      <p>At this point, our GCM anomaly datasets are at the same spatial
      resolution as our high resolution climatology dataset. The interpolated
      anomalies are then added to (for temperature) or multiplied by (for
      precipitation) the high-resolution climatology data (e.g., PRISM). This
      step effectively downscales the data and removes model biases by using
      observed data values as baseline climate. The final products are high
      resolution (2km or 771m for PRISM) data.</p>

      <h4>Validation</h4>

      <p>While the baseline climate data used in our downscaling procedure
      (e.g., PRISM and CRU data) have been peer reviewed and accepted by the
      climate community, we feel it is necessary to vet our own products to
      increase our confidence in them. While it is impossible to validate
      future data, it is possible to compare downscaled twentieth century
      scenario (20c3m) GCM data to actual weather station data. A report of
      this process is available <a href=
      "http://www.snap.uaf.edu/resource_page.php?resourceid=6">here</a>.
      Additionally, all of our projected future monthly output data are plotted
      and inspected by a committee of climate experts. Plots of these can be
      found under each dataset on the <a href=
      "http://www.snap.uaf.edu/datamaps.php">Data</a> page.</p>

      <h4>Scripts</h4>

      <p>We believe that just as scientific publications are peer reviewed,
      that scientific code should be held to a similar level of scrutiny. While
      programming and data processing are highly iterative processes (and
      sometimes messy) which are always evolving with improved data, methods,
      and efficiency, the core scripts used to produce our downscaled climate
      datasets are made available here. These scripts are designed for the
      <a href="http://www.r-project.org/">R statistical software package</a>.
      Our scripts were run in parallel on powerful, off-the-shelf commodity
      server hardware. We are providing these for others to inspect in order to
      encourage mutually beneficial discussion, but we cannot offer support or
      assistance in running these in your specific environment. If you would
      like to contact SNAP concerning becoming a collaborator, <a href=
      "#contact">please do!</a></p>

      <p>Download <a href="/attachments/SNAP_downscaling_scripts.zip">SNAP
      downscaling scripts</a> (ZIP, 14.3 kB)</p>

      <p><a href="#top">Back to top</a></p>
    </div>
  </div><?php
  $page->closePage();
  ?>
</body>
</html>
