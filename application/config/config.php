<?php

define('BASE_URL', 'http://192.168.1.24/grm-mvc/');
define('PUBLIC_URL', BASE_URL . 'public/');
define('VOL_URL', PUBLIC_URL . 'Volumes/');
define('GRM_URL', VOL_URL . '001/');
define('CHT_URL', VOL_URL . '002/');
define('SRC_URL', BASE_URL . 'src/master/');
define('JSON_PRECAST_URL', BASE_URL . 'json-precast/');
define('FLAT_URL', BASE_URL . 'application/views/flat/');
define('AUDIO_URL', BASE_URL . 'src/Audio/');

// Physical location of resources
define('PHY_BASE_URL', '/var/www/grm-mvc/');
define('PHY_PUBLIC_URL', PHY_BASE_URL . 'public/');
define('PHY_VOL_URL', PHY_PUBLIC_URL . 'Volumes/');
define('PHY_GRM_URL', PHY_VOL_URL . '001/');
define('PHY_CHT_URL', PHY_VOL_URL . '002/');
define('PHY_SRC_URL', PHY_BASE_URL . 'src/master/');
define('PHY_JSON_PRECAST_URL', PHY_BASE_URL . 'json-precast/');
define('PHY_FLAT_URL', PHY_BASE_URL . 'application/views/flat/');
define('PHY_AUDIO_URL', PHY_BASE_URL . 'src/Audio/');

//~ define('DB_PREFIX', 'rig');
define('DB_HOST', 'localhost');

define('DB_NAME', 'grm');

define('grm_USER', 'root');
define('grm_PASSWORD', 'mysql');

?>
