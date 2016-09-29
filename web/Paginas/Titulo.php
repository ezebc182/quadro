<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 30/07/15
 * Time: 17:17
 */

$titulo = explode("/", $_SERVER['REQUEST_URI']);


($titulo[1] == "" || $titulo[1] == "index") ? $titulo = "Home" : $titulo = ucfirst($titulo[1]);
?>
<title>Quadro :: <?php echo $titulo; ?></title>