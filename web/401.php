<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 31/07/15
 * Time: 16:57
 */
?>
<!doctype html>
<html>
<head>
    <?php

    include_once 'Paginas/meta.php';
    include_once 'Paginas/link.php';
    include_once 'Paginas/Titulo.php';
    ?>

</head>

<body>
<?php
include_once 'Paginas/header.php';

?>
<div class="wrapper">
    <div class="container">
        <div class="jumbotron">
            <h2><strong>Error 401</strong></h2>&nbsp;
            <p><i class="fa fa-shield"></i>&nbsp;: No tiene permisos.</p>
        </div>
    </div>
</div>
<!--footer-->
<?php
include_once 'Paginas/footer.php';
?>
<!--footer-->
<?php
include_once 'Paginas/scripts.php';
?>
</body>
</html>
