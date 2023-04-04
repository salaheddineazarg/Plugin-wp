<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'plugin' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=8q?-7fB~>IEoeNMV:64/l}6[Rohm2SNwA2`CW0$d^)MkZ78BcY94VMl($Qdw`4N' );
define( 'SECURE_AUTH_KEY',  'Z)4z:,yf8sY*@P8ch(pnQ<Wl}F_] Z9[lL!_^E9-(ui6r27Ty71avCM uK,+;KhO' );
define( 'LOGGED_IN_KEY',    'gFdju-1rwe/ Rzu_n?%ICG!AA_CvHWchT#XK&Jlu.::8%yCe<kf}ulrR(8u,TCN8' );
define( 'NONCE_KEY',        'v0zPWvtF<#8?Qu@$Hr+@2$_[>Rjat8V*#LQ3I>QX-F0WW:vZK]CGo*ljt:be!ZP.' );
define( 'AUTH_SALT',        'hcTjgMyLSk=1NY7i4h0EBCyD#a9Um!qVC$A.2xz+Z;pQF^jpX@p:}+,3ZGEWh5!V' );
define( 'SECURE_AUTH_SALT', 'W]+CB&7^<~/;-J:C~sd#cdQn}VP;?@(Qp*t{vP1L5UHt|,;`vl]xhL+THxq%f##)' );
define( 'LOGGED_IN_SALT',   'TCv*n2JW~hEwvgIA]Egv?*>`Et.pidA{O|jxwi%uVOPG;v5OxL40AkX[.y_ g7<l' );
define( 'NONCE_SALT',       'Fv`6x=c!r`g$ujBy]U=q5`{e<|}Jos$y,3cQmL5+<w/Y)Rz0pFCpm~u~?_FcL`,-' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
