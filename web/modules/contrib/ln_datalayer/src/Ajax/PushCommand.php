<?php

namespace Drupal\ln_datalayer\Ajax;

use Drupal\Core\Ajax\CommandInterface;

/**
 * AJAX command for a javascript datalayer push.
 *
 * @ingroup ajax
 */
class PushCommand implements CommandInterface {

  /**
   * The data to pass on to the client side.
   *
   * @var string
   */
  protected $data;

  /**
   * Constructs an AlertCommand object.
   *
   * @param array $data
   *   The data to be pushed to the data layer.
   */
  public function __construct(array $data) {
    $this->data = $data;
  }

  /**
   * Implements Drupal\Core\Ajax\CommandInterface:render().
   */
  public function render() {

    return [
      'command' => 'datalayerpush',
      'data' => $this->data,
    ];
  }

}
