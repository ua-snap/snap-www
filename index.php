<?php 
include("template.php");
$page = new webPage("Scenarios Network for Alaska &amp; Arctic Planning", "index.css");
$page->openPage();
$page->pageHeader();
?>
    <div id="main_body">
        <div id="main_content">
            <div style="width: 100%; position: relative; height: 300px; ">
                <div id="news_sticky" style="position: absolute;"><img alt="Sticky Background" src="images/sticky.jpg" /></div>
                <div id="news_container">

                    <div style="position: absolute; display: none;">
                        <div class="news_image"><a href="/project_page.php?projectid=26"><img alt="Report to the President" src="images/presReport.jpg" style="width: 600px; height 300px;" /></a></div>
                        <div class="news_content"><div class="news_title">Managing for the Future in a Rapidly Changing Arctic</div>SNAP and ACCAP contributed to a report to the President of the U.S. The report highlights the need to coordinate and use the best available science to integrate cultural, environmental and economic factors in decision-making about development and conservation in the Arctic.</div>
                        <div class="news_link"><a href="/project_page.php?projectid=26">read more &gt;&gt;</a></div>
                    </div>

                    <div style="position: absolute; display: none;">
                        <div class="news_image"><a href="/maps.php" target="_blank"><img alt="SNAP Maps Tool: Climate Visualizations" src="images/maps.jpg" style="width: 600px;" /></a></div>
                        <div class="news_content"><div class="news_title">Climate Visualizations</div>SNAP is striving to implement useful climate data visualizations that make sense. The new map tool, with its interactive titles, forms the basis for future data and mapping enhancements.</div>
                        <div class="news_link"><a target="_blank" href="/maps.php">open the map &gt;&gt;</a></div>
                    </div>

                    <div style="position: absolute; display: none;">
                        <div class="news_image"><a href="/charts.php"><img alt="Your Community: Community Climate Projection Charts" src="images/community_chart_example.jpg" style="width: 600px; height: auto; margin-top: 16px" /></a></div>
                        <div class="news_content"><div class="news_title">Your Community</div>Change affects people and communities. Our Community Charts tool allows you to look at how temperature and precipitation regimes will be altered over the next 100 years, across Alaska and Western Canada.</div>
                        <div class="news_link"><a href="/charts.php">explore charts &gt;&gt;</a></div>
                    </div>

                    <div style="position: absolute">
                        <div class="news_image"><a href="/collaborators.php"><img alt="SNAP Collaborators" src="images/collabs_border.jpg" style="width: 600px; height: 300px;" /></a></div>
                        <div class="news_content"><div class="news_title">SNAP Collaborations</div>Collaborating with others is a large reason SNAP is able to succeed and produce some of the most useful projections of future conditions across the Arctic.</div>
                        <div class="news_link"><a href="/collaborators.php">read more &gt;&gt;</a></div>
                    </div>

                    <div style="position: absolute; display: none;">
                        <div class="news_image"><a href="/project_page.php?projectid=4"><img alt="Landscape Connectivity" src="images/index_images/connectivity.jpg" style="width: 600px; height: 300px;" /></a></div>
                        <div class="news_content"><div class="news_title">Landscape Connectivity</div>Utilizing climate projection data from SNAP, the Connecting Alaska Landscapes into the Future Project used selected species to identify areas of Alaska that may become important in maintaining landscape-level connectivity given a changing climate.</div>
                        <div class="news_link"><a href="/project_page.php?projectid=4">read more &gt;&gt;</a></div>
                        <div class="news_caption">Photo Courtesy of Chuck Young, U.S. Fish &amp; Wildlife Service</div>
                    </div>

                    <div style="position: absolute; display: none;">
                        <div class="news_image"><a href="/downscaling.php"><img alt="Downscaled Climate Projections" src="images/downscaling_figure_web.png" style="width: 600px; height: 300px;" /></a></div>
                        <div class="news_content"><div class="news_title">Downscaled Climate Projections</div>SNAP takes coarse resolution global climate model (GCM) data and downscales it to higher resolution.  This makes it more useful for agencies and decision makers to plan for climate change.</div>
                        <div class="news_link"><a href="/downscaling.php">read more &gt;&gt;</a></div>
                    </div>

                </div>
                <div id="news_nav"></div>
                <div id="news_pause"><img alt="Pause Image" style="height: 40px;" src="images/pause.png" /></div>
                <script type="text/javascript">
                    $("#news_container").cycle({
                        fx:     'fade', 
                        speed:   1000, 
                        timeout: 5000, 
                        pause:   1,
                        pager:  '#news_nav',
                    });
                    $("#news_container").hover(
                        function(){ $("#news_pause").show(); },
                        function(){ $("#news_pause").hide(); }
                    );
                </script>
            </div>
            <div style="width: 100%; clear: both; margin-bottom: 20px; position: relative; line-height: 20px;">
                <div style="width: 310px; margin-right: 30px;  float: left; margin-top: 60px;">
                    <div style="font-size: 18px; color: #555555; font-weight: bold; margin-bottom: 5px;">SNAP</div>
                    <div style="font-size: 14px;">
                        <p>We develop plausible <a style="font-size: 18px;" href="/faq.php#faq_4">scenarios</a> of future conditions through a diverse and varied <a style="font-size: 18px;" href="/collaborators.php">network</a> of people and organizations,  which allow better <a style="font-size: 18px;" href="/planning.php">planning</a> for the uncertain future of Alaska and the Arctic.</p>
                    </div>
                </div>
                <div style="width: 600px; float: left; margin-top: 60px; font-size: 12px;">
                    <div style="font-size: 18px; color: #555555; font-weight: bold; margin-bottom: 5px;">What we do</div>
                    <div style="font-size: 14px;">
                        <p>SNAP is all <a href="about.php">about</a> helping people plan in a changing climate.  We work with a wide range of partners and <a href="collaborators.php">collaborators</a> on many <a href="projects.php">projects</a> to explore a range of possible futures based on the best scientific knowledge and <a href="data.php">data</a> available. SNAP also strives to make our <a href="resources.php">resources</a> available and our <a href="methods.php">methods</a> known.  SNAP has a strong partnership with <a href="collaborators.php#org_2">ACCAP</a> that allows us to leverage each other's strengths in order to inform a broad audience.</p>
                    </div>
                </div>


            </div>
        </div>
        </div>

<?php
$page->closePage();
