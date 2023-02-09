<?php

namespace Seb\App\Controller;

use Seb\Framework\Controller;
use PDO;
use Seb\App\Model\DAO\AddressDAO;

class AddressController extends Controller
{

    public function details(int $id)
    {

        $dao = $this->container->get("dao.address");

        $this->render("address/detail-view", [
            "address" => $dao->findOneById($id)
        ]);
    }
}