<?php

namespace Seb\Framework;

class DependencyContainer implements DependencyContainerInterface
{

    private array $container;

    public function add(string $key, callable $callback)
    {
        $this->container[$key] = $callback;
    }

    public function get(string $key)
    {
        if (array_key_exists($key, $this->container)) {
            return $this->container[$key]();
        }
    }
}