<?php

namespace Schuh\BlogBundle\Document;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use Schuh\BlogBundle\Document\Article;


class ArticleListener
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $this->handleEvent($args);
    }
    
    public function preUpdate(LifecycleEventArgs $args)
    {
        $this->handleEvent($args);
    }
    
    private function handleEvent(LifecycleEventArgs $args)
    {
        $document = $args->getDocument();

        if ($document instanceof Article) {
            if (!$document->getIsPublished()) {
                $document->setPublished(false);
            }

            if ($document->getIsPublished() && null === $document->getPublished()) {
                $document->setPublished(new \DateTime());
            }
        }
    }
}
