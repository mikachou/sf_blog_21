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
        $config = $this->container->getParameter('schuh_blog');
        //return array('name' => $name);
        $articles = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Article')
                ->findNArticlesByPage($config['home']['articles_by_page'], 10);
        
        return array('articles' => $articles, 'chars' => $config['home']['characters_displayed']);
    }
    
    /**
     * @Route("/article/{slug}")
     * @Template()
     */
    public function showAction($slug)
    {
        $article = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Article')
                ->findOneBySlug($slug);
 
        if (null === $article) {
            throw $this->createNotFoundException('La page que vous demandez n\'existe pas');
        }
        
        return array('article' => $article);
    }
}
