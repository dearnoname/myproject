<?php
$date1 = date("Y-m-d", strtotime($_POST['date1']));
$date2 = date("Y-m-d", strtotime($_POST['date2']));

if (!empty($_POST['date1']) and  !empty($_POST['date1'])){
	list($dia,$mes,$anio)=explode("/",$_POST['date1']);
	$date1="$anio-$mes-$dia";
	list($dia,$mes,$anio)=explode("/",$_POST['date2']);
	$date2="$anio-$mes-$dia";
	
	$sWhere="WHERE 'dataadquirido' BETWEEN '$date1' AND '$date2'";
	
} else {
	$sWhere="";	
}

#Conectare a la base de datos
include("datapesquisasimples.php");
	
$q_book = $link->query("SELECT * , 
      AVG(a.precovenda) AS media,
      b.nomefornecedor AS nomefornecedor
      FROM tmaterial AS a INNER JOIN tfornecedor as b 
      ON a.idfornecedor = b.idfornecedor
     $sWhere
      
      
      GROUP BY idmaterial ASC") or die(mysqli_error());
$v_book = $q_book->num_rows;
if($v_book > 0){
	while($f_book = $q_book->fetch_array()){
	?>
	<tr>
		<td><?php echo $f_book['nomematerial']?></td>
		<td><?php echo $f_book['media']?></td>
		<td><?php echo $f_book['nomefornecedor']?></td>
		<td><?php echo date("d/m/Y", strtotime($f_book['dataadquirido']))?></td>
	</tr>
	<?php
	}
}else{
		echo '
		<tr>
			<td colspan = "4" class="text-center">No se encontraron registros</td>
		</tr>
		';
}
	?>