<?php

namespace Schuh\BlogBundle\Document;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use Schuh\BlogBundle\Document\Article;


class ArticleListener
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $document = $args->getDocument();

        if ($document instanceof Article) {
            if (!$document->getIsPublished()) {
                $document->setPublished(null);
            }

            if ($document->getIsPublished() && null === $document->getPublished()) {
                $document->setPublished(new \DateTime());
            }
        }
    }
}
