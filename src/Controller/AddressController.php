<?php

namespace Seb\App\Controller;

use Seb\Framework\Controller;
use PDO;
use Seb\App\Model\DAO\AddressDAO;
use Seb\App\Model\Entity\Address;

class AddressController extends Controller
{

    public function details(int $id)
    {

        $dao = $this->container->get("dao.address");

        $this->render("address/detail-view", [
            "address" => $dao->findOneById($id)
        ]);
    }

    public function new()
    {
        $form = $this->container->get("form.address");

        $form->hydrate($this->query->getPostedData());

        if ($form->isPosted() && $form->isValid()) {
            $dao = $this->container->get("dao.address");
            $address = new Address;
            $address->setRue($this->query->get("rue"));
            $address->setCodePostal($this->query->get("code_postal"));
            $address->setVille($this->query->get("ville"));

            $dao->insert($address);
        }

        $this->render("address/form-view", ["form" => $form]);
    }
}