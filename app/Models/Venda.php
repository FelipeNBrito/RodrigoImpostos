<?php
/**
 * Created by PhpStorm.
 * User: rodri
 * Date: 19/08/2018
 * Time: 19:03
 */

namespace App\Models;


class Venda {

	private $id;
	private $horaVenda;
	private $valor_total;
	private $valor_imposto;

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
	public function getHoraVenda() {
		return $this->horaVenda;
	}

	/**
	 * @param mixed $horaVenda
	 */
	public function setHoraVenda( $horaVenda ) {
		$this->horaVenda = $horaVenda;
	}

	/**
	 * @return mixed
	 */
	public function getValorTotal() {
		return $this->valor_total;
	}

	/**
	 * @param mixed $valor_total
	 */
	public function setValorTotal( $valor_total ) {
		$this->valor_total = $valor_total;
	}

	/**
	 * @return mixed
	 */
	public function getValorImposto() {
		return $this->valor_imposto;
	}

	/**
	 * @param mixed $valor_impost
	 */
	public function setValorImposto( $valor_imposto ) {
		$this->valor_imposto = $valor_imposto;
	}


}