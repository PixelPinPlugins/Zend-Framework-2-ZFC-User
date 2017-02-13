<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 3/10/2015
 * Time: 9:34 AM
 */

namespace ZfcUserPixelpin\Factory\Form;

use Zend\Form\FormElementManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfcUserPixelpin\Form;

class ChangePassword implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $formElementManager)
    {
        if ($formElementManager instanceof FormElementManager) {
            $sm = $formElementManager->getServiceLocator();
            $fem = $formElementManager;
        } else {
            $sm = $formElementManager;
            $fem = $sm->get('FormElementManager');
        }

        $options = $sm->get('zfcuser_module_options');
        $form = new Form\ChangePassword(null, $options);
        // Inject the FormElementManager to support custom FormElements
        $form->getFormFactory()->setFormElementManager($fem);

        $form->setInputFilter(new Form\ChangePasswordFilter($options));

        return $form;
    }
}
