<?php
include("template.php");
$page = new webPage("SNAP: Projects", "projects.css", "projects");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
$tag_array;
$tag_array = split(",", $_GET['tags']);

/*
function getProjectList(){
    $result = mysql_query("SELECT title,createdate,summary,id FROM projects ORDER BY createdate DESC");
    while ($row = mysql_fetch_row($result)){
        echo "<div style=\"margin-top: 20px; width: 600px;\">";
            echo "<div style=\"font-size: 20px; \"><a href=\"project_page.php?projectid=".$row[3]."\">".$row[0]."</a></div>";
            echo "<div style=\"position: relative; height: 15px; margin-bottom: 5px;\">";
                echo "<div style=\" position: absolute; font-size: 12px; color: #444444;\">Created: ".$row[1]."</div>";
                echo "<div style=\"position: absolute; margin-left: 150px; font-size: 12px;\"> Topics: ";
                $tag_result = mysql_query("SELECT tag FROM project_tags WHERE projectid='".$row[3]."'");
                $tag_row = mysql_fetch_array($tag_result);
                    echo "<a href=\"\">".$tag_row[0]."</a>";
                while ($tag_row = mysql_fetch_array($tag_result)){
                    echo ", <a href=\"\">".$tag_row[0]."</a>";
                }
                echo "</div>";
            echo "</div>";
            echo "<div>".preg_replace("/\n/", "<br/>", $row[2])."</div>";
    
        echo "</div>";
    }
}

*/
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
