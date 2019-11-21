<?php
require_once 'model/material.php';


class MaterialController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Material();
    }
    
    public function Index()
    {
        require_once 'view/header.php';
        require_once 'view/material/material.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Material();
        
        if(isset($_REQUEST['idmaterial'])){
            $alm = $this->model->Obtener($_REQUEST['idmaterial']);
        }
        
        require_once 'view/header.php';
        require_once 'view/material/material-editar.php';
        require_once 'view/footer.php';
    }
    public function Relatorio(){
        
        
        require_once 'view/header.php';
        require_once 'view/material/material-relatorio.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Material();   
        $alm->idmaterial = $_REQUEST['idmaterial'];
        $alm->nomematerial = $_REQUEST['nomematerial'];
        $alm->idfornecedor = $_REQUEST['idfornecedor'];
        $alm->quantidade = $_REQUEST['quantidade'];
        $alm->precocompra = $_REQUEST['precocompra'];
        $alm->precovenda = $_REQUEST['precovenda'];
        $alm->dataadquirido = $_REQUEST['dataadquirido'];

        $alm->idmaterial > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php?c=Material');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idmaterial']);
        header('Location: index.php?c=Material');
    }

}