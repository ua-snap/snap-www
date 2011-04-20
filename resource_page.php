<?php
include("template.php");
$page = new webPage("SNAP: Resources", "resources.css", "resources");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
?>

		<div id="main_body">
			<div id="main_content">
				<?php
					$query = "SELECT * FROM publications WHERE id='".$_GET['resourceid']."' LIMIT 1";
					$result = mysql_query($query);
					$project = mysql_fetch_array($result);
				?>
				
				<div class="back_button" style="margin-top: 20px; margin-bottom: 30px; width: 215px;"><span><img style="vertical-align: top; display: inline-block;" src="/images/back_arrow.png" /></span><span style="float: right; padding-right: 8px;">View Other Resources<span><a href="resources.php" style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></a></div>

				<div style="width: 950px; margin: auto;">
					<div style="float: left; width: 520px;">
						<div style="color: #71797b; margin-left: 20px; font-size: 14px; margin-bottom: 5px;">Resource</div>
						<div style="font-size: 26px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $project['title']; ?></div>
						<div style="font-size: 14px; line-height: 20px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $project['summary']; ?></div>

						<div style="color: #242d2f; margin-left: 20px; font-size: 22px; ">Attachments</div>
					</div>
					<div style="float: right; width: 330px;">

						<div style="line-height: 20px;">

							<?php 
								$query = "SELECT collaborators.id,collaborators.name,collaborators.image FROM collaborators JOIN project_collaborators ON collaborators.id=project_collaborators.collaboratorid WHERE project_collaborators.projectid='".$_GET['projectid']."' ";

								$result = mysql_query($query);
								$result = mysql_query($query) or die (mysql_error());
								if (mysql_num_rows($result) > 0){
									echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px; margin-bottom: 10px;\">Collaborators</div>";
									echo "<div>";
									while ($collab = mysql_fetch_array($result)){
										echo "<div style=\"display: inline-block; margin-right: 5px; vertical-align: top \">";
											$size = getimagesize("images/collaborators/".$collab['image']);
											$width = $size[0];
											$height = $size[1];
											$ratio = $width / ($height / 75);
											if ($ratio < 75){
												$ratio = 75;
											}
											//echo "<div style=\"width: 150px; margin-bottom: 15px; text-align: left; font-size: 12px;\">".$collab['name']."</div>";
											echo "<div style=\"height: 150px; width: 150px;\">";

												echo "<img alt=\"".$collab['name']."\" src=\"/images/collaborators/".$collab['image']."\" style=\"width: 150px; vertical-align: middle;\" />";
											echo "</div>";
										echo "</div>";
									}
									echo "</div>";
								}
							?>
						</div>
						<div>

							<?php
								$query = "SELECT people.id, title, first, last, organization FROM people JOIN project_personnel ON people.id = project_personnel.peopleid WHERE project_personnel.projectid = '".$project['id']."' AND scientist=true";
								$result = mysql_query($query) or die (mysql_error());
								if (mysql_num_rows($result) > 0){
									echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px;\">Primary Scientists</div>";
									echo "<div>";
									while ($sci = mysql_fetch_array($result)){
										$fullname = $sci['title']." ".$sci['first']." ".$sci['last'];
										echo "<div style=\"margin-top: 5px;\"><a href=\"people_page.php?id=".$sci['id']."\">".$fullname."</a> (".$sci['organization'].")</div>";
									}
									echo "</div>";
								}
							?>
						</div>
						<div>
							<?php
								$query = "SELECT people.id, title, first, last, email, phone FROM people JOIN project_personnel ON people.id = project_personnel.peopleid WHERE project_personnel.projectid = '".$project['id']."' AND contact=true";
								$result = mysql_query($query) or die (mysql_error());
								if (mysql_num_rows($result) > 0){
									echo "<div style=\"font-weight: bold; color: #6a7173; margin-top: 30px;\">Contacts</div>";
									echo "<div>";
									while ($con = mysql_fetch_array($result)){

										$fullname = $con['title']." ".$con['first']." ".$con['last'];
										echo "<div style=\"margin-bottom: 15px;\">";
										echo "<div style=\"margin-top: 5px;\"><a href=\"people_page.php?id=".$con['id']."\">".$fullname."</a></div>";

										echo "<div style=\"margin-top: 5px;\"><a href=\"\">".$con['email']."</a></div>";
										echo "<div style=\"margin-top: 5px;\">".preg_replace("/(\d{3})(\d{3})(\d{4})/", "($1) $2-$3", $con['phone'])."</div>";
										echo "</div>";
									}
									echo "</div>";
								}
							?>
						</div>
					</div>
				</div>
	
	
			</div>
		</div>
<?php
$page->closePage();
?>
