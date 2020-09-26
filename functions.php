<?php
/* @author: Gregorio Alvarez <allgrego14@gmail.com>
 * @last modification date: 25-9-2020
 */

function dolar_parse($precio_dolar){
/* parsea el string de precio de dolar obtenido de API para ser mostrado en formato "eee.eee,dd"
 *  @params: $precio_dolar [string] precio de dolar obtenido de API 
 *  @return: [string] precio de dolar parseado y en formato "eee.eee,dd"
 */

    //Convierte el precio en un array, de dos elementos (parte entera y decimal)
    $aux_ar=explode(".",$precio_dolar);
    //parte Entera
    $entero=$aux_ar[0];
    //convierte el string de parte entera en un array de cada dígito
    $entero_ar=str_split($entero,1);
    //Parte decimal
    $decimal=$aux_ar[1];
    
    $dolar_actual;

    //Ingresa "." en parte entera
    for($i=0;$i<count($entero_ar);$i++){
        if(($i)%3==0&&$i!=0){
            $dolar_actual .=".";
        }
    //Agrega cada dígito de parte entera
    $dolar_actual .=$entero_ar[$i];
    }
    //Agrega parte decimal
    $dolar_actual.=",".$decimal;

    return $dolar_actual;
}


function reload($sec){
/* Recarga la página cada $sec segundos automáticamente
 * @params: $sec [int] intervalo de tiempo entre recarga en segundos
 * @return: none
 */
    $page = $_SERVER['PHP_SELF'];
    header("Refresh: $sec; url=$page");
}


?>