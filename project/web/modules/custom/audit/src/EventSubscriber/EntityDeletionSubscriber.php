<?php

namespace Drupal\audit\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\core_event_dispatcher\EntityHookEvents;
use Drupal\core_event_dispatcher\Event\Entity\EntityDeleteEvent;

class EntityDeletionSubscriber implements EventSubscriberInterface {
  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents(){
    $events[EntityHookEvents::ENTITY_PRE_DELETE][] = ['logDeletion'];
    return $events;
  }

  /**
   * If entity event triggered, log record.
   * 
   * @param Drupal\core_event_dispatcher\Event\Entity\EntityDeleteEvent $event
   */
  public function logDeletion(EntityDeleteEvent $event) {
    \Drupal::logger('audit')->notice('It works.');    
  }
}