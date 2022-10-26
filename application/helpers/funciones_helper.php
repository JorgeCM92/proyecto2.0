<?php 
function formatearFecha($fecha)
{
    if($fecha) {
        /*2022-06-17 03:10:41*/
        $dia=substr($fecha,8,2);
        $mes=substr($fecha,5,2);
        $anio=substr($fecha,0,4);
        //$hora=substr($fecha,11,5);
        $fechaformateada=$dia.'/'.$mes.'/'.$anio;
        return $fechaformateada;
    }
    else{
        return '';
    }
    
}

function formatearFechaHora($fecha)
{
    /*2022-06-17 03:10:41*/
    $dia=substr($fecha,8,2);
    $mes=substr($fecha,5,2);
    $anio=substr($fecha,0,4);
    $hora=substr($fecha,11,5);

    $fechaformateada2=$dia.'/'.$mes.'/'.$anio.' '.$hora;
    return $fechaformateada2;
}

function mensajeLogin($msg)
{
        switch ($msg) {
            case '1':
                $mensaje="Gracias por usar el sistema";
                break;

            case '2':
                $mensaje="Usuario no identificado";
                break;

            case '3':
                $mensaje="Acceso no valido - favor inicie sesión";
                break;

            default:
                $mensaje="";
                break;
        }
        return $mensaje;
}

?>