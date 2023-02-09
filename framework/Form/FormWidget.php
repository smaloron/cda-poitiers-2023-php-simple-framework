<?php

namespace Seb\Framework\Form;

class FormWidget
{

    protected string $name;
    protected string $label;
    protected string $value;
    protected $decorator = null;

    public function __construct(string $label, string $name, string $value = "")
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        return $this->value;
    }
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function isValid(): bool
    {
        return !empty($this->value);
    }

    public function setDecorator($decorator)
    {
        $this->decorator = $decorator;
    }

    public function getHTML(): string
    {
        $html = "
        <label>{$this->label}</label>
        <input name='{$this->name}' value='{$this->value}'>
        ";

        if ($this->decorator instanceof DivDecorator) {
            $html = $this->decorator->getHTML($html);
        }

        return $html;
    }
}