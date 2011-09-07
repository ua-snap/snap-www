<?php
include("template.php");
$page = new webPage("SNAP: Search", "", "");
$page->openPage();
$page->pageHeader();
?>
		<div id="main_body">
			<div id="main_content">
				<div class="subHeader" style="font-size: 26px;">Can't find what you're looking for?  Try searching below...</div>
				<div id="cse" style="width: 100%;">Loading</div>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript"> 
  google.load('search', '1', {language : 'en'});
  google.setOnLoadCallback(function() {
    var customSearchControl = new google.search.CustomSearchControl('001676845607960334633:vog79or7qsi');
    customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
    customSearchControl.draw('cse');
  }, true);
</script>
<link rel="stylesheet" href="http://www.google.com/cse/style/look/default.css" type="text/css" />
      
			</div>
<?php
?>
		</div>
	</div>
<?php
$page->closePage();
?>
