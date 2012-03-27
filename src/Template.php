<?php

define('SNAPWEB_VERSION', 'V_DEV');
require_once 'src/Config.php';

class Template {
	
  // This does two important things:
  // (1) lists the required javascript files in a structure that allows us to bundle/minify them
  // (2) prints a Javascript object containing configuration that we're interpolating from PHP.
	public function getHeadJavascript()
	{

    $url = Config::$url;
    $googleAnalyticsToken = Config::$googleAnalyticsToken;

		return<<<js
<script type="text/javascript" data-comment="Google Analytics">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '$googleAnalyticsToken']);
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

If you add a file here, you must add it to the makefile for packaging.  See the README in the js/ directory.
-->
<script src="js/underscore-min.js" type="text/javascript" ></script>
<script src="js/jquery-1.7.1.min.js" type="text/javascript" ></script>
<script src="js/jquery.blockUI.js" type="text/javascript" ></script>
<script src="js/jquery.hoverIntent.minified.js" type="text/javascript"></script>
<script src="js/jquery.cycle.all.js" type="text/javascript"></script>
<script src="js/jquery.url.js" type="text/javascript"></script>
<script src="js/plugins.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.src.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.8.17.custom.min.js" type="text/javascript"></script>
<script src="js/jquery.ba-hashchange.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/jquery.ba-bbq.min.js" type="text/javascript"></script>
<script src="js/jquery.scrollTo-min.js" type="text/javascript"></script>

<script src="js/charts.js" type="text/javascript"></script>
<script src="js/maps.js" type="text/javascript"></script>
<!-- end-package -->

<script type="text/javascript">

// Interpolate server-side configs as appropriate
window.snapConfig = {
  url: '$url',
  geonetworkMetadataUrl: 'http://athena.snap.uaf.edu:8080/geonetwork/srv/en/metadata.show.embedded?id=',
  dataPath: '/data/'
}
</script>

js;
	}
	
  public function getSubmenu($menu_value, $activeSubmenu = null) {

    $menu_options = array(
      'about' => array(
        array('link', '/people.php', 'People'),
        array('link', '/collaborators.php', 'Collaborators'),
        array('link', '/outreach.php', 'Outreach'),
        array('link', '/faq.php', 'F.A.Q.'),
        array('link', '/logos.php', 'Logos')
      ),
      'data' => array(
        array('link', '/maps.php" target="_blank','Map Tool'), // note the embedded double-quote so that it works inline below
        array('link', '/charts.php','Community Charts'),
        array('link', '/data.php','Data')
      ),
      'resources' => array(
        array('label', 'Learn about all of SNAP&rsquo;s resources below.')
      ),
      'projects' => array(
        array('label', 'Learn about all of SNAP&rsquo;s projects below.')
      ),
      'methods' => array(
        array('link','/downscaling.php', 'Downscaling'),
        array('link','/modeling.php', 'Modeling'),
        array('link','/planning.php', 'Planning'),
        array('link','/uncertainty.php', 'Uncertainty'),
      )
    );
    if( true !== array_key_exists( $menu_value, $menu_options )) {
      throw new Exception('Menu option unspecified or does not exist.'); 
    }

    $html = '<div class="submenu">';
    $class = '';
    foreach( $menu_options[$menu_value] as $submenuItem ) {
      $class = ( isset($submenuItem[2]) && ($submenuItem[2] === $activeSubmenu) ) ? 'class="active" ' : '';

      switch($submenuItem[0]) {
        case 'ref': $html .= '<span '.$class.' target="'.$submenuItem[2].'"><a href="#">'.$submenuItem[1].'</a></span>'; break;
        case 'label': $html .= '<span '.$class.'style="font-size: 13.5px; color: #ffffff;">'.$submenuItem[1]."</span>"; break;
        case 'link': // fallthrough
        default: $html .= '<span '.$class.' ><a href="'.$submenuItem[1].'">'.$submenuItem[2].'</a></span>'; break;
      }
    }
    $html .= '</div>';
    return $html;
  }
}
?>
