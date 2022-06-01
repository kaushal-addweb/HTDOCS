<?php

namespace Drupal\core_event_dispatcher\Event\File;

use Drupal\Component\EventDispatcher\Event;
use Drupal\core_event_dispatcher\FileHookEvents;
use Drupal\hook_event_dispatcher\Event\EventInterface;

/**
 * Class FileDownloadEvent.
 */
class FileDownloadEvent extends Event implements EventInterface {

  /**
   * Forbids the download if set to TRUE.
   *
   * @var bool
   */
  protected $forbidden = FALSE;

  /**
   * Response headers that will be set for the downloaded file.
   *
   * @var array
   */
  protected $headers;

  /**
   * The URI of the file.
   *
   * @var string
   */
  protected $uri;

  /**
   * FileDownloadEvent constructor.
   */
  public function __construct(string $uri) {
    $this->uri = $uri;
  }

  /**
   * Checks if the download is forbidden.
   *
   * @return bool
   *   TRUE if the download is forbidden.
   */
  public function isForbidden(): bool {
    return $this->forbidden;
  }

  /**
   * Sets the download as forbidden.
   */
  public function setForbidden(): void {
    $this->forbidden = TRUE;
  }

  /**
   * Gets the response headers.
   *
   * @return array
   *   The response headers.
   */
  public function getHeaders(): ?array {
    return $this->headers;
  }

  /**
   * Sets the header.
   *
   * @param string $name
   *   The header name.
   * @param mixed $value
   *   The header value.
   */
  public function setHeader(string $name, $value): void {
    $this->headers[$name] = $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getDispatcherType(): string {
    return FileHookEvents::FILE_DOWNLOAD;
  }

}
