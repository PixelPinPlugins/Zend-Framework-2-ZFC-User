<?php

namespace ZfcUserPixelpinTest\Form;

use ZfcUserPixelpin\Form\LoginFilter as Filter;

class LoginFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZfcUserPixelpin\Form\LoginFilter::__construct
     */
    public function testConstruct()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $options->expects($this->once())
                ->method('getAuthIdentityFields')
                ->will($this->returnValue(array()));

        $filter = new Filter($options);

        $inputs = $filter->getInputs();
        $this->assertArrayHasKey('identity', $inputs);
        $this->assertArrayHasKey('credential', $inputs);

        $this->assertEquals(0, $inputs['identity']->getValidatorChain()->count());
    }

    /**
     * @covers ZfcUserPixelpin\Form\LoginFilter::__construct
     */
    public function testConstructIdentityEmail()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\ModuleOptions');
        $options->expects($this->once())
                ->method('getAuthIdentityFields')
                ->will($this->returnValue(array('email')));

        $filter = new Filter($options);

        $inputs = $filter->getInputs();
        $this->assertArrayHasKey('identity', $inputs);
        $this->assertArrayHasKey('credential', $inputs);

        $identity = $inputs['identity'];

        // test email as identity
        $validators = $identity->getValidatorChain()->getValidators();
        $this->assertArrayHasKey('instance', $validators[0]);
        $this->assertInstanceOf('\Zend\Validator\EmailAddress', $validators[0]['instance']);
    }
}
