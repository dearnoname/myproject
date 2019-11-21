<h1>Relatorio Materiais</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nome</th>
            <th>Quantidade adquirida</th>
            <th>Media de custo unitario</th>
            <th>Historico de Compras</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Relatorio() as $f): ?>
        <tr>
            <td><?php echo $f->nomematerial; ?></td>
            <td><?php echo $f->quantidade; ?></td>
            <td><?php echo $f->media; ?></td>
             
            <td>

                <a class="btn btn-info" href="reports/relatorio.php?nomematerial=<?php echo $f->nomematerial; ?>">Imprimir</a>
            </td> 
           
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<table class="table table-striped">

    <div class = "row-fluid">
        <div class = "col-md-3"></div>
        <div class = "col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
               
                <div class = "form-inline">
                <div class="col-sm-6">
                   <label>Desde:</label>
                <input type = "text" class = "form-control" placeholder = "Inicio"  id = "date1">

                <label>Até</label>

                <input type = "text" class = "form-control" placeholder = "Final"  id = "date2"> 
                </div>
                
                <div class="col-sm-6">
                    <button type = "button" class = "btn btn-primary" id = "btn_search" onclick="load();">
                  <i class="material-icons"> search </i>
                </button> 
                <button type = "button" id = "reset" class = "btn btn-success">
                    <i class="material-icons">autorenew </i>
                </button>
                </div>
                
            </div>
      
            <div class = "table-responsive">    
                <table class = "table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:180px;">Nome</th>
                            <th>Media de custo unitario</th>
                            <th>Fornecedor</th>
                            <th>Data adquirido</th>
                            
                        </tr>
                    </thead>
                    
                    <tbody id = "load_data">
                        
                    </tbody>
                </table>
            </div>  
              
              </div>
        </div>
        
        
        </div>
    </div>
</table>
<script type="text/javascript">
    $(document).ready(function(){
    $('#date1').datepicker();
    $('#date2').datepicker();
    load();
    
    $('#reset').on('click', function(){
        location.reload();
    });
});

function load(){
    

            $date1 = $('#date1').val();
            $date2 = $('#date2').val();
            $('#load_data').empty();
            $loader = $('<tr ><td colspan = "4"><center>Cargando....</center></td></tr>');
            $loader.appendTo('#load_data');
            setTimeout(function(){
                $loader.remove();
                $.ajax({
                    url: 'model/ajax_data.php',
                    type: 'POST',
                    data: {
                        date1: $date1,
                        date2: $date2
                    },
                    success: function(res){
                        $('#load_data').html(res);
                    }
                });
            }, 1000);
            
    
    
}


</script>