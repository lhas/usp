<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */

define('DB_NAME', 'usp');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'relogio123');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '!:R&;Jhx|qkv/*J[(iLw}<;SP`-,J3FWd6oIQ7if(kEOD4t|jIy?kzmp2g_>)`zh');
define('SECURE_AUTH_KEY',  '1eIF,0?,FJrTAvGH=X6F@|98fjCd,/=yqcs5{9ySUy7.izn7lvy|_9|,7+`kT_;V');
define('LOGGED_IN_KEY',    '`m1&37XNo?K}cD;X_S?hg_&/6>Zz|#L L<%Z[a8_<7K:IeGtPC(c1Dqj5lfSTH,|');
define('NONCE_KEY',        'Sn|@|sd/uCp>OQV(5E>S6FYLo0h$-MX{vR-l+F:ZxWy^WD$k(knJy+p1FT8CY6U1');
define('AUTH_SALT',        '[x|:>SRyuM>Oh+C2]oA]dX?TVKMSykex_0,x:?G<$31ir&PY>:2w{UN)DM@|{SZ,');
define('SECURE_AUTH_SALT', 'VtQ=X05$qJ)L8dS?O-ZcUgp>mf%y#xZRiRd`]L=tegr7Dcu=;n~a|J!/YDh&X*d6');
define('LOGGED_IN_SALT',   '#Yq^aN(X4@.(CjTvC*7D4(y{{3QNL6>!;#}{%S%Wi*#vP<*_e>zR-FP!={]n=?2Q');
define('NONCE_SALT',       '>?=Q4l!4q&d~.w{O!OMIAjBm%@4Os=E_v0CmwuYJmjd*+1lobKBN$Ot+oE#*b71@');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
