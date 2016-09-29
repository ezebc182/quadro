<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 30/07/15
 * Time: 15:31
 */

$url = explode("/", ($_SERVER["REQUEST_URI"]));
if ($url[1] == 'detalle-producto') {
    print('<script  src="../../../js/jquery.min.js"></script>
<script   src="../../../js/bootstrap/js/bootstrap.min.js"></script>
<script  src="../../js/paginas/activarActivas.js"></script>');
    return;
}
print('<script src="../js/jquery.min.js"></script>
<script   src="../js/bootstrap/js/bootstrap.min.js"></script>
<script   src="js/paginas/activarActivas.js"></script>');
