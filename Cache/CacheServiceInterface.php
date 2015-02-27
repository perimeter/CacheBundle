<?php

/*
 * This file is part of the Perimeter package.
 *
 * (c) Adobe Systems, Inc. <bshafs@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Perimeter\CacheBundle\Cache;

interface CacheServiceInterface
{
    public function store($data, $key, $expires = null);

    public function retrieve($key);

    public function isFresh($key);

    public function invalidate($key);
}
