
<h1 class="page-header">
    <?php echo $alm->idmaterial != null ? $alm->nomefornecedor : 'Novo Cadastro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Material">Materiais</a></li>
  <li class="active"><?php echo $alm->idmaterial != null ? $alm->nomematerial : 'Novo Cadastro'; ?></li>
</ol>

<form id="frm-material" name="frm-material" action="?c=Material&a=Guardar" method="post" enctype="multipart/form-data" onsubmit="return validapre();">
    <input type="hidden" name="idmaterial" value="<?php echo $alm->idmaterial; ?>" />
    
    <div class="form-group">
        <label>Nome Material</label>
        <input type="text" name="nomematerial" value="<?php echo $alm->nomematerial; ?>" class="form-control" placeholder="Insira o nome do material" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Preco Compra</label>
        <input type="number" id="precocompra" name="precocompra" value="<?php echo $alm->precocompra; ?>" class="form-control" placeholder="Insira o preco de compra" requerido />
        <label>Preco Venda</label>
        <input type="number" id="precovenda" name="precovenda" value="<?php echo $alm->precovenda; ?>" class="form-control" placeholder="Insira o preco de venda" requerido  />
    </div>
     <div class="form-group">
        <label>Quantidade</label>
        <input type="text" name="quantidade" value="<?php echo $alm->quantidade; ?>" class="form-control" placeholder="Insira o nome do material"  />
    </div>
    <div class="form-group">
        <label>Fornecedor</label>
        <select name="idfornecedor" class="form-control">
            <?php 
                include('model/datapesquisasimples.php');
                
                $sqltipo = "SELECT * FROM tfornecedor ";
                $consultatipo=$link->query($sqltipo);
                // devuelvo el resuelto?>
                <option value="" >SELECCIONAR</option>;<?php
                while($filatipo = mysqli_fetch_array($consultatipo)){
                    ?>
                    <option value="<?php echo $filatipo['idfornecedor'] ?>"><?php echo $filatipo['nomefornecedor'] ?>
                    </option>
                <?php
                }
                ?>
            
        </select>
    </div>
    
   
    
    <div class="form-group">
        <label>Data adquirido</label>
        <input readonly type="text" name="dataadquirido" value="<?php echo $alm->dataadquirido; ?>" class="form-control datepicker" placeholder="Insira a data adquirido" data-validacion-tipo="requerido" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success" >Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-material").submit(function(){
            return $(this).validate();
        });
    })
  
</script>
<script>
    function validapre()
    {
        var precovenda = document.getElementById('precovenda').value;
       
        var precocompra = document.getElementById('precocompra').value;
      
      if (precocompra < precovenda ) 
      {
        alert("Nao pode ser inserido um produto com o preco de compra menor que o preco de venda");
        document.frm-material.precovenda.focus();
        return false;
      } else if (precocompra = precovenda ) 

      {
         alert("Nao pode ser inserido um produto com o preco de compra igual que o preco de venda");
          document.frm-material.precovenda.focus();
           document.frm-material.precocompra.focus();
      return false;
      }
       else  if (precocompra > precovenda ) 
      {
        alert("agora foi");
        return true;
      }


    }
</script>