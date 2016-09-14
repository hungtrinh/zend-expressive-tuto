<?php

namespace AlbumTest\Action;

use Zend\Expressive\Template\TemplateRenderInterface;
use Album\Action\HomePageFactory;
use Album\Action\HomePageAction;
use PHPUnit_Framework_TestCase as TestCase;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageFactoryTest extends TestCase
{
    private function fakeContainer()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $dummyTemplate = $this->prophesize(TemplateRendererInterface::class);
        $container->get(TemplateRendererInterface::class)->willReturn($dummyTemplate);
        // $container = $this->getMockBuilder(ContainerInterface::class)
        //                 ->disableOriginalConstructor()
        //                 ->getMock();
        // $template = $this->getMockBuilder(TemplateRendererInterface::class)
        //                 ->disableOriginalConstructor()
        //                 ->getMock();
        // $container->expects($this->once())
        //         ->method('get') 
        //         ->with($this->equalTo(TemplateRendererInterface::class))
        //         ->willReturn($template);
        return $container;
    }

    public function testInvokeFactoryWillReturnHomePageActionInstance()
    {
        $container = $this->fakeContainer();
        $factory = new HomePageFactory();
        $homePageAction = $factory($container->reveal());

        $this->assertInstanceOf(
            HomePageAction::class, 
            $homePageAction
        );
    }
}