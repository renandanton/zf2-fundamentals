<?php
namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Submit;

class PostForm extends Form
{
    private $categories;

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function buildForm()
    {
        $this->setAttribute("method", "POST");

        $category = new Select('category');
        $category->setLabel('Category')
                 ->setValueOptions(
                    array_combine($this->categories, $this->categories)
                  );

        $title = new Text('title');
        $title->setLabel('Title')
              ->setAttributes(['size' => 25, 'maxLength' => 128]);

        $submit = new Submit('submit');
        $submit->setAttribute('value', 'Post');

        $this->add($category)
             ->add($title)
             ->add($submit);

    }
}
