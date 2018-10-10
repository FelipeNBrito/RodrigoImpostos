<?php

namespace App\Models;


class Tipo {

	private $id;
	private $nome;
	private $percentualImposto;

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
	 */
	public function setNome( $nome ) {
		$this->nome = $nome;
	}

	/**
	 * @return mixed
	 */
	public function getPercentualImposto() {
		return $this->percentualImposto;
	}

	/**
	 * @param mixed $percentualImposto
	 */
	public function setPercentualImposto( $percentualImposto ) {
		$this->percentualImposto = $percentualImposto;
	}

	public function __toString() {
		return $this->getTipo().' '.$this->getValorImposto();
	}


}