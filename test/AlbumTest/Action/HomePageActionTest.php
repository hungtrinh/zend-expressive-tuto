<?php

namespace AlbumTest\Action;

use PHPUnit_Framework_TestCase;
use Album\Action\HomePageAction;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageActionTest extends PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $dummyTemplate = $this->prophesize(TemplateRendererInterface::class)->reveal();
        $homePageAction = new HomePageAction($dummyTemplate);
        $response = $homePageAction(
            new ServerRequest(['/album']),
            new Response(),
            function () {
            }
        );
        $json = json_decode((string) $response->getBody());

        $this->assertNotNull($json->hello);
        $this->assertEquals('hello hung', $json->hello);
    }
}
