<?php
class Material
{
	private $pdo;
    
    public $idmaterial;
    public $nomematerial;
    public $precocompra;
    public $quantidade;
    public $precovenda;
    public $dataadquirido;
    public $idfornecedor;
    

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

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM tmaterial WHERE estatus = 0 ");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function Relatorio()
		{
			try
			{
				$result = array();

				$stm = $this->pdo->prepare("
					                     SELECT *, nomematerial as nomematerial, 
					                               sum(quantidade) as quantidade, 
					                               AVG(precovenda) AS media 
					                               from tmaterial GROUP by nomematerial
					                      ");
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
			          ->prepare("SELECT * FROM tmaterial WHERE idmaterial = ?");
			          

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
			            ->prepare("DELETE FROM tmaterial WHERE idmaterial = ?");			          

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
			$sql = "UPDATE tmaterial SET 
							nomematerial          = ?, 
							precocompra        = ?,
							precovenda            = ?,
	                        quantidade        = ?,
							idfornecedor            = ?, 
							dataadquirido = ?
				    WHERE idmaterial = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nomematerial, 
                        $data->precocompra,
                        $data->precovenda,
                        $data->quantidade,
                        $data->idfornecedor,
                        $data->dataadquirido,
                        $data->idmaterial
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Material $data)
	{
		try 
		{
		$sql = "INSERT INTO tmaterial (
		                    nomematerial,
		                    precovenda,
		                    precocompra,
		                    quantidade,
		                    idfornecedor,
		                    dataadquirido) 
		        VALUES (
		                 ?,
		                 ?, 
		                 ?, 
		                 ?, 
		                 ?, 
		                 ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nomematerial,
                    $data->precovenda, 
                    $data->precocompra, 
                    $data->quantidade,
                    $data->idfornecedor,
                    $data->dataadquirido
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}