<?php 
include("template.php");
$page = new webPage("Scenarios Network for Alaska &amp; Arctic Planning", "index.css");
$page->openPage();
$page->pageHeader();
?>
	<div id="main_body">
		<script src="js/index.js" type="text/javascript"></script>
		<script src="js/jcarousellite_1.0.1.min.js" type="text/javascript"></script>
		<div id="main_content">
			<div style="width: 100%; position: relative; height: 300px; ">
				<div id="news_sticky" style="position: absolute;"><img alt="Sticky Background" src="images/sticky.jpg" /></div>
				<div id="news_container">
					<div style="position: absolute">
						<div class="news_image"><img alt="National Parks Inventory and Monitoring" src="images/index_images/np_inv.jpg" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">National Parks Inventory and Monitoring</div>A new report released by the University of Alaska Fairbanks offers international policymakers guidance for navigating the political and practical ramifications of shipping in the Arctic.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
						<div class="news_caption">Photo Courtesy of Bruce C. Johnson Jr.</div>
					</div>
					<div style="position: absolute">
						<div class="news_image"><img alt="Alaska Fire Science Consortium" src="images/index_images/firescience.jpg" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Alaska Fire Science Consortium</div>The Alaska Fire Science Consortium at UAF is one of eight national science delivery consortia to receive funding from the Joint Fire Science Program to provide a conduit for research to get into the hands of fire and land managers. </div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
					</div>
					<div style="position: absolute; display: none;">
						<div class="news_image"><img alt="Alaska Climate Science Center" src="images/index_images/acsc.jpg" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Alaska Climate Science Center</div>The Alaska Climate Science Center (CSC) is the first of eight regional climate science centers to be established in the U.S.  Its purpose is to bring together climate science and resource management.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
					</div>
					<div style="position: absolute; display: none;">
						<div class="news_image"><img alt="Alaska Center for Climate Assessment &amp; Policy" src="images/index_images/accap.png" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Alaska Center for Climate Assessment &amp; Policy</div>SNAP and ACCAP collaborate on multiple projects to provide Alaskans with the climate change science and understanding required to effectively plan for the future and the inherent uncertainties of what lies ahead.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
					</div>
					<div style="position: absolute; display: none;">
						<div class="news_image"><img alt="Landscape Connectivity" src="images/index_images/connectivity.jpg" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Landscape Connectivity</div>Utilizing climate projection data from SNAP, the Connecting Alaska Landscapes into the Future Project used selected species to identify areas of Alaska that may become important in maintaining landscape-level connectivity given a changing climate.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
						<div class="news_caption">Photo Courtesy of Chuck Young, U.S. Fish &amp; Wildlife Service</div>
					</div>
					<div style="position: absolute; display: none;">
						<div class="news_image"><img alt="Downscaled Climate Projections" src="images/index_images/downscaling.png" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Downscaled Climate Projections</div>SNAP takes coarse resolution global climate model (GCM) data and downscales it to higher resolution.  This makes it more useful for agencies and decision makers to plan for climate change.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
					</div>
				</div>
				<div id="news_nav"></div>
				<div id="news_pause"><img style="height: 40px;" src="images/pause.png" /></div>
				<script type="text/javascript">
					$("#news_container").cycle({
						fx:     'fade', 
						speed:   1000, 
						timeout: 10000, 
						pause:   1,
						pager:  '#news_nav',
					});
					$("#news_container").hover(
						function(){ $("#news_pause").show(); },
						function(){ $("#news_pause").hide(); }
					);
				</script>
			</div>
			<div style="clear: both; margin-top: 60px;">
				<p>SNAP’s mission is to provide timely access to management-relevant scenarios of future conditions in Alaska for more effective planning by land managers, communities, and industry. SNAP scenarios and the data used to produce them are openly available to all potential users. Stakeholders can access further SNAP network services and expertise by becoming a SNAP <a href="collaborators.php">collaborator</a>.</p>
				SNAP can help you:
				<ul>
					<li><strong>Estimate</strong> changes that affect your community, such as permafrost thaw, water availability, length of the growing season, or shifts in vegetation;</li>
					<li><strong>Analyze</strong> implications of the estimates and clarify how they can be applied properly for future planning;</li>
					<li><strong>Plan</strong> for future community needs, budget demands, infrastructure designs, resource availability, etc.</li>
				</ul>
			</div>
			<div style="width: 100%; clear: both; margin-bottom: 20px; position: relative;">
				<div style="width: 280px; margin-right: 50px; float: left; margin-top: 60px;">
					<div style="font-size: 18px; color: #555555; font-weight: bold; margin-bottom: 5px;">Scenarios</div>
					<div style="font-size: 14px;">
						<p>A scenario is a description of a plausible future situation, not a forecast of the future. Scenarios allow us to see multiple possibilities for the future. </p>
						<p>Climate projections vary greatly depending on what assumptions are made about future human activity and greenhouse gas emissions. Future emissions will be determined by various driving forces, such as population, economic growth, energy use and changes in technology. In 2000, the Intergovernmental Panel on Climate change (IPCC) identified a range of greenhouse gas emissions scenarios that are now used by climate scientists to make projections of possible future climate conditions.</p>
						<p>Each scenario is an example of what can happen under particular assumptions. Scenarios are used for modeling climate, examining potential climate change, and exploring vulnerabilities of humans and ecosystems in response to a changed climate.</p>
					</div>
					<!--
					<div style="font-size: 16px;" >SNAP helps understand and apply the climate change information needed to prepare for years and decades to come.</div>
					
					<div style="margin-top: 20px;">
						<div style="margin-top: 10px; width: 75px; float: left"><img src="images/mini_data.png" alt="Mini Data Image" /></div>
						<div><strong>Estimate</strong> changes whether it be permafrost levels in your community, herd populations, length of critical seasons, etc.</div>
					</div>
					<div style="margin-top: 20px;">
						<div style="margin-top: 10px; width: 75px; float: left"><img src="images/mini_data.png" alt="Mini Data Image" /></div>
						<div><strong>Analyze</strong> implications of the estimates and clarify how they can be applied properly.</div>
					</div>
					<div style="margin-top: 20px;">
						<div style="margin-top: 10px; width: 75px; float: left"><img src="images/mini_data.png" alt="Mini Data Image" /></div>
						<div><strong>Plan</strong> for future budget demands, infrastructure designs, resource availability, etc.</div>
					</div>
					-->
				</div>
				<div style="width: 280px; margin-right: 50px; float: left; margin-top: 60px; font-size: 12px;">
					<div style="font-size: 18px; color: #555555; font-weight: bold; margin-bottom: 5px;">Network</div>
					<div style="font-size: 14px;">
						<p>SNAP is a collaborative network of the University of Alaska, state, federal, and local agencies, NGOs, non-profits and industry partners.</p>
						<p>Over the past three years, SNAP has teamed up with the Alaska Center for Climate Adaptation and Policy (<a href="collaborators.php#org_2">ACCAP</a>) to fill the increasing needs of Alaska stakeholders for climate data and information.</p>
						<p>SNAP and ACCAP have developed strong <a href="collaborators.php">collaborative relationships</a> with state and federal agencies, state, municipal and tribal governments, Native and conservation non-profit organizations, the private sector, and emerging regional federal initiatives such as the Department of Interior’s Climate Science Center and the U.S. Fish and Wildlife Service Landscape Conservation Cooperatives. We work closely with the University of Alaska Cooperative Extension Service in climate science outreach and engagement.</p>
					</div>
					<!--
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Med Data Image" width="68px"/></div>
					<div style="font-size: 18px; font-weight: bold; color: #555555; margin-bottom: 5px;" >SNAP</div>
						<div style="line-height: 20px; font-size: 15px;">Welcome to SNAP.  SNAP is all <a href="/about.php">about</a> helping people plan in an increasingly changing climate.  We work with a wide range of <a href="/collaborators.php">partners and collaborators</a> on many <a href="/projects.php">projects</a> to explore a range of possible futures based on the best scientific knowledge and <a href="/data.php">data</a> available.  SNAP also strives to make our <a href="/resources.php">resources</a> available and our <a href="/methods.php">methods</a> known.  SNAP has a strong partnership with <a href="/collaborators.php#org_2">ACCAP</a> that allows us to leverage each others strengths in order to inform a broad audience.</div>
						<div style="margin-top: 10px; line-height: 18px;  font-size: 14px;"></div>
					-->
				</div>
				<div style="width: 280px; float: left; margin-top: 60px; font-size: 12px;">
					<div style="font-size: 18px; color: #555555; font-weight: bold; margin-bottom: 5px;">Planning</div>
                                        <div style="font-size: 14px;">
						<p>SNAP’s mission is to provide land managers, communities, and industry with the climate change science and understanding required to effectively plan for the future and the inherent uncertainties of what lies ahead.</p>
						<p>Currently, most policy and management planning for Alaska operates under the assumption that future conditions will be similar to those of our recent past experience. However, there is reasonable consensus that future climatic, ecological, and economic conditions will likely be quite different from those of the past.</p>
						<p>We now know enough about current and likely future trajectories of climate and other variables to develop credible scenarios by which to plan. When climate models are run with different scenarios of future greenhouse gas emissions, land-use and other driving forces, scientists and planners can better prepare for a range of future possibilities.</p>
					</div>
					<!--
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Medium Data Image" width="68px" /></div>
					<div style="font-size: 18px; font-weight: bold; margin-bottom: 5px; color: #555555;" >Scenarios Network</div>
						<div style="line-height: 20px;  font-size: 15px;">Yes, it’s ambiguous, but in a good way.  Planning for future climate scenarios is not easy to do alone.  SNAP has built a diverse <a href="/collaborators.php">network</a> including university researchers from around the world, state and federal agencies, non-profits, and foreign governments to name a few.  This network allows stakeholders to hold open discussions concerning questions, needs, methods, and future climate scenario planning.  Every member of the network brings their knowledge, skills and questions to the table while SNAP serves as the catalyst to determine needs, develop a plan of action, collect and analyze data, and interpret and present results.</div>	
					-->
				</div>
			</div>
		</div>
		</div>

<?php
$page->closePage();
