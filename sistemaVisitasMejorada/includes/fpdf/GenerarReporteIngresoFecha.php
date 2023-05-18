<?php

if (!empty($_GET["txtfechainicio"]) and !empty($_GET["txtfechafinal"]) and !empty($_GET["txtvisitante"])) {
   
require('./fpdf.php');

$fechaInicio = $_GET["txtfechainicio"];
$fechaFinal = $_GET["txtfechafinal"];
$datosDELvisitante = $_GET["txtvisitante"];

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../../modelo/conexion.php';//llamamos a la conexion BD

      $consulta_info = $conexion->query(" select *from empresa ");//traemos datos de la empresa desde BD
      $dato_info = $consulta_info->fetch_object();
      $this->Image('logo.png', 160, 5, 45); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(40); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode($dato_info->nombre), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : " . $dato_info->ubicacion), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : " . $dato_info->telefono), 0, 0, '', 0);
      $this->Ln(5);

      /* RUC */
      $this->Cell(110);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Ruc : " . $dato_info->ruc), 0, 0, '', 0);
      $this->Ln(8);


      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(14, 76, 115);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE CONTROL DEL PUBLICO: SEDE CENTRAL POR FECHAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(14, 76, 115); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(15, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(80, 10, utf8_decode('Nombres y apellidos'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('DNI'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Oficina'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Hora de entrada'), 1, 0, 'C', 1);
      $this->Cell(1, 10, utf8_decode(''), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      date_default_timezone_set("America/Lima");
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../../modelo/conexion.php';

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 9);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

if ($datosDELvisitante == "todos") {
   $sql=$conexion->query("SELECT
   registro.id_registro,
   registro.nombre, 
   registro.apellido_Paterno, 
   registro.apellido_Materno, 
   registro.dni, 
   registro.oficina, 
   registro.entrada, 
   oficina.*, 
   oficina.id_oficina, 
   oficina.nombreOficina
   FROM
   registro
   INNER JOIN
   oficina
   ON 
       registro.oficina = oficina.id_oficina
   where entrada BETWEEN '$fechaInicio' and '$fechaFinal' order by entrada asc ");
} else {
   $sql=$conexion->query("SELECT
   registro.id_registro, 
   registro.nombre, 
   registro.apellido_Paterno, 
   registro.apellido_Materno, 
   registro.dni, 
   registro.oficina, 
   registro.entrada, 
   oficina.*, 
   oficina.id_oficina, 
   oficina.nombreOficina
   FROM
   registro
   INNER JOIN
   oficina
   ON 
       registro.oficina = oficina.id_oficina
   where registro.nombre=$datosDELvisitante and entrada BETWEEN '$fechaInicio' and '$fechaFinal' order by entrada asc ");
}


while ($datos_reporte = $sql->fetch_object()) { 
   $i = $i + 1;
/* TABLA */
$pdf->Cell(15, 10, utf8_decode($i), 1, 0, 'C', 0);
$pdf->Cell(80, 10, utf8_decode($datos_reporte->nombre ." ". $datos_reporte->apellido_Paterno ." ". $datos_reporte->apellido_Materno ), 1, 0, 'A', 0);
$pdf->Cell(25, 10, utf8_decode($datos_reporte->dni), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode($datos_reporte->nombreOficina), 1, 0, 'A', 0);
$pdf->Cell(35, 10, utf8_decode($datos_reporte->entrada), 1, 0, 'C', 0);
$pdf->Cell(1, 10, utf8_decode(""), 1, 1, 'C', 0);     
   }



$pdf->Output('Reporte de visitas.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)

}
