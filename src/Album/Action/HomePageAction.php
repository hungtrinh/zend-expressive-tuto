<?php

namespace Album\Action;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageAction
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
     * @return JsonResponse
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) {
        return new JsonResponse(['hello'=>'hello hung']);
    }
}
