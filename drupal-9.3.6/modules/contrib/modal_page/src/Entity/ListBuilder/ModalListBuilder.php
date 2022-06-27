<?php

namespace Drupal\modal_page\Entity\ListBuilder;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Modal entities.
 */
class ModalListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Modal');
    $header['id'] = $this->t('Machine name');
    $header['published'] = $this->t('Status');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();

    $status = $this->t('Published');
    if (empty($entity->getPublished())) {
      $status = $this->t('Unpublished');
    }

    $row['published'] = $status;

    return $row + parent::buildRow($entity);
  }

}
