<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 25/07/15
 * Time: 14:49
 */

use \web\admin\Controladores\TiposMueblesControlador;
use \web\admin\Modelo\TipoMueble;

require_once '../../Controladores/TiposMueblesControlador.php';
require_once '../../Modelo/TipoMueble.php';

if (!isset($_POST['nombreTipoMueble'])) {
    exit();
}
$tmControlador = new  TiposMueblesControlador();
$tipoMueble = new TipoMueble();
$rta = $tipoMueble->setNombre($_POST['nombreTipoMueble']);
try {
    if ($rta) {
        echo json_encode(array("Mensaje" => $tmControlador->CrearEntidad($tipoMueble)));
        return;
    }
} catch (\PDOException $e) {
    echo json_encode(array("Mensaje" => $e->getMessage()));
}
