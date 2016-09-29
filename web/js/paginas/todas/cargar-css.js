/**
 * Created by Eze on 17/08/15.
 */
function cargarCss() {
    var links1, links2, $uri, css;

    links1 =

             '<link href="../css/font-awesome.min.css" type="text/css" rel="stylesheet">'
            + '<link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">'
            + '<link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">'
            + '<link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">'
            + '<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">'
            + '<link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">'
            + '<link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">'
            + '<link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">'
            + '<link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">'
            + '<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">'
            + '<link rel="icon" type="image/png" sizes="192x192"  href="images/favicon/android-icon-192x192.png">'
            + '<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">'
            + '<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">'
            + '<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">'

            + '<link rel="manifest" href="images/favicon/manifest.json">';


    links2 =
        '<link href="../../css/portada/estilos.min.css" type="text/css" rel="stylesheet">'
            + '<link href="../../../css/bootstrap.min.css" type="text/css" rel="stylesheet">'
            + '<link href="../../../css/font-awesome.min.css" type="text/css" rel="stylesheet">'
            + '<link rel="apple-touch-icon" sizes="57x57" href="../../images/favicon/apple-icon-57x57.png">'
            + '<link rel="apple-touch-icon" sizes="60x60" href="../../images/favicon/apple-icon-60x60.png">'
            + '<link rel="apple-touch-icon" sizes="72x72" href="../../images/favicon/apple-icon-72x72.png">'
            + '<link rel="apple-touch-icon" sizes="76x76" href="../../images/favicon/apple-icon-76x76.png">'
            + '<link rel="apple-touch-icon" sizes="114x114" href="../../images/favicon/apple-icon-114x114.png">'
            + '<link rel="apple-touch-icon" sizes="120x120" href="../../images/favicon/apple-icon-120x120.png">'
            + '<link rel="apple-touch-icon" sizes="144x144" href="../../images/favicon/apple-icon-144x144.png">'
            + '<link rel="apple-touch-icon" sizes="152x152" href="../../images/favicon/apple-icon-152x152.png">'
            + '<link rel="apple-touch-icon" sizes="180x180" href="../../images/favicon/apple-icon-180x180.png">'
            + '<link rel="icon" type="image/png" sizes="192x192"  href="../../images/favicon/android-icon-192x192.png">'
            + '<link rel="icon" type="image/png" sizes="32x32" href="../../images/favicon/favicon-32x32.png">'
            + '<link rel="icon" type="image/png" sizes="96x96" href="../../images/favicon/favicon-96x96.png">'
            + '<link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon/favicon-16x16.png">'
            + '<link rel="manifest" href="../../manifest.json">';


    $uri = document.URL.split("/")[3];
    switch ($uri) {

        case 'detalle-producto':
            css = links2;
            break;
        default :
            css = links1;
            break;
    }

    if ($("#wrapper").size() > 0) {
        if (document.createStyleSheet) {
            //document.createStyleSheet('style.css');
        }
        else {
            $("head").append(css);
        }
    }


}
