<?php
include("template.php");
$page = new webPage("SNAP: Outreach", "", "about");
$page->openPage();
$page->pageHeader();
?>
		<div id="main_body">

			<div id="main_content">
				<div class="subHeader">Outreach</div>

				<div>
					<p>A large part of SNAP’s mission is to make our work available to the public. We make every effort to reach not only the community of scientists and researchers, but also K-12 students, educators, planners, community leaders, the media, and concerned citizens.</p>
					<img alt="Outreach" src="images/outreach.jpg" style="float: left; margin-right: 20px; margin-bottom: 0px; width: 410px; padding: 3px; border: 1px solid #999999;" />
					<p>SNAP regularly presents ongoing and completed work in UAF classrooms, symposia, agency meetings, workshops, and conferences. We have taken part in media trainings, scenario-building trainings, and teacher trainings. Via the UA Geography Program, SNAP faculty teaches courses in the application of Google Earth. We provide a variety of fact sheets and printable maps that can serve as handouts.</p>
					<p>SNAP’s most basic climate data are mean monthly temperature and precipitation for every month of every year for 1900-2008 (historical data), and for 1980-2100 (projected data). SNAP creates more complex climate projections by interpreting and extrapolating from downscaled historical climate data. For example, we have estimated thaw dates, freeze dates, and summer season length by interpolating between monthly mean temperatures and calculating when these means cross the freezing point. For information on model selection and downscaling, see the <a href="methods.php">Methods</a> section.</p>
					<p>In partnership with our <a href="collaborators.php">collaborators</a>, SNAP creates more complex future scenarios by linking climate projections to data and models for variables such as fire behavior; soil temperature and permafrost dynamics; biome shift and landscape connectivity; and hydrologic change. For more information on ongoing and completed SNAP projects, visit our <a href="projects.php">Projects</a> page.</p>
					<p>This website is one tool that can help us broaden our audience, and we welcome feedback on how to make it more informative and more user-friendly. Please <a href="people.php#contact">contact</a> us with your comments or questions.</p>
				</div>
			</div>
<?php
?>
		</div>
<?php
$page->closePage();
?>
