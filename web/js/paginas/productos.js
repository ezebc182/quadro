/* Cuenta la cantidad de productos por categoria y los muestra en
 el badge de resultados.*/


function contarProductos(selector) {
    var cantidad = 0;
    (selector == "*") ? cantidad = $(".producto").length : cantidad = $(selector).length;
    $("#cantidad-productos").html("");
    $("#cantidad-productos").append(cantidad);
}

function cargarProductos() {
    $.ajax({
        url: 'php/utils/obtenerProductos.php',
        method: 'post',
        beforeSend: function () {
            $(".cargando").removeClass("hidden");
        },
        success: function (rta) {
            var obj = JSON.parse(rta);

            if (obj.Estado === 'Ok') {

                var i = 1;
                $.each(obj.Muebles, function (k, v) {
                    var producto;
                    var id = v.Id;
                    var nombre = v.Nombre;
                    var tipoMueble = v.TipoMueble.toLowerCase().replace(/ /g, "-");
                    var imgMini = v.Imagenes[0].PathMini?v.Imagenes[0].PathMini:'images/img-not-found.jpg';

                    producto = '<div id="' + id + '" class="producto ' + tipoMueble + '">'
                        + '<figure>'
                        + '<div class="ribbon"><span>Nuevo</span></div>'
                        + '<a href="detalle-producto/' + id + '/' + nombre + '">'
                        + '<img src="' + imgMini + '" alt="' + nombre + '">'
                        + '<figcaption>'
                        + '<h4>' + nombre + '&nbsp;' + '</h4>'
                        + '</br>'
                        + '<div class="compartir">'
                        + '<a target="_blank" href="http://www.facebook.com/sharer.php?u=http://quadroequipamiento.com/detalle-producto/' + id + '/' + nombre + '" class="" title="Compartir"><i class="fa fa-share-alt"></i></a>'
                        + '</div>'
                        + '</figcaption>'
                        + '</figure>'
                        + '</div>';
                    $("#mueblesContainer").removeClass("hidden");
                    $("#cantidad-productos").html("").append(i);
                    $(".cargando").addClass("hidden");
                    $(producto).appendTo($("#mueblesContainer"));


                    i++;
                });


                $container = $('#mueblesContainer');
                $container.isotope();
                // layout Isotope after each image loads
                $container.imagesLoaded().progress( function() {
                    $container.isotope('layout');
                });


            }
            else {
                $(".cargando").html("");
                $(".cargando").append("<h2><i class='fa fa-times'></i>&nbsp;Ocurrió un error al recuperar los datos.</h2>");
            }


        },
        error: function (err) {
            $(".cargando").html("");
            $(".cargando").append("<h2><i class='fa fa-times'></i>&nbsp;Ocurrió un error inesperado.</h2>");
        }
    });
}
function filtrar(elem) {

    this.event.preventDefault();
    // Cambia el filtro activo
    $(elem).addClass("active").siblings().removeClass("active");
    var selector = $(elem).children().attr('data-filter');
    $container.isotope({ filter: selector });
    contarProductos(selector);
    return false;
}


/**
 * Created by Eze on 16/08/15.
 */
