<?php
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{

			$this->Image('images/amrisalogo.jpg', 10, 10, 25 );
			$this->SetFont('Times','BU',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Detalles del Pedido',0,0,'C');
			$this->Ln(20);

            $string="A Continuacion se presentan los detalles del pedido que usted ha realizado:";
		
		     $this->SetFont('Times','BI',10);
		     $this->Cell(30);
		     $this->multicell(130,10, $string);
		     $this->Ln(10);

			
            
            
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>