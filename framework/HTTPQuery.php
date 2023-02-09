<?php

namespace Seb\Framework;

class HTTPQuery
{

    private array $queryData = [];
    private array $postedData = [];


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

        $this->postedData = $_POST;
    }

    public function getPostedData(): array
    {
        return $this->postedData;
    }

    public function hasPostedData(): bool
    {
        return count($this->postedData) > 0;
    }

    public function getQueryData(): array
    {
        return $this->queryData;
    }

    public function get(string $key): ?string
    {
        if (array_key_exists($key, $this->queryData)) {
            return $this->queryData[$key];
        }
        if (array_key_exists($key, $this->postedData)) {
            return $this->postedData[$key];
        } else {
            return null;
        }
    }
}