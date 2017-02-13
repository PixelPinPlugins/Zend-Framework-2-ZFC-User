<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:48 PM
 */

namespace ZfcUserPixelpin\Factory\Controller\Plugin;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserPixelpin\Controller;

class ZfcUserAuthentication implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceManager
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceManager)
    {
        $serviceLocator = $serviceManager->getServiceLocator();
        $authService = $serviceLocator->get('zfcuser_auth_service');
        $authAdapter = $serviceLocator->get('ZfcUserPixelpin\Authentication\Adapter\AdapterChain');
        $controllerPlugin = new Controller\Plugin\ZfcUserPixelpinAuthentication;
        $controllerPlugin->setAuthService($authService);
        $controllerPlugin->setAuthAdapter($authAdapter);
        return $controllerPlugin;
    }
}
