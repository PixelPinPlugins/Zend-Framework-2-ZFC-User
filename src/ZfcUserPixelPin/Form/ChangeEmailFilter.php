<?php

namespace ZfcUserPixelpin\Form;

use Zend\InputFilter\InputFilter;
use ZfcUserPixelpin\Options\AuthenticationOptionsInterface;

class ChangeEmailFilter extends InputFilter
{
    protected $emailValidator;

    public function __construct(AuthenticationOptionsInterface $options, $emailValidator)
    {
        $this->emailValidator = $emailValidator;

        $identityParams = array(
            'name'       => 'identity',
            'required'   => true,
            'validators' => array()
        );

        $identityFields = $options->getAuthIdentityFields();
        if ($identityFields == array('email')) {
            $validators = array('name' => 'EmailAddress');
            array_push($identityParams['validators'], $validators);
        }

        $this->add($identityParams);

        $this->add(array(
            'name'       => 'newIdentity',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
                $this->emailValidator
            ),
        ));

        $this->add(array(
            'name'       => 'newIdentityVerify',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'identical',
                    'options' => array(
                        'token' => 'newIdentity'
                    )
                ),
            ),
        ));
    }

    public function getEmailValidator()
    {
        return $this->emailValidator;
    }

    public function setEmailValidator($emailValidator)
    {
        $this->emailValidator = $emailValidator;
        return $this;
    }
}
