<?php
require_once 'template.php';
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
?>

<div id="map_header">
    <a href="<?php echo Config::$url ?>">
        <img id="map_logo" alt="Map Tool Logo" src="images/snap_acronym_rgb.gif" />
    </a>

    <div id="model_menu">
      <p>currently viewing</p>
      <div id="mapMenu">
        <!-- populated by javascript -->
    </div>
</div>
</div>

<div id="map_menu_bar" class="map_bar">
 <div id="textLinks"></div>


 <div class="horiz_bar_right">

    <div class="social">
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style sharewrapper" style="display: none; height: 30px;">
            <a class="addthis_button_email"><img src="images/email.png"/></a>    
            <a class="addthis_button_facebook"><img src="images/facebook.png"/></a>
            <a class="addthis_button_twitter"><img src="images/twitter-2.png"/></a>
            <a style="position: relative; top: 4px; left: 2px" class="addthis_button_google_plusone" g:plusone:size="standard" g:plusone:annotation="none"></a>
        </div>
        <!-- AddThis Button END -->

        <a class="sharebutton">
            <img src="/images/share.png" style="margin: auto; padding-top: 4px; display: block;" alt="Share"/>
        </a>

    </div>
</div>


<div id="exportBlock">
  <span><a onclick="window.print(); return false;">Print</a></span>
  <span><a id="export_link">Link</a></span>

</div>
</div>
</div>

<div id="map_wrapper">

    <div id="link_box">
        <p>You can copy and paste this link to share your current view of this map.</p>
        <label for="link_field">Link:</label>
        <input id="link_field" type="text" style="width: 220px;" value="" />
        <button>Close</button>
    </div>


    <div id="map_canvas"></div>
    <div id="legend_wrapper">
        <div id="legend_background"></div>
        <div id="legend"></div> 
    </div>
</div>

<div id="map_footer">
    <div class="map_bar">
        <span class="buttons">
            <a href="data.php">Download Data</a>
            <a id="metadataLink"  href="#">View Metadata</a>
        </span>
        <span class="logoBlock"><a href="http://www.uaf.edu"><img alt="UAF Logo" style="height: 28px;" src="images/UAFLogo_A_white.png" /></a></span>
    </div>
</div>

<div id="metadataModal"></div>

<div id="printFooter">
    <address>
        <strong>Scenarios Network for Alaska and Arctic Planning</strong><br/>
        snap.uaf.edu<br/>
        3352 College Road, Fairbanks AK 99709<br/>
        nlfresco@alaska.edu | tel 907.474.2405 | fax 907.474.7151<br/>
    </address>
    <img src="images/snap_acronym_screen_color_lg.gif" alt="logo" />
</div>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">

$(document).ready(function() { 

    // Close any open menus when click outside of them
    $('body').click(function(e) {
        $('.menuOption').parent().removeClass('active');
        $('.menuOptions').hide();
        $('.menuSpacer').removeClass('menuSpacerToggle');
    });

    // Merge URL-defined properties into the defaults.
    snap.state = $.bbq.getState(undefined, true);

    // Coerce types so Google Maps can read the values, and
    // set defaults as required.
    snap.state.zoom = parseInt(snap.state.zoom) || snap.defaults.zoom;
    snap.state.latitude = parseFloat(snap.state.latitude) || snap.defaults.latitude;
    snap.state.longitude = parseFloat(snap.state.longitude) || snap.defaults.longitude;
    snap.state = _.defaults(snap.state, snap.defaults);

    google.maps.event.addDomListener(window, 'load', function(){

        init();
        resize();          
        
        google.maps.event.addListenerOnce(map, 'idle', function(){
            addMap();

            // When the user finishes dragging the map, update the lat/lon/zoom.  
            google.maps.event.addListener(map, 'idle', function(){
                writeHash();
            });
        });
    });

    // the resize function is defined in the maps.js file.
    $(window).resize(resize);

    $('#export_link').click( function() {
        $('#link_box').fadeIn(200, function() {
            $('#link_field').val(window.location.href).focus().select();
        });
        $('#link_box button').button().click(function() { $('#link_box').fadeOut(); });
    });
    
});

$('.social').hover(
    function(e) {
        $('.sharebutton').fadeOut(200);
        $('.addthis_toolbox').fadeIn(200);
    },

    function(e) {
        $('.addthis_toolbox').fadeOut(200);
        $('.sharebutton').fadeIn(200);
    }
);

</script>

<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eb8496858e19dd4"></script>

</body>
</html>