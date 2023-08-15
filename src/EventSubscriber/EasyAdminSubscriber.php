<?php

namespace App\EventSubscriber;

use App\Entity\Blogpost;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;


class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $slugger;

    public function __construct(SluggerInterface $slugger){
        $this->slugger = $slugger;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setArticleSlugandDate']
        ];
    }

    public function setArticleSlugandDate(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if(!($entity instanceof Article)) {
            return;
        }

        $slug = $this->slugger->slug($entity->getTitre());
        $entity->setSlug($slug);

        $now = new DateTime('now');
        $entity->setPublicationDate($now);
    }
}