<?php

namespace App\Controllers;

use App\Services\ProdutoService;
use App\Services\VendaService;
use App\Views\View;

class VendaController {

	private $vendaService;
	private $produtoService;

	public function __construct() {
		$this->vendaService = new VendaService();
		$this->produtoService = new ProdutoService();
	}

	public function listarVendas() {
		$vendas = $this->vendaService->listarVendas();
		$view = new View('vendas');
		$view->assign(['vendas' => $vendas]);
		$view->render();
	}

	public function novaVenda() {
		$view = new View('nova_venda');
		$view->render();
	}

	public function salvarVenda() {
		$data = json_decode(file_get_contents('php://input'), true);
		$arrayProdutos = [];
		foreach($data as $prod) {
			$produto = $this->produtoService->getProdutoByNome($prod['nome']);
			$produto->setQntde($prod['qntde']);
			array_push($arrayProdutos, $produto);
		}

		$salvo = $this->vendaService->salvarVenda($arrayProdutos);
		echo $salvo;
		die();
	}

	public function deletarVenda($id) {
		$deletado = $this->vendaService->deletarVenda($id);
		header("Location: /vendas/");
		die();
	}
}