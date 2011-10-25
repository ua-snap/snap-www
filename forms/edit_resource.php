<?php
	include("connect.php");
?>
<html>
	<head>
		<script src="/js/jquery.js" type="text/javascript" ></script>
		<script src="script.js" type="text/javascript" ></script>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body style="margin: 0px;">

		<div style="position: absolute; width: 100%;">
		<div style="width: 700px; margin: auto;">
		<div style="margin-bottom: 15px; text-align: center; font-size: 24px;">Create New SNAP/ACCAP Resources</div>
		<div style="margin-bottom: 15px; text-align: center;" id="showCreate">Click <a href="edit_resource.php">Here</a></div>
		<?php
			//$q = "SHOW COLUMNS FROM projects";
			//$r = mysql_query($q);
			//while ($ro = mysql_fetch_array($r)){
			//	echo $ro[0]."<br/>";
			//}
		?>
		<form method="post" action="edit_resource.php">
			<?php
				$contacts = "<div class=\"Contact\" style=\"background-color: #ffffff;\"><div style=\"width: 300px; \">Staffer</div> <div style=\"width: 22px; margin-left: 30px; font-size: 11px; \">Primary</div><div style=\"margin-left: 30px; width: 22px; display: inline-block; font-size: 11px; \">Contact</div><div style=\"position: relative; float: right; margin-right: 10px; line-height: 20px; font-size: 11px; display: inline-block; \">Delete</div></div><script type=\"text/javascript\">$(document).ready( function (){";
				$collabs = "<div class=\"Collaborator\" style=\"border: none;\"><div style=\"width: 300px; \">Collaborator</div></div><script type=\"text/javascript\">$(document).ready( function (){";
				//Edit a project 
				if (isset($_GET['resourceid']) && $_GET['resourceid'] != NULL){
					$resourceid = $_GET['resourceid'];
					$query = "SELECT * FROM resources WHERE id='".$_GET['resourceid']."' LIMIT 1";
					$result = mysql_query($query);
					$row = mysql_fetch_array($result);
					$title = $row['title'];
					$summary = $row['summary'];
					$accap = "";
					$fsc = "";
					$snap = "";
					if ($row['accap'] == "1"){ $accap = "checked"; }
					if ($row['fsc'] == "1"){ $fsc = "checked"; }
					if ($row['snap'] == "1"){ $snap = "checked"; }
					$tags = "";
					$tag_query = "SELECT tag,resourceid FROM resource_tags WHERE resourceid='$resourceid' ORDER BY tag";
					$tag_result = mysql_query($tag_query);
					$tag_row = mysql_fetch_array($tag_result);
					$tags .= $tag_row['tag'];
					while ($tag_row = mysql_fetch_array($tag_result)){
						$tags .= ", ".$tag_row['tag'];
					}
					//Get the people associated with the project (scientists, contacts, etc.)
					$contact_query = "SELECT people.id,title,first,last,scientist,contact FROM people JOIN resource_personnel ON resource_personnel.peopleid=people.id WHERE resource_personnel.resourceid='$resourceid'";
					$contact_result = mysql_query($contact_query) or die(mysql_error());
					while ($contact_row = mysql_fetch_array($contact_result)){
						$contacts .= "addStaffer('".$contact_row['id']."', '".$contact_row['title']." ".$contact_row['first']." ".$contact_row['last']."', '".$contact_row['scientist']."', '".$contact_row['contact']."');";
					}
					$collab_query = "SELECT collaborators.id,name,image FROM collaborators JOIN resource_collaborators ON resource_collaborators.collaboratorid=collaborators.id WHERE resource_collaborators.resourceid='$resourceid'";
					$collab_result = mysql_query($collab_query) or die(mysql_error());
					while ($collab_row = mysql_fetch_array($collab_result)){
						$collabs .= "addCollaborator('".$collab_row['id']."', '".$collab_row['name']."', '".$collab_row['image']."');";
					}
				}
				//Process changes to the project
				elseif (isset($_POST['resourceid']) && $_POST['resourceid'] != NULL){
					$resourceid = $_POST['resourceid'];
					$title = $_POST['title'];
					$title = htmlspecialchars($title, ENT_QUOTES);	
					//echo $title."<br />";
					$summary = $_POST['summary'];
					$summary = htmlspecialchars($summary, ENT_QUOTES);
					$accap_chk = "";
					$fsc_chk = "";
					$snap_chk = "";
					if ($_POST['accap'] == "on"){ $accap_chk = '1'; }
					if ($_POST['fsc'] == "on"){ $fsc_chk = '1'; }
					if ($_POST['snap'] == "on"){ $snap_chk = '1'; }
					$update = "UPDATE resources SET title='".$title."', summary='$summary', accap='$accap_chk', fsc='$fsc_chk', snap='$snap_chk' WHERE id='$resourceid'";
					//echo $q;
					mysql_query($update) or die(mysql_error());

					$tag_array = split(",", $_POST['tags']);
					$delete = mysql_query("DELETE FROM resource_tags WHERE resourceid='$resourceid'");
					$tag_insert = "";
					if (sizeof($tag_array) > 0){
						$tag_insert = "INSERT INTO resource_tags (tag, resourceid) VALUES ('".trim($tag_array[0])."', '$resourceid')";
					}
					for ($i = 1; $i < sizeof($tag_array); $i++){
						//echo "<div>".trim($tag_array[$i])."</div>";
						$tag_insert .= ", ('".trim($tag_array[$i])."', '$resourceid')";
					}
					$tags = "";
					$tag_query = "SELECT tag,resourceid FROM resource_tags WHERE resourceid='$resourceid' ORDER BY tag";
					$tag_result = mysql_query($tag_query);
					$tag_row = mysql_fetch_array($tag_result);
					$tags .= $tag_row['tag'];
					while ($tag_row = mysql_fetch_array($tag_result)){
						$tags .= ", ".$tag_row['tag'];
					}
					mysql_query($tag_insert);
					$tags = $_POST['tags'];
					/* Handle the Staffer changes */
					$delete = mysql_query("DELETE FROM resource_personnel WHERE resourceid='$resourceid'");
					if (sizeof($_POST['staffer']) > 0){	
						$contact_updates = "INSERT INTO resource_personnel (resourceid, peopleid, scientist, contact) VALUES ";
					}
					for ($i = 0; $i < sizeof($_POST['staffer']); $i++){
						if ($i > 0){
							$contact_updates .= ", ";
						}
						$sci = 0;
						$con = 0;
						if ($_POST['staffer'][$i]['ss'] == 'on'){ $sci = 1; }	
						if ($_POST['staffer'][$i]['sc'] == 'on'){ $con = 1; }	
						$contact_updates .= " ('$resourceid', '".$_POST['staffer'][$i]['id']."', '$sci', '$con')";
					}
					mysql_query($contact_updates);
					$contact_query = "SELECT people.id,title,first,last,scientist,contact FROM people JOIN resource_personnel ON resource_personnel.peopleid=people.id WHERE resource_personnel.resourceid='$resourceid'";
					$contact_result = mysql_query($contact_query) or die(mysql_error());
					while ($contact_row = mysql_fetch_array($contact_result)){
						$contacts .= "addStaffer('".$contact_row['id']."', '".$contact_row['title']." ".$contact_row['first']." ".$contact_row['last']."', '".$contact_row['scientist']."', '".$contact_row['contact']."');";
					}
					/* Handle the Collaborator changes */
					$delete = mysql_query("DELETE FROM resource_collaborators WHERE resourceid='$resourceid'");
					if (sizeof($_POST['collaborator']) > 0){	
						$collab_updates = "INSERT INTO resource_collaborators (resourceid, collaboratorid) VALUES ";
					}
					for ($i = 0; $i < sizeof($_POST['collaborator']); $i++){
						if ($i > 0){
							$collab_updates .= ", ";
						}
						$collab_updates .= " ('$resourceid', '".$_POST['collaborator'][$i]."')";
					}
					mysql_query($collab_updates);

					

				} elseif (isset($_POST['title']) && $_POST['title'] != NULL && $_POST['resourceid'] == NULL){
					$title = $_POST['title'];
					$summary = $_POST['summary'];
					$accap_chk = "";
					$fsc_chk = "";
					$snap_chk = "";
					if ($_POST['accap'] == "on"){ $accap_chk = '1'; }
					if ($_POST['fsc'] == "on"){ $fsc_chk = '1'; }
					if ($_POST['snap'] == "on"){ $snap_chk = '1'; }
					$insert_resource = "INSERT INTO resources (title, summary, createdate, accap, fsc, snap) VALUES ";
					$insert_resource .= "('$title', '$summary', '".date('Y-m-d')."', '$accap', '$fsc', '$snap')";
					mysql_query($insert_resource);
					$resourceid = mysql_insert_id();
					$tag_array = split(",", $_POST['tags']);
					$tag_insert = "";
					if (sizeof($tag_array) > 0){
						$tag_insert = "INSERT INTO resource_tags (tag, resourceid) VALUES ('".trim($tag_array[0])."', '$resourceid')";
					}
					for ($i = 1; $i < sizeof($tag_array); $i++){
						$tag_insert .= ", ('".trim($tag_array[$i])."', '$resourceid')";
					}
					$tags = "";
					$tag_query = "SELECT tag,resourceid FROM resource_tags WHERE resourceid='$resourceid' ORDER BY tag";
					$tag_result = mysql_query($tag_query);
					$tag_row = mysql_fetch_array($tag_result);
					$tags .= $tag_row['tag'];
				}
				echo "<input type=\"hidden\" name=\"resourceid\" value=\"$resourceid\" />";
				echo "<div>Title <input style=\"width: 550px; float: right;\" type=\"text\" name=\"title\" value=\"$title\" /></div>";
				echo "<div style=\"height: 320px;margin-top: 20px;\">Summary <textarea style=\"vertical-align: top; width: 550px; height: 300px; float: right;\" name=\"summary\">$summary</textarea></div>";
				echo "<div style=\"height: 20px;\">Tags <input style=\"width: 550px; float: right;\" type=\"text\" name=\"tags\" value=\"$tags\" /></div>";
				echo "<div style=\"margin-top: 20px; margin-bottom: 10px; height: 20px;\">
					<div style=\"float: left;\">Organization</div>
					<div style=\"width: 550px; float: right;\">
						ACCAP <input type=\"checkbox\" style=\"margin-right: 30px;\" name=\"accap\" $accap />
						Fire Science <input type=\"checkbox\" style=\"margin-right: 30px;\" name=\"fsc\" $fsc />
						SNAP<input type=\"checkbox\" name=\"snap\" $snap /></div>
				</div>";
				$contacts .= "});</script><div style=\"margin-bottom: 10px;\"><div style=\"height: 22px; display: inline-block; border-radius: 3px; padding: 3px; color: #222222; width: 300px; vertical-align: middle\"><a id=\"add_staffer\" >Add Staffer</a></div> </div>";
				echo "<div style=\"margin-top: 20px; margin-bottom: 20px;\"><div style=\"float: left;\">People</div><div style=\"width: 550px; float: right;\">$contacts</div></div>";
				$collabs .= "});</script><div style=\"margin-bottom: 10px;\"><div style=\"height: 22px; display: inline-block; border-radius: 3px; padding: 3px; color: #222222; width: 300px; vertical-align: middle\"><a id=\"add_collab\" >Add Collaborator</a></div></div>";
				echo "<div style=\"clear: both; margin-top: 20px; margin-bottom: 20px; min-height: 40px;\"><div style=\"float: left;\">Collaborators</div><div style=\"width: 550px; float: right;\">$collabs</div></div>";
				echo "<div style=\"margin-top: 40px;\"> <input style=\"background-color: #0066cc; color: #dddddd; border-color: #666666; font-size: 16px; padding: 2px; width: 270px; float: right; margin-left: 10px; \" type=\"submit\" value=\"Save Changes\" /><input id=\"cancel_button\" style=\"background-color: #cccccc; color: #222222; border-color: #666666; font-size: 16px; padding: 2px; width: 270px; float: right;\" type=\"submit\" value=\"Cancel\" /></div>";


			?>	
				<script type="text/javascript">
					$(document).ready( function() {

					});
					$("#cancel_button").click( function() {
						window.open = "edit_resource.php?resourceid=".$_POST['resourceid'];
					});
					$("#add_collab").click( function() {
						showCollaboratorSelection();
					});
					$("#add_staffer").click( function() {
						showStafferSelection();
					});

				</script>
			<div style="clear: both"></div>
		</form>
		<script type="text/javascript">

		</script>
		<div style="margin-bottom: 15px; text-align: center; font-size: 24px;">Edit Existing SNAP/ACCAP Resources</div>
		<?php
		$query = "SELECT * FROM resources ORDER BY title";
		$result = mysql_query($query) or die(mysql_error());
		while ($row = mysql_fetch_array($result)){
			echo "<div style=\"margin-bottom: 5px;\"><a href=\"edit_resource.php?resourceid=".$row['id']."\">".$row['title']."</a></div>";
		}
		?>
		</div>
		</div>
		<div id="modalback" style="position: absolute; background-color: #333333; opacity: 0.5; height: 150%; width: 100%; display: none;"></div>
		<div id="modalbox_staffer" style="display: none; position: absolute; height: 100%; width: 100%; top: 200px;">
			<div style="width: 300px; border: 5px solid #3399ff; height: 400px; margin: auto; background-color: #ffffff; border-radius: 10px; overflow: hidden;">
				<div id="modalbox_staffer_close" style="float: right; padding: 10px;"><a>X</a></div>
				<div style="margin: 10px;">Click a staff member to add them to this project</div>
				<div id="staffer_list" style="position: relative; margin: 10px; overflow: auto; height: 330px; font-size: 16px;">
					<?php
					$contacts = "";
					$contact_query = "SELECT people.id,title,first,last FROM people";
					$contact_result = mysql_query($contact_query) or die(mysql_error());
					while ($contact_row = mysql_fetch_array($contact_result)){
						$contacts .= "<div><a id='stafflist_".$contact_row['id']."'>".$contact_row['title']." ".$contact_row['first']." ".$contact_row['last']."</a></div>";
						$contacts .= "<script type='text/javascript'>$('#stafflist_".$contact_row['id']."').click( function () { addStaffer('".$contact_row['id']."', '".$contact_row['title']." ".$contact_row['first']." ".$contact_row['last']."'); });</script>";
					}
					echo $contacts;
					?>
				</div>
				<script type="text/javascript">
					$("#modalbox_staffer_close").click( function() {
						hideStafferSelection();
					});
				</script>
			</div>
		 </div>
		<div id="modalbox_collab" style="display: none; position: absolute; height: 100%; width: 100%; top: 200px;">
			<div style="width: 300px; border: 5px solid #3399ff; height: 400px; margin: auto; background-color: #ffffff; border-radius: 10px; overflow: hidden;">
				<div id="modalbox_collab_close" style="float: right; padding: 10px;"><a>X</a></div>
				<div style="margin: 10px;">Click a collaborating organization to the project</div>
				<div id="collab_list" style="position: relative; margin: 10px; overflow: auto; height: 330px; font-size: 16px;">
					<?php
					$collab = "";
					$collab_query = "SELECT id,name,image FROM collaborators";
					$collab_result = mysql_query($collab_query) or die(mysql_error());
					while ($collab_row = mysql_fetch_array($collab_result)){
						$collab .= "<div><a id='collablist_".$collab_row['id']."'>".$collab_row['name']."</a></div>";
						$collab .= "<script type='text/javascript'>$('#collablist_".$collab_row['id']."').click( function () { addCollaborator('".$collab_row['id']."', '".$collab_row['name']."', '".$collab_row['image']."'); });</script>\r\n";
					}
					echo $collab;
					?>
				</div>
				<script type="text/javascript">
					$("#modalbox_collab_close").click( function() {
						hideCollaboratorSelection();
					});
				</script>
			</div>
		 </div>
	</body>
</html>
