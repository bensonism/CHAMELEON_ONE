<?php

$root_dir = dirname(__DIR__);

// echo $root_dir;

/** @var string Document Root */
$webroot_dir = $root_dir . '/web';


define('DB_NAME', 'wp_skeleton');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', '127.0.0.1');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WP_HOME', 'http://www.demosite.io');
define('WP_SITEURL', 'http://www.demosite.io');

/**
 * Custom Content Directory
*/
define('CONTENT_DIR', '/app');
define('WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR);
define('WP_CONTENT_URL', WP_HOME . CONTENT_DIR);


define('AUTH_KEY', 'x1g3XZ8/GqoJLmtzQ|lmmH8UCR}4Jr`Ps#$3uaQ=Th!jHgBY(nD#31l!z(N`e8%q');
define('SECURE_AUTH_KEY', '4-Vgv}%K!cYH,v8HK*U[2b|`@L1WGK6q!n}DTDXI$LCy4hhEDeBv%ne,j/VtO5c*');
define('LOGGED_IN_KEY', 'Qoz^u,4LlR=E7LQW.cAO8D]nRSRguQIh|EB7Cir1xb/5sn*Nxi],xZ,.8ZC<ja%P');
define('NONCE_KEY', ':je[w8HOV6<@:g3Pls,-LU&MpZXwY6Fn8+&0Nx]*>Ci}([f54WVn<7c69F)APs?2');
define('AUTH_SALT', 'FyJ/Y#Wz>_FJd,N7_Sb|9}??AzM%U-dG2y/E^tx5$>(;F2&9^Xhk4:Ko.2vMwhC,');
define('SECURE_AUTH_SALT', '%;&d1m7Lh$o.zu;vDxyI)/gE)%hYxTRC{BH+m3]]B,5@QUC-Z#UK2+4eC2Pq!]Y-');
define('LOGGED_IN_SALT', 'uJ^yQ<|I2,&Q[-uIjbjsR|p$2rB[.>s-2Lv3R;Ny#AMo(/.<+*!?8lA;Us&vo{3S');
define('NONCE_SALT', 'cu8]syZa_Ex3c/BF6NvGq(ow],+kr=/JM,}EXX**!J#}i/ASQ(((=l-k4Qr3R`P0');

$table_prefix  = 'wp_';

define('WP_DEBUG', true);


if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');


require_once(ABSPATH . 'wp-settings.php');
