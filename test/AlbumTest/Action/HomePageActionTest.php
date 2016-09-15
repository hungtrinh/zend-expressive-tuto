<?php

namespace AlbumTest\Action;

use PHPUnit_Framework_TestCase;
use Album\Action\HomePageAction;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Diactoros\Response\HtmlResponse;

class HomePageActionTest extends PHPUnit_Framework_TestCase
{
    private function createMockTemplate()
    {
        $dummyTemplate = $this->prophesize(TemplateRendererInterface::class);
        $dummyTemplate->render('album::home-page',[])
            ->willReturn("Anything")
            ->shouldBeCalled();
        return $dummyTemplate->reveal();
    }

    public function testResponse()
    {
        $template = $this->createMockTemplate();
        $homePageAction = new HomePageAction($template);
        $response = $homePageAction(
            new ServerRequest(['/album']),
            new Response(),
            function () {
            }
        );
        $this->assertInstanceOf(HtmlResponse::class, $response);
    }
}
