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
    $entity = $event->getEntity();
    $entity_type = $entity->getEntityTypeId();

    if ($entity instanceof ConfigEntityInterface){
      return;
    }
    if ($entity_type === 'path_alias'){
      return;
    }
    $data = [
      'lable' => $entity->label(),
      'created' => $entity->created->value,
      'deleted' => time(),
      'deleted_by' => \Drupal::currentUser()->id(),
      'entity_type' => $entity_type,
      'bundle' => $entity->bundle,
    ];
    if (isset($entity->uid) && $entity_type != 'user' ){
      $data['uid'] = $entity->uid;
    }
    if (isset($entity->changed)){
      $data['changed'] = $entity->changed->value;
    }

    $record = \Drupal::entityTypeManager()->getStoryage('deletion_record')->create($data);
    $record->save();
        //\Drupal::logger('audit')->notice('It works.');    
  }
}