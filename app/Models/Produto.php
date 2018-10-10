<?php

namespace App\Models;


class Produto {

	private $id;
	private $nome;
	private $preco;
	private $tipo;
	private $qntde;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param mixed $nome
	 *
	 * @return Produto
	 */
	public function setNome( $nome ) {
		$this->nome = $nome;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTipo() {
		return $this->tipo;
	}

	/**
	 * @param mixed $tipo
	 *
	 * @return Produto
	 */
	public function setTipo( $tipo ) {
		$this->tipo = $tipo;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPreco() {
		return $this->preco;
	}

	/**
	 * @param mixed $preco
	 */
	public function setPreco( $preco ) {
		$this->preco = $preco;
	}

	/**
	 * @return mixed
	 */
	public function getQntde() {
		return $this->qntde;
	}

	/**
	 * @param mixed $qntde
	 */
	public function setQntde( $qntde ) {
		$this->qntde = $qntde;
	}

}