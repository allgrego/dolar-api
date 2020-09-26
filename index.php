<?php
/* @author: Gregorio Alvarez <allgrego14@gmail.com>
 * @last modification date:25-9-2020
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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Dolar Precio</title>

</head>
<body>
    <h1>Dolar Paralelo DolarToday</h1>
    <h3>Tasa: Bs <?php echo $dolar_precio?></h3>
    <p>Última Actualización: <?php echo $fecha." - ".$hora?><br></p>
    <p>Fuente: Dolar Today</p>

    <div>
        <form action="index.php" method="GET">
            <button type="submit" >Actualizar</button>
        </form>
    </div>
</body>
</html>

<?php
/*
 * Automatic Page Reaload every 8 minutes
 */
reload("480");
?>
