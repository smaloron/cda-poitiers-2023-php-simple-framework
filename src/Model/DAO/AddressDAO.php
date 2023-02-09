<?php

namespace Seb\App\Model\DAO;

use \PDO;
use Seb\App\Model\Entity\Address;

class AddressDAO
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(Address $address)
    {
        $sql = "INSERT INTO adresses (rue, code_postal, ville)
                VALUES (:rue, :codePostal, :ville)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($address->toArray());
        $address->setId($this->pdo->lastInsertId());
    }

    private function hydrateEntity($data)
    {
        $address = new Address;
        $address
            ->setRue($data["rue"])
            ->setCodePostal($data["code_postal"])
            ->setVille($data["ville"])
            ->setId($data["id"]);

        return $address;
    }

    public function findOneById(int $id): Address
    {
        $sql = "SELECT * FROM adresses WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->hydrateEntity($data);
    }
}
