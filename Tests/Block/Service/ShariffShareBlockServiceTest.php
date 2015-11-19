<?php

/*
 * This file is part of the ni-ju-san CMS.
 *
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core23\ShariffBundle\Tests\Block\Service;

use Core23\ShariffBundle\Block\Service\ShariffShareBlockService;
use Sonata\BlockBundle\Block\BlockContext;
use Sonata\BlockBundle\Model\Block;
use Sonata\BlockBundle\Tests\Block\AbstractBlockServiceTest;
use Sonata\BlockBundle\Tests\Block\Service\FakeTemplating;

class ShariffShareBlockServiceTest extends AbstractBlockServiceTest
{
    protected function setUp()
    {
        parent::setUp();

        $this->templating      = new FakeTemplating();
    }

    public function testDefaultSettings()
    {
        $blockService = new ShariffShareBlockService('block.service', $this->templating, $this->container);
        $blockContext = $this->getBlockContext($blockService);

        $this->assertSettings(array(
            'url'            => null,
            'class'          => '',
            'services'       => array('twitter', 'facebook', 'googleplus'),
            'theme'          => 'standard',
            'orientation'    => 'horizontal',
            'flattrUser'     => null,
            'flattrCategory' => null,
            'template'       => 'Core23ShariffBundle:Block:block_shariff.html.twig',
        ), $blockContext);
    }

    public function testExecute()
    {
        $block = new Block();

        $blockContext = new BlockContext($block, array(
            'url'            => null,
            'class'          => '',
            'services'       => array('twitter', 'facebook', 'googleplus'),
            'theme'          => 'standard',
            'orientation'    => 'horizontal',
            'flattrUser'     => null,
            'flattrCategory' => null,
            'template'       => 'Core23ShariffBundle:Block:block_shariff.html.twig',
        ));

        $blockService = new ShariffShareBlockService('block.service', $this->templating, $this->container);
        $blockService->execute($blockContext);

        $this->assertSame($blockContext, $this->templating->parameters['context']);
        $this->assertInternalType('array', $this->templating->parameters['settings']);
        $this->assertInstanceOf('Sonata\BlockBundle\Model\BlockInterface', $this->templating->parameters['block']);
    }
}
