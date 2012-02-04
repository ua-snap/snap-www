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
                    <div style="position: absolute">
                        <div class="news_image"><img alt="National Parks Inventory and Monitoring" src="images/index_images/np_inv.jpg" style="width: 600px; height: 300px;" /></div>
                        <div class="news_content"><div class="news_title">National Parks Inventory and Monitoring</div>A new report released by the University of Alaska Fairbanks offers international policymakers guidance for navigating the political and practical ramifications of shipping in the Arctic.</div>
                        <div class="news_link"><!--<1--<a href="">read more &gt;&gt;</a>--></div>
                        <div class="news_caption">Photo Courtesy of Bruce C. Johnson Jr.</div>
                    </div>
                    <div style="position: absolute">
                        <div class="news_image"><img alt="Alaska Fire Science Consortium" src="images/index_images/firescience.jpg" style="width: 600px; height: 300px;" /></div>
                        <div class="news_content"><div class="news_title">Alaska Fire Science Consortium</div>The Alaska Fire Science Consortium at UAF is one of eight national science delivery consortia to receive funding from the Joint Fire Science Program to provide a conduit for research to get into the hands of fire and land managers. </div>
                        <div class="news_link"><!--<1--<a href="">read more &gt;&gt;</a>--></div>
                    </div>
                    <div style="position: absolute; display: none;">
                        <div class="news_image"><img alt="Alaska Climate Science Center" src="images/index_images/acsc.jpg" style="width: 600px; height: 300px;" /></div>
                        <div class="news_content"><div class="news_title">Alaska Climate Science Center</div>The Alaska Climate Science Center (CSC) is the first of eight regional climate science centers to be established in the U.S.  Its purpose is to bring together climate science and resource management.</div>
                        <div class="news_link"><!--<1--<a href="">read more &gt;&gt;</a>--></div>
                    </div>
                    <div style="position: absolute; display: none;">
                        <div class="news_image"><img alt="Alaska Center for Climate Assessment &amp; Policy" src="images/index_images/accap.png" style="width: 600px; height: 300px;" /></div>
                        <div class="news_content"><div class="news_title">Alaska Center for Climate Assessment &amp; Policy</div>SNAP and ACCAP collaborate on multiple projects to provide Alaskans with the climate change science and understanding required to effectively plan for the future and the inherent uncertainties of what lies ahead.</div>
                        <div class="news_link"><!--<1--<a href="">read more &gt;&gt;</a>--></div>
                    </div>
                    <div style="position: absolute; display: none;">
                        <div class="news_image"><img alt="Landscape Connectivity" src="images/index_images/connectivity.jpg" style="width: 600px; height: 300px;" /></div>
                        <div class="news_content"><div class="news_title">Landscape Connectivity</div>Utilizing climate projection data from SNAP, the Connecting Alaska Landscapes into the Future Project used selected species to identify areas of Alaska that may become important in maintaining landscape-level connectivity given a changing climate.</div>
                        <div class="news_link"><!--<1--<a href="">read more &gt;&gt;</a>--></div>
                        <div class="news_caption">Photo Courtesy of Chuck Young, U.S. Fish &amp; Wildlife Service</div>
                    </div>
                    <div style="position: absolute; display: none;">
                        <div class="news_image"><img alt="Downscaled Climate Projections" src="images/index_images/downscaling.png" style="width: 600px; height: 300px;" /></div>
                        <div class="news_content"><div class="news_title">Downscaled Climate Projections</div>SNAP takes coarse resolution global climate model (GCM) data and downscales it to higher resolution.  This makes it more useful for agencies and decision makers to plan for climate change.</div>
                        <div class="news_link"><!--<1--<a href="">read more &gt;&gt;</a>--></div>
                    </div>
                </div>
                <div id="news_nav"></div>
                <div id="news_pause"><img alt="Pause Image" style="height: 40px;" src="images/pause.png" /></div>
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
            <div style="width: 100%; clear: both; margin-bottom: 20px; position: relative; line-height: 20px;">
                <div style="width: 310px; margin-right: 30px;  float: left; margin-top: 60px;">
                    <div style="font-size: 18px; color: #555555; font-weight: bold; margin-bottom: 5px;">SNAP</div>
                    <div style="font-size: 14px;">
                        <p>We develop plausible <a style="font-size: 18px;" href="http://phobos.snap.uaf.edu/faq.php#faq_4">scenarios</a> of future conditions through a diverse and varied <a style="font-size: 18px;" href="/collaborators.php">network</a> of people and organizations,  which allow better <a style="font-size: 18px;" href="/planning.php">planning</a> for the uncertain future of Alaska and the Arctic.</p>
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
