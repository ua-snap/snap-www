# This script is expected to be run only when building a deployable RPM
# package, not as part of ordinary development.
#
# The minification of the javascript happens in two phases:
# (1) do deep(er) minification of in-house javascript
# (2) bundle up both in-house and vendor javascript into a single file,
# ./js/min.js
#
# Then, the src/Template.php file is munged to replace the unminified
# script inclusions with the minified script inclusion.
#
.PHONY: javascript
javascript :
# add our custom SNAP javascript here for algorithmic minification
	java -jar build/vendor/closure-compiler/compiler.jar \
--warning_level QUIET \
--compilation_level SIMPLE_OPTIMIZATIONS \
--js=./js/maps.js \
--js=./js/charts.js \
--js_output_file=./js/snap.min.js

# vendor javascript goes here
	java -jar build/vendor/closure-compiler/compiler.jar \
--warning_level QUIET \
--compilation_level WHITESPACE_ONLY \
--js=./js/underscore-min.js \
--js=./js/jquery-1.7.1.min.js \
--js=./js/jquery-ui-1.8.17.custom.min.js \
--js=./js/jquery.blockUI.js \
--js=./js/jquery.hoverIntent.minified.js \
--js=./js/jquery.cycle.all.js \
--js=./js/jquery.url.js \
--js=./js/jquery.ba-hashchange.min.js \
--js=./js/jquery.validate.min.js \
--js=./js/jquery.ba-bbq.min.js \
--js=./js/jquery.scrollTo-min.js \
--js=./js/plugins.js \
--js=./js/highcharts.js \
--js=./js/exporting.src.js \
--js=./js/snap.min.js \
--js_output_file=./js/min.js
	sed -ni '1h;1!H;$${;g;s:<!-- package-javascript.*end-package -->:<script type="text/javascript" src="js/min.js"></script>:p;}' src/Template.php

.PHONY: version
version :
	sed -i "s/V_DEV/$(SNAPWWW_RELEASE_VERSION)/g" src/Template.php

.PHONY: clean
clean : 
	rm ./js/snap.min.js
	rm ./js/min.js
