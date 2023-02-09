<?php

namespace Seb\Framework;

interface DependencyContainerInterface
{
    public function add(string $key, callable $callback);

    public function get(string $key);
}