<?php

namespace Drupal\acsf;

/**
 * ACSFLog.
 *
 * Sends log messages to the Site Factory via REST API.
 */
class AcsfLog {

  /**
   * Logs the specified message to the Site Factory via the REST API.
   *
   * @param string $type
   *   The type of log message, usually defining the source of the message.
   * @param string $message
   *   The log message to send.
   * @param string $level
   *   The severity of the log message. Uses the predefined syslog() constants
   *   that follow RFC 3164. Defaults to LOG_NOTICE.
   * @param int $timestamp
   *   The Unix timestamp representing when the event occurred. Defaults to
   *   the timestamp for the current request.
   * @param int $nid
   *   The site node ID that the message relates to. Defaults to the current
   *   site.
   */
  public function log($type, $message, $level = NULL, $timestamp = NULL, $nid = NULL) {
    if (empty($timestamp)) {
      $timestamp = \Drupal::time()->getRequestTime();
    }

    if (empty($type) || empty($message)) {
      throw new \RuntimeException('Missing required parameter.');
    }

    if (!$this->enabled()) {
      return;
    }

    if (empty($nid)) {
      $site = AcsfSite::load();
      $nid = $site->site_id;
    }

    $record = [
      'type' => $type,
      'message' => $message,
      'level' => $level ?: LOG_NOTICE,
      'timestamp' => $timestamp,
      'nid' => $nid,
    ];

    try {
      $message = new AcsfMessageRest('POST', 'site-api/v1/sf-log', $record);
      $message->send();
      return $message->getResponseBody();
    }
    catch (\Exception $e) {
      // Swallow exceptions.
    }
  }

  /**
   * Determines whether logging is enabled or blocked globally.
   */
  public function enabled() {
    $site = $_ENV['AH_SITE_GROUP'];
    $env = $_ENV['AH_SITE_ENVIRONMENT'];
    return !file_exists(sprintf('/mnt/files/%s.%s/files-private/sf-log-block', $site, $env));
  }

}
