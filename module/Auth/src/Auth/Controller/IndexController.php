<?php
namespace Auth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Service\Auth\Test;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function loginAction()
    {
        $response = $this->getResponse();
        
        $testService = new Test();
        // $testService = $this->getServiceLocator()->get('Service\Auth\Test');
        
        $response->setContent($testService->helloWorld());
        
        return $response;
    }
}

