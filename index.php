<?php
/* @author: Gregorio Alvarez <allgrego14@gmail.com>
 * @last modification date:3-10-2020
 * 
 * Comentario: No funciona los miércoles y sábados. 
 * Se asume que por el "é" y "á". El $dolar_array no se completa
 * 
 */
include_once("functions.php");

$dolar_url='https://s3.amazonaws.com/dolartoday/data.json';

//obtiene JSON de API en dolar today
$dolar_json=file_get_contents($dolar_url);

//Se transforma el json obtenido en un array
$dolar_array=json_decode($dolar_json,true);

/******Precio Dolar******/
$dolar_precio=dolar_parse($dolar_array['USD']['dolartoday']);
/*******Fecha************/
$fechalarga  = $dolar_array['_timestamp']['fecha'];
$dia=$dolar_array['_timestamp']['dia'];
$fechalarga_array = explode(" ", $fechalarga);
$fecha=$dolar_array['_timestamp']['fecha_corta'];
/******Hora **********/
$hora=$fechalarga_array[3].$fechalarga_array[4];

//Custom
$dolar_precio = '444.123,23';
$fecha='Sábado, 3 de octubre del 2020';
$hora='3:19 am';
?>




<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>DolarToday Precio</title>
  <meta name="description" content="Precio actual de dolar paralelo acorda a DolarToday">
  <meta name="author" content="Gregorio Alvarez <allgrego14@gmail.com">

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/favicon.ico">

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="four column border cont" style="margin-top: 10%; margin-left: 5%;">
        <h4 class="three-half column" >Dolar Paralelo DolarToday</h4>
        <h3 class="one-half column"><strong>Tasa: Bs <?php echo $dolar_precio?></strong></h3>
        <p class="one-half column">Última Actualización: <?php echo $fecha." - ".$hora?><br></p>
        <p class="one-half column">Fuente: <em>Dolar Today</em></p>
        <div class="one-half column">
            <form action="index.php" method="GET">
                <button type="submit" class="button-primary" >Actualizar</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
/*
 * Automatic Page Reaload every 8 minutes
 */
reload("480");
?>
