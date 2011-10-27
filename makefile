# minify javascript
.PHONY: javascript
javascript :
	java -jar build/vendor/closure-compiler/compiler.jar \
--warning_level QUIET \
--compilation_level ADVANCED_OPTIMIZATIONS \
--js=./js/exporting.js \
--js=./js/index.js \
--js=./js/maps.js \
--js=./js/people.js \
--js=./js/plugins.js \
--js=./js/site.js \
--js_output_file=./js/snap.min.js
	sed -ni '1h;1!H;$${;g;s:<!-- make-dev.*end-make-dev -->:<script type="text/javascript" src="js/snap.min.js"/>:p;}' template.php

.PHONY: clean
clean : 
	rm ./js/snap.min.js
