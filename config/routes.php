<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
	// Register scoped middleware for in scopes.
	$routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
		'httpOnly' => true,
	]));

	/**
	 * Apply a middleware to the current route scope.
	 * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
	 */
	//$routes->applyMiddleware('csrf');

	/**
	 * Here, we are connecting '/' (base path) to a controller called 'Pages',
	 * its action called 'display', and we pass a param to select the view file
	 * to use (in this case, src/Template/Pages/home.ctp)...
	 */
	$routes->connect('/', ['controller' => 'users', 'action' => 'home']);
	$routes->connect('/login', ['controller' => 'users', 'action' => 'login']);
	$routes->connect('/contact-us', ['controller' => 'users', 'action' => 'contact-us']);
	$routes->connect('/about-us', ['controller' => 'users', 'action' => 'about-us']);
	$routes->connect('/members', ['controller' => 'users', 'action' => 'member']);
	$routes->connect('/profile', ['controller' => 'users', 'action' => 'profile']);
	$routes->connect('/thank-you-seattle', ['controller' => 'users', 'action' => 'thank-you-seattle']);
	$routes->connect('/thank-you-austin', ['controller' => 'users', 'action' => 'thank-you-austin']);
	$routes->connect('/thank-you-denver', ['controller' => 'users', 'action' => 'thank-you-denver']);
	$routes->connect('/stories', ['controller' => 'users', 'action' => 'stories']);
	$routes->connect('/travel', ['controller' => 'users', 'action' => 'travel']);
	$routes->connect('/events', ['controller' => 'users', 'action' => 'events']);
	$routes->connect('/gallery', ['controller' => 'users', 'action' => 'gallery']);

	//$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

	/**
	 * ...and connect the rest of 'Pages' controller's URLs.
	 */
	$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

	/**
	 * Connect catchall routes for all controllers.
	 *
	 * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
	 *
	 * ```
	 * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
	 * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
	 * ```
	 *
	 * Any route class can be used with this method, such as:
	 * - DashedRoute
	 * - InflectedRoute
	 * - Route
	 * - Or your own route class
	 *
	 * You can remove these routes once you've connected the
	 * routes you want in your application.
	 */
	$routes->fallbacks(DashedRoute::class);
});

Router::prefix('admin', function (RouteBuilder $routes) {

	$routes->connect('/', ['controller' => 'users', 'action' => 'login']);
	$routes->connect('/login', ['controller' => 'users', 'action' => 'login']);
	$routes->connect('/dashboard', ['controller' => 'users', 'action' => 'dashboard']);
	$routes->connect('/email-templates', ['controller' => 'email-templates', 'action' => 'index']);
	$routes->connect('/enquiry', ['controller' => 'users', 'action' => 'enquiry']);
	$routes->connect('/staff', ['controller' => 'users', 'action' => 'index']);
	$routes->connect('/logout', ['controller' => 'users', 'action' => 'logout']);
	$routes->connect('/change-password', ['controller' => 'users', 'action' => 'change-password']);

	$routes->prefix('austin', function (RouteBuilder $routes) {
		$routes->connect('/leads', ['controller' => 'leads', 'action' => 'index']);
		$routes->connect('/events', ['controller' => 'events', 'action' => 'index']);
		$routes->connect('/travels', ['controller' => 'travels', 'action' => 'index']);
		$routes->connect('/dashboard', ['controller' => 'users', 'action' => 'dashboard']);
		$routes->connect('/member', ['controller' => 'users', 'action' => 'member']);
		$routes->connect('/memberdetail/*', ['controller' => 'users', 'action' => 'memberdetail']);
		$routes->fallbacks(DashedRoute::class);
	});

	$routes->prefix('denver', function (RouteBuilder $routes) {
		$routes->connect('/leads', ['controller' => 'leads', 'action' => 'index']);
		$routes->connect('/events', ['controller' => 'events', 'action' => 'index']);
		$routes->connect('/travels', ['controller' => 'travels', 'action' => 'index']);
		$routes->connect('/dashboard', ['controller' => 'users', 'action' => 'dashboard']);
		$routes->connect('/member', ['controller' => 'users', 'action' => 'member']);
		$routes->connect('/memberdetail/*', ['controller' => 'users', 'action' => 'memberdetail']);
		$routes->fallbacks(DashedRoute::class);
	});

	$routes->prefix('seattle', function (RouteBuilder $routes) {
		$routes->connect('/leads', ['controller' => 'leads', 'action' => 'index']);
		$routes->connect('/events', ['controller' => 'events', 'action' => 'index']);
		$routes->connect('/travels', ['controller' => 'travels', 'action' => 'index']);
		$routes->connect('/dashboard', ['controller' => 'users', 'action' => 'dashboard']);
		$routes->connect('/member', ['controller' => 'users', 'action' => 'member']);
		$routes->connect('/memberdetail/*', ['controller' => 'users', 'action' => 'memberdetail']);
		$routes->fallbacks(DashedRoute::class);
	});

	$routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
