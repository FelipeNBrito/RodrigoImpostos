<?php

namespace App\Controllers;


use App\Models\Tipo;
use App\Services\TipoService;
use App\Views\View;

class TipoController {

	private $tipoService;

	public function __construct() {
		$this->tipoService = new TipoService();
	}

	public function listarTipos() {
		$tipos = $this->tipoService->pegarTodosTipo();
		$view = new View('tipos');
		$view->assign(['tipos' => $tipos]);
		$view->render();
	}

	public function novoTipo() {
		$view = new View('novo_tipo');
		$view->render();
	}

	public function salvarTipo() {
		$tipo = new Tipo();
		$tipo->setNome($_POST['nome']);
		$tipo->setPercentualImposto($_POST['percentual']);

		$salvo = $this->tipoService->salvarTipo($tipo);
		if($salvo) {
			header("Location: /tipos/");
		}
		else {
			http_response_code(500);
		}
		die();

	}

	public function editarTipo($id) {
		$tipo = $this->tipoService->acharPorId($id);
		if(is_null($tipo)) {
			http_response_code(404);
			die();
		}
		$view = new View('editar_tipo');
		$view->assign(['tipo' => $tipo]);
		$view->render();
	}

	public function atualizarTipo() {
		$tipo = new Tipo();
		$tipo->setId($_POST['id']);
		$tipo->setNome($_POST['nome']);
		$tipo->setPercentualImposto($_POST['percentual']);

		$salvo = $this->tipoService->atualizarTipo($tipo);
		if ($salvo) {
			header("Location: /tipos/");
		} else {
			http_response_code(500);
		}
		die();
	}

	public function deletarTipo($id) {
		$deletado = $this->tipoService->deletarTipo($id);
		header("Location: /tipos/");
		die();
	}
}