<?php
include("template.php");
$page = new webPage("SNAP: Project", "", "projects");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
?>

		<div id="main_body">
			<div id="main_content">
				<?php
					$query = "SELECT * FROM projects WHERE id='".$_GET['projectid']."' LIMIT 1";
					$result = mysql_query($query);
					$project = mysql_fetch_array($result);
				?>
				
				<div class="back_button" style="margin-top: 20px; margin-bottom: 30px; width: 200px;"><span><img style="vertical-align: top; display: inline-block;" src="/images/back_arrow.png" /></span><span style="float: right; padding-right: 8px;">View Other Projects<span><a href="projects.php" style="position: absolute; width: 100%; height: 100%; left: 0px; top: 0px;"></a></div>

				<div style="width: 950px; margin: auto;">
					<div style="float: left; width: 520px;">
						<div style="font-size: 28px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $project['title']; ?></div>
						<div style="font-size: 14px; line-height: 20px; color: #242d2f; margin-left: 20px; margin-bottom: 10px;"><?php echo $project['summary']; ?></div>
					</div>
					<div style="float: right; width: 330px;">
						<div style="line-height: 20px;">
							<div style="font-weight: bold; color: #6a7173;">Collaborators</div>
							<div style="">
							<?php 
								$query = "SELECT collaborators.id,collaborators.name,collaborators.image FROM collaborators JOIN project_collaborators ON collaborators.id=project_collaborators.collaboratorid WHERE project_collaborators.projectid='".$_GET['projectid']."'";

								$result = mysql_query($query);
								while ($collab = mysql_fetch_array($result)){
									echo "<div>".$collab['name']."</div>";
								}
							?>
							</div>
						</div>
					</div>
				</div>
	
	
			</div>
		</div>
<?php
$page->closePage();
?>
