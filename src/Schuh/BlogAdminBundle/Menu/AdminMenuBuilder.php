<?php

namespace Schuh\BlogAdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\DependencyInjection\ContainerAware;

class AdminMenuBuilder extends ContainerAware
{
    protected $factory;

    /**
     * @param \Knp\Menu\FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Request $request
     * @param Router  $router
     */
    public function createAdminMenu(Request $request)
    {
        $menu = $this->factory->createItem('root', array('childrenAttributes' => array('id' => 'main_navigation', 'class'=>'menu') ) );
        
        $articles = $menu->addChild('Articles', array('route' => 'Schuh_BlogAdminBundle_Article_list'));
        $articles->setLinkAttributes(array('class'=>'sub main'));
        
        $category = $menu->addChild('Catégories', array('route' => 'Schuh_BlogAdminBundle_Category_list'));
        $category->setLinkAttributes(array('class'=>'sub main'));
        
        $site = $menu->addChild('Aller sur le site', array('route' => 'homepage'));
        $site->setLinkAttributes(array('class'=>'sub main'));

        return $menu;
    }
}
