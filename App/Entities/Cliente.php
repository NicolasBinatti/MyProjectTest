<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity
 */
class Cliente {

    /**
     * @var int
     *
     * @ORM\Column(name="idcliente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idcliente;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nome", nullable=true)
     */
    private $nome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", nullable=true)
     */
    private $email;

    /**
     * @var \Date|null
     *
     * @ORM\Column(name="datanascimento", type="date", nullable=true)
     */
    private $datanascimento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sexo", type="string", nullable=true)
     */
    private $sexo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomemae", type="string", nullable=true)
     */
    private $nomemae;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomepai", type="string", nullable=true)
     */
    private $nomepai;

    /**
     * @var int
     *
     * @ORM\Column(name="cep", type="integer", length=8, nullable=true)
     */
    private $cep;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cidade", type="string", nullable=true)
     */
    private $cidade;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rua", type="string", nullable=true)
     */
    private $rua;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uf", type="string", nullable=true)
     */
    private $uf;

    public function getIdcliente() {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente) {
        $this->idcliente = $idcliente;
        return $this;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getDatanascimento() {
        return $this->datanascimento;
    }

    public function setDatanascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
        return $this;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
        return $this;
    }

    public function getNomemae() {
        return $this->nomemae;
    }

    public function setNomemae($nomemae) {
        $this->nomemae = $nomemae;
        return $this;
    }

    public function getNomepai() {
        return $this->nomepai;
    }

    public function setNomepai($nomepai) {
        $this->nomepai = $nomepai;
        return $this;
    }

    public function getCep() {
        return $this->cep;
    }

    public function setCep($cep) {
        $this->cep = $cep;
        return $this;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
        return $this;
    }

    public function getRua() {
        return $this->rua;
    }

    public function setRua($rua) {
        $this->rua = $rua;
        return $this;
    }

    public function getUf() {
        return $this->uf;
    }

    public function setUf($uf) {
        $this->uf = $uf;
        return $this;
    }

}
