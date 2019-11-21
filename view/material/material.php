
<h1 class="page-header">Materiais</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Material&a=Crud">Novos Materiais</a>
    <a class="btn btn-primary" href="?c=Material&a=Relatorio">Relatorios</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nome</th>
            <th>Preco Compra</th>
            <th>Preco Venda</th>
            <th>Quantidade</th>
            <th style="width:120px;">Fornecedor</th>
            <th style="width:120px;">Data Adquirido</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nomematerial; ?></td>
            <td><?php echo $r->precocompra; ?></td>
            <td><?php echo $r->precovenda; ?></td>
            <td><?php echo $r->quantidade; ?></td>
            
                <?php 
                include('model/datapesquisasimples.php');
                
                $sqltipo = "SELECT * FROM tfornecedor WHERE idfornecedor = ".$r->idfornecedor."";
                $consultatipo=$link->query($sqltipo);
                // devuelvo el resuelto?>
                <?php
                while($filatipo = mysqli_fetch_array($consultatipo)){
                    ?>
                    <td><?php echo $filatipo['nomefornecedor'] ?></td>
                <?php
                }
                ?>
            
            <td><?php echo $r->dataadquirido; ?></td>
            <td>
                <a href="?c=Material&a=Crud&idmaterial=<?php echo $r->idmaterial; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Material&a=Eliminar&idmaterial=<?php echo $r->idmaterial; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
   

</table> 

