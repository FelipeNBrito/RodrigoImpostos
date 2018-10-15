<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use App\Controllers\VendaController;
use App\Controllers\ProdutosController;
use App\Controllers\TipoController;

$parametros = $_SERVER['QUERY_STRING'];

error_log(print_r($_SERVER,1));
var_dump($_SERVER);
echo $_SERVER;

$path = explode("/", $parametros);

$vendaController = new VendaController();
$produtoController = new ProdutosController();
$tipoController = new TipoController();

if(count($path) === 0 || count($path) === 1) {
	$vendaController->listarVendas();
}

$controller = $path[1];
$action = $path[2];



if($controller === 'produtos') {
	if ($action === '' || is_null($action)) {
		$produtoController->listarProdutos();
	}
	else if ($action === 'novo') {
		$produtoController->novoProduto();
	}
	else if ($action === 'salvar') {
		$produtoController->salvarProduto();
	}
	else if ($action === 'editar') {
		$produtoController->editarProduto($path[3]);
	}
	else if ($action === 'atualizar') {
		$produtoController->atualizarProduto();
	}
	else if ($action === 'deletar') {
		$produtoController->deletarProduto($path[3]);
	}
	else if ($action === 'json') {
		$produtoController->getJson();
	}
	else if ($action === 'details') {
		$produtoController->getDetails($path[3]);
	}
	else {
		http_response_code(404);
		die();
	}
}
else if ($controller === 'tipos') {
	if ($action === '' || is_null($action)) {
		$tipoController->listarTipos();
	}
	else if ($action === 'novo') {
		$tipoController->novoTipo();
	}
	else if ($action === 'salvar') {
		$tipoController->salvarTipo();
	}
	else if ($action === 'editar') {
		$tipoController->editarTipo($path[3]);
	}
	else if ($action === 'deletar') {
		$tipoController->deletarTipo($path[3]);
	}
	else if ($action === 'atualizar') {
		$tipoController->atualizarTipo();
	}
	else {
		http_response_code(404);
		die();
	}
}
else if ($controller === 'vendas') {
	if ($action === '' || is_null($action)) {
		$vendaController->listarVendas();
	}
	else if ($action === 'nova') {
		$vendaController->novaVenda();
	}
	else if ($action === 'salvar') {
		$vendaController->salvarVenda();
	}
	else if ($action === 'deletar') {
		$vendaController->deletarVenda($path[3]);
	}
}
