<?php

namespace Seb\Framework;

class Controller
{
    public function __construct(protected HTTPQuery $query)
    {
    }
}