<?php

namespace Schuh\BlogAdminBundle\Controller\Article;

use Admingenerated\SchuhBlogAdminBundle\BaseArticleController\NewController as BaseNewController;

class NewController extends BaseNewController
{
    public function preSave(\Symfony\Component\Form\Form $form, \Schuh\BlogBundle\Document\Article $Article)
    {
        if (null === $Article->getAuthor()) {
            $user = $this->container->get('security.context')->getToken()->getUser();
            $Article->setAuthor($user);
        }
    }
}
