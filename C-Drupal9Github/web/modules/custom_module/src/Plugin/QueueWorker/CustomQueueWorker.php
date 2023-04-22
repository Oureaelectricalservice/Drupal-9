<?php

namespace Drupal\custom_module\Plugin\QueueWorker;

use Drupal\Core\Annotation\QueueWorker;

/**
 * @QueueWorker(
 *   id="custom_queueworker",
 *   title="Custom QueueWoeker",
 *   cron={"time" = 60}
 * )
 */
class CustomQueueWorker extends \Drupal\Core\Queue\QueueWorkerBase
{

  /**
   * @inheritDoc
   */
  public function processItem($data)
  {
    $node = \Drupal::entityTypeManager()->getStorage('node')->load($data);
    if ($node) {
      $title = $node->getTitle();
      \Drupal::logger('custom_module')->info('Node Title is ' .$title);
    }
  }
}
