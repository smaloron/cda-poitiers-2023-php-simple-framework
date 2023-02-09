<?php

namespace Seb\App\Controller;

use Seb\Framework\Controller;
use PDO;
use Seb\App\Model\DAO\AddressDAO;

class AddressController extends Controller
{

    public function details(int $id)
    {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=cda_poitiers_2023_sql;charset=utf8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        $dao = new AddressDAO($pdo);

        $this->render("address/detail-view", [
            "address" => $dao->findOneById($id)
        ]);
    }
}