# This script is expected to be run only when building a deployable RPM
# package, not as part of ordinary development.
#
# The minification of the javascript happens in two phases:
# (1) do deep minification of in-house javascript
# (2) bundle up both in-house and vendor javascript into a single file,
# ./js/min.js
#
# Then, the src/Template.php file is munged to replace the unminified
# script inclusions with the minified script inclusion.
#
.PHONY: javascript
javascript :
	java -jar build/vendor/closure-compiler/compiler.jar \
--warning_level QUIET \
--compilation_level SIMPLE_OPTIMIZATIONS \
--js=./js/maps.js \
--js=./js/charts.js \
--js_output_file=./js/snap.min.js
	java -jar build/vendor/closure-compiler/compiler.jar \
--warning_level QUIET \
--compilation_level WHITESPACE_ONLY \
--js=./js/jquery-1.6.4.min.js \
--js=./js/jquery.blockUI.js \
--js=./js/jquery.hoverIntent.minified.js \
--js=./js/jquery.cycle.all.js \
--js=./js/plugins.js \
--js=./js/highcharts.js \
--js=./js/exporting.js \
--js=./js/snap.min.js \
--js_output_file=./js/min.js
	sed -ni '1h;1!H;$${;g;s:<!-- package-javascript.*end-package -->:<script type="text/javascript" src="js/min.js"/>:p;}' src/Template.php

.PHONY: version
version :
	sed -i "/V_DEV/$(SNAPWWW_RELEASE_VERSION)/g" src/Template.php

.PHONY: clean
clean : 
	rm ./js/snap.min.js
	rm ./js/min.js
