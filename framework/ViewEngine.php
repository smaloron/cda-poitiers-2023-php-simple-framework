<?php

namespace Seb\Framework;

use Exception;

class ViewEngine
{
    public function render(string $view, array $data = [])
    {
        $viewPath = ROOT_PATH . "/view/$view.php";
        if (file_exists($viewPath)) {
            $data["view"] = $this;
            extract($data);
            require $viewPath;
        } else {
            throw new Exception("Vue introuvable");
        }
    }
}
