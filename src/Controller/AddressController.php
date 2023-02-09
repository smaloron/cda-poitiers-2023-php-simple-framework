<?php

namespace Seb\App\Controller;

use Seb\Framework\Controller;

class AddressController extends Controller
{

    public function details(int $id)
    {
        echo "adresse id = $id";
    }
}