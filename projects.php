<?php
require_once 'template.php';
$page = new webPage('SNAP: Projects', '', 'projects');
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();

$tag_array = split(",", $_GET['tags']);

function getProjectListSpecial($t){
    global $tag_array;
    $projtag = "";
    if ((isset($_GET['tags']) && $_GET['tags'] != NULL) || (isset($_GET['collab']) && $_GET['collab'] != NULL)){
        $adds = "WHERE ";
    }
    if (isset($_GET['tags']) && $_GET['tags'] != NULL){
        $projtag = "pt.tag = '".$_GET['tags']."'";
    }
    if (isset($_GET['collab']) && $_GET['collab'] != NULL){
        $collab = "";
        if ((isset($_GET['tags']) && $_GET['tags'] != NULL)){
            $collab = " AND ";
        }
        $collab .= " pc.collaboratorid = '".$_GET['collab']."'";
    }
    $countsize = sizeof($tag_array);
    $order = "ORDER BY proj.createdate";
    if ($_GET['sort'] == "oldest"){
        $order = "ORDER BY proj.createdate DESC";
    }
    $query = "SELECT title, createdate, summary, proj.id, image FROM projects AS proj LEFT JOIN project_tags AS pt ON proj.id = pt.projectid LEFT JOIN project_collaborators AS pc ON proj.id = pc.projectid $adds $projtag $collab GROUP BY id $order";
    $result = mysql_query($query) or die(mysql_error());
    
    while ($row = mysql_fetch_row($result)){
        if ($row[5] == $countsize || $countsize == 1){
            echo "<div style=\"width: 440px; height: 120px; overflow: hidden; display: inline-block; margin: 10px; margin-bottom: 30px; position: relative;\">";
                echo "<div style=\"width: 174px; height: 110px; position: absolute; \"><a href=\"project_page.php?projectid=".$row[3]."\"><img alt=\"".$row[4]."\" src=\"".$row[4]."\" style=\"border: 1px solid #6a7173; padding: 3px; width: 174px; height: 110px; \" /></a></div>";
                echo "<div style=\"position: absolute; left: 190px; width: 250px;\">";
                    echo "<div style=\"font-size: 13px; color: #111111; margin-bottom: 5px;\"><a href=\"project_page.php?projectid=".$row[3]."\">".$row[0]."</a></div>";
                    
                    echo "<div style=\"font-size: 13px; \">".preg_replace("/\n/", "<br/>", $row[2])."</div>";
                    
                echo "</div>";

            echo "</div>";
        }
    }
}
?>
        <div id="main_body">
            <div id="main_content">
                <div><div class="subHeader" style="display: inline-block;">Projects</div></div>

               
                    <?php 
                        if (isset($_GET['tags'])){
                            getProjectListSpecial($_GET['tags']); 
                        } else {
                            getProjectListSpecial();
                        }
                    ?>
<?php
?>
        </div>
    </div>
<?php
$page->closePage();
?>
