<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    include_once 'Paginas/meta.php';

    include_once 'Paginas/Titulo.php';

    include_once 'Paginas/link.php';
    ?>

    <link rel="stylesheet" href="third/vegas/src/vegas.css">


</head>
<body>
<?php
include_once 'Paginas/header.php';
?>
<div class="container">

</div>

<?php
include_once 'Paginas/scripts.php';
?>
<!--<h1>--><?php //echo $_SERVER['HTTP_USER_AGENT']?>
<?php //$nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//
//    echo $nombre_host;?>
</h1>
<script src="third/vegas/src/vegas.js"></script>

<script>

    $(function () {
        $('body').vegas({
            slides: [
                { src: 'images/slider/01.jpg' },
                { src: 'images/slider/02.jpg' },
                { src: 'images/slider/03.jpg' },
                { src: 'images/slider/04.jpg' }


            ]
        });
    });



</script>

</body>
</html>