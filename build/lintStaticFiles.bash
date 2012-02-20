#! /bin/bash

# This script just checks to see if there are any static image files that are 
# referenced nowhere in the CSS/HTML/Javascript files, so they can be removed.

IMAGES=/var/www/html/images/*

for f in $IMAGES
do
	basename=`basename $f`
	grep -qs $basename js/* *.php *.html css/* src/*.php
 	if [ $? -ne 0 ]
 	then
 		echo "$f is not in use, DELETE $f"
	fi
done