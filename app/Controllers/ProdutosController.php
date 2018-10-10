<?php

namespace App\Controllers;

use App\Models\Produto;
use App\Services\ProdutoService;
use App\Services\TipoService;
use App\Views\View;

class ProdutosController {

	private $produtoService;
	private $tipoService;

	public function __construct() {

		$this->produtoService = new ProdutoService();
		$this->tipoService = new TipoService();
	}

	public function listarProdutos() {
		$produtos = $this->produtoService->pegarTodosProdutos();
		$view = new View('produtos');
		$view->assign(['produtos' => $produtos]);
		$view->render();
	}

	public function listarProdutosPorTipo($tipo_id) {

	}

	public function novoProduto() {
		$tipos = $this->tipoService->pegarTodosTipo();
		$view = new View('novo_produto');
		$view->assign(["tipos" => $tipos]);
		$view->render();
	}

	public function salvarProduto() {
		$produto = new Produto();
		$produto->setNome($_POST['nome']);
		$produto->setPreco($_POST['preco']);
		$produto->setTipo($_POST['tipo_id']);

		$salvo = $this->produtoService->salvarProduto($produto);
		echo($salvo);
		if($salvo) {
			header("Location: /produtos/");
			die();
		} else {
			http_response_code(500);
			die();
		}
	}

	public function editarProduto($id) {
		$tipos = $this->tipoService->pegarTodosTipo();
		$produto = $this->produtoService->acharPorId($id);
		if(is_null($produto)) {
			http_response_code(404);
			die();
		}
		$view = new View('editar_produto');
		$view->assign(["produto" => $produto, "tipos" => $tipos]);
		$view->render();
	}

	public function atualizarProduto() {
		$produto = new Produto();

		$produto->setId($_POST['id']);
		$produto->setNome($_POST['nome']);
		$produto->setPreco($_POST['preco']);
		$produto->setTipo($_POST['tipo_id']);

		$salvo = $this->produtoService->atualizarProduto($produto);
		if ($salvo) {
			header("Location: /produtos/");
			die();
		} else {
			http_response_code(500);
			die();
		}
	}

	public function deletarProduto($id) {
		$deletado = $this->produtoService->deletarProduto($id);
		header("Location: /produtos/");
		die();
	}

	public function getJson() {
		$produtos = $this->produtoService->getProdutosAsArray();
		header('Content-type: application/json');
		echo json_encode($produtos);
		die();
	}

	public function getDetails($id) {
		$prod = $this->produtoService->getDetailsProduto($id);
		header('Content-type: application/json');
		echo json_encode($prod);
	}

}