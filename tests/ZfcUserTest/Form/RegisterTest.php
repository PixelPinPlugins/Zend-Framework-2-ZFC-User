<?php

namespace ZfcUserPixelpinTest\Form;

use ZfcUserPixelpin\Form\Register as Form;

class RegisterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerTestConstruct
     */
    public function testConstruct($useCaptcha = false)
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\RegistrationOptionsInterface');
        $options->expects($this->once())
                ->method('getEnableUsername')
                ->will($this->returnValue(false));
        $options->expects($this->once())
                ->method('getEnableDisplayName')
                ->will($this->returnValue(false));
        $options->expects($this->any())
                ->method('getUseRegistrationFormCaptcha')
                ->will($this->returnValue($useCaptcha));
        if ($useCaptcha && class_exists('\Zend\Captcha\AbstractAdapter')) {
            $captcha = $this->getMockForAbstractClass('\Zend\Captcha\AbstractAdapter');

            $options->expects($this->once())
                ->method('getFormCaptchaOptions')
                ->will($this->returnValue($captcha));
        }

        $form = new Form(null, $options);

        $elements = $form->getElements();

        $this->assertArrayNotHasKey('userId', $elements);
        $this->assertArrayNotHasKey('username', $elements);
        $this->assertArrayNotHasKey('display_name', $elements);
        $this->assertArrayHasKey('email', $elements);
        $this->assertArrayHasKey('password', $elements);
        $this->assertArrayHasKey('passwordVerify', $elements);
    }

    public function providerTestConstruct()
    {
        return array(
            array(true),
            array(false)
        );
    }

    public function testSetGetRegistrationOptions()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\RegistrationOptionsInterface');
        $options->expects($this->once())
                ->method('getEnableUsername')
                ->will($this->returnValue(false));
        $options->expects($this->once())
                ->method('getEnableDisplayName')
                ->will($this->returnValue(false));
        $options->expects($this->any())
                ->method('getUseRegistrationFormCaptcha')
                ->will($this->returnValue(false));
        $form = new Form(null, $options);

        $this->assertSame($options, $form->getRegistrationOptions());

        $optionsNew = $this->getMock('ZfcUserPixelpin\Options\RegistrationOptionsInterface');
        $form->setRegistrationOptions($optionsNew);
        $this->assertSame($optionsNew, $form->getRegistrationOptions());
    }

    public function testSetCaptchaElement()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\RegistrationOptionsInterface');
        $options->expects($this->once())
                ->method('getEnableUsername')
                ->will($this->returnValue(false));
        $options->expects($this->once())
                ->method('getEnableDisplayName')
                ->will($this->returnValue(false));
        $options->expects($this->any())
                ->method('getUseRegistrationFormCaptcha')
                ->will($this->returnValue(false));

        $captcha = $this->getMock('\Zend\Form\Element\Captcha');
        $form = new Form(null, $options);

        $form->setCaptchaElement($captcha);

        $reflection = $this->helperMakePropertyAccessable($form, 'captchaElement');
        $this->assertSame($captcha, $reflection->getValue($form));
    }


    /**
     *
     * @param mixed $objectOrClass
     * @param string $property
     * @param mixed $value = null
     * @return \ReflectionProperty
     */
    public function helperMakePropertyAccessable ($objectOrClass, $property, $value = null)
    {
        $reflectionProperty = new \ReflectionProperty($objectOrClass, $property);
        $reflectionProperty->setAccessible(true);

        if ($value !== null) {
            $reflectionProperty->setValue($objectOrClass, $value);
        }
        return $reflectionProperty;
    }
}
