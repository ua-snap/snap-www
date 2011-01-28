<?php 
include("template.php");
$page = new webPage("Scenarios Network for Alaska &amp; Arctic Planning", "index.css");
$page->openPage();
$page->pageHeader();
?>
	<div id="main_body">
		<script src="js/index.js" type="text/javascript"></script>
		<div id="main_content">
			<div style="width: 100%; min-height: 10px; position: relative; height: 300px; ">
				<div id="news_container" style="width: 925px; margin: auto;">
					<div style="position: relative">
						<img style="position: absolute; width: 100%; height: 300px;" src="images/index_images/1.jpg"  />
						<div style="news_title">Arctic Shipping Assessment</div>
						<div style="news_content">As the climate warms and global commerce grows, the prospect of an arctic shipping route becomes more tangible. A new report released by the University of Alaska Fairbanks offers international policymakers guidance for navigating the political and practical ramifications of shipping in the Arctic.</div>

					</div>
					<div style="position: relative; display: none;">
						<img style="position: absolute; width: 100%; height: 300px;" src="images/index_images/2.jpg" />
						<div>Alaska Fire Consortium Grant</div>
						<div>The Alaska Fire Science Consortium at UAF has received $435,000 from the Joint Fire Science Program to provide a conduit for professional research to get into the hands of fire and land managers.</div>
					</div>
					<div style="position: relative; display: none;">
						<img style="position: absolute; width: 100%; height: 300px;" src="images/index_images/3.jpg" />
						<div>Neogeography Lab</div>
						<div>A lab in the UA Geography Program is opening new worlds to UAF students. The neogeography lab, just opened in the Scenarios Network for Alaska Planning (SNAP) building, makes Google Earth accessible and fun.</div>
					</div>
				</div>
				<div style="width: 975px;">
				<div id="news_container_prev" class="news_button" style="left: 5px;"></div>
				<div id="news_container_next" class="news_button" style="right: 5px;"></div>
				</div>
				<script type="text/javascript">
					$("#news_container").cycle({
						fx:     'fade', 
						speed:   1000, 
						timeout: 5000, 
						next:   '#news_container_next', 
						prev:   '#news_container_prev', 
						pause:   1 
						
					});
				</script>
		<!--

				<div style="float: left; width: 320px; height: 305px; position: relative; background-image: url('images/postit.png'); background-position: -10px -5px; ">
					<div id="news_title" style="font-size: 26px; color: #eeeeee; padding: 10px;">Arctic Shipping Assessment</div>
					<div id="news_content" style="font-size: 14px; color: #eeeeee; padding: 10px;">
						As the climate warms and global commerce grows, the prospect of an arctic shipping route becomes more tangible. A new report released by the University of Alaska Fairbanks offers international policymakers guidance for navigating the political and practical ramifications of shipping in the Arctic. 
					</div>
					<div class="news_nav" style="position: absolute;">

		
						<span class="news_button" onclick="javascript:changeImage(this, 1, 'Arctic Shipping Assessment', 'As the climate warms and global commerce grows, the prospect of an arctic shipping route becomes more tangible. A new report released by the University of Alaska Fairbanks offers international policymakers guidance for navigating the political and practical ramifications of shipping in the Arctic.', 'more.php');">1</span>
						<span class="news_button" onclick="javascript:changeImage(this, 2, 'Alaska Fire Consortium Grant', 'The Alaska Fire Science Consortium at UAF has received $435,000 from the Joint Fire Science Program to provide a conduit for professional research to get into the hands of fire and land managers.', 'more.php');">2</span>
						<span class="news_button" onclick="javascript:changeImage(this, 3, 'Neogeography Lab', 'A lab in the UA Geography Program is opening new worlds to UAF students. The neogeography lab, just opened in the Scenarios Network for Alaska Planning (SNAP) building, makes Google Earth accessible and fun.', 'more.php');">3</span>
					</div>


				</div>
				<div id="news_image" style="float: right; width: 630px; height: 300px; background-color: #6a7173; overflow: hidden; -moz-box-shadow: 3px 3px 3px #cccccc;">
					<a href="news.php"><img src="images/Arctic-Shipping-Assessment.png" style="width: 100%;" alt="Arctic Shipping" /></a>
				</div>
		-->
			</div>
			<div style="clear: both;"></div>
			<div style="width: 100%; clear: both; margin-bottom: 20px; position: relative;">
				<div style="width: 300px; margin-right: 20px; float: left; margin-top: 80px;">
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
				</div>
				<div style="width: 300px; margin-right: 20px; float: left; margin-top: 80px; font-size: 12px;">
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Med Data Image" width="68px"/></div>
					<div style="font-size: 16px; font-weight: bold; color: #6a7173;" >Heading</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi. Pellentesque non dui ut orci bibendum pharetra id ac est. Suspendisse nec tempus nisl. Donec vitae elit sem. Sed vel risus id nibh vulputate hendrerit. Class metus. </div>
						<div style="margin-top: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
						<div style="margin-top: 10px;">Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
				</div>
				<div style="width: 300px; float: left; margin-top: 80px; font-size: 12px;">
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Medium Data Image" width="68px" /></div>
					<div style="font-size: 16px; font-weight: bold; margin-bottom: 5px; color: #6a7173;" >Heading</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi. Pellentesque non dui ut orci bibendum pharetra id ac est. Suspendisse nec tempus nisl. Donec vitae elit sem. Sed vel risus id nibh vulputate hendrerit. Class metus. </div>
						<div style="margin-top: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
						<div style="margin-top: 10px;">Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
				</div>
			</div>
			<div style="width: 100%; clear: both; ">
				<div style="height: 60px; width: 100%; position: relative;"></div>

				<?php $page->openContentBox2("Who We Serve", "left", "stakeholders"); ?>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/AKSeal.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">The State of Alaska</div>
                                                <div class="content_box_inner_subtext">Subtext 1</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/Wilderness.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">The Wilderness Society</div>
                                                <div class="content_box_inner_subtext">Subtext 2</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/nature_conservancy.jpg" height="100px" /></div>
                                                <div class="content_box_inner_title">The Nature Conservancy</div>
                                                <div class="content_box_inner_subtext">Subtext 3</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/fnsblogo.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">Fairbanks North Star Borough</div>
                                                <div class="content_box_inner_subtext">Subtext 4</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/forest_service.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">US Forest Service</div>
                                                <div class="content_box_inner_subtext">Subtext 5</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/us_fish_wildlife.jpg" height="100px" /></div>
                                                <div class="content_box_inner_title">US Fish &amp; Wildlife</div>
                                                <div class="content_box_inner_subtext">Subtext 6</div>
                                        </div>
				<?php $page->closeContentBox2("stakeholders"); ?>
				<?php $page->openContentBox2("Our Affiliates", "right", "affiliates"); ?>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/UAFLogo.png" height="100px" /></div>
						<div class="content_box_inner_title">University of Alaska Fairbanks</div>
						<div class="content_box_inner_subtext">Subtext 1</div>
					</div>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/UAGPLogo.png" height="100px" /></div>
						<div class="content_box_inner_title">University of Alaska Geography Program</div>
						<div class="content_box_inner_subtext">Subtext 2</div>
					</div>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/ACCAPLogo.gif" height="100px" /></div>
						<div class="content_box_inner_title">Alaska Center for Climate Assessment &amp; Policy</div>
						<div class="content_box_inner_subtext">Subtext 3</div>
					</div>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/SNRAS.gif" height="100px" /></div>
						<div class="content_box_inner_title">School of Natural Resources &amp; Agricultural Science</div>
						<div class="content_box_inner_subtext">Subtext 4</div>
					</div>
				<?php $page->closeContentBox2("affiliates"); ?>
			</div>
			<div style="clear: both"></div>
		</div>
		</div>

<?php
$page->closePage();
