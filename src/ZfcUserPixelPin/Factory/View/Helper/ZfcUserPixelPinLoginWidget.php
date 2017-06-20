<?php

namespace ZfcUserPixelpin\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserPixelpin\View;

class ZfcUserPixelpinLoginWidget implements FactoryInterface
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
        $viewHelper = new View\Helper\ZfcUserPixelpinLoginWidget;
        $viewHelper->setViewTemplate($locator->get('zfcuser_module_options')->getUserLoginWidgetViewTemplate());
        $viewHelper->setLoginForm($locator->get('zfcuser_login_form'));
        return $viewHelper;
    }
}
