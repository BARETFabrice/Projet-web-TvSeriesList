<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'alexsiro_tvserieslist');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'alexsiro_tvserieslist_admin');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '2G3anV+e*0W!');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$i&NX9 @vz{}ScqB&O9`aA%8_wiEjmMxPUhs!`xA:0b&((>Gx8.^kT.r~m?Qwi,^');
define('SECURE_AUTH_KEY',  'CcG,Ws(1^HC}HHhfb]p>+99?uezV!plsgm AUi&6,pi_INK:L=<_x=.[caPIFY0c');
define('LOGGED_IN_KEY',    '0Xl)!a:*{sySLnB3z1UM%dbw@=&Gs=4mLwjop>#K_u6:gRxzJ@>sQ nfbphvxWV]');
define('NONCE_KEY',        'dy@{.i2]nXpw04}uIV7H8]BT3B#_/&vQ&2g$s[%}=Co7D,=];*)[]5LU}T;u^-pF');
define('AUTH_SALT',        '0xu0@/j75}VgE@/5k@Cw&.6N al{_.Ka2LMY:;|S)hiyW@lrbN*9PH3^J=^sN9aN');
define('SECURE_AUTH_SALT', 'yWJ[xsbI,9xTFWfCW4Ps.QDX; x~xY`,;Ln6qjqAUJbB[XspiGJj&/aX-VT}Puu(');
define('LOGGED_IN_SALT',   'F_o&6h*A-9yo n3=]V B3mY=N{d?06lMZF$a.]vN|>z5q%>1<,zqpUg_2CBbY:%g');
define('NONCE_SALT',       'uPImSie42jqV_!G#=aR:(D${Z~O<[$^#S|B>,-cW~QgRXUB$je2ae+G-@c^,9&vd');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');