<?php

namespace Album\Action;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class ListPageAction
{
    private $template;
    public function __construct(TemplateRendererInterface $template)
    {
        $this->template = $template;
    }
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable| null $next
     *
     * @return HtmlResponse
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        return new HtmlResponse($this->template->render('album::home-page', []));
    }
}
