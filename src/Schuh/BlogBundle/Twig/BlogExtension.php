<?

// src/Acme/DemoBundle/Twig/AcmeExtension.php
namespace Schuh\BlogBundle\Twig;

use Twig_Extension;
use Twig_Filter_Method;
use Schuh\BlogBundle\Document\Article;

class BlogExtension extends Twig_Extension
{   
    public function getFilters()
    {
        return array(
            'publication' => new Twig_Filter_Method($this, 'publicationFilter'),
        );
    }

    public function publicationFilter(Article $article)
    {
        return sprintf('Par %s %s', 
                $article->getAuthor(), 
                null !== $article->getPublished()
                    ? 'le ' . $article->getPublished()->format('d/m/Y')
                    : null);
    }

    public function getName()
    {
        return 'blog_extension';
    }
}