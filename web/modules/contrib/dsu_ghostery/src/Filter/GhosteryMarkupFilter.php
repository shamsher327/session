<?php

namespace Drupal\dsu_ghostery\Filter;

use Drupal\Component\Render\MarkupInterface;

/**
 * Create filter markup.
 */
class GhosteryMarkupFilter implements MarkupInterface {

  /**
   * Private $criticalCSS;.
   */
  public function __construct($markup) {

    $this->markup = $markup;

  }

  /**
   * Sting function.
   */
  public function __toString() {
    return $this->markup;
  }

  /**
   * JSON serialize.
   */
  public function jsonSerialize() {
    return $this->__toString();
  }

}
