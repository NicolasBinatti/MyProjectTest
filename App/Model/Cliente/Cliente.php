<?php

namespace App\Model\Cliente;

use App\Helpers\ConexaoPDO;

class Cliente {

    public function saveData($data) {
        try {
            $con = ConexaoPDO::getInstance();
            $sql = "INSERT INTO cliente (nome, email, datanascimento, sexo, nomemae, nomepai, cep, cidade, rua, uf) VALUES
                    ('$data[nome]', '$data[email]', '$data[datanascimento]', '$data[sexo]', '$data[nomemae]',
                    '$data[nomepai]', '$data[cep]', '$data[cidade]', '$data[rua]', '$data[uf]')";

            $sth = $con->prepare($sql);
            $sth->execute();

            return ["code" => 200, "msg" => "Salvo com Sucessso"];
        } catch (PDOException $Exception) {
            return ["code" => $Exception->getCode(), "msg" => $Exception->getMessage()];
        }
    }

    public function loadAllData() {
        $con = ConexaoPDO::getInstance();
        $sql = 'select 
                    *, 
                    DATE_FORMAT(datanascimento, "%d/%m/%Y") as nasc, 
                    upper(sexo) as sex 
                from cliente
                order by datamovimento desc';

        $sth = $con->prepare($sql);
        $sth->execute();
        return \App\Helpers\UtfEncode::utf8_encode_recursive($sth->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function loadOneData($idcliente) {
        $con = ConexaoPDO::getInstance();
        $sql = "select 
                    *
                from cliente
                where idcliente = $idcliente";

        $sth = $con->prepare($sql);
        $sth->execute();
        return \App\Helpers\UtfEncode::utf8_encode_recursive($sth->fetch(\PDO::FETCH_ASSOC));
    }

    public function delete($idcliente) {
        try {
            if (empty($idcliente)) {
                throw new PDOException('Cliente Invalido');
            }

            $con = ConexaoPDO::getInstance();
            $sql = "DELETE FROM cliente WHERE idcliente = $idcliente";
            $sth = $con->prepare($sql);
            $sth->execute();

            return ["code" => 200, "msg" => "Deletedo com Sucessso"];
        } catch (PDOException $Exception) {
            return ["code" => $Exception->getCode(), "msg" => $Exception->getMessage()];
        }
    }

    public function update($data) {
        try {
            if (empty($data['idcliente'])) {
                throw new PDOException('Cliente Invalido');
            }

            $con = ConexaoPDO::getInstance();
            $sql = "UPDATE cliente SET
                        nome = '$data[nome]',
                        email = '$data[email]',
                        datanascimento = '$data[datanascimento]',
                        sexo = '$data[sexo]',
                        nomemae = '$data[nomemae]',
                        nomepai = '$data[nomepai]',
                        cep = '$data[cep]',
                        cidade = '$data[cidade]',
                        rua = '$data[rua]',
                        uf = '$data[uf]',
                        datamovimento = CURRENT_TIMESTAMP
                    where 
                        idcliente =  $data[idcliente]";

            $sth = $con->prepare($sql);
            $sth->execute();

            return ["code" => 200, "msg" => "Alterado com Sucesso"];
        } catch (PDOException $Exception) {
            return ["code" => $Exception->getCode(), "msg" => $Exception->getMessage()];
        }
    }

}
