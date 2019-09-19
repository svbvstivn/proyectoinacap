<?php
	session_start();
	include_once('conexion.php');

		// Definimos el archivo exportado
		$arquivo = 'MisPedidos.xls';
		
		// Crear la tabla HTML
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Lista de Pedidos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>Codigo Pedido</b></td>';
		$html .= '<td><b>Tipo de Ventilador</b></td>';
		$html .= '<td><b>Caudal</b></td>';
		$html .= '<td><b>RPM</b></td>';
		$html .= '<td><b>Temperatura</b></td>';
		$html .= '<td><b>Altura</b></td>';
		$html .= '<td><b>Fecha de solicitud</b></td>';
		$html .= '</tr>';
		
		//Seleccionar todos los elementos de la tabla

		$idk= $_SESSION['Id'];

		
		$resultado_msg_contatos =$mysqli->query("SELECT * FROM productos where IdUsuario='$idk'");
		
		while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){
			$html .= '<tr>';
			$html .= '<td>'.$row_msg_contatos["IdProducto"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tipoVentilador"].'</td>';
			$html .= '<td>'.$row_msg_contatos["caudal"].'</td>';
			$html .= '<td>'.$row_msg_contatos["RPM"].'</td>';
			$html .= '<td>'.$row_msg_contatos["temperatura"].'</td>';
			$html .= '<td>'.$row_msg_contatos["altura"].'</td>';
			$html .= '<td>'.$row_msg_contatos["fecha_pedido"].'</td>';
			$html .= '</tr>';
			;
		}
		// Configuración en la cabecera
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generado Data" );
		// Envia contenido al archivo
		echo $html;
		exit; ?>

		?>
