<?php

namespace Schuh\BlogBundle\DataFixtures\ODM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Schuh\BlogBundle\Document\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->createCategory('Economie', $manager);
        $this->createCategory('Droit', $manager);
        $this->createCategory('Informatique', $manager);
    }
    
    private function createCategory($name, $manager)
    {
        $category = new Category();
        $category->setName($name);
        $manager->persist($category);
        $manager->flush();
        $this->addReference('Category-'.$category->getName(), $category);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // l'ordre dans lequel les fichiers sont chargés
    }
}