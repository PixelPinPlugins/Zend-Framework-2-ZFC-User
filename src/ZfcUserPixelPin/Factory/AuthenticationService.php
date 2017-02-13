<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:40 PM
 */

namespace ZfcUserPixelpin\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationService implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new \Zend\Authentication\AuthenticationService(
            $serviceLocator->get('ZfcUserPixelpin\Authentication\Storage\Db'),
            $serviceLocator->get('ZfcUserPixelpin\Authentication\Adapter\AdapterChain')
        );
    }
}
