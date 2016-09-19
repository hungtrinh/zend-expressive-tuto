<?php

namespace AlbumTest\Action;

use Zend\Expressive\Template\TemplateRenderInterface;
use Album\Action\ListPageFactory;
use Album\Action\ListPageAction;
use PHPUnit_Framework_TestCase as TestCase;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ListPageFactoryTest extends TestCase
{
    private function fakeContainer()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $dummyTemplate = $this->prophesize(TemplateRendererInterface::class);
        $container->get(TemplateRendererInterface::class)->willReturn($dummyTemplate);
        return $container->reveal();
    }

    public function testInvokeFactoryWillReturnListPageActionInstance()
    {
        $container = $this->fakeContainer();
        $factory = new ListPageFactory();
        $listPageAction = $factory($container);
        $this->assertInstanceOf(
            ListPageAction::class, 
            $listPageAction
        );
    }
}
