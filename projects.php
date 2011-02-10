<?php
include("template.php");
$page = new webPage("SNAP: Projects", "", "projects");
$page->openPage();
$page->pageHeader();

$server = "localhost";
$username = "snapwww_admin";
$password = "xargX11";
$database = "snapwww";
mysql_connect($server, $username, $password) or die("Unable to Connect to Database");
mysql_select_db($database);
function getProjectList(){
	$result = mysql_query("SELECT * FROM projects");
	while ($row = mysql_fetch_row($result)){
		echo "<div>".$row[0]."</div>";
	}

}

mysql_connect
?>
		<div id="main_body">
			<div id="main_content">
				<div class="subHeader">see what kind of <img style="vertical-align: middle" height="55" src="images/projects.png" /> we're working on</div>

				<!--PROJECTS -->
				<div>
					<?php getProjectList(); ?>
				</div>
			</div>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
