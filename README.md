ipgb-piwik
==========

ipgb-piwik is a location provider for [Piwik]( http://piwik.org ).

It gets info about IP from PECL GeoIP, then tries to look for this IP in ipgb.
If there is data in ipgb, it replaces corresponding fields in GeoIP result.

ipgb-piwik uses MySQL tables created by [ipgb-mysql]( http://github.com/stiletto/ipgb-mysql )

ipgb-piwik doesn't use piwik's table prefix, instead it always looks for tables
named ipgb_cities and ipgb_cidr in piwik database.

# How to install:

 1. Copy IpgbPlugin into plugins/ in your piwik directory.
 2. Activate plugin in piwik management console (Settings -> Plugins)
 3. Change location provider in piwik management console (Settings -> Geolocation).

