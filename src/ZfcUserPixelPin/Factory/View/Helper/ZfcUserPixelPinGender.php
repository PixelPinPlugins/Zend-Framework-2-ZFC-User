<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:52 PM
 */

namespace ZfcUserPixelpin\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserPixelpin\View;

class ZfcUserPixelpinGender implements FactoryInterface
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
        $viewHelper = new View\Helper\ZfcUserPixelpinGender;
        $viewHelper->setAuthService($locator->get('zfcuser_auth_service'));
        return $viewHelper;
    }
}