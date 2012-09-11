<?php

namespace Schuh\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Schuh\BlogBundle\Document\ArticleRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        //return array('name' => $name);
        $dm = $this->get('doctrine_mongo_db');
        $articles = $dm->getRepository('Schuh\BlogBundle\Document\Article')
                ->findNArticlesByPage(10, 10);
        
        return array('articles' => $articles);
    }
}
