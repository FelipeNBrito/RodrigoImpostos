<?php


namespace App\Services;

use Dotenv\Dotenv;
use App\Models\Tipo;
use PDO;

class TipoService {

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
			$query = $this->conn->prepare('SELECT * FROM tipo WHERE id = ?');
			$query->execute(array($id));
			$row = $query->fetch();

			$tipo = new Tipo();
			$tipo->setId($id);
			$tipo->setNome($row['nome']);
			$tipo->setPercentualImposto($row['percentualimposto']);

			return $tipo;
		} catch (\Exception $e) {
			return null;
		}
    }

    public function getImposto($id) {
	    try {
		    $query = $this->conn->prepare('SELECT percentualimposto FROM tipo WHERE id = ?');
		    $query->execute(array($id));
		    $row = $query->fetch();

		    return $row['percentualimposto'];
	    } catch (\Exception $e) {
		    return null;
	    }
    }

	public function pegarTodosTipo() {
        $tipos = [];
        $results = $this->conn->query('SELECT * FROM tipo');
        while($result = $results->fetch(PDO::FETCH_OBJ)) {
            $tipo = new Tipo();
            $tipo->setId($result->id);
            $tipo->setNome($result->nome);
            $tipo->setPercentualImposto($result->percentualimposto);
            array_push($tipos, $tipo);
        }
		return $tipos;
	}

	public function salvarTipo(Tipo $tipo) {
		try {
			$query = $this->conn->prepare('INSERT INTO tipo (nome, percentualimposto) VALUES(:nome, :percentual)');
			$query->execute(array(
				"nome" => $tipo->getNome(),
				"percentual" => $tipo->getPercentualImposto()
			));

			return true;
		} catch (\Exception $e) {
			return false;
		}
	}

	public function atualizarTipo(Tipo $tipo) {
		try {
			$query = $this->conn->prepare('UPDATE tipo set nome = :nome, percentualimposto = :percentual where id = :id');
			$query->execute(array(
				"nome" => $tipo->getNome(),
				"percentual" => $tipo->getPercentualImposto(),
				"id" => $tipo->getId()
			));

			return true;
		} catch (\Exception $e) {
			return false;
		}
	}

	public function deletarTipo($id) {
        try {
            $query = $this->conn->prepare("DELETE FROM tipo WHERE id = ?");
            $query->execute(array($id));
            return true;
        } catch (\Exception $e) {
            return false;
        }
	}
}