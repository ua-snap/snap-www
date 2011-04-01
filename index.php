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
				<div id="news_sticky" style="position: absolute;"><img src="images/sticky.jpg" /></div>
				<div id="news_container">
					<div style="position: absolute">
						<div class="news_image"><img src="images/index_images/1.jpg" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Arctic Shipping Assessment</div>As the climate warms and global commerce grows, the prospect of an arctic shipping route becomes more tangible. A new report released by the University of Alaska Fairbanks offers international policymakers guidance for navigating the political and practical ramifications of shipping in the Arctic.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
					</div>
					<div style="position: absolute; display: none;">
						<div class="news_image"><img src="images/index_images/2.jpg" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Alaska Fire Consortium Grant</div>The Alaska Fire Science Consortium at UAF has received $435,000 from the Joint Fire Science Program to provide a conduit for professional research to get into the hands of fire and land managers.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
					</div>
					<div style="position: absolute; display: none;">
						<div class="news_image"><img src="images/index_images/3.jpg" style="width: 600px; height: 300px;" /></div>
						<div class="news_content"><div class="news_title">Neogeography Lab</div>A lab in the UA Geography Program is opening new worlds to UAF students. The neogeography lab, just opened in the Scenarios Network for Alaska Planning (SNAP) building, makes Google Earth accessible and fun.</div>
						<div class="news_link"><a href="">read more &gt;&gt;</a></div>
					</div>
				</div>
				<!--
				<div id="news_container">
					<div style="position: absolute">
						<img src="images/index_images/1.jpg"  />
						<div class="news_title" style="color: #990000;" >Arctic Shipping Assessment</div>
						<div class="news_content">As the climate warms and global commerce grows, the prospect of an arctic shipping route becomes more tangible. A new report released by the University of Alaska Fairbanks offers international policymakers guidance for navigating the political and practical ramifications of shipping in the Arctic.</div>

					</div>
					<div style="position: absolute; display: none;">
						<img src="images/index_images/2.jpg" />
						<div class="news_title" style="color: #677425">Alaska Fire Consortium Grant</div>
						<div>The Alaska Fire Science Consortium at UAF has received $435,000 from the Joint Fire Science Program to provide a conduit for professional research to get into the hands of fire and land managers.</div>
					</div>
					<div style="position: absolute; display: none;">
						<img src="images/index_images/3.jpg" />
						<div class="news_title" style="color: #6a7173">Neogeography Lab</div>
						<div>A lab in the UA Geography Program is opening new worlds to UAF students. The neogeography lab, just opened in the Scenarios Network for Alaska Planning (SNAP) building, makes Google Earth accessible and fun.</div>
					</div>
				</div>
				-->
				<div id="news_nav">
				</div>
				<!--
				<div style="width: 950px;">
					<div id="news_container_prev" class="news_button" style="background-image: url('images/news_left.png'); left: 5px;"></div>
					<div id="news_container_next" class="news_button" style="background-image: url('images/news_right.png'); right: 5px;"></div>
				</div>
				-->
				<script type="text/javascript">
					$("#news_container").before('<div id="news_nav">').cycle({
						fx:     'fade', 
						speed:   1000, 
						timeout: 5000, 
				//		next:   '#news_container_next', 
				//		prev:   '#news_container_prev', 
						pause:   1,
						pager:  '#news_nav',
					});

				</script>
			</div>
			<div style="clear: both;"></div>
			<div style="width: 100%; clear: both; margin-bottom: 20px; position: relative;">
				<div style="width: 280px; margin-right: 50px; float: left; margin-top: 80px;">
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
				<div style="width: 280px; margin-right: 50px; float: left; margin-top: 80px; font-size: 12px;">
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Med Data Image" width="68px"/></div>
					<div style="font-size: 18px; font-weight: bold; color: #555555; margin-bottom: 5px;" >Heading</div>
						<div style="line-height: 18px; font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi. Pellentesque non dui ut orci bibendum pharetra id ac est. Suspendisse nec tempus nisl. Donec vitae elit sem. Sed vel risus id nibh vulputate hendrerit. Class metus. </div>
						<div style="margin-top: 10px; line-height: 18px;  font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
				</div>
				<div style="width: 280px; float: left; margin-top: 80px; font-size: 12px;">
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Medium Data Image" width="68px" /></div>
					<div style="font-size: 18px; font-weight: bold; margin-bottom: 5px; color: #555555;" >Heading</div>
						<div style="line-height: 18px;  font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi. Pellentesque non dui ut orci bibendum pharetra id ac est. Suspendisse nec tempus nisl. Donec vitae elit sem. Sed vel risus id nibh vulputate hendrerit. Class metus. </div>
						<div style="margin-top: 10px; line-height: 18px; font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
				</div>
			</div>
			<div style="width: 100%; clear: both; ">
				<div style="height: 60px; width: 100%; position: relative;"></div>

				<?php /* $page->openContentBox("Who We Serve", "left", "stakeholders"); ?>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/AKSeal.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">The State of Alaska</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/Wilderness.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">The Wilderness Society</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/nature_conservancy.jpg" height="100px" /></div>
                                                <div class="content_box_inner_title">The Nature Conservancy</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/fnsblogo.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">Fairbanks North Star Borough</div>
                                        </div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/forest_service.gif" height="100px" /></div>
                                                <div class="content_box_inner_title">US Forest Service</div>
					</div>
					<div style="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/us_fish_wildlife.jpg" height="100px" /></div>
                                                <div class="content_box_inner_title">US Fish &amp; Wildlife</div>
                                        </div>
				<?php $page->closeContentBox("stakeholders"); ?>
				<?php $page->openContentBox("Our Affiliates", "right", "affiliates"); ?>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/UAFLogo.png" height="100px" /></div>
						<div class="content_box_inner_title">University of Alaska Fairbanks</div>
					</div>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/UAGPLogo.png" height="100px" /></div>
						<div class="content_box_inner_title">University of Alaska Geography Program</div>
					</div>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/ACCAPLogo.gif" height="100px" /></div>
						<div class="content_box_inner_title">Alaska Center for Climate Assessment &amp; Policy</div>
					</div>
					<div style="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/SNRAS.gif" height="100px" /></div>
						<div class="content_box_inner_title">School of Natural Resources &amp; Agricultural Science</div>
					</div>
				<?php $page->closeContentBox("affiliates"); */ ?>
			</div>
			<div style="clear: both"></div>
			<!--	
			<div id="carousel" style="width: 975px; margin: auto; z-index: 2; position: relative; overflow: hidden; visibility: visible; border-radius: 1px; -moz-border-radius: 3px;">
				<ul style="z-index: 1;">
					<li>
					<div class="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/UAGPLogo.png" height="100px" /></div>
					</div>
					</li>
					<li>
					<div class="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/ACCAPLogo.gif" height="100px" /></div>
					</div>
					</li>
					<li>
					<div class="content_box_inner_container">
						<div class="content_box_inner_image"><img src="images/org_images/SNRAS.gif" height="100px" /></div>
					</div>
					</li>
					<li>
					<div class="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/AKSeal.gif" height="100px" /></div>
                                        </div>
					</li>
					<li>
					<div class="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/Wilderness.gif" height="100px" /></div>
                                        </div>
					</li>
					<li>
					<div class="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/nature_conservancy.jpg" height="100px" /></div>
                                        </div>
					</li>
					<li>
					<div class="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/fnsblogo.gif" height="100px" /></div>
                                        </div>
					</li>
					<li>
					<div class="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/forest_service.gif" height="100px" /></div>
					</div>
					</li>
					<li>
					<div class="content_box_inner_container">
                                                <div class="content_box_inner_image"><img src="images/org_images/us_fish_wildlife.jpg" height="100px" /></div>
                                        </div>
					</li>
				</ul>
			<div style="width: 935px; position: relative; z-index: 100; top: -85px;">
					<div id="b_prev" class="news_button" style="background-image: url('images/news_left.png'); left: 5px;"></div>
					<div id="b_next" class="news_button" style="background-image: url('images/news_right.png'); right: 5px;"></div>
			</div>
			</div>

			<script type="text/javascript">
				$(function() {
				    $("#carousel").jCarouselLite({
					auto: 10000,
					visible: 2, 
					scroll: 2,
					speed: 2000,
					btnPrev: "#b_prev",
					btnNext: "#b_next"
				    });
    				});
			</script>
			-->
			<div style="clear: both;"></div>
		</div>
		</div>

<?php
$page->closePage();
