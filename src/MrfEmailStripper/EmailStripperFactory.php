<?php
namespace MrfEmailStripper;
use EmailStripper\EmailStripper;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EmailStripperFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \EmailStripper\EmailStripper|void
     * @throws \RuntimeException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        if (!array_key_exists('email-stripper', $config) || !is_array($config['email-stripper'])) {
            throw new \RuntimeException('No EmailStripper configs');
        }

        $emConfig = $config['email-stripper'];
        if (!array_key_exists('strippers', $emConfig) || !is_array($emConfig['strippers'])) {
            throw new \RuntimeException('No strippers set in EmailStripper config');
        }

        $emailStripper = new EmailStripper();
        foreach ($emConfig['strippers'] as $stripper) {
            $emailStripper->addStripper($stripper);
        }

        return $emailStripper;
    }
}