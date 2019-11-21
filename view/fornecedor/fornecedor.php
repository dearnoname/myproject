

<h1 class="page-header">Fornecedores</h1>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Fornecedor&a=Crud">Novo Fornecedor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nome</th>
            <th>Contato</th>
            <th>Endereco</th>
            
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nomefornecedor; ?></td>
            <td><?php echo $r->contato; ?></td>
            <td><?php echo $r->endereco; ?></td>
           
            <td>
                <a href="?c=fornecedor&a=Crud&idfornecedor=<?php echo $r->idfornecedor; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=fornecedor&a=Eliminar&idfornecedor=<?php echo $r->idfornecedor; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
