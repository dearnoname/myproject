<h1 class="page-header">
    <?php echo $alm->idfornecedor != null ? $alm->nomefornecedor : 'Novo Cadastro de Fornecedor'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Fornecedor">Voltar</a></li>
  
  <li class="active"><?php echo $alm->idfornecedor != null ? $alm->nomefornecedor : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-fornecedor" action="?c=Fornecedor&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idfornecedor" value="<?php echo $alm->idfornecedor; ?>" />
    
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nomefornecedor" value="<?php echo $alm->nomefornecedor; ?>" class="form-control" placeholder="Insira o nome do Fornecedor" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Contato</label>
        <input type="text" name="contato" value="<?php echo $alm->contato; ?>" class="form-control" placeholder="Insira contato" />
    </div>
    
    <div class="form-group">
        <label>Endereco</label>
        <input type="text" name="endereco" value="<?php echo $alm->endereco; ?>" class="form-control" placeholder="Insira o endereco"  />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-fornecedor").submit(function(){
            return $(this).validate();
        });
    })
</script>