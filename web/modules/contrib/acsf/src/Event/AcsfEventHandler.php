<?php

namespace Drupal\acsf\Event;

/**
 * AcsfEventHandler.
 *
 * The purpose of this class is to define an interface for events within Site
 * Factory. Customers who have access to customize their code base can write
 * client code to this interface to interact with events in a standardized way.
 */
abstract class AcsfEventHandler {

  /**
   * The time that the handler was started.
   *
   * @var int
   */
  public $started = 0;

  /**
   * The time that the handler was completed.
   *
   * @var int
   */
  public $completed = 0;

  /**
   * Any messages triggered by the handler.
   *
   * @var string
   */
  public $message = '';

  /**
   * Constructor.
   *
   * @param AcsfEvent $event
   *   The event that has been initiated.
   */
  public function __construct(AcsfEvent $event) {
    $this->event = $event;
  }

  /**
   * Writes a log message to the console.
   *
   * @param string $message
   *   The log message to be written.
   */
  public function consoleLog($message) {
    if (isset($this->event->output)) {
      $this->event->output->writeln($message);
    }
  }

  /**
   * Handle the event.
   */
  abstract public function handle();

}
