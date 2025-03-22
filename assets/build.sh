#!/usr/bin/env bash

sass --no-source-map -q -s compressed sass/calentim.scss css/calentim.min.css
uglifyjs --compress --mangle --output js/calentim.min.js -- js/calentim.js
