<?php

namespace Book\EventSubscriber;

use DateTimeImmutable;
use Doctrine\ORM\Events;
use Book\Attribute\AutoCreatedDate;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class AutoDateSubscriber implements EventSubscriber
{
    public function getSubscribedEvents(): array
    {
        return [Events::prePersist];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();
        $reflectionClass = new \ReflectionClass($entity);

        foreach ($reflectionClass->getProperties() as $property) {
            $attributes = $property->getAttributes(AutoCreatedDate::class);

            if (!empty($attributes)) {
                $dateValue = new DateTimeImmutable();
                $formattedDate = $dateValue->format('c');

                $property->setValue($entity, new DateTimeImmutable($formattedDate));
            }
        }
    }
}
