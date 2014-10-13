<?php

namespace Perimeter\CacheBundle\Tests\DependencyInjection;

use Perimeter\CacheBundle\DependencyInjection\PerimeterCacheExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class PerimterCacheExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testLoad()
    {
        $ext = new PerimeterCacheExtension;
        $container = new ContainerBuilder;

        $ext->load(array(), $container);

        $this->assertTrue($container->has('memento.client'));

        $this->assertInstanceOf('Memento\\Client', $container->get('memento.client'));
        $this->assertInstanceOf('Memento\\Engine\\File', $container->get('memento.client')->getEngine());

        $this->assertEquals('perimeter', $container->getParameter('perimeter.cache.prefix'));
    }
}