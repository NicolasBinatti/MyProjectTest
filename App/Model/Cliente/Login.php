<?php

namespace App\Model\Cliente;

use App\Helpers\ConexaoPDO;

class Login {

    public function loadOneData($user, $pass) {
        $con = ConexaoPDO::getInstance();
        $sql = "select * from usuario where usuario = '$user' and senha = '$pass'";

        $sth = $con->prepare($sql);
        $sth->execute();
        return \App\Helpers\UtfEncode::utf8_encode_recursive($sth->fetch(\PDO::FETCH_ASSOC));
    }

}
