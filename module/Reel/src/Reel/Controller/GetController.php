<?php
namespace Reel\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Doctrine\ORM\EntityManager;
use Reel\Entity\Site;
use Reel\Entity\GalleryProperties;

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

        /** @var $objectManager EntityManager */
        $objectManager = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        
        $apiKey = $this->params()->fromRoute('id');

        /** @var $site Site */
        $site = $objectManager->getRepository('Reel\Entity\Site')
            ->findOneBy(
                array(
                        'apiKey' => $apiKey
                ));

        /** @var $galleryConfigs GalleryProperties */
        $galleryConfigs = $site->getGalleryProperties();
        
        $arrGalleryConfigs = array(
                'timed' => $galleryConfigs->getTimed(),
                'delay' => $galleryConfigs->getDelay(),
                'showCarrousel' => $galleryConfigs->getShowCarrousel(),
                'textShowCarrousel' => $galleryConfigs->getTextShowCarrousel(),
                'showInfoPane' => $galleryConfigs->getShowInfopane()
                );
        
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
                        'galleryConfigs' => $arrGalleryConfigs,
                ));
        
        $view->setTerminal(true);
        
        return $view;
    }
}

