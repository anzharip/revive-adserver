<?php

/*
+---------------------------------------------------------------------------+
| Openads v${RELEASE_MAJOR_MINOR}                                                              |
| ============                                                              |
|                                                                           |
| Copyright (c) 2003-2007 Openads Limited                                   |
| For contact details, see: http://www.openads.org/                         |
|                                                                           |
| This program is free software; you can redistribute it and/or modify      |
| it under the terms of the GNU General Public License as published by      |
| the Free Software Foundation; either version 2 of the License, or         |
| (at your option) any later version.                                       |
|                                                                           |
| This program is distributed in the hope that it will be useful,           |
| but WITHOUT ANY WARRANTY; without even the implied warranty of            |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
| GNU General Public License for more details.                              |
|                                                                           |
| You should have received a copy of the GNU General Public License         |
| along with this program; if not, write to the Free Software               |
| Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA |
+---------------------------------------------------------------------------+
$Id$
*/

/**
 * @package    OpenadsPlugin
 * @subpackage DeliveryLimitations
 * @author     Chris Nutting <chris.nutting@openads.org>
 * @author     Matteo Beccati <matteo.beccati@openads.org>
 */

if (!isset($GLOBALS['_MAX']['_GEOCACHE']['region'])) {
    require MAX_PATH . '/plugins/deliveryLimitations/Geo/data/res-iso3166.inc.php';
    require MAX_PATH . '/plugins/deliveryLimitations/Geo/data/res-iso3166-2.inc.php';
    require MAX_PATH . '/plugins/deliveryLimitations/Geo/data/res-fips.inc.php';

    foreach ($OA_Geo_FIPS as $k => $v) {
        if ($k == 'US' || $k == 'CA') {
            $v = $OA_Geo_ISO3166_2[$k];
        }
        $res[$k] = array($OA_Geo_ISO3166[$k]) + $v;
    }

    uasort($res, create_function('$a,$b', 'return strcmp($a[0], $b[0]);'));

    $GLOBALS['_MAX']['_GEOCACHE']['region'] = $res;
} else {
    $res = $GLOBALS['_MAX']['_GEOCACHE']['region'];
}

?>
