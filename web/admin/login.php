<!DOCTYPE html>
<html lang="es">
<meta charset="utf-8">
<head>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <title>Quadro :: Login</title>
</head>
<body>

<div id="modalLogin" data-backdrop="static" data-keyboard="false" class="modal bs-example-modal-sm fade" tabindex="-1"
     role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#333 !important;">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                -->
                <center>
                    <h4 class="modal-title" style="color:white !important;" id="myModalLabel">
                        Inicio de sesión</h4>
                </center>
            </div>
            <div class="modal-body">
                <!-- <div class="container"> -->
                <p><?php $mensaje; ?></p>

                <form class="form form-horizontal" method="POST" action="validarUsuario.php">

                    <div class="form-group">
                        <img class="img-responsive" style='margin-left:-2px;margin-bottom:-30px;'
                             src="../../images/quadro_logo_png.png"
                             alt="logo">

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Usuario">
                            <i style="font-size:2em;" class="fa fa-user"></i></label>

                        <div class="col-sm-10">
                            <input type="text" id="Usuario" name="usuario" class="input-lg form-control"
                                   placeholder="Usuario" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Password"><i style="font-size:2em;"
                                                                                class="fa fa-lock"></i></label>

                        <div class="col-sm-10">
                            <input type="password" id="Password" name="password" class="input-lg form-control"
                                   placeholder="Contraseña" required/>
                        </div>
                    </div>

                    <button style="color:#fff" type="submit" class="text-center btn btn-success btn-lg btn-block">
                        Ingresar
                    </button>

                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
<!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
Latest compiled and minified JavaScript
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap/js/bootstrap.min.js"></script>
<!-- scripts de compatibilidad browsers -->
<script src="js/placeholder.js"></script>
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<script>
    $(document).ready(function () {
        $("#modalLogin").modal('show');
        $('#modalLogin').on('shown.bs.modal', function () {
            $("#Usuario").focus();
        });
    });


</script>

</body>
</html>