<?php

namespace App\Services;

use App\Models\Tipo;
use Dotenv\Dotenv;
use App\Models\Produto;
use PDO;

class ProdutoService {

	private $conn;

	public function __construct() {
		$dotenv = new Dotenv($_SERVER['DOCUMENT_ROOT']);
		$dotenv->load();
		$dbName = getenv('DATABASE_NAME');
		$dbHost = getenv('DATABASE_HOST');
		$db = "pgsql:dbname=$dbName;host=$dbHost";
		$this->conn = new PDO($db,getenv('DATABASE_USER'),getenv('DATABASE_PSSWD'));
	}

	public function acharPorId($id) {
		try {
			$query = $this->conn->prepare('SELECT * FROM produto WHERE id = ?');
			$query->execute(array($id));
			$row = $query->fetch();

			$produto = new Produto();
			$produto->setId($id);
			$produto->setNome($row['nome']);
			$produto->setPreco($row['preco']);
			$produto->setTipo($row['tipo_id']);

			return $produto;
		} catch (\Exception $e) {
			return null;
		}
	}

	public function pegarTodosProdutos() {
		$produtos = [];
		$results = $this->conn->query('SELECT * FROM produto');
		while($result = $results->fetch(PDO::FETCH_OBJ)){
			$produto = new Produto();
			$produto->setNome($result->nome);
			$produto->setId($result->id);
			$produto->setPreco($result->preco);
			$produto->setTipo($result->tipo_id);

			array_push($produtos, $produto);
		}

		return $produtos;
	}

	public function pegarTodosProdutosPorTipo(Tipo $tipo) {
		$produtos = [];
		$results = $this->conn->prepare('SELECT * FROM produtos WHERE tipo_id = ?');
		$results->execute($tipo->getId());
		while($result = $results->fetch(PDO::FETCH_OBJ)){
			$produto = new Produto();
			$produto->setNome($result->nome);
			$produto->setId($result->id);
			$produto->setTipo($result->tipo_id);
			$produto->setPreco($result->preco);

			array_push($produtos, $produto);
		}

		return $produtos;
	}

	public function salvarProduto(Produto $produto) {
		try {
			$query = $this->conn->prepare("INSERT INTO produto(nome, preco, tipo_id) VALUES(?, ?, ?)");
			$query->execute(array($produto->getNome(), $produto->getPreco(), $produto->getTipo()));
			return true;
		} catch (\Exception $e) {
			return false;
		}
	}

	public function atualizarProduto(Produto $produto) {
        try {
            $query = $this->conn->prepare('UPDATE produto set nome = :nome, preco = :preco, tipo_id = :tipo where id = :id');
            $query->bindParam(':nome', $produto->getNome());
            $query->bindParam(':preco', $produto->getPreco());
            $query->bindParam(':tipo', $produto->getTipo());
            $query->bindParam(':id', $produto->getId());
            $query->execute();

            return true;
        } catch (\Exception $e) {
            return false;
        }
	}

	public function deletarProduto($id) {
        try {
            $query = $this->conn->prepare("DELETE FROM produto WHERE id = ?");
            $query->execute(array($id));
            return true;
        } catch (\Exception $e) {
            return false;
        }
	}

	public function getDetailsProduto($id) {
        try {
            $query = $this->conn->prepare('SELECT produto.nome, produto.preco, tipo.percentualimposto as imposto FROM produto 
            INNER JOIN tipo ON tipo.id = produto.tipo_id WHERE produto.id = ?');
            $query->execute(array($id));
            $row = $query->fetch();

            $array = [
                "nome" => $row['nome'],
                "preco" => $row['preco'],
                "imposto" => $row['imposto']
                ];

            return $array;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getProdutoByNome($nome) {
	    try {
		    $query = $this->conn->prepare('SELECT * FROM produto WHERE nome = ?');
		    $query->execute(array($nome));
		    $row = $query->fetch();

		    $produto = new Produto();
		    $produto->setId($row['id']);
		    $produto->setNome($row['nome']);
		    $produto->setPreco($row['preco']);
		    $produto->setTipo($row['tipo_id']);

		    return $produto;
	    } catch (\Exception $e) {
		    return null;
	    }
    }

    public function getProdutosAsArray() {
	    $produtos = [];
	    $results = $this->conn->query('SELECT id, nome FROM produto');
	    while($result = $results->fetch(PDO::FETCH_OBJ)){
		    $produto = [];
		    $produto['nome'] = $result->nome;
		    $produto['id'] = $result->id;

		    array_push($produtos, $produto);
	    }

	    return $produtos;
    }
}