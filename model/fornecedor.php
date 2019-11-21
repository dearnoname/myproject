<?php
class Fornecedor
{
	private $pdo;
    
    public $idfornecedor;
    public $nomefornecedor;
    public $contato;
    public $endereco;
   

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	 public function lista2()
        {
            $this->consulta = $this->db->prepare('SELECT * FROM tfornecedor');
            $this->consulta->execute();
            return $this->consulta;
        }

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tfornecedor");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM tfornecedor WHERE idfornecedor = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM tfornecedor WHERE idfornecedor = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE tfornecedor SET 
						nomefornecedor          = ?, 
						contato        = ?,
                        endereco        = ?
						
				    WHERE idfornecedor = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nomefornecedor, 
                        $data->endereco,
                        $data->contato,
                        $data->idfornecedor
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Fornecedor $data)
	{
		try 
		{
		$sql = "INSERT INTO tfornecedor (nomefornecedor,contato,endereco) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nomefornecedor,
                    $data->contato, 
                    $data->endereco
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}