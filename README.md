ipgb-piwik
==========

ipgb-piwik is a location provider for [Piwik]( http://piwik.org ).

It gets info about IP from PECL GeoIP, then tries to look for this IP in ipgb.
If there is data in ipgb, it replaces corresponding fields in GeoIP result.

ipgb-piwik uses MySQL tables created by [ipgb-mysql]( http://github.com/stiletto/ipgb-mysql )

ipgb-piwik doesn't use piwik's table prefix, instead it always looks for tables
named ipgb_cities and ipgb_cidr in piwik database.

# How to install:

 1. Copy Ipgb.php into plugins/UserCountry/LocationProvider/GeoIp/ in your piwik directory.
 2. Add `require_once PIWIK_INCLUDE_PATH . '/plugins/UserCountry/LocationProvider/GeoIp/Ipgb.php';`
 to plugins/UserCountry/LocationProvider/GeoIp.php
 3. Change location provider in piwik management console (Settings -> Geolocation).

