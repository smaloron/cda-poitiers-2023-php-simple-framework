<?php

namespace Seb\App\Controller;

use Seb\Framework\Controller;
use Seb\Framework\HTTPQuery;
use Seb\Framework\ViewEngine;

class HomeController extends Controller
{

    public function index()
    {

        $this->render(
            "default-view",
            ["title" => "Bonjour"]
        );
    }

    public function details(int $id)
    {
        echo "Vous êtes sur la page $id";
    }
}
