<?php
include("template.php");
$page = new webPage("SNAP: Methods", "", "");
$page->openPage();
$page->pageHeader();
?>
        <div id="main_body">
            <div id="main_content" class="text methods">
                <h2>Sorry, we couldn't find that page.</h2>
                <p>Are you looking for one of these things?</p>
                <ul>
                <li><a href="/charts.php">Community Charts</a></li>
                <li><a href="/maps.php" target="_blank">Map Tool</a></li>
                <li><a href="/methods.php">Methods SNAP uses to create scenarios</a></li>
                <li><a href="/people.php#contact">How to contact SNAP</a></li>
                <li><a href="/index.php">SNAP home page</a></li>
                </ul>
                <p>If you need further help, please <a href="/people.php#contact">contact us</a>!</p>

                <!-- <div id="cse" style="width: 100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : 'en'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('001676845607960334633:vog79or7qsi');
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    customSearchControl.draw('cse');
  }, true);
<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />

</script>
-->

        </div>
    </div>
<?php
$page->closePage();
?>
