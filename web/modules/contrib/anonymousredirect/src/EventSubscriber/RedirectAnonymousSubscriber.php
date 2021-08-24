<?php

namespace Drupal\anonymousredirect\EventSubscriber;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Routing\RouteProvider;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Routing\CurrentRouteMatch;

/**
 * Event subscriber subscribing to KernelEvents::REQUEST.
 */
class RedirectAnonymousSubscriber implements EventSubscriberInterface {

  /**
   * AccountProxyInterface definition.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * CurrentRouteMatch definition.
   *
   * @var \Drupal\Core\Routing\CurrentRouteMatch
   */
  protected $currentRouteMatch;

  /**
   * Config Factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $config;

  /**
   * RouteProvider.
   *
   * @var routeProvider
   */
  protected $routeProvider;

  /**
   * RedirectAnonymousSubscriber constructor.
   *
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   CurrentUser.
   * @param \Drupal\Core\Routing\CurrentRouteMatch $current_route_match
   *   CurrentRoute.
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   Config.
   * @param \Drupal\Core\Routing\RouteProvider $routeProvider
   *   Route.
   */
  public function __construct(
    AccountProxyInterface $current_user,
    CurrentRouteMatch $current_route_match,
    ConfigFactoryInterface $configFactory,
    RouteProvider $routeProvider
  ) {
    $this->currentUser = $current_user;
    $this->currentRouteMatch = $current_route_match;
    $this->config = $configFactory->get('anonymousredirect.whitelistroutesconfig');
    $this->routeProvider = $routeProvider;
  }

  /**
   * Redirect Anonymous.
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
   *   Response.
   */
  public function anonymousRedirect(GetResponseEvent $event) {
    if ($this->currentUser->isAnonymous()) {
      $whiteListRoutes = $this->config->get('whitelist_routes');
      $whiteListRoutes = $whiteListRoutes ? preg_split("/\\r\\n|\\r|\\n/", $whiteListRoutes) : [];
      foreach ($whiteListRoutes as $route) {
        $found_routes = $this->routeProvider->getRoutesByPattern($route);
        foreach ($found_routes as $route_name => $route_object) {
          $route_names[] = $route_name;
        }
        $current_route_name = $this->currentRouteMatch->getRouteName();
        if (in_array($current_route_name, $route_names)) {
          return;
        }
        $routeReplaced = str_replace('*', '.*', $route);
        $routeReplaced = str_replace('/', '\/', $routeReplaced);
        $routeReplaced = '/' . $routeReplaced . '/';
        if (preg_match($routeReplaced, $this->currentRouteMatch->getRouteObject()
          ->getPath(), $matches) === TRUE) {
          return;
        }

      }
      $redirectTo = $this->config->get('url_to_redirect');
      $response = new TrustedRedirectResponse($redirectTo, 301);
      $event->setResponse($response);
      $event->stopPropagation();
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['anonymousRedirect'];
    return $events;
  }

}
