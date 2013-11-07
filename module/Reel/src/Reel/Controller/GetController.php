<?php
namespace Reel\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class GetController extends AbstractActionController
{

    public function indexAction ()
    {
        $view = new ViewModel();
        
        return $view;
    }

    public function jsAction ()
    {
        
        /*
         * THIS GOES TO A BUSINESS SERVICE!!!
         */

        $objectManager = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        
        $apiKey = $this->params()->fromRoute('id');
        
        $site = $objectManager->getRepository('Reel\Entity\Site')
            ->findOneBy(
                array(
                        'apiKey' => $apiKey
                ));
        
        
        /*
         * END BUSINESS SERVICE
         */
        
        $response = $this->getResponse();
        
        $headers = $response->getHeaders();
        
        $headers->addHeaderLine('content-type', 'text/javascript');
        
        $config = $this->getServiceLocator()->get('config');
        
        $view = new ViewModel(
                array(
                        'container' => $this->params()->fromRoute('container'),
                        'host' => $config['host'],
                        'images' => $site->getImages(),
                        'domain' => $site->getDomain(),
                ));
        
        $view->setTerminal(true);
        
        return $view;
    }
}

