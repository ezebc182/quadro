<!doctype html>
<html>

<head>

    <?php
    include_once 'Paginas/meta.php';

    include_once 'Paginas/Titulo.php';

    include_once 'Paginas/link.php';
    $siteKey = "6Lcg4QoTAAAAAHQEq_tQQvrOwdBgAppwZUQTZlAV";
    ?>
    <style>
        .error {
            border: solid 4px #333 !important;
        }
    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<div class="wrapper">
    <div class="container">
        <!--header-->
        <?php

        include_once 'Paginas/header.php';
        ?>
        <!--header-->


        <h3>CONTACTO</h3>

        <div class="telefonos">
            <div class="contacto">
                <h5>Contáctenos:</h5>
                <i class="fa fa-phone"></i>
                &nbsp;
                <a href="#">+54 9 351 689-2711</a>&nbsp;
                |
                &nbsp;
                <a href="#">+54 9 351 277-6963</a>
                <br/>
                <i class="fa fa-facebook"></i>&nbsp;
                <a target="_blank" href="https://www.facebook.com/quadroequipamiento">Visite
                    nuestra página en facebook!</a>
            </div>
        </div>
        <div class="jumbotron">
            <p id="escribanos">
                Escríbanos, le responderemos a la brevedad.
            </p>
            <br>

            <div class="hidden" id="estado"></div>
            <form id="frmContacto" class="form-horizontal col-sm-offset-2 ">

                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="Nombre"> Nombre:</label>

                    <div class="col-sm-6 col-md-6">
                        <input class="form-control input-lg" type="text" id="Nombre"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="Email">(*) Email:</label>

                    <div class="col-sm-6 col-md-6">
                        <input class="form-control input-lg" name="Email" type="email" id="Email"
                               required="required"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="Asunto"> Asunto:</label>

                    <div class="col-sm-6 col-md-6">
                        <input class="form-control input-lg" type="text" id="Asunto"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-md-2 control-label" for="Email">Teléfono:</label>

                    <div class="col-sm-6 col-md-6">
                        <input class="form-control input-lg" type="tel" id="Telefono"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Mensaje" class="col-md-2 col-sm-2 control-label">(*) Mensaje:</label>

                    <div class=" col-md-6 col-sm-6">
                        <textarea class="form-control input-lg" name="Mensaje" id="Mensaje" rows="5"
                                  required="required"></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col md-2 col-sm-2 control-label">Captcha:</label>

                    <div class="col-sm-offset-3 g-recaptcha" style="margin-bottom:15px;"
                         data-sitekey="<?php echo $siteKey; ?>"></div>
                </div>


                <div class="form-group">
                    <div class=" col-md-6 col-md-offset-2">
                        <button id="btnEnviar" type="button" class="btn btn-default btn-block btn-lg">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--container-->
    <div class="push"></div>

</div>
<!--footer-->
<?php
include_once 'Paginas/footer.php';
?>
<!--footer-->

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap/js/bootstrap.min.js"></script>
<script src="js/paginas/activarActivas.js"></script>


<script>
    $(document).ready(function () {
        $("#Nombre").focus();

        $("#Asunto").val("<?php echo (isset($_GET['mueble'])) ? 'Me interesa el mueble: ' . filter_input(INPUT_GET,'mueble',FILTER_SANITIZE_FULL_SPECIAL_CHARS) : ''; ?>");
    });

    function limpiarFormulario() {
        $("#frmContacto").find("input,textarea").val('');
    }
    function comprobarMensaje($mensaje) {

        return ($($mensaje).val().length !== 0) ? true : false;

    }

    function comprobarCaptcha($recaptcha) {
        return $($recaptcha).val();

    }
    function comprobarEmail($email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        return  re.test($($email).val());

    }


    $("#btnEnviar").click(function (e) {
        e.preventDefault();

        if (comprobarCaptcha($("#g-recaptcha-response")) === "") {
            $(".g-recaptcha").children().children().children().addClass("error");
        }
        else {
            $(".g-recaptcha").children().children().children().removeClass("error");
        }

        if (!comprobarEmail($("#Email"))) {
            $("#Email").addClass("error");


        }
        else {
            $("#Email").removeClass("error");
        }


        if (!comprobarMensaje($("#Mensaje"))) {
            $("#Mensaje").addClass("error");

        }
        else {
            $("#Mensaje").removeClass("error");
        }
        if (comprobarMensaje($("#Mensaje")) && comprobarEmail($("#Email")) && "" !== $("#g-recaptcha-response").val()) {
            /*
             * Verifico el captcha
             * */
            $.ajax({
                url: 'email/EnviarEmail.php',
                type: 'post',
                data: {
                    funcion: 'verificar-captcha',
                    captcha: $("#g-recaptcha-response").val()
                },
                success: function (rta) {
                    //console.log(rta);
                    var obj = JSON.parse(rta);
                    if (obj.Valido == true) {
                        /*
                         * Si el válido, envío el email.
                         * */
                        $.ajax({
                            url: 'email/EnviarEmail.php',
                            type: 'post',
                            data: {
                                funcion: 'enviar-email',
                                Email: $("#Email").val(),
                                Mensaje: $("#Mensaje").val(),
                                Asunto: $("#Asunto").val(),
                                Nombre: $("#Nombre").val().length === 0 ? 'Sin datos' : $("#Nombre").val(),
                                Telefono: $("#Telefono").val().length === 0 ? 'Sin datos' : $("#Telefono").val()
                            },
                            beforeSend: function () {
                                $("#estado").html("");
                                $("#frmContacto").toggleClass("hidden");
                                $("#estado").toggleClass("hidden");
                                $("#escribanos,.telefonos").toggleClass("hidden");
                                $("#estado").append("<center><h2><i class='fa fa-pulse fa-spinner'></i>&nbsp;Enviando...</h2></center>");
                            },
                            success: function (response) {

                                var obj = JSON.parse(response);
                                if (obj.Mensaje === 'Ok') {
                                    $("#estado").html("");
                                    $("#estado").append("<div class='text-center'><p class='text-success' style='color:#fff !important;'><i class='fa fa-check'></i>&nbsp;Mensaje enviado!</p></div>");
                                    $("#estado").append("<br><a href='#' id='btnVolverContacto' class='btn btn-default'>&nbsp;Volver</a>");
                                }
                                else if (obj.Mensaje === 'Fail') {
                                    $("#estado").html("");
                                    $("#estado").append("<div class='text-center'><p class='text-danger' style='color:#fff !important;'><i  class='fa fa-times'></i>&nbsp;Mensaje NO enviado!<br>" + obj.Error + "</p></div>");
                                    $("#estado").append("<br><a href='#' id='btnVolverContacto' class='btn btn-default'>&nbsp;Volver</a>");
                                }
                            }
                        });
                    } else {

                        return;
                        $("#estado").html("");
                        $("#estado").append("<div class='text-center'><p class='text-danger' style='color:#fff !important;'><i  class='fa fa-times'></i>&nbsp;Captcha no válido!</p></div>");
                        $("#estado").append("<br><a href='#' id='btnVolverContacto' class='btn btn-default'>&nbsp;Volver</a>");
                    }


                }
            });


        }
    });

    $("#btnVolverContacto").click(function (e) {
        e.preventDefault();
        $("#estado").html("");
        limpiarFormulario();
        $("#frmContacto").toggleClass("hidden");
        $("#estado").toggleClass("hidden");


    });
</script>


</body>
</html>