<?php

class Template {
	
	public function getHeadJavascript()
	{
		return<<<'js'
<script type="text/javascript" comment="Google Analytics">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-3978613-3']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
</script>

<!-- package-javascript
All external javascript file, including the minified SNAP javascript,
are listed here and in the project makefile to be bundled into a single
javascript file.  The 'package-javascript' and 'end-package' tokens
are used to determine the region to be replaced with a single script inclusion.
-->
<script src="js/jquery-1.6.4.min.js" type="text/javascript" ></script>
<script src="js/jquery.blockUI.js" type="text/javascript" ></script>
<script src="js/jquery.hoverIntent.minified.js" type="text/javascript"></script>
<script src="js/jquery.cycle.all.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script src="js/charts.js" type="text/javascript"></script>
<script src="js/maps.js" type="text/javascript"></script>
<!-- end-package -->

<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=snapweb"></script>
<script type="text/javascript" comment="AddThis Configuration">
    var addthis_config =
    {
       ui_508_compliant: true,
       ui_hover_direction: 1,
       services_compact: 'facebook,twitter,google_plusone,print,email'
    }
</script>
js;
	}
		
}

?>