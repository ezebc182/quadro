<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 31/07/15
 * Time: 16:58
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
            <h2><strong>Error 500</strong></h2>&nbsp;
            <p><i class="fa fa-terminal"></i>&nbsp;: Fallo interno del servidor.</p>
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
