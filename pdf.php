<?php
session_start();
	include 'plantilla.php';
	require 'conexion.php';



 
$pdf = new PDF();
    
if(isset($_GET['idkk']))
{
	$query = "SELECT * FROM desc_producto AS t1 INNER JOIN productos AS t2 ON t1.idProducto=t2.IdProducto INNER JOIN usuarios AS t3 ON 
                        t3.Id=t2.idUsuario INNER JOIN sucursales AS t4 ON t4.idSucursal=t1.IdSucursal INNER JOIN categoria AS t5 ON t5.idCategoria=t1.IdCategoria WHERE t1.id=".$_GET['idkk'];
                        
	$resultado = $mysqli->query($query) or trigger_error($mysqli->error);
	
                       
   
    $pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFillColor(232,232,232);
	

	while($row = $resultado->fetch_array())
	{

		
        
	    $pdf->SetFont('Arial','B',12);

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
	    $pdf->Cell(70,6,'Codigo de pedido',1,0,'C',1);
		$pdf->Cell(70,6,($row['id']),1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Codigo de producto',1,0,'C',1);
		$pdf->Cell(70,6,$row['IdProducto'],1,1,'C');


        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Tipo de ventilador',1,0,'C',1);
		$pdf->Cell(70,6,$row['tipoVentilador'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Caudal',1,0,'C',1);
		$pdf->Cell(70,6,$row['caudal'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Rpm',1,0,'C',1);
		$pdf->Cell(70,6,$row['RPM'],1,1,'C');

        
        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Temperatura a refrigerar',1,0,'C',1);
		$pdf->Cell(70,6,$row['temperatura'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Altura',1,0,'C',1);
		$pdf->Cell(70,6,$row['altura'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Fecha de Solicitud',1,0,'C',1);
		$pdf->Cell(70,6,$row['fecha_pedido'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Fecha de Entrega',1,0,'C',1);
		$pdf->Cell(70,6,$row['fecha'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Sucursal que elabora',1,0,'C',1);
		$pdf->Cell(70,6,$row['sucursal'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Categoria del pedido',1,0,'C',1);
		$pdf->Cell(70,6,$row['categoria'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Tipo de Entrega',1,0,'C',1);
		$pdf->Cell(70,6,$row['descripcionprodu'],1,1,'C');

        $pdf->Cell(20);
        $pdf->SetFillColor(200,220,255);
        $pdf->Cell(70,6,'Precio Final',1,0,'C',1);
        $pdf->Cell(70,6,$row['precio'],1,1,'C');

$pdf->Ln(15);
$pdf->Line(20,40,190,40);
$pdf->Line(20,130,190,130);
$pdf->SetFont('Times','BI',10);
$message = "Gracias por Preferir utilizar el Sistema SRP de Amrisa, recuerde que debe estar alerta debido a que cualquier detalle sobre la entrega y/o retiro del producto sera enviada a su correo"; 
$pdf->MultiCell(190, 5, $message);


$pdf->Image('images/ventilador1.jpg', 50, 170, 100 );
$pdf->Ln(100);
$pdf->MultiCell(190, 5, utf8_decode('                                      A. Mayer refrigeración industrial S.A todos los derechos reservados    ©'));



}

	
	$pdf->Output();

}
?>