<?php

define('SNAPWEB_VERSION', 'V_DEV');

class Template {
	
	public function getHeadJavascript()
	{
		return<<<js
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
	
  public function getSubmenu($menu_value) {
    
    $menu_options = array(
      'about' => array(
        array('link', '/people.php', 'People'),
        array('link', '/collaborators.php', 'Collaborators'),
        array('link', '/outreach.php', 'Outreach'),
        array('link', '/faq.php', 'F.A.Q.')
      ),
      'data' => array(
        array('link', '/maps.php" target="_blank','Map Tool'), // note the quotes so that it works inline below
        array('link', '/charts.php','Community Charts'),
        array('link', '/gisdata.php','Data')
      ),
      'resources' => array(
        array('label', 'Learn about all of SNAP&rsquo;s resources below.  The list can be narrowed by selecting from the options below.')
      ),
      'projects' => array(
        array('label', 'Learn about all of SNAP&rsquo;s projects below.  The list can be narrowed by selecting from the options below.')
      ),
      'methods' => array(
        array('link','/methods.php', 'Overview'),
        array('link','/downscaling.php', 'Downscaling'),
        array('link','/modeling.php', 'Modeling'),
      )
    );
    if( true !== array_key_exists( $menu_value, $menu_options )) {
      throw new Exception('Menu option unspecified or does not exist.'); 
    }

    $html = '<div class="submenu">';
    foreach( $menu_options[$menu_value] as $submenuItem ) {
      switch($submenuItem[0]) {
        case 'ref': $html .= '<span target="'.$submenuItem[2].'"><a href="#">'.$submenuItem[1].'</a></span>'; break;
        case 'label': $html .= '<span style="font-size: 13.5px; color: #ffffff;">'.$submenuItem[1]."</span>"; break;
        case 'link': // fallthrough
        default: $html .= '<span><a href="'.$submenuItem[1].'">'.$submenuItem[2].'</a></span>'; break;
      }
    }
    $html .= '</div>';
    return $html;
  }
}
?>
