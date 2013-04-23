<?php

require 'template.php';

$page = new webPage('SNAP: Release Notes', '', '');
$page->openPage();
$page->pageHeader();

?>

<div id="main_body">
<div id="main_content" class="releases methods text">
<h2>SNAP web site release notes</h2>


<h3>1.2.5</h3>
<h4>Released April 23, 2013 at 12:15pm AKDT</h4>
	<p>Fixed some minor typos</p>

<h3>1.2.4</h3>
<h4>Released April 23, 2013 at 9:30am AKDT</h4>
<ul>
	<li><strong>New data available for download:</strong> additional IEM research data for scenarios a2 and b1 has been added to the <a href="/data.php">data downloads</a> page.</li>
	<li>The surface downwelling shortwave radiation data downloads are once again available.
</ul>

<h3>1.2.3</h3>
<h4>Released March 27, 2013 at 9:45am AKDT</h4>
	<p>This release temporarily closed the download links for projected and historical surface downwelling shortwave radiation for an update. It also modified some text on the data download page and corrected some typos there.</p>

<h3>1.2.2</h3>
<h4>Released January 22, 2013 at 6:00pm AKST</h4>
<ul>
	<li><strong>New data available for download:</strong> IEM research data has been added to the <a href="/data.php">data downloads</a> page. (#112)</li>
	<li>Fixed a minor issue preventing deep-linking to data inside the data page. (#121, #118)</li>
</ul>

<h3>1.2.1</h3>
<h4>Released December 17, 2012 at 1:30pm AKST</h4>
	<p>This minor release removed an incorrect note on the data download page, and changed file names for CRU TS 3.1.01 data to bring it into alignment with the scheme used for other filenames.</p>

<h3>1.2.0</h3>
<h4>Released November 30, 2012 at 6:00pm AKST</h4>
<ul>
	<li><strong>New data available for download:</strong> data sets using CRU TS 3.1 have been updated to use CRU TS 3.1.01 instead; snow-fraction day data are now available. (#115, #103)</li>
	<li><strong>Metric units are now available</strong> on the <a href="/charts.php">community charts tool</a>. (#55, #11)</li>
	<li>Posted a link to the <a href="https://github.com/ua-snap/potential-evapotranspiration" rel="external">scripts used for doing Harmon and Priestly-Taylor processing</a>. (#99)</li>
	<li>Improved visual formatting and metadata popups on data page. (#92, #78)</li>
	<li>Added IARC logo to page footer. (#91)</li>
	<li>Fixed text, links on some pages. (#82, 81)</li>
	<li>Fixed bug preventing &lsquo;Link&rsquo; popup from closing on maps tool. (#97)</li>
	<li>Fixed rendering issues for browsers on data page. (#102)</li>
	<li>Fixed rendering issue where Twitter feed on home page could overrun block. (#93)</li>
	<li>Changed internal state management library on maps tool. (#111)</li>
</ul>

<h3>1.0.15</h3>
<h4>Released October 10, 2012 at 2:00pm AKDT</h4>
<p>This release updated the note regarding the status of the CRU TS 3.1 data, and products that SNAP derives from that data, on the data downloads page.</p>

<h3>1.0.14</h3>
<h4>Released October 4, 2012 at 6:00pm AKDT</h4>
<p>This release added a note regarding the status of the CRU TS 3.1 data to the data downloads page.</p>

<h3>1.0.13</h3>
<h4>Released September 24, 2012 at 5:00pm AKDT</h4>
<p>This release updates the page template to include a link to the <a href="http://blog.snap.uaf.edu" rel="external">SNAP technical blog</a>.</p>

<h3>1.0.12</h3>
<h4>Released June 14, 2012 at 2:00pm AKDT</h4>
<p>This minor release updates the Map Tool to use SNAP&rsquo;s internal installation of Mapserver.</p>

<h3>1.0.11</h3>
<h4>Released June 7, 2012 at 5:00pm AKDT</h4>
<p>This release adds more links to data, as well as updating graphics and text content on different areas of the site.</p>
<h5>New functionality/features</h5>

<ul>
	<li><strong>New data available for download</strong>: CRU TS 3.0, PET data added to <a href="/data.php">data downloads</a> page. (#72)</li>
	<li>A new <a href="/sustainability.php">SNAP Sustainability</a> page has been added. (#73)</li>
	<li>Graphics and layout of <a href="/datamaps.php">Tools & Data</a> page has been refreshed. (#76)</li>
	<li>Text has been updated and corrected on the <a href="/faq.php">FAQ</a>, <a href="/downscaling.php">downscaling</a> and <a href="/uncertainty.php">uncertainty</a> pages. (#60, #64)</li>
	<li>Updated license text on the data downloads page and <a href="/terms.php">terms of use</a> pages. (#63)</li>
</ul>

<h5>Resolved issues</h5>
<ul>
	<li>Very large (4+ GB) ZIP files on the data downloads page have been split into smaller files to allow for some operating systems (Windows XP 32-bit) to decompress the files. (#66)</li>
	<li>&lsquo;Share&rsquo; buttons now work correctly on the map tool. (#53)</li>
</ul>

<h3>1.0.10</h3>
<h4>Released April 25, 2012 at 5:00pm AKDT</h4>
<p>This minor update added text to our Data page about the license used for SNAP data and information. (#50)</p>
<h3>1.0.9</h3>
<h4>Released April 19, 2012 at 5:30pm AKDT</h4>
<p>This minor update to the web site added a blurb on the Data page alerting users who run a 32-bit filesystem may have difficulties downloading or unzipping our data files, and corrected the size of one data file listed on the data page. (#58)</p>
<h3>1.0.8</h3>
<h4>Released March 27, 2012 at 11:15pm AKDT</h4>
<p>All issue numbers now refer to Github issues.</p>

<h5>New functionality/content</h5>

<ul>
	<li>Restyled share button on page toolbar to better match site theme and simplify use. (#37)</li>
	<li>Added ability to send user to direct link to section of the Data page.  For example, <a href="http://www.snap.uaf.edu/data.php#dataset=historical_derived_temperature_771m">here&rsquo;s a link directly to historical derived temperature products (771 m)</a>. (#45)</li>
	<li>Clicking the &lsquo;Metadata&rsquo; link in the maps tool now opens metadata in a modal window. (#<8)</li>
	<li>Added link to SNAP and ACCAP Flickr account (#40)</li>
	<li>Added caption to model overview table, reduced size of inline graphics on downscaling page (#42, 39)</li>
	<li>Added web site author information to page <code>meta</code> tags (#35)</li>
	<li>Changed title of &lsquo;Maps &amp; Data&rsquo; menu to &lsquo;Tools and Data&rsquo; (#29)</li>
	<li>Added/updated bios for Tracy, Jane (#20)</li>
</ul>

<h5>Resolved issues</h5>
<ul>
	<li>Updated footer copyright date to 2012 (#44)</li>
	<li>Modified text styling on header/footer of map tool to conform to styling elsewhere on the site (#41)</li>
	<li>Fixed header text on logos page to read Full Name for the 2nd column of print&ndash;specific logos (EPS files) (#43)</li>
</ul>

<h3>1.0.7</h3>
<h4>Released March 12, 2012 at 8:00pm AKDT</h4>
<h5>New functionality/content</h5>
<ul>
<li>Updates on data, charts pages to text to improve clarity (gh#30, 24, 23, 21, 18)</li>
<li>Videos added to Resources section (#430, #696)</li>
<li>Updated collaborators&rsquo; logos, text blurbs (gh#26, #710)</li>
</ul>

<h3>1.0.6</h3>
<h4>Released February 24, 2012 at 12:00pm AKST</h4>
<h5>Resolved issues</h5>
<ul>
<li>Corrected calculation of height of y&ndash;axis to prevent variability bars from overlapping legend, underflowing chart (gh#12, gh#14)</li>
<li>Fixed hover text on help button for variability to read 'About variability&hellip;' (gh#13)</li>
<li>Calculates y&ndash;axis on charts across all scenarios (A2, A1B, B1) so the axis is constant between scenarios, facilitating comparisons (gh#17)</li>
<li>Changed text on Charts Tool legends and made historical PRISM data bar gray to better describe the graph&rsquo;s data (gh#16)</li>
<li>Prevented any non&ndash;minified javascript from being deployed (gh#15)</li>
</ul>
<h3>1.0.5</h3>
<h4>Released February 21, 2012 at 8:30pm AKST</h4>
<p>Issues marked <code>gh#1234</code> refer to issues tracked in the Github issue tracker instead of Redmine.</p>
<h5>New functionality/content</h5>
<ul>
<li>Charts tool changes
<ul>
<li>Added Export pop-up with high-res PNG, low-res PNG and vector (SVG) export options (#624)</li>
<li>Reorganized page to put community choice first, moved explanation text into modal popups (#647)</li>
<li>Removed sample chart from page to prevent users from interpreting that chart as a real chart (#647, #651)</li>
<li>Exported charts have the SNAP logo overlaid on the lower-left, with more concise description text (#701, #624)</li>
</ul>
</li>
<li>Added About&rarr;Logos page to link to SNAP logos in a variety of formats (#281)</li>
<li>Added ability to embed streaming video in a Resource (#471)</li>
<li>Implemented consistently-colored controls on Charts, Data pages (#647)</li>
<li>Modified layout of Projects page to allow dynamic-height descriptions of projects (#692)</li>
<li>Added hover text attribution to properly give user credit for photos on project pages (#693)</li>
<li>Updated layout of Resources page to be a two-column layout, removed hover text (#635)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Corrected title of this page to be &ldquo;Release Notes&rdquo; (#695)</li>
<li>Fixed issue that allowed Google and other search indexing programs to trigger a Contact Us email (#698)</li>
<li>Improved layout and formatting to ensure images were consistently aligned on the People page (#651)</li>
</ul>
<h5>Server, network, and administrative maintenance</h5>
<ul>
<li>Moved source code hosting to <a href="http://www.github.com">Github</a> to facilitate access and collaboration (#678)</li>
<li>Removed unused images from main <code>/images</code> directory (#671)</li>
<li>Implemented a new testing server integrated with Github and Jenkins (#680)</li>
<li>Updated Apache configurations to properly use <code>NameVirtualHosts</code> to host both the SNAP web site as well as be a passthrough junction for ACCAP and other sites (#680)</li>
<li>Removed unused code, database tables and columns as necessary (#706)</li>
</ul>
<h5>Known issues</h5>
<ul>
<li>Loading&hellip; overlay on Charts was removed, it didn't have time to display on fast (DSL or faster) connections; this may need to be restored if connectivity issues cause perceived slowness. (gh#10)</li>
</ul>

<h3>1.0.4</h3>
<h4>Released February 8, 2012 at 6:55pm AKST</h4>
<h5>New functionality/content</h5>
<ul>
<li>Added SNAP downscaling scripts to Methods&rarr;Downscaling section (#666)</li>
<li>Added logos to Methods&rarr;Downscaling page (#627)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Fixed phone number for Nancy Fresco on People Page (#689)</li>
<li>Corrected target of link for &lsquo;Landscape Connectivity&rsquo; slide on home page (#683)</li>
<li>Corrected location of Apache logs (#685)</li>
<li>Made configuration token for Google Analytics API (#684)</li>
<li>Changed Apache restart to &lsquo;graceful&rsquo; to allow more seamless version upgrades (#686)</li>
</ul>

<h3>1.0.3</h3>
<h4>Released February 7, 2012 at 10:55am AKST</h4>
<h5>Resolved issues</h5>
<ul>
<li>Fixed issue which prevented the Contact form from sending emails correctly (#682)</li>
</ul>

<h3>1.0.2</h3>
<h4>Released February 6, 2012 at 5:10pm AKST</h4>
<h5>New functionality/content</h5>
<ul>
<li>Changed slides on home page, made clicking the images take you to the link (#621, 671, 676)</li>
<li>Added more folks: Mark Olson, Stephanie McAfee (#622)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Changed &ldquo;Download&rdquo; link on Maps tool to point to actual data page instead of overview (#669)</li>
<li>Text for decadal historical vs. projected DOF, DOT, LOGS explanation was swapped (#667)</li>
</ul>


<h3>1.0.0</h3>
<h4>Released February 5, 2012 at 7:40pm AKST</h4>
<h5>New functionality/content</h5>
<ul>
<li>Added new collaborators, updated existing collaborators' text (DOI, USGS, ACCAP, and Alaska Fire Science Consortium) (#661, 656)</li>
<li>Added new resources and attachments (#665, 463)</li>
</ul>
<h5>Resolved issues</h5>
<ul>
<li>Updated configuration to self-reference as www.snap.uaf.edu, not phobos.snap.uaf.edu (#655)</li>
<li>Corrected photos for staff members (#664)</li>
<li>Fixed links to metadata (#662)</li>
<li>Removed note that the web site was in beta testing (#660)</li>
</ul>

</div>
</div>

<?php
$page->closePage();
?>
