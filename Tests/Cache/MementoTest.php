<?php

/*
 * This file is part of the Perimeter package.
 *
 * (c) Adobe Systems, Inc. <bshafs@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Perimeter\CacheBundle\Tests\Cache;

use Perimeter\CacheBundle\Cache\Memento;
use Memento\Engine\File;
use Memento\Client;

class MementoTest extends \PHPUnit_Framework_TestCase
{
    public function testMemento()
    {
        $fileStorage = new File(array('path' => '/tmp/memento'));

        $client = new Client($fileStorage);

        $cache  = new Memento($client);

        $cache->store('store a string', 'test-1', 1);

        $this->assertTrue($cache->isFresh('test-1'));
        $this->assertEquals('store a string', $cache->retrieve('test-1'));

        $cache->invalidate('test-1');

        $this->assertFalse($cache->isFresh('test-1'));
        $this->assertFalse($cache->retrieve('test-1'));
    }

    public function testMementoWithoutConstructor()
    {
        $cache  = new Memento();

        $this->assertFalse($cache->isFresh('this-doesnt-exist'));
    }
}
