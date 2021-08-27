<?php

namespace Drupal\indegene_common\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Alter modules's route(s).
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   *
   * Add a CSRF-Token requirement to the fileupload route.
   */
  public function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('indegene.fileupload')) {
      $route->setRequirement('_access_rest_csrf', 'TRUE');
    }
  }

}
