<?php

namespace Reel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class GetController extends AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();

        return $view;
    }

    public function jsAction()
    {
        
        $response = $this->getResponse();
        
        $headers = $response->getHeaders();
        
        $headers->addHeaderLine('content-type', 'text/javascript');

        $view = new ViewModel(array(
            'id' => $this->params()->fromRoute('id'),
        ));

        $view->setTerminal(true);

        return $view;
    }
    
    public function jdGalleryAction()
    {
        $response = $this->getResponse();
        
        $headers = $response->getHeaders();
        
        $headers->addHeaderLine('content-type', 'text/javascript');
        
        $view = new ViewModel();
        
        $view->setTerminal(true);
        
        return $view;
    }
    
    public function styleAction()
    {
        $response = $this->getResponse();
        
        $headers = $response->getHeaders();
        
        $headers->addHeaderLine('content-type', 'text/css');
        
        $view = new ViewModel();
        
        $view->setTerminal(true);
        
        return $view;
    }
    

}

