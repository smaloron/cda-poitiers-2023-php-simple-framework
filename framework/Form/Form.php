<?php

namespace Seb\Framework\Form;

class Form
{
    private bool $posted = false;
    /**
     * Liste des contrôles de formulaire
     *
     * @var FormWidget[] | Array<FormWidget>
     */
    private array $widgets;

    public function __construct(
        private string $method = "post",
        private string $action = ""
    ) {
    }

    /**
     * Ajout d'un champ au formulaire
     * Les champs sont stockés dans un tableau asociatif 
     * dont les clefs sont les attributs name des champs
     *
     * @param FormWidget $widget
     * @return self
     */
    public function addWiget(FormWidget $widget): Form
    {
        $this->widgets[$widget->getName()] = $widget;
        return $this;
    }

    /**
     * Concatène les rendus HTML de tous les champs du formulaire
     *
     * @return string
     */
    private function getWidgetsContent(): string
    {
        $content = "";
        foreach ($this->widgets as $item) {
            $content .= $item->getHTML();
        }

        return $content;
    }

    public function getHTML(): string
    {
        $action = empty($this->action) ? "" : "action='{$this->action}'";
        $html = "<form method='{$this->method}' $action>";
        $html .= $this->getWidgetsContent();
        $html .= "<div><button type='submit' name='submit'>Valider</button></div>";
        $html .= "</form>";
        return $html;
    }

    public function isPosted(): bool
    {
        return $this->posted;
    }

    public function hydrate(array $data): void
    {
        $this->posted = isset($data["submit"]);

        foreach ($data as $key => $val) {
            if (array_key_exists($key, $this->widgets)) {
                $this->widgets[$key]->setValue($val);
            }
        }
    }

    public function isValid(): bool
    {
        foreach ($this->widgets as $widget) {
            if (!$widget->isValid()) {
                return false;
            }
        }

        return true;
    }

    /**
     * Retourne un tableau associatif 
     * des saisies du formulaire
     *
     * @return array
     */
    public function getData(): array
    {
        $data = [];
        foreach ($this->widgets as $widget) {
            $data[$widget->getName()] = $widget->getValue();
        }
        return $data;
    }
}