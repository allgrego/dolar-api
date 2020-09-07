<?php
include_once("functions.php");

$dolar_url='https://s3.amazonaws.com/dolartoday/data.json';

$dolar_json=file_get_contents($dolar_url);
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
    <h1>Dolar Paralelo Promedio</h1>
    <h3>Dolar Paralelo: Bs <?php echo $dolar_precio?></h3>
    <p>Última Actualización: <?php echo $fecha." - ".$hora?><br></p>
    <p>Fuente: Dolar Today</p>

    <div class="formulario">
        <form>
            <button type="submit" href="index.php" class="button" >Actualizar</button>
        </form>
    </div>
</body>
</html>
