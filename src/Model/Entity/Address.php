<?php

namespace Seb\App\Model\Entity;

class Address
{
    private int $id;
    private string $rue;
    private string $codePostal;
    private string $ville;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of rue
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set the value of rue
     *
     * @return  self
     */
    public function setRue($rue)
    {
        $this->rue = $rue;

        return $this;
    }

    /**
     * Get the value of codePostal
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @return  self
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get the value of ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    public function toArray(): array
    {
        $data = [];
        $data["rue"] = $this->rue;
        $data["codePostal"] = $this->codePostal;
        $data["ville"] = $this->ville;
        return $data;
    }
}