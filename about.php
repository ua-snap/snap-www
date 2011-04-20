<?php 
include("template.php");
$page = new webPage("SNAP: About", "about.css", "about");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
?>
		<div id="main_body">
			<!--

			-->

			<div id="main_content" style="font-size: 15px;" >
				<div class="subHeader">About</div>
				<div style="width: 500px; float: left;">
					<p style="font-size: 17px; line-height: 24px;">How will the land, resources, industry, infrastructure, and communities of the far north change by 2030?  By 2050?  By the end of this century?  Will permafrost thaw and glaciers disappear?  Will wildfire put us at risk?  Which coastal areas will be lost?  How will wildlife adapt?  Will farmers enjoy a heyday?  Will insect pests spread?</p>
					<p style="font-size: 14px; line-height: 20px;"><strong>There are no simple answers to these questions.</strong> The future of Alaska and the Arctic – like all futures – is uncertain.  Directional shifts in climate are overlaid with variability in day-to-day and year-to-year weather regimes.  Some changes will occur gradually, while other shifts are likely to be more radical, once tipping points are crossed.  Our own choices, actions, and adaptations will affect the patterns of change.</p>
					<p style="font-size: 14px; line-height: 20px;"><strong>SNAP’s role is not to predict a single future</strong>, but rather to use state-of-the-art modeling techniques, the best available <a href="data.php">data</a>, and the expertise of all of our <a href="collaborators.php">partners and collaborators</a> to explore a range of future scenarios that are plausible, divergent, challenging, and relevant to the needs of land managers, community planners, businesses, and individuals.</p>
				</div>
				<div style="width: 400px; float: right;">
					<div>
						<div><img src="images/about_video.jpg" style="margin: auto; width: 400px; display: block; text-align: center;" /></div>
						<div style="margin-top: 3px; text-align: right; color: #434343">Dr. Scott Rupp Introduces SNAP <img style="width: 25px; vertical-align: middle;" src="images/pub_video.png" /> 4:35</div>
					</div>
					<p><strong>SNAP products</strong> include datasets and fine-scale maps projecting future climate conditions for selected variables, and rules and models that link these projections to a wide range of potential landscape changes.  SNAP scenarios and the data used to produce them are openly available to all users. Stakeholders can access further SNAP network services and expertise by becoming SNAP collaborators.</p>
				</div>
				<div style="clear: both; width: 100%; height: 30px;"></div>
				<div>
					<div style="float: right; width: 400px;">
						<div><div style="display: inline-block; font-size: 18px;">Collaborators</div><div style="margin-left: 120px; display: inline-block; color: #6a7173; font-size: 13px;"><a href="collaborators.php">view all</a></div></div>
							<div style="margin-left: 30px; margin-top: 15px;"><img src="images/collaborators/accap_rgb.png" /><img src="images/collaborators/snras_rgb.png" style="margin-left: 75px;"/></div>
							<div style="margin-left: 30px; margin-top: 15px;"><img src="images/collaborators/uagp_rgb.png"/><img src="images/collaborators/AKSeal.gif" style="margin-left: 105px; height: 50px;" /></div>
						<?php
							/*
							$query = "SELECT id,name FROM collaborators ORDER BY RAND() LIMIT 5";
							$result = mysql_query($query) or die(mysql_error());
							while ($row = mysql_fetch_array($result)){
								echo "<div style=\"margin-top: 7px; color: #6a7173; font-weight: bold;\">".$row[1]."</div>";
							}
							*/
						?>
					</div>
					<div style="float: left; width: 500px;">
						<div><div style="font-size: 18px; display: inline-block">From SNAP's Blog</div><div style="color: #6a7173; margin-left: 100px; display: inline-block">go to blog | subscribe <img src="images/rss.jpg" style="vertical-align: middle; height: 20px;" /></div></div>
						<div style="margin-top: 10px; font-weight: bold; color: #555555">
							<div style="display: inline-block;"><img alt="Blog Entry Icon" src="images/pub_paper.png" style="vertical-align: top; height: 20px; " /></div>
							<div style="display: inline-block; width: 460px; margin-left: 5px;">Report details next steps in arctic shipping policies</div>
						</div>
						<div style="margin-top: 10px; font-weight: bold; color: #555555">
							<img alt="Blog Entry Icon" src="images/pub_paper.png" style="vertical-align: top; height: 20px; " />
							<div style="display: inline-block; width: 460px; margin-left: 5px;">New report outlines potential climate change impacts to Alaska's wildlife and ecosystem</div>
						</div>
						<div style="margin-top: 10px; font-weight: bold; color: #555555">
							<img alt="Blog Entry Icon" src="images/pub_paper.png" style="vertical-align: top; height: 20px; " />
							<div style="display: inline-block; width: 460px; margin-left: 5px;">Neogeography lab helps explore the world</div>
						</div>
						<div style="margin-top: 10px; font-weight: bold; color: #555555">
							<div style="display: inline-block;"><img alt="Blog Entry Icon" src="images/pub_paper.png" style="vertical-align: top; height: 20px; " /></div>
							<div style="display: inline-block; width: 460px; margin-left: 5px;">SNAP delivers climate change data to public's fingers</div>
						</div>
					</div>

				</div>
				<div style="clear: both; width: 100%; height: 60px;"></div>
				<div id="tabs">
				<div style="width: 900px; z-index: 10; position: relative;" id="tabcontrol">
					<li class="tab_nav_selected" id="tc1">History of SNAP</li>
					<li class="tab_nav" id="tc2">People and Work Philosophy</li>
					<li class="tab_nav" id="tc3">Data &amp; Research</li>
					<li class="tab_nav" id="tc4">Outreach</li>
				</div>
				<div style="z-index: 0; border: 2px solid #cccccc; min-height: 10px; position: relative; padding: 20px; top: -2px;" id="tabcontainer" >
					<div id="tab1">
						<p>The idea of developing a scenario planning process for Alaska emerged in 2006 and 2007 from discussions by an interdisciplinary group of about a dozen University of Alaska faculty. The consensus of that group was that such a process would be feasible and would be one of the most useful ways that University of Alaska researchers could convey the societal significance of their research to Alaskan decision-makers and other stakeholders. Indeed, individual researchers had already completed some of the basic future scenarios for Alaska.</p>
						<p>Currently, most policy and management planning assumes that future conditions will be similar to those of our recent past experience. However, there is reasonable consensus within the scientific community that future climatic, ecological, and economic conditions will likely be quite different from those of the past. We now know enough about current and likely future trajectories of climate and other variables to develop credible projections. We can also make projections for other variables that are closely correlated, such as frequency of intense storms, risk of wildfire or flooding, and habitat and wildlife changes associated with these events.</p>
						<p>SNAP was launched in 2007, with Dr. Scott Rupp as Network Director, and a three-person staff. In the past four years, SNAP has grown from a single-room effort to a bustling office.</p>
					</div>
					<div id="tab2" style="display: none;">
						<p>A diverse team is working on a wide array of projects at our College Road office – and further afield, too.  From the start, much of the work behind SNAP’s products has taken place far from our headquarters at UAF.  We rely the expertise of scientists throughout the UA system, as well as researchers at state and federal agencies and non-profits.  We downscale data from climate models created at scientific centers around the world, and we benefit from the input of individuals at the local and community level.</p>
						<p>Climate change planning is not a single field of endeavor.  It encompasses atmospheric and geophysical sciences, biological sciences, and social sciences.  Weighing choices often requires expertise in economics, or knowledge of cultural preferences. Our work philosophy embraces interdisciplinary collaboration.  Academic environments too often foster a competitive approach to research, which stymies collaboration, and leads to inefficiency and redundancy.  Government and private organizations can also suffer from poor data sharing.  We make all our methods and results as transparent as possible.</p>
						<p>All SNAP projects are collaborative, and anyone can be part of the SNAP network.  At the same time, individuals within the SNAP team are highly independent workers, each engaged in different pieces of a complex puzzle.  Many are engaged in PhD or post-doctoral research.  To learn more about SNAP employees, visit our SNAP profiles page.</p>
					</div>
					<div id="tab3" style="display: none;">
						<p>SNAP’s most basic climate data are mean monthly temperature and precipitation for every month of every year from 1900-2008 (historical data), and for 1980-2100 (projected data). For information on model selection and downscaling, see Derivations of SNAP Projections.</p>
						<p>All SNAP data, methods, model outputs, and projects results are freely available to the public.  We do our best to provide data in formats that are accessible to a wide range of users.  Currently, all our basic data are available for download as ASCII files and as KML (Google Earth) files.  Selected data and maps are also available for online browsing and download via our Community Charts tool and our Web-based Maps tool.</p>
						<p>Climate projections are based on downscaled outputs from Global Circulation Models (GCMs).  These GCMs were created for the IPCC (Intergovernmental Panel on Climate Change) by research labs around the world.  SNAP projections are available for each of five different models, selected as the best performers from 15 total models, and three different potential scenarios for the global emissions of greenhouse gases.  As described by the IPCC, the A2 scenario predicts a world with rapid population growth and slow technological improvement, the B1 scenario describes a world with slower growth and thus lower emissions, and the A1B scenario falls between the other two.</p>
						<p>Historical climate data are downscaled from Climate Research Unit (CRU) grids, which are interpolated from existing climate station records.  SNAP creates more complex climate projections by interpreting and extrapolating from these basic data.  For example, we have estimated thaw dates, freeze dates, and summer season length by interpolating between monthly mean temperatures and calculating when these means cross the freezing point. </p>
						<p>In partnership with out collaborators, SNAP creates more complex future scenarios by linking climate projections to data and models for variables such as fire behavior; soil temperature and permafrost dynamics; biome shift and landscape connectivity; and hydrologic change.</p>
						<p>For more information on ongoing and completed SNAP projects, visit our Projects page.</p>
					</div>
					<div id="tab4" style="display: none;">
						<p>A large part of SNAP’s mission is to make our work available to the public.  We make every effort to reach not only the community of scientists and researchers, but also K-12 students, educators, planners, community leaders, the media, and concerned citizens.</p>
						<p>SNAP regularly presents our ongoing and completed work in UAF classrooms, symposia, agency meetings, workshops, and conferences.  We have taken part in media trainings, scenario-building trainings, and teacher trainings.  Via the UA Geography Program, SNAP faculty teach courses in the application of Google Earth.  We provide fact sheets and printable maps that can serve as handouts.</p>
						<p>This website is one tool that can help us broaden our audience, and we welcome feedback on how to make it more informative and more user-friendly.  Please directs comments to [whose email goes here?] </p>
					</div>
				</div>


				<script type="text/javascript">
					$('#tc1').click(function() {
					  $('#tab1').show(0, function() { });
					  $('#tabcontainer>[id!="tab1"]').hide(0, function() { });	
					  $('#tc1').addClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc1"]').removeClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc1"]').addClass("tab_nav");
					});
					$('#tc2').click(function() {
					  $('#tab2').show(0, function() { });
					  $('#tabcontainer>[id!="tab2"]').hide(0, function() { });
					  $('#tc2').addClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc2"]').removeClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc2"]').addClass("tab_nav");
					});
					$('#tc3').click(function() {
					  $('#tab3').show(0, function() { });
					  $('#tabcontainer>[id!="tab3"]').hide(0, function() { });
					  $('#tc3').addClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc3"]').removeClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc3"]').addClass("tab_nav");
					});
					$('#tc4').click(function() {
					  $('#tab4').show(0, function() { });
					  $('#tabcontainer>[id!="tab4"]').hide(0, function() { });
					  $('#tc4').addClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc4"]').removeClass("tab_nav_selected");
					  $('#tabcontrol>[id!="tc4"]').addClass("tab_nav");
					});
				</script>
			</div>
		</div>
	</div>
<?php
$page->closePage();
?>
