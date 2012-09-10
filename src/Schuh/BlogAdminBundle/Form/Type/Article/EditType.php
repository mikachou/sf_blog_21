<?php

namespace Schuh\BlogAdminBundle\Form\Type\Article;

use Admingenerated\SchuhBlogAdminBundle\Form\BaseArticleType\EditType as BaseEditType;
use Symfony\Component\Form\FormBuilderInterface;

class EditType extends BaseEditType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {    
        parent::buildForm($builder, $options);

        $builder->remove('text');
        $builder->add('text', 'textarea', array(
            'required' => true,
            'attr' => array(
                'class' => 'tinymce',
                'data-theme' => 'advanced' // simple, advanced, bbcode
        )));
    }
}
