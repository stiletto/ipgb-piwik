<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\UserCountry\LocationProvider\GeoIp;

use Piwik\Piwik;
use Piwik\Db;
use Piwik\Plugins\UserCountry\LocationProvider\GeoIp;

class Ipgb extends Pecl
{
    const ID = 'geoip_ipgb';
    const TITLE = 'GeoIP (PECL) + IPGB';

    public function getLocation($info)
    {
        $result = parent::getLocation($info);
        $ip = ip2long($this->getIpFromInfo($info));
        $ipgbr = Db::fetchRow('SELECT country,city,region,region_code,fdistrict,lat,lon FROM ipgb_cidr'.
            ' JOIN ipgb_cities ON ipgb_cidr.city_id = ipgb_cities.id'.
            ' WHERE (start <= ?) and (end >= ?) LIMIT 1', array($ip, $ip));
        if ($ipgbr != false) {
            $result[self::COUNTRY_CODE_KEY] = $ipgbr['country'];
            $result[self::CITY_NAME_KEY] = $ipgbr['city'];
            $result[self::REGION_CODE_KEY] = $ipgbr['region_code'];
            $result[self::REGION_NAME_KEY] = $ipgbr['region'];
            $result[self::LATITUDE_KEY] = $ipgbr['lat']*1.0;
            $result[self::LONGITUDE_KEY] = $ipgbr['lon']*1.0;
        }
        return $result;
    }

    public function getInfo()
    {
        $result = parent::getInfo();
        $result['id'] = self::ID;
        $result['title'] = self::TITLE;
        $result['order'] = 5;
        return $result;
    }
}
