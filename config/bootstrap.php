<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.8
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/*
 * Configure paths required to find CakePHP + general filepath constants
 */
require __DIR__ . '/paths.php';

/*
 * Bootstrap CakePHP.
 *
 * Does the various bits of setup that CakePHP needs to do.
 * This includes:
 *
 * - Registering the CakePHP autoloader.
 * - Setting the default application paths.
 */
require CORE_PATH . 'config' . DS . 'bootstrap.php';

use Cake\Cache\Cache;
use Cake\Console\ConsoleErrorHandler;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Core\Plugin;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ErrorHandler;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Utility\Inflector;
use Cake\Utility\Security;
use Cake\Routing\Router;

/**
 * Uncomment block of code below if you want to use `.env` file during development.
 * You should copy `config/.env.default to `config/.env` and set/modify the
 * variables as required.
 *
 * It is HIGHLY discouraged to use a .env file in production, due to security risks
 * and decreased performance on each request. The purpose of the .env file is to emulate
 * the presence of the environment variables like they would be present in production.
 */
// if (!env('APP_NAME') && file_exists(CONFIG . '.env')) {
//     $dotenv = new \josegonzalez\Dotenv\Loader([CONFIG . '.env']);
//     $dotenv->parse()
//         ->putenv()
//         ->toEnv()
//         ->toServer();
// }

/*
 * Read configuration file and inject configuration into various
 * CakePHP classes.
 *
 * By default there is only one configuration file. It is often a good
 * idea to create multiple configuration files, and separate the configuration
 * that changes from configuration that does not. This makes deployment simpler.
 */
try {
	Configure::config('default', new PhpConfig());
	Configure::load('app', 'default', false);
} catch (\Exception $e) {
	exit($e->getMessage() . "\n");
}

/*
 * Load an environment local configuration file.
 * You can use a file like app_local.php to provide local overrides to your
 * shared configuration.
 */
//Configure::load('app_local', 'default');

/*
 * When debug = true the metadata cache should only last
 * for a short time.
 */
if (Configure::read('debug')) {
	Configure::write('Cache._cake_model_.duration', '+2 minutes');
	Configure::write('Cache._cake_core_.duration', '+2 minutes');
	// disable router cache during development
	Configure::write('Cache._cake_routes_.duration', '+2 seconds');
}

/*
 * Set the default server timezone. Using UTC makes time calculations / conversions easier.
 * Check http://php.net/manual/en/timezones.php for list of valid timezone strings.
 */
date_default_timezone_set(Configure::read('App.defaultTimezone'));

/*
 * Configure the mbstring extension to use the correct encoding.
 */
mb_internal_encoding(Configure::read('App.encoding'));

/*
 * Set the default locale. This controls how dates, number and currency is
 * formatted and sets the default language to use for translations.
 */
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

/*
 * Register application error and exception handlers.
 */
$isCli = PHP_SAPI === 'cli';
if ($isCli) {
	(new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
	(new ErrorHandler(Configure::read('Error')))->register();
}

/*
 * Include the CLI bootstrap overrides.
 */
if ($isCli) {
	require __DIR__ . '/bootstrap_cli.php';
}

/*
 * Set the full base URL.
 * This URL is used as the base of all absolute links.
 *
 * If you define fullBaseUrl in your config file you can remove this.
 */
if (!Configure::read('App.fullBaseUrl')) {
	$s = null;
	if (env('HTTPS')) {
		$s = 's';
	}

	$httpHost = env('HTTP_HOST');
	if (isset($httpHost)) {
		Configure::write('App.fullBaseUrl', 'http' . $s . '://' . $httpHost);
	}
	unset($httpHost, $s);
}

Cache::setConfig(Configure::consume('Cache'));
ConnectionManager::setConfig(Configure::consume('Datasources'));
TransportFactory::setConfig(Configure::consume('EmailTransport'));
Email::setConfig(Configure::consume('Email'));
Log::setConfig(Configure::consume('Log'));
Security::setSalt(Configure::consume('Security.salt'));

/*
 * The default crypto extension in 3.0 is OpenSSL.
 * If you are migrating from 2.x uncomment this code to
 * use a more compatible Mcrypt based implementation
 */
//Security::engine(new \Cake\Utility\Crypto\Mcrypt());

/*
 * Setup detectors for mobile and tablet.
 */
ServerRequest::addDetector('mobile', function ($request) {
	$detector = new \Detection\MobileDetect();

	return $detector->isMobile();
});
ServerRequest::addDetector('tablet', function ($request) {
	$detector = new \Detection\MobileDetect();

	return $detector->isTablet();
});

/*
 * Enable immutable time objects in the ORM.
 *
 * You can enable default locale format parsing by adding calls
 * to `useLocaleParser()`. This enables the automatic conversion of
 * locale specific date formats. For details see
 * @link https://book.cakephp.org/3.0/en/core-libraries/internationalization-and-localization.html#parsing-localized-datetime-data
 */
Type::build('time')
	->useImmutable();
Type::build('date')
	->useImmutable();
Type::build('datetime')
	->useImmutable();
Type::build('timestamp')
	->useImmutable();

/*
 * Custom Inflector rules, can be set to correctly pluralize or singularize
 * table, model, controller names or whatever other string is passed to the
 * inflection functions.
 */
//Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
//Inflector::rules('irregular', ['red' => 'redlings']);
//Inflector::rules('uninflected', ['dontinflectme']);
//Inflector::rules('transliteration', ['/å/' => 'aa']);


Configure::write(array(   //  stripe key
    'austin_publickey'=>'pk_live_jL2WOXxNqEdDgqHPo8xTj5iT',
	'austin_secretkey'=>'sk_live_JCBbt0NoOpAL5pR1yPiQuFyA',
    'denver_publickey'=>'pk_live_TeibMOm1GXKjQYz4S7Hojpu4',
    'denver_secretkey'=>'sk_live_VU2Rpsl97eOZPgUskDsNYoA2',
	'seattle_publickey'=>'pk_live_hxx5aq1iFWso0kRdEHMnEgi6',
    'seattle_secretkey'=>'sk_live_Vu0F8EtAU6hfy3eUxBwiOAmg',
// msg keys	
	'twilio_sid' => 'AC034d4133fdb3cef7d49e77eb5ac56442',  
	'twilio_token' => '6c74243daabf72a14c62223a00fcfe06',
	'twilio_message_sid' => 'MGbe67c4965dc09623ac30dd08c986901b',
	'admin_email'=>'',
	
));





Configure::write('TinymceElfinder', array(
	'title' => __('Elfinder File Manager'),
	'client_options' => array(
		'width' => 900,
		'height' => 500,
		'resizable' => 'yes',
	),
	'static_files' => array(
		'js' => array(
			'jquery' => 'jquery-3.5.1.min.js',
			'jquery_ui' => 'jquery-ui.min.js',
		),
		'css' => array(
			'jquery_ui' => 'jquery-ui.min.css',
			'jquery_ui_theme' => 'jquery-ui.theme.min',
		),
	),
	'options' => array(
		// 'debug' => true,
		'roots' => array(
			array(
				'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
				'URL' => Router::url('/uploads', true), // upload main folder
				'path' => WWW_ROOT . 'uploads', // path to files (REQUIRED)
				'attributes' => array(
					array(
						'pattern' => '!(thumbnails)!',
						'hidden' => true,
					),
				),
				'tmbPath' => 'thumbnails',
				'uploadOverwrite' => false,
				'checkSubfolders' => false,
				'disabled' => array(),
				'uploadAllow' => array('image'),
				'uploadDeny' => array('all'),
				'uploadOrder' => 'deny,allow',
			),
		),
	),
));
