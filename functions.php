<?php
function dolar_parse($precio_dolar){
    $aux_ar=explode(".",$precio_dolar);
    $entero=$aux_ar[0];
    $entero_ar=str_split($entero,1);
    $decimal=$aux_ar[1];
    
    $dolar_actual;

    //Ingresa "." en parte entera
    for($i=0;$i<count($entero_ar);$i++){
        if(($i)%3==0&&$i!=0){
            $dolar_actual .=".";
        }
    $dolar_actual .=$entero_ar[$i];
    }
    $dolar_actual.=",".$decimal;//Agrega parte decimal

    return $dolar_actual;
}
?>