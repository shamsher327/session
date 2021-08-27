<?php

namespace Drupal\indegene_common\Plugin\rest\resource;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Indegene Resource
 *
 * @RestResource(
 *   id = "indegene_resource",
 *   label = @Translation("Indegne Resource"),
 *   uri_paths = {
 *     "canonical" = "/indegene_rest_api/indenege_resource"
 *   }
 * )
 */
class DemoResource extends ResourceBase {


  /**
   * Responds to entity GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   */
  public function get() {


    $response = ['message' => 'Hello, this is a rest service'];
    return new ResourceResponse($response);
  }

}