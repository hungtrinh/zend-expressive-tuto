<?php

namespace Album\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class HomePageFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $template = $container->get(TemplateRendererInterface::class);
        return new HomePageAction($template);
    }
}
