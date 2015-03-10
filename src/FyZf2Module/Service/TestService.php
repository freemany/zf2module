<?php
namespace FyZf2Module\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class TestService implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;


    public function foo()
    {
        return 'foo';
    }
}
