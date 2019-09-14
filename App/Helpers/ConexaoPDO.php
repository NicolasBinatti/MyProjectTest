<?php

namespace App\Helpers;

use PDO;

class ConexaoPDO extends PDO {

    private static $instancia;
    private static $host = 'db';
    private static $banco = 'app_development';
    private static $porta = '3306';
    private static $usuario = 'root';
    private static $senha = 'password';

    public function __construct($dsn, $username = "", $password = "") {
        parent::__construct($dsn, $username, $password, array(PDO::ATTR_EMULATE_PREPARES => true));
    }

    /**
     * @return PDO Returns true on success or false on failure.
     */
    public static function getInstance() {
        try {
            if (!isset(self::$instancia)) {
                self::$instancia = new ConexaoPDO("mysql:host=" . self::$host . ";port=" . self::$porta . ";dbname=" . self::$banco, self::$usuario, self::$senha);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        // Se já existe instancia na memória eu retorno ela
        return self::$instancia;
    }

}
