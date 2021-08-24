<?php

namespace Drupal\datalayer\Ajax;

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
   * @param string $data
   *   The data to be pushed to the data layer.
   */
  public function __construct($data) {
    $this->data = $data;
  }

  /**
   * Implements Drupal\Core\Ajax\CommandInterface:render().
   */
  public function render() {

    return array(
      'command' => 'datalayerpush',
      'data' => $this->data,
    );
  }

}
