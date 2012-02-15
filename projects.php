<?php

require_once 'template.php';
require_once 'src/Project.php';
$page = new webPage('SNAP: Projects', '', 'projects');
$page->openPage();
$page->pageHeader();

?>
<div id="main_body">
    <div id="main_content" class="projects">
    <h2>Projects</h2>               
    <?php
        $projects = Project::getProjects();
        foreach($projects as $project) {
            $p = new Project($project);
            echo $p->getSummaryHtml();
        }
    ?>
    </div>
</div>
<?php
$page->closePage();
?>
