<?php
require_once 'model/fornecedor.php';

class FornecedorController {
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Fornecedor();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/fornecedor/fornecedor.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Fornecedor();
        
        if(isset($_REQUEST['idfornecedor'])){
            $alm = $this->model->Obtener($_REQUEST['idfornecedor']);
        }
        
        require_once 'view/header.php';
        require_once 'view/fornecedor/fornecedor-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Fornecedor();
        
        $alm->idfornecedor = $_REQUEST['idfornecedor'];
        $alm->nomefornecedor = $_REQUEST['nomefornecedor'];
        $alm->contato = $_REQUEST['contato'];
        $alm->endereco = $_REQUEST['endereco'];
      

        $alm->idfornecedor > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idfornecedor']);
        header('Location: index.php');
    }
}