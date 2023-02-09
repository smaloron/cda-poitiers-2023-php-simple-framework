<?php

namespace Seb\Framework;

class HTTPQuery
{

    private array $queryData = [];


    public function __construct(string $queryString)
    {
        // id=5&name=test&age=8
        // [0]=> id=5
        // [1]=> name=test
        // [2]=> age=8
        $keyValuePairs = explode("&", $queryString);
        foreach ($keyValuePairs as $item) {
            $parts = explode("=", $item);
            if (count($parts) == 2) {
                $this->queryData[$parts[0]] = $parts[1];
            }
        }
    }
}