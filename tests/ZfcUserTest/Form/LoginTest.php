<?php

namespace ZfcUserPixelpinTest\Form;

use ZfcUserPixelpin\Form\Login as Form;

class LoginTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ZfcUserPixelpin\Form\Login::__construct
     * @dataProvider providerTestConstruct
     */
    public function testConstruct($authIdentityFields = array())
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\AuthenticationOptionsInterface');
        $options->expects($this->once())
                ->method('getAuthIdentityFields')
                ->will($this->returnValue($authIdentityFields));

        $form = new Form(null, $options);

        $elements = $form->getElements();

        $this->assertArrayHasKey('identity', $elements);
        $this->assertArrayHasKey('credential', $elements);

        $expectedLabel="";
        if (count($authIdentityFields) > 0) {
            foreach ($authIdentityFields as $field) {
                $expectedLabel .= ($expectedLabel=="") ? '' : ' or ';
                $expectedLabel .= ucfirst($field);
                $this->assertContains(ucfirst($field), $elements['identity']->getLabel());
            }
        }

        $this->assertEquals($expectedLabel, $elements['identity']->getLabel());
    }

    /**
     * @covers ZfcUserPixelpin\Form\Login::getAuthenticationOptions
     * @covers ZfcUserPixelpin\Form\Login::setAuthenticationOptions
     */
    public function testSetGetAuthenticationOptions()
    {
        $options = $this->getMock('ZfcUserPixelpin\Options\AuthenticationOptionsInterface');
        $options->expects($this->once())
                ->method('getAuthIdentityFields')
                ->will($this->returnValue(array()));
        $form = new Form(null, $options);

        $this->assertSame($options, $form->getAuthenticationOptions());
    }

    public function providerTestConstruct()
    {
        return array(
            array(array()),
            array(array('email')),
            array(array('username','email')),
        );
    }
}
