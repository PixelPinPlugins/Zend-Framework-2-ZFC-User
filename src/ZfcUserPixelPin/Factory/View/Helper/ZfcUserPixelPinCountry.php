<?php

namespace ZfcUserPixelpin\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserPixelpin\View;

class ZfcUserPixelpinCountry implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceManager
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $locator = $serviceManager->getServiceLocator();
        $viewHelper = new View\Helper\ZfcUserPixelpinCountry;
        $viewHelper->setAuthService($locator->get('zfcuser_auth_service'));
        return $viewHelper;
    }
}