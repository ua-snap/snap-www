<?php
include("template.php");
$page = new webPage("SNAP: People", "people.css", "about");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
$staff_array = array(
		array(
			
		),
		array(

		)
	);
?>

		<script type="text/javascript" src="js/people.js"></script>
		<div id="modalbackground"></div>
		<div id="modalcontainer" style="position: absolute; width: 100%; height: 100%; z-index: -100;">
			<div id="modalbox" style="border: none;">
				<div style="background-color: #97a93a; width: 100%; height: 140px;">
				<div id="modal_staff_photo" class="staff_photo" ></div>
				<div style="width: 400px; height: 100px; float: left; margin-top: 15px; color: #ffffff;">
					<div id="modal_staff_name" style="font-weight: bold; font-size: 24px; margin: 4px;"></div>
					<div id="modal_staff_title" style="font-size: 16px; margin: 4px;"></div>
					<div id="modal_staff_email" style="font-size: 16px; margin: 4px;"></div>
					<div id="modal_staff_phone" style="font-size: 16px; margin: 4px;">907-555-5555</div>
				</div>
				<div onclick="javascript:hidePeopleModalBox();" style="width: 20px; height: 20px; margin-top: 10px; margin-right: 10px; float: right; text-align: center; font-weight: bold; font-size: 20px; color: #ffffff; cursor: pointer; cursor: hand;">X</div>
				</div>
				<div style="background-color: #6a7173; width: 100%; min-height: 200px;margin-top: 10px;">
					<div id="modal_staff_bio" style="font-size: 11px; padding: 20px; color: #ffffff; overflow: hidden"></div>
				</div>
			</div>
		</div>
		<div id="main_body">


			<div id="main_content">
				<div class="subHeader" style="display: inline-block; margin-bottom: 15px;">The People of SNAP</div>
				<div>Get contact information for individuals below. <a href="#contact">Don't know who you're looking for?</a></div>
				<div style="width: 900px; margin: auto;">
					<div style="font-size: 20px; margin-top: 50px; margin-bottom: 30px;">SNAP Leaders</div>
					<?php
						$query = "SELECT id, image, title, first, last, position FROM people WHERE snap='1' AND staffgroup='1'";
						$result = mysql_query($query) or die(mysql_error());
						$num = 0;
						while ($row = mysql_fetch_array($result)){
							/*
							if ($num < 0){
								$num = rand(0,20) / 10;
							} elseif ($num > 0){
								$num = rand(0,20) / 10 - 2;
							} else {
								$num = rand(0,40) / 10 - 2;
							}
							*/
							//echo "<div style=\"-moz-transform: rotate(".$num."deg); -webkit-transform: rotate(".$num."deg); -o-transform: rotate(".$num."deg); width: 33%; display: inline-block;\">";
							echo "<div style=\"width: 33%; display: inline-block;\">";
								echo "<div style=\"position: relative; text-align: center; width: 200px;\">";
									echo "<div style=\"text-align: center; \"><img alt=\"Photo of ".$row['title']." ".$row['first']." ".$row['last']."\" style=\"padding: 3px; border: 1px solid #6a7173;\" src=\"/images/people/".$row['image']."\" /></div>";
									echo "<div style=\"font-size: 16px; margin-top: 5px; text-align: center;\">".$row['title']." ".$row['first']." ".$row['last']."</div>";
									echo "<div style=\"font-size: 14px; margin-top: 5px; text-align: center;\">".$row['position']."</div>";
									echo "<a href=\"/people_page.php?id=".$row['id']."\" style=\"position: absolute; width: 100%; height: 100%; left: 0px; top: 0px; padding: 4px;\"></a>";
								echo "</div>";
							echo "</div>";
						}
					?>
					<div style="font-size: 20px; margin-top: 50px; margin-bottom: 30px;">SNAP Staff</div>
					<?php
						$query = "SELECT id, image, title, first, last, position FROM people WHERE snap='1' AND staffgroup='2' OR staffgroup='3' ORDER BY last";
						$result = mysql_query($query) or die(mysql_error());
						$num = 0;
						while ($row = mysql_fetch_array($result)){
							/*
							if ($num < 0){
								$num = rand(0,20) / 10;
							} elseif ($num > 0){
								$num = rand(0,20) / 10 - 2;
							} else {
								$num = rand(0,40) / 10 - 2;
							}
							*/
							//echo "<div style=\"margin-top: 30px; -moz-transform: rotate(".$num."deg); -webkit-transform: rotate(".$num."deg); -o-transform: rotate(".$num."deg); width: 25%; display: inline-block;\">";
							echo "<div style=\"margin-top: 30px; width: 25%; display: inline-block;\">";
								echo "<div style=\"position: relative; text-align: center; width: 156px;\">";
									echo "<div style=\"text-align: center; \"><img alt=\"Photo of ".$row['title']." ".$row['first']." ".$row['last']."\" style=\"width: 100%; padding: 3px; border: 1px solid #6a7173;\" src=\"/images/people/".$row['image']."\" /></div>";
									echo "<div style=\"font-size: 16px; margin-top: 5px; text-align: center;\">".$row['title']." ".$row['first']." ".$row['last']."</div>";
									echo "<div style=\"font-size: 14px; margin-top: 5px; text-align: center;\">".$row['position']."</div>";
									echo "<a href=\"/people_page.php?id=".$row['id']."\" style=\"position: absolute; width: 100%; height: 100%; left: 0px; top: 0px; padding: 4px;\"></a>";
								echo "</div>";
							echo "</div>";
						}
					?>
					<div style="width: 800px; margin: auto; margin-top: 50px; "><a name="contact"></a>
						<div style="font-size: 24px;">Contact Us!</div>
						<div style="font-size: 16px; color: #222222;">
							<div style="position: relative; margin-top: 20px; height: 20px;">
								<div style="position: absolute;">Topic</div>
								<div style="position: absolute; left: 200px">
									<select style="width: 300px;">
										<option value="Becoming a SNAP collaborator">Becoming a SNAP collaborator</option>
										<option value="Technical data questions">Technical data questions</option>
										<option value="Our website (report issues, questions about usage)">Our website (report issues, questions about usage)</option>
										<option value="ALFRESCO fire simulation model">ALFRESCO fire simulation model</option>
										<option value="SNAP hiring or management">SNAP hiring or management</option>
										<option value="General inquiry">General inquiry</option>
									</select>
								</div>
							</div>
							<div style="position: relative; margin-top: 20px; height: 20px;">
								<div style="position: absolute;">Your name</div>
								<div style="position: absolute; left: 200px"><input style="width: 300px;" name="name" /></div>
							</div>
							<div style="position: relative; margin-top: 20px; height: 20px;">
								<div style="position: absolute;">Your email address</div>
								<div style="position: absolute; left: 200px"><input style="width: 300px;" name="email" /></div>
							</div>
							<div style="position: relative; margin-top: 20px; height: 20px;">
								<div style="position: absolute;">Subject line</div>
								<div style="position: absolute; left: 200px"><input style="width: 500px;" name="subject" /></div>
							</div>
							<div style="position: relative; margin-top: 20px; height: 300px;">
								<div style="position: absolute;">Message</div>
								<div style="position: absolute; left: 200px;"><textarea style="width: 500px; height: 300px;" name="message" ></textarea></div>
							</div>
						</div>
					</div>
				</div>

<!-- CONTACT SECTION -->
		</div>
	</div>
<?php
$page->closePage();
?>
