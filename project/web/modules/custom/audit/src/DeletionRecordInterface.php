<?php

namespace Drupal\audit;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a deletion record entity type.
 */
interface DeletionRecordInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  // /**
  //  * Gets the deletion record title.
  //  *
  //  * @return string
  //  *   Title of the deletion record.
  //  */
  // public function getTitle();

  // /**
  //  * Sets the deletion record title.
  //  *
  //  * @param string $title
  //  *   The deletion record title.
  //  *
  //  * @return \Drupal\audit\DeletionRecordInterface
  //  *   The called deletion record entity.
  //  */
  // public function setTitle($title);

  // /**
  //  * Gets the deletion record creation timestamp.
  //  *
  //  * @return int
  //  *   Creation timestamp of the deletion record.
  //  */
  // public function getCreatedTime();

  // /**
  //  * Sets the deletion record creation timestamp.
  //  *
  //  * @param int $timestamp
  //  *   The deletion record creation timestamp.
  //  *
  //  * @return \Drupal\audit\DeletionRecordInterface
  //  *   The called deletion record entity.
  //  */
  // public function setCreatedTime($timestamp);

  // /**
  //  * Returns the deletion record status.
  //  *
  //  * @return bool
  //  *   TRUE if the deletion record is enabled, FALSE otherwise.
  //  */
  // public function isEnabled();

  // /**
  //  * Sets the deletion record status.
  //  *
  //  * @param bool $status
  //  *   TRUE to enable this deletion record, FALSE to disable.
  //  *
  //  * @return \Drupal\audit\DeletionRecordInterface
  //  *   The called deletion record entity.
  //  */
  // public function setStatus($status);

}
