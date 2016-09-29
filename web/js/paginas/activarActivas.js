var $uri = document.URL;
var $activa = $uri.split("/");
$activa = $activa[3];
switch ($activa) {
    case "index":
    case "":
        $("#home").addClass("active").siblings().removeClass("active");
        $("#home").append('<span class="sr-only">(current)</span>');
        break;
    case "la-empresa":
        $("#la-empresa").addClass("active").siblings().removeClass("active");
        $("#la-empresa").append('<span class="sr-only">(current)</span>');
        break;
    case "productos":
        $("#productos").addClass("active").siblings().removeClass("active");
        $("#productos").append('<span class="sr-only">(current)</span>');
        break;
    case "contacto":
        $("#contacto").addClass("active").siblings().removeClass("active");
        $("#contacto").append('<span class="sr-only">(current)</span>');
        break;
}
/**
 * Created by Eze on 30/07/15.
 */
