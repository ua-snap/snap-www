<?php 
include("template.php");
$page = new webPage("Scenarios Network for Alaska &amp; Arctic Planning", "index.css");
$page->openPage();
$page->pageHeader();
?>
	<div id="main_body">
		<script src="js/index.js" type="text/javascript"></script>
		<div id="main_content">
			<div style="width: 100%; min-height: 10px;">
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
			</div>
			<div style="width: 100%; clear: both; margin-bottom: 20px; margin-top: 20px; padding-bottom: 20px;">
				<div style="width: 300px; margin-right: 20px; float: left; margin-top: 20px;">
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
				<div style="width: 300px; margin-right: 20px; float: left; margin-top: 20px; font-size: 12px;">
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Med Data Image" width="68px"/></div>
					<div style="font-size: 16px; font-weight: bold; color: #6a7173;" >Heading</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi. Pellentesque non dui ut orci bibendum pharetra id ac est. Suspendisse nec tempus nisl. Donec vitae elit sem. Sed vel risus id nibh vulputate hendrerit. Class metus. </div>
						<div style="margin-top: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
						<div style="margin-top: 10px;">Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
				</div>
				<div style="width: 300px; float: left; margin-top: 20px; font-size: 12px;">
					<div style="margin-top: 10px; width: 75px; float: right"><img src="images/med_data.png" alt="Medium Data Image" width="68px" /></div>
					<div style="font-size: 16px; font-weight: bold; margin-bottom: 5px; color: #6a7173;" >Heading</div>
						<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi. Pellentesque non dui ut orci bibendum pharetra id ac est. Suspendisse nec tempus nisl. Donec vitae elit sem. Sed vel risus id nibh vulputate hendrerit. Class metus. </div>
						<div style="margin-top: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit faucibus nibh. Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
						<div style="margin-top: 10px;">Etiam velit dolor, ornare sed vehicula nec, accumsan nec augue. In lacinia aliquet lectus volutpat adipiscing. Cras in tortor nibh, eu elementum mi.</div>
				</div>
			</div>
			<div style="width: 100%; clear: both; ">

				<?php $page->openContentBox("Who We Serve", "left", "stakeholders"); ?>
	
				<?php $page->closeContentBox(); ?>
				<?php $page->openContentBox("Our Affiliates", "right", "affiliates"); ?>
	
				<?php $page->closeContentBox(); ?>
			</div>
			<div style="clear: both"></div>
		</div>
		</div>

<?php
$page->closePage();
