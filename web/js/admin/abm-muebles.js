var galeria = new Array();
$("#btnAgregarImagen").click(function (e) {
    e.preventDefault();
    var input_file = "<div>" +
        //"<input type='hidden' name='MAX_FILE_SIZE' value='300000'/>" +
        "<input type='file' name='imagenes[]' class='input-lg imagen form-control' accept='.jpg'/>" +
        "<a class='quitar' title='Quitar' href='#' onclick='quitarImagen(this,this.event)'>" +
        "<i class='fa fa-times'></i>" +
        "</a>" +
        "</div>";

    $("#imagenesExtra").append(input_file);
});
/*$("#imagenes").on("change", function (e) {
 e.preventDefault();
 var archivos = e.target.files;

 $.each(archivos, function (i, archivo) {
 galeria.push(archivo);
 var reader = new FileReader();
 reader.readAsDataURL(archivo);
 reader.onload = function (e) {
 var plantilla = '<div class="contenedor-vista-previa col-sm-4">' +
 '<a onclick="quitarImagen(this,this.event)" id="boton-' + i + '" title="Quitar" href="#">' +
 '<i class="fa fa-times"></i></a>' +
 '<img id="' + i + '" class="imagen-vista-previa" src="' + e.target.result + '"/>' +
 '<figcaption>' + archivo.name + '</figcaption>' +
 '</div>';
 $("#imagenesExtra").append(plantilla);

 };
 });

 });*/
/*$("#btnGuardar").on("click", function (e) {
 e.preventDefault();
 var formData = new FormData($(this)[0]);
 formData.append('imagenes', galeria);
 var request = new XMLHttpRequest();
 request.open('post', 'server.php', true);
 request.send(formData);


 e.preventDefault();
 $.ajax({
 url: '../',
 method: 'post',
 data: {},
 beforeSend: function () {

 },
 success: function (response) {

 },
 error: function (error) {

 }
 });
 });*/

function quitarImagen(elem, e) {
    this.event.preventDefault();
    //var indice = $(elem).attr("id").split("-");
    $(elem).parent().remove();
    // TODO: Borrar el archivo que coincida con el array.
    //galeria.splice(indice[1], 1);
    /* var contador = $("input:file").prop('files').length;
     $("input:file").prev().text(contador + 'archivos');
     if (galeria.length - 1 === 0) {
     $(document).find("input:file").val('');
     }*/
}

function subirImagenes() {
    //$("#barra").removeClass("hidden");
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $('#frmMuebles').ajaxForm({
        beforeSend: function () {
            status.empty();
            var percentVal;
            percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function (event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
            //console.log(percentVal, position, total);
        },
        success: function () {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function (xhr) {
            //console.log(xhr.responseText);
            //$("#frmMuebles").find('select,input:text,textarea,input:file').val('');
            //$("#container-nuevo-mueble").addClass("hidden");

            status.html(xhr.responseText);
        }
    });
}
$("#btnGuardar").click(function () {
    subirImagenes();
    //$.ajax({
    //    url: subirImagenes(),
    //  beforeSend: function () {
    //  $("#frmMuebles").addClass("hidden");
    //   $(".mensaje").html("");
    //   $(".mensaje").append("<h2 class='text-info'><i class='fa fa-spinner fa-pulse'></i>&nbsp;Guardando...</h2>");
    //},
    //  success: function () {
    //      $(".mensaje").html("");
    //      $(".mensaje").append("<h2 class='text-success'><i class='fa fa-check'></i>&nbsp;Mueble guardado!</h2>");

    //  }
    //});

});

$("#btnNuevoMueble").click(function (e) {
    e.preventDefault();
    $("#frmMuebles").find('select, input:text,input:file,textarea').val('');
    $("#frmMuebles").find(".numero, .imagen").val('');
    $("#status").html("");
    $("#container-botones").addClass("hidden");
    $("#container-nuevo-mueble").removeClass("hidden");
    $("#container-listado-muebles").addClass("hidden");
});

$("#btnVerListadoMuebles").click(function (e) {
    e.preventDefault();
    $("#container-botones").addClass("hidden");
    $("#container-nuevo-mueble").addClass("hidden");
    $("#container-listado-muebles").removeClass("hidden");
});

$(".btnVolver").click(function (e) {
    e.preventDefault();
    $("#container-botones").removeClass("hidden");
    $("#container-nuevo-mueble").addClass("hidden");
    $("#container-listado-muebles").addClass("hidden");
});
/**
 * Created by Eze on 16/07/15.
 */


$("#btnGuardarTipoMueble").click(function (e) {
    e.preventDefault();
    $.ajax({
        url: '../admin/Vistas/TiposMuebles/crearTipoMueble.php',
        method: 'post',
        data: {
            funcion: 'crearTipoMueble',
            nombreTipoMueble: $("#txtNombreTipoMueble").val(),
            descripcionTipoMueble: $("#txtDescripcionTipoMueble").val()

        },
        beforeSend: function () {
            $("#mensajeTipoMueble").removeClass("hidden");
            $("#frmTipoMueble").addClass("hidden");
            $("#mensajeTipoMueble").html("");
            $("#mensajeTipoMueble").append("<h3 class='text-info'><i class='fa fa-spinner fa-pulse'></i>&nbsp;Guardando...</h3>");
        },
        success: function (rta) {
            $("#mensajeTipoMueble").html("");
            var obj = JSON.parse(rta);
            if (rta.Mensaje === true) {
                $("#mensajeTipoMueble").append("<h3 class='text-success'><i class='fa fa-check'></i>&nbsp;Tipo mueble guardado.</h3>");
                return;
            }
            $("#mensajeTipoMueble").append("<h3 class='text-warning'><i class='fa fa-hacker-news'></i>&nbsp;Tipo mueble NO guardado.</h3>");


        },
        error: function (error) {
            console.log(error.responseText);
            var obj = JSON.parse(error);
            $("#mensajeTipoMueble").html("");
            $("#mensajeTipoMueble").append("<h3 class='text-danger'><i class='fa fa-times'></i>&nbsp;Error.<br>" + obj.Mensaje + "</h3>");
        }
    });
});