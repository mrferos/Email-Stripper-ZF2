<?php
namespace MrfEmailStripperTest;

use MrfEmailStripper\EmailStripperFactory;

class EmailStripperFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException RuntimeException
     * @expectedExceptionMessage No EmailStripper configs
     */
    public function testCreateServiceWithNoConfigSet()
    {
        $serviceManager = $this->getMock('Zend\ServiceManager\ServiceManager');
        $serviceManager->expects($this->any())->method('get')->will($this->returnValue(array(
            'no_config' => '4 u'
        )));

        $emailStripperFactory = new EmailStripperFactory();
        $emailStripperFactory->createService($serviceManager);
    }

    /**
     * @expectedException RuntimeException
     * @expectedExceptionMessage No strippers set in EmailStripper config
     */
    public function testCreateServiceWithNoStrippersSet()
    {
        $serviceManager = $this->getMock('Zend\ServiceManager\ServiceManager');
        $serviceManager->expects($this->any())->method('get')->will($this->returnValue(array(
            'email-stripper' => array(
                'no_strippers' => '4 u'
            )
        )));

        $emailStripperFactory = new EmailStripperFactory();
        $emailStripperFactory->createService($serviceManager);
    }

    public function testCreateService()
    {
        $serviceManager = $this->getMock('Zend\ServiceManager\ServiceManager');
        $serviceManager->expects($this->any())->method('get')->will($this->returnValue(array(
            'email-stripper' => array(
                'strippers' => array(
                    'QuotedReplies'
                )
            )
        )));

        $emailStripperFactory = new EmailStripperFactory();
        $emailStripper = $emailStripperFactory->createService($serviceManager);
        $this->assertInstanceOf('\EmailStripper\EmailStripper', $emailStripper);
    }
}
