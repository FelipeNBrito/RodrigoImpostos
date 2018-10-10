<?php

namespace App\Services;

use App\Models\Venda;
use Dotenv\Dotenv;
use PDO;

class VendaService {

    private $conn;
    private $tipoService;

    public function __construct() {
	    $dotenv = new Dotenv($_SERVER['DOCUMENT_ROOT']);
	    $dotenv->load();
	    $dbName = getenv('DATABASE_NAME');
	    $dbHost = getenv('DATABASE_HOST');
	    $db = "pgsql:dbname=$dbName;host=$dbHost";
	    $this->conn = new PDO($db,getenv('DATABASE_USER'),getenv('DATABASE_PSSWD'));
	    $this->tipoService = new TipoService();
    }

    public function listarVendas() {
        $vendas = [];
        $results = $this->conn->query('SELECT * FROM venda');
        while($result = $results->fetch(PDO::FETCH_OBJ)) {
            $venda = new Venda();
            $venda->setId($result->id);
            $venda->setHoraVenda($result->hora_venda);
            $venda->setValorTotal($result->valor_total);
            $venda->setValorImposto($result->valor_imposto);

            array_push($vendas, $venda);
        }

        return $vendas;
    }

    public function salvarVenda($produtos) {
		$valorTotal = 0.00;
		$valorImposto = 0.00;

		foreach ($produtos as $prod) {
			$valorProd = $prod->getPreco() * $prod->getQntde();
			$percentualImposto = $this->tipoService->getImposto($prod->getTipo());
			$valorImpostoProd = ($valorProd * $percentualImposto) / 100;

			$valorTotal = $valorTotal + $valorProd;
			$valorImposto = $valorImposto + $valorImpostoProd;
		}

		$lastId = -1;
	    try {
		    $query = $this->conn->prepare("INSERT INTO venda(hora_venda, valor_total, valor_imposto) VALUES(now(), ?, ?)");
		    $query->execute(array($valorTotal, $valorImposto));
		    $lastId = $this->conn->lastInsertId();

		    foreach ($produtos as $prod) {
			    $valorProd = $prod->getPreco() * $prod->getQntde();
			    $percentualImposto = $this->tipoService->getImposto($prod->getTipo());
			    $valorImpostoProd = ($valorProd * $percentualImposto) / 100;

			    $query = $this->conn->prepare("INSERT INTO produtos_venda(venda_id, 
				produto_id, quantidade, valor_produto, valor_imposto) VALUES(?, ?, ?, ?, ?)");
			    $query->execute(array($lastId, $prod->getId(), $prod->getQntde(), $valorProd, $valorImpostoProd));
		    }
		    return true;
	    } catch (\Exception $e) {
	    	if ($lastId != -1) {
			    try {
				    $query = $this->conn->prepare("DELETE FROM venda WHERE id = ?");
				    $query->execute(array($lastId));
				    return true;
			    } catch (\Exception $e) {
				    return false;
			    }
		    }

		    return false;
	    }
    }

    public function deletarVenda($id) {
	    try {
		    $query = $this->conn->prepare("DELETE FROM venda WHERE id = ?");
		    $query->execute(array($id));
		    return true;
	    } catch (\Exception $e) {
		    return false;
	    }
    }
}