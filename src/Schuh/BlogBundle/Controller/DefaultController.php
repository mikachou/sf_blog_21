<?php

namespace Schuh\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Schuh\BlogBundle\Document\ArticleRepository;
use Schuh\BlogBundle\Document\Comment;
use Schuh\BlogBundle\Document\Article;

class DefaultController extends Controller
{
    /**
     * @Route(name="homepage", pattern="/")
     * @Template()
     */
    public function indexAction()
    {
        $config = $this->container->getParameter('schuh_blog');
        $articles_by_page = $config['home']['articles_by_page'];
        $page = $this->getRequest()->get('page', 1);
        
        $articles = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Article')
                ->findNArticlesByPage($articles_by_page, $page);
        
        $n_articles = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Article')
                ->findAll()
                ->count();
        
        $max_page = ceil($n_articles / $articles_by_page);
        $page = $page > $max_page ? $maxpage : $page;
        
        return array(
            'articles' => $articles, 
            'chars' => $config['home']['characters_displayed'],
            'page' => $page,
            'max_page' => $page >= $max_page);
    }
    
    /**
     * @Route(name="article", pattern="/article/{slug}")
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
        
        $comment = new Comment();
        
        $form = $this->createFormBuilder($comment)
                ->add('author', 'text', array('label' => 'Choisissez un pseudo', 'attr' => array('size' => 50)))
                ->add('text', 'textarea', array('label' => 'Tapez votre message', 'attr' => array('cols' => 50, 'rows' => 10)))
                ->getForm();
        
        $request = $this->get('request');

        if($request->isMethod('POST')) {
            $form->bindRequest($request);

            if($form->isValid()) {
                $article->addComments($comment);
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($article);
                $dm->flush();
            }
        }

        return array('article' => $article, 'form' => $form->createView());
    }
}
