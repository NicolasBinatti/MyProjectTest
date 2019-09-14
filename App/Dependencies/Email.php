<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Dependencies;

/**
 * Description of email
 *
 * @author tiagoguirro
 */
class Email extends \PHPMailer {

    /**
     * Criando parametros
     * @param array $params
     * @return \PHPMailer
     */
    public function __construct(array $params) {
        parent::__construct();
        $this->setParams($params);
        return $this;
    }

    /**
     * Definindo configuração
     * @param array $params
     * @return bool
     */
    private function setParams(array $params): bool {
        $this->isSMTP(true);
        $this->isHTML(true);
        $this->Host = $params['Host'];
        $this->CharSet = $params['CharSet'];
        $this->SMTPAuth = $params['SMTPAuth'];
        $this->SMTPSecure = $params['SMTPSecure'];
        $this->Port = $params['Port'];
        $this->Username = $params['Username'];
        $this->Password = $params['Password'];
        $this->SMTPDebug = $params['SMTPDebug'];
        
        $this->setFrom($params['Address'], $params['From']);
        return true;
    }

}
