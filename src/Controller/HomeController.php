<?php

namespace Seb\App\Controller;

use Seb\Framework\Controller;
use Seb\Framework\HTTPQuery;

class HomeController extends Controller
{

    public function index()
    {
        echo "Je suis sur la page d'accueil";
        var_dump($this->query);
    }
}