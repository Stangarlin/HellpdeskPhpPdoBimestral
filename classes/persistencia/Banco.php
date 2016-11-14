<?php
namespace classes\persistencia;

use PDO;
use PDOException;

/**
 * Classe para gerencias as operações com o Banco de Dados.
 *
 * @author C`thullu
 */
class Banco implements \classes\util\TrataErro {

    private $conn;
    private $comandoSQL;
    private $aberto;
    private $erro;

    public function __construct() {
        $this->erro = NULL;
        $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
        $opcoes = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        );
        try {
            $this->conn = new PDO($dsn, "root", "", $opcoes);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->aberto = true;
        } catch (PDOException $ex) {
            $this->aberto = false;
            $this->erro = $ex->getMessage();
        }
    }

    public function __destruct() {
        $this->fechar();
    }

    public function fechar() {
        $this->comandoSQL = null;
        $this->conn = null;
        $this->aberto = false;
    }

    public function getComandoSQL() {
        return $this->comandoSQL;
    }

    public function setComandoSQL($comandoSQL) {
        $this->comandoSQL = $comandoSQL;
    }

    public function getErro() {
        return $this->erro;
    }

    private function isOK() {
        return $this->aberto && $this->comandoSQL != "";
    }

    public function temErro() {
        return $this->erro !== NULL;
    }

    /**
     * Método usado para fazer consultas de INSERT, UPDATE e DELETE no banco de dados.
     * @return boolean
     */
    public function executa() {
        if ($this->isOK()) {
            try {
                return $this->conn->exec($this->comandoSQL);
            } catch (PDOException $ex) {
                $this->erro = $ex->getMessage();
            }
        }
        return false;
    }

    public function executa_p($parametros) {
        if ($this->isOK()) {
            try {
                $pst = $this->conn->prepare($this->comandoSQL);
                $pst->execute($parametros);
                return $pst->rowCount();
            } catch (PDOException $ex) {
                $this->erro = $ex->getMessage();
            }
        }
        return false;
    }

    /**
     * Método usado para consultas de SELECT no banco de dados.
     */
    public function consulta() {
        if ($this->isOK()) {
            try {
                $resultado = $this->conn->query($this->comandoSQL);
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                $this->erro = $ex->getMessage();
                return false;
            }
        }
        return false;
    }

    public function consulta_objeto() {
        if ($this->isOK()) {
            try {
                $resultado = $this->conn->query($this->comandoSQL);
                return $resultado->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $ex) {
                $this->erro = $ex->getMessage();
                return false;
            }
        }
        return false;
    }

    public function consulta_objeto_p($parametros) {
        if ($this->isOK()) {
            try {
                $pst = $this->conn->prepare($this->comandoSQL);
                $pst->execute($parametros);
                return $pst->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $ex) {
                $this->erro = $ex->getMessage();
            }
        }
        return false;
    }

}
