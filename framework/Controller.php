<?php

namespace Seb\Framework;

abstract class Controller
{
    public function __construct(
        protected HTTPQuery $query,
        protected ViewEngine $viewEngine,
        protected DependencyContainerInterface $container
    ) {
    }

    protected function render(string $view, array $data = [])
    {
        $this->viewEngine->render($view, $data);
    }
}