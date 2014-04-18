<?php
namespace Application\Form;
use Zend\Form\Form;

class LoginForm extends Form
{

    public function __construct ($name = null)
    {
        parent::__construct('login');
        
        $this->add(
                array(
                        'name' => 'logUserName',
                        'type' => 'Text',
                        'options' => array(
                                'label' => 'Username'
                        ),
                        'attributes' => array(
                                'class' => 'form-control'
                        )
                ))
            ->add(
                array(
                        'name' => 'logPassword',
                        'type' => 'Password',
                        'options' => array(
                                'label' => 'Password'
                        ),
                        'attributes' => array(
                                'class' => 'form-control'
                        )
                ))
            ->add(
                array(
                        'name' => 'submit',
                        'type' => 'Submit',
                        'attributes' => array(
                                'value' => 'Login »',
                                'id' => 'submitbutton',
                                'class' => 'btn btn-success pull-right'
                        )
                ));
    }
}

