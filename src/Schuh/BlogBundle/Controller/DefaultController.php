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
                ->findNArticlesByPage(array('is_published' => true), $articles_by_page, $page);
        
        $n_articles = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Article')
                ->findBy(array('is_published' => true))
                ->count();
        
        $max_page = ceil($n_articles / $articles_by_page);
        $page = $page > $max_page ? $maxpage : $page;
        
        $this->get('session')->set('selected_menu', 1);
        
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
    
    /**
     * @Template()
     */
    public function logoTextAction()
    {
        $config = $this->container->getParameter('schuh_blog');
        
        return array(
            'main_title' => $config['blog']['main_title'],
            'second_title' => $config['blog']['second_title']
        );
    }
    
    /**
     * @Template
     */
    public function recentArticlesWidgetAction()
    {
        $config = $this->container->getParameter('schuh_blog');   
        $recentArticles = $config['widgets']['recent_articles'];
        
        $articles = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Article')
                ->findBy(array('is_published' => true), array('published' => 'desc'), $recentArticles);
        
        return array('articles' => $articles);
    }
    
    /**
     * @Template
     */
    public function categoriesWidgetAction()
    {
        $categories = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Category')
                ->findAll();
        
        return array('categories' => $categories);
    }
    
    /**
     * @Template
     */
    public function contactWidgetAction()
    {
        $config = $this->container->getParameter('schuh_blog');   
        $contact = $config['widgets']['contact'];
        
        return array('contact' => $contact);
    }
    
    /**
     * @Route(name="category", pattern="/category/{slug}")
     * @Template()
     */
    public function categoryAction($slug)
    {
        $config = $this->container->getParameter('schuh_blog');
        
        $articles = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Article')
                ->findByCategorySlug($slug, array('is_published' => true));

        if (0 === count($articles)) {
            throw $this->createNotFoundException('La page que vous demandez n\'existe pas');
        }
        
        $this->get('session')->set('selected_menu', 2);

        return array('articles' => $articles, 'chars' => $config['home']['characters_displayed']);
    }
    
    /**
     * @Template
     */
    public function topMenuAction()
    {
        $categories = $this->get('doctrine_mongo_db')
                ->getRepository('Schuh\BlogBundle\Document\Category')
                ->findAll();
        
        $selectedMenu = $this->get('session')->get('selected_menu', 1);
        
        return array('categories' => $categories, 'selectedMenu' => $selectedMenu);
    }
    
    /**
     * @Route(name="contact", pattern="contact")
     * @Template
     */
    public function contactAction()
    {
        $config = $this->container->getParameter('schuh_blog');
        
        $form = $this->createFormBuilder()
                ->add('mail', 'text', array('label' => 'Votre adresse mail', 'attr' => array('size' => 50)))
                ->add('message', 'textarea', array('label' => 'Tapez votre message', 'attr' => array('cols' => 50, 'rows' => 10)))
                ->getForm();
        
        $request = $this->get('request');

        if($request->isMethod('POST')) {
            $form->bindRequest($request);

            if($form->isValid()) {
                $values = $request->get('form');
                try {
                    $message = \Swift_Message::newInstance()
                        ->setSubject('Envoi depuis le blog')
                        ->setFrom($values['mail'])
                        ->setTo($config['widgets']['contact'])
                        ->setBody($values['mail'] . ' a écrit ' . $values['message']);
                        $this->get('mailer')->send($message);
                        $this->get('session')->getFlashBag()->add('notice', 'Votre message a été envoyé');
                } catch (\Exception $e) {
                    $this->get('session')->getFlashBag()->add('notice', 'Un problème est survenu pendant l\'envoi du message. Merci de rééssayer ultérieurement');
                }
                
                
            }
        }
        
        $this->get('session')->set('selected_menu', 3);
        
        return array('form' => $form->createView());
    }
}
