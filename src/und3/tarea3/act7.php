<?php


/**
 * @author     Antonio Julian Bueno Fuentes
 */
$meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$dias = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');
$fecha = getdate();
$dia = $fecha['mday'];
$mes = $fecha['mon'];
$año = $fecha['year'];
$diaSemana = $fecha['wday'];
$diaSemana = $dias[$diaSemana - 1];
$mes = $meses[$mes - 1];
function mes_indexado($mes_selecionado,$meses){
    for ($i = 0; $i < count($meses); $i++) {
        if ($meses[$i] == $mes_selecionado) {
            return ($i+1);
        }
    }
}




#$Week = date("N", mktime(0, 0, 0, date("n"), 1, date("Y"))) - 1;
if (isset($_POST['enviar'])){
    if (!$_POST['move']){
        $Week = date("N", mktime(0, 0, 0, date(mes_indexado($_POST["mes"],$meses))), 1, date("Y")) - 1; //Devuelve el número del día de la semana del primer día del mes

    }else{
        $Week = date("N", mktime(0, 0, 0, date(mes_indexado($_POST["mes"],$meses)+$_POST['move']), 1, date("Y")) - 1); //Devuelve el número del día de la semana del primer día del mes
    }
}

$contador = 7;
#QUe dias es hoy el primero del mes
$diaSemana = $fecha['wday'];
$diaSemana = $dias[$diaSemana - 2];
$diaSemana = array_search($diaSemana, $dias);
$diaHoy = date('D');
$festivos = array(
    "Locales" =>
    array(
        "Enero" => array(1, 6),
        "Febrero" => array(28),
        "Marzo" => array(19),
        "Abril" => array(9),
        "Mayo" => array(1),
        "Junio" => array(24),
        "Julio" => array(25),
        "Agosto" => array(15),
        "Septiembre" => array(8),
        "Octubre" => array( 24),
        "Noviembre" => array(1),
        "Diciembre" => array(6, 8, 25)
    ),
    "Nacionales" =>
    array(
        "Enero" => array(1, 6),
        "Febrero" => array(28),
        "Marzo" => array(19),
        "Abril" => array(9),
        "Mayo" => array(1),
        "Junio" => array(24),
        "Julio" => array(25),
        "Agosto" => array(15),
        "Septiembre" => array(8),
        "Octubre" => array(12, 24),
        "Noviembre" => array(1),
        "Diciembre" => array(6, 8, 25)
    )
);


$festivosLocales = array("Enero" => array(), "Febrero" => array(), "Marzo" => array(), "Abril" => array(), "Mayo" => array(), "Junio" => array(), "Julio" => array(), "Agosto" => array(), "Septiembre" => array(), "Octubre" => array(mktime(0, 0, 0, 6, 8, $añoActual), mktime(0, 0, 0, 10, 24, $añoActual)), "Noviembre" => array(), "Diciembre" => array());
echo "<table border=1 class='tabla'>";
echo "<tr><th colspan=7>$mes $año</th></tr>";
echo "<tr>";
foreach ($dias as $dia) {
    echo "<th>$dia</th>";
}

for ($i = 1; $i <= date('t'); $i++) {
    // con switch
    if ($contador >= 7) {
        echo "</tr>";
        $contador = 0;
        echo "<tr>";
    }
    for ($j = 0; $j < $Week; $j++) {
        echo "<td></td>";
    }
    $contador = $contador + $Week;
    $Week = 0;


    if ($contador == 6) {
        echo "<td class='domingo'>$i";
    } else if ($i == date("j")) {

        echo "<td class='hoy'>$i";
    } else if (VerSiUnElementoEstaEnUnArray($i, $festivos["Locales"][$mes])) {
        echo "<td class='festivo'>$i";
    } else if (VerSiUnElementoEstaEnUnArray($i, $festivos["Nacionales"][$mes])) {
        echo "<td class='festivoLocal'>$i";
    } else if ($i != $dia) {

        echo "<td>$i";
    } else {

        echo "<td >$i";
    }
    $contador++;

    echo "</td>";
}

echo "</tr>";
echo "</table>";


function VerSiUnElementoEstaEnUnArray($elemento, $array)
{
    $esta = false;
    foreach ($array as $elementoArray) {
        
            if ($elemento == $elementoArray) {
                $esta = true;
            }
        

    }
    return $esta;
};


echo ("<a href='https://github.com/abueno19/Und3_tarea1_DWES/blob/main/src/und3/tarea2/act5.php' ><image  class='imagen' src='http://cdn.onlinewebfonts.com/svg/img_336173.png' ></a>");

?>









<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Antonio Julian Bueno Fuentes </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
    </body>
</html>