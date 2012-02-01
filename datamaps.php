<?php
include("template.php");
$page = new webPage("SNAP: Data Downloads", "", "data");
$page->openPage();
$page->pageHeader();

function getFileSize($f){
    $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
    $file_size = filesize($f);
    $file_size = round($file_size/pow(1024, ($i = floor(log($file_size, 1024)))), $i > 1 ? 1 : 0) . $sizes[$i]; 
    return $file_size;
}

?>
        <div id="main_body">
            <div id="main_content" style="min-height: 200px;" class="methods text">
            <h2>Maps &amp; Data</h2>


<p>All SNAP <a href="/data.php">data</a>, <a href="/methods.php">methods</a>, <a href="/modeling.php">models</a>, and <a href="/projects.php">project results</a> are freely available to the public. We do our best to provide data in a format that are accessible to a wide range of users. Currently, all of our data are available for download as <a target="_blank" href="http://en.wikipedia.org/wiki/GeoTIFF">GeoTIFF</a> files. Selected maps and data are available for online browsing and download via our web-based <a target="_blank" href="maps.php">Map Tool</a> and our <a href="/charts.php">Community Charts</a> page.
</p>

        </div>
    </div>
<?php
$page->closePage();
?>
