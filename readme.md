## Overview

This is the code for the static website for [LightVC](http://lightvc.org/)
rendered using Jekyll.

## Installation

See [Using Jekyll with Pages - User Documentation](https://help.github.com/articles/using-jekyll-with-pages/).

I tried those instructions on 2015-04-19 using OS X Yosemite. Nokogiri would
not install until I forced the architecture *and* forced it to use external
libraries, so in case it helps someone:

	sudo port install libxml2 libxslt libiconv

	sudo env ARCHFLAGS="-arch x86_64" gem install nokogiri -- --use-system-libraries \
	  --with-iconv-dir="/opt/local/bin/" \
	  --with-xml2-config="/opt/local/bin/xml2-config" \
	  --with-xslt-config="/opt/local/bin/xslt-config"

## Rendering

Build and serve up on port 4000 using:

	jekyll serve

## Testing

To check for broken links, images, etc.:

	rake test
