<?php
	include ('../model/datapesquisasimples.php');

    require('../fpdf/fpdf.php');
      $nomematerial= $_GET['nomematerial'];
    //Creamos la nueva clase pdf que hereda de fpdf
     
    class PDF extends FPDF
    {
     
    // utilizamos la funcion Header() y la personalizamos para que muestre la cabecera de página
   function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF','T',0,'C');
    }
 
    function Header(){
        //Define tipo de letra a usar, Arial, Negrita, 15
        $this->SetFont('Arial','B',9);
        /* Líneas paralelas
         * Line(x1,y1,x2,y2)
         * El origen es la esquina superior izquierda
         * Cambien los parámetros y chequen las posiciones
         * */
        $this->Line(10,10,206,10);
        $this->Line(10,35.5,206,35.5);
        /* Explicaré el primer Cell() (Los siguientes son similares)
         * 30 : de ancho
         * 25 : de alto
         * ' ' : sin texto
         * 0 : sin borde
         * 0 : Lo siguiente en el código va a la derecha (en este caso la segunda celda)
         * 'C' : Texto Centrado
         * $this->Image('images/logo.png', 152,12, 19) Método para insertar imagen
         *     'images/logo.png' : ruta de la imagen
         *         152 : posición X (recordar que el origen es la esquina superior izquierda)
         *         12 : posición Y
         *     19 : Ancho de la imagen <span class="wp-smiley emoji emoji-wordpress" title="(w)">(w)</span>
         *     Nota: Al no especificar el alto de la imagen (h), éste se calcula automáticamente
         * */
        $this->Cell(30,25,'',0,0,'C',$this->Image('images/logo11.jpg', 152,12, 19));
        $this->Cell(111,25,'ALGÚN TÍTULO DE ALGÚN LUGAR',0,0,'C', $this->Image('images/logo1.png',20,12,20));
        $this->Cell(40,25,'',0,0,'C',$this->Image('images/logo2.png', 175, 12, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
    }
}
    
     
    $resultado = $link->query("                                                             
                    SELECT 
                    		nomematerial as nomematerial
                    		, 
                    		precocompra as precocompra
                    		, 
                    		quantidade as quantidade
                    		, 
                    		precovenda as precovenda
                    		, 
                    		
                    		dataadquirido as dataadquirido
                    		FROM tmaterial WHERE nomematerial = '".$nomematerial."' ");

       

    $pdf=new FPDF();
     
    //Agregamos la primera pagina al documento pdf
    $pdf->AddPage();
    

    
    $pdf->ln(18);    

    //Seteamos el inicio del margen superior en 25 pixeles
     
    $y_axis_initial = 25;
     
    //Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
    $pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,6,'',0,0,'C');
    $pdf->Cell(100,6,'Relatorio de compras',0,0,'C',1);
     
    $pdf->Ln(14);
     
    //Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
  
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(32,6,utf8_decode('Nome material'),1,0,'C',1);
    $pdf->Cell(32,6,utf8_decode('Preco compra'),1,0,'C',1);
    $pdf->Cell(32,6,utf8_decode('Preco venda'),1,0,'C',1);
    $pdf->Cell(32,6,utf8_decode('Quantidade'),1,0,'C',1);
    $pdf->Cell(32,6,utf8_decode('Data adquirido'),1,0,'C',1);
    
     
     
    $pdf->Ln(8);
     
    //Comienzo a crear las fiulas de productos según la consulta mysql
     
    while($fila = mysqli_fetch_array($resultado))
    {
    	$nomematerial = $fila['nomematerial'];
        $precocompra = $fila['precocompra'];
        $quantidade = $fila['quantidade'];
        $precovenda = $fila['precovenda'];
        $dataadquirido = $fila['dataadquirido'];
        
        
        //$imagen="fotos/".$row['imagen1'];
        $pdf->Cell(32,6,utf8_decode($nomematerial),1,0,'L',0);
        $pdf->Cell(32,6,utf8_decode($precocompra),1,0,'L',0);
        $pdf->Cell(32,6,utf8_decode($precovenda),1,0,'L',0);
        $pdf->Cell(32,6,utf8_decode($quantidade),1,0,'L',0);
        $pdf->Cell(32,6,utf8_decode($dataadquirido),1,0,'L',0);
       
    //Muestro la iamgen dentro de la celda GetX y GetY dan las coordenadas actuales de la fila
     
        // $pdf->Cell( 30, 15, $pdf->Image($imagen, $pdf->GetX()+5, $pdf->GetY()+3, 20), 1, 0, 'C', false );
     
    $pdf->Ln(7);
    }
     
   // mysql_close($link);

    $pdf->SetY(-45);
    $pdf->SetFont('Arial','I',8);
    $pdf->Cell(10,6,utf8_decode('Emitido'),0,0,'L',0);

    $pdf->SetY(-34);
    $pdf->SetFont('Arial','I',8);

    // Número de página
    $pdf->AliasNbPages();
    $pdf->Cell(0,8,utf8_decode('Página ').$pdf->PageNo().'/{nb}',0,0,'C');
    //Mostramos el documento pdf
    $pdf->Output();

    //session_destroy();
     
?>