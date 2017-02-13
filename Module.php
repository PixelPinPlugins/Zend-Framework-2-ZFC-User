<?php

namespace ZfcUserPixelpin;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getControllerPluginConfig()
    {
        return array(
            'factories' => array(
                'zfcUserAuthentication' => 'ZfcUserPixelpin\Factory\Controller\Plugin\ZfcUserAuthentication',
            ),
        );
    }

    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'zfcuser' => 'ZfcUserPixelpin\Factory\Controller\UserControllerFactory',
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'zfcUserDisplayName' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinDisplayName',
                'zfcUserLastName' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinLastName',
                'zfcUserEmail' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinEmail',
                'zfcUserIdentity' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinIdentity',
                'zfcUserLoginWidget' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinLoginWidget',
                'zfcUserGender' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinGender',
                'zfcUserBirthdate' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinBirthdate',
                'zfcUserPhoneNumber' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinPhoneNumber',
                'zfcUserAddress' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinAddress',
                'zfcUserCountry' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinCountry',
                'zfcUserRegion' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinRegion',
                'zfcUserCity' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinCity',
                'zfcUserZip' => 'ZfcUserPixelpin\Factory\View\Helper\ZfcUserPixelpinZip',
            ),
        );

    }

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'zfcuser_zend_db_adapter' => 'Zend\Db\Adapter\Adapter',
            ),
            'invokables' => array(
                'zfcuser_register_form_hydrator'    => 'Zend\Stdlib\Hydrator\ClassMethods',
            ),
            'factories' => array(
                'zfcuser_redirect_callback' => 'ZfcUserPixelpin\Factory\Controller\RedirectCallbackFactory',
                'zfcuser_module_options' => 'ZfcUserPixelpin\Factory\Options\ModuleOptions',
                'ZfcUserPixelpin\Authentication\Adapter\AdapterChain' => 'ZfcUserPixelpin\Authentication\Adapter\AdapterChainServiceFactory',

                // We alias this one because it's ZfcUserPixelpin's instance of
                // Zend\Authentication\AuthenticationService. We don't want to
                // hog the FQCN service alias for a Zend\* class.
                'zfcuser_auth_service' => 'ZfcUserPixelpin\Factory\AuthenticationService',

                'zfcuser_user_hydrator' => 'ZfcUserPixelpin\Factory\UserHydrator',
                'zfcuser_user_mapper' => 'ZfcUserPixelpin\Factory\Mapper\User',

                'zfcuser_login_form'            => 'ZfcUserPixelpin\Factory\Form\Login',
                'zfcuser_register_form'         => 'ZfcUserPixelpin\Factory\Form\Register',
                'zfcuser_change_password_form'  => 'ZfcUserPixelpin\Factory\Form\ChangePassword',
                'zfcuser_change_email_form'     => 'ZfcUserPixelpin\Factory\Form\ChangeEmail',

                'ZfcUserPixelpin\Authentication\Adapter\Db' => 'ZfcUserPixelpin\Factory\Authentication\Adapter\DbFactory',
                'ZfcUserPixelpin\Authentication\Storage\Db' => 'ZfcUserPixelpin\Factory\Authentication\Storage\DbFactory',

                'zfcuser_user_service'              => 'ZfcUserPixelpin\Factory\Service\UserFactory',
            ),
        );
    }
}
