<?php

namespace Seb\Framework\Form;

class DivDecorator
{

    public function getHtml(string $content): string
    {
        return "<div>$content</div>";
    }
}