<?php

declare(strict_types=1);

/*
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\ShariffBundle\Tests\Controller;

use Core23\ShariffBundle\Controller\BackendController;
use PHPUnit\Framework\TestCase;

class BackendControllerTest extends TestCase
{
    private $controller;

    protected function setUp(): void
    {
        $this->controller = new BackendController();
    }

    public function testItIsInstantiable(): void
    {
        $this->assertNotNull($this->controller);
    }
}
