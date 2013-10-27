<?php

namespace Reel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class GetController extends AbstractActionController
{

    public function indexAction()
    {
        $view = new ViewModel();

        return $view;
    }

    public function JsAction()
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


}

