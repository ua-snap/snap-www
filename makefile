# This script is expected to be run only when building a deployable RPM
# package, not as part of ordinary development.
#
# minify javascript
.PHONY: javascript
javascript :
	java -jar build/vendor/closure-compiler/compiler.jar \
--warning_level QUIET \
--compilation_level ADVANCED_OPTIMIZATIONS \
--js=./js/maps.js \
--js=./js/charts.js \
--js_output_file=./js/snap.min.js
	sed -ni '1h;1!H;$${;g;s:<!-- make-dev.*end-make-dev -->:<script type="text/javascript" src="js/snap.min.js"/>:p;}' src/Template.php

.PHONY: clean
clean : 
	rm ./js/snap.min.js
