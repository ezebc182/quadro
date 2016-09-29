<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 29/07/15
 * Time: 10:21
 */
$pass = password_hash('123123', PASSWORD_DEFAULT);
echo $pass;
echo '<br>';
echo password_verify('321312', $pass);
echo '<br>';
echo password_verify('123123',$pass);
echo '<br>';
echo filter_var('eebarcoch@gmail',FILTER_VALIDATE_EMAIL);
exit();

$directorio[] = 'images/files/Mesas bajas/Cubic/Imagen.jpg';
$directorio[] = 'images/files/Mesas bajas/Cubic/Plano.jpg';
$directorio[] = 'images/files/Mesas bajas/Cubic/Materiales.jpg';
var_dump($directorio);
$patron = array("Imagen.jpg", "Plano.jpg", "Materiales.jpg");
$directorio = str_replace($patron, '', $directorio);
echo '<br><br>';
var_dump($directorio);