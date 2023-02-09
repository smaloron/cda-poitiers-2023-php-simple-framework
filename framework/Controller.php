<?php

namespace Seb\Framework;

abstract class Controller
{
    public function __construct(protected HTTPQuery $query)
    {
    }
}