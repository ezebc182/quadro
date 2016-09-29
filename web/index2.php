<!doctype html>
<html>

<head>
    <title>Quadro :: Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!--<link rel="stylesheet" type="text/css" href="css/default.css" />-->
    <link rel="stylesheet" type="text/css" href="css/component.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!--web-font-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!--//web-font-->
    <style>
        footer {
            position: absolute !important;
            right: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
            background: #353a3f !important;
            padding: 2.5em 0 !important;
            text-align: center !important;
        }
        body{
            background-color: #dddddd !important;
        }
    </style>
</head>

<body>
<!--header-->
<div class="header">

    <div class="container">
        <!--<div class="col-md-9 top-nav">
            <span class="menu"><img src="images/menu.png" alt=""/></span>
            <ul class="nav1">
                <li><a href="index" class="active">Home</a>
                </li>
                <li><a href="la-empresa">Empresa</a>
                </li>
                <li><a href="arquitectos">Arquitectos</a>
                </li>
                <li><a href="productos">Productos</a>
                </li>
                <li><a href="contacto">Contacto</a>
                </li>
            </ul>

        </div>-->
        <div class="col-md-3 pull-right header-logo">
            <a href="index"><img class="img-responsive" src="images/quadro_logo_png.png" alt="logo"/>
            </a>
        </div>


    </div>
    <div class="jumbotron" style="opacity: 0.8;">
        <center>
            <h1>Sitio en construcción.</h1>

            <h3 class="text-info">
                Visítenos en
                <a title='Quadroequipamiento en Facebook' href="https://www.facebook.com/quadroequipamiento"
                   class="text-info">
                    <i class="fa fa-facebook "></i>
                </a>
            </h3>

        </center>
    </div>
</div>
<!--//header-->

<div class="footer">
    <div class="container">
        <div class="footer-right">
            <p>© 2015 | Quadro Equipamiento </p>
        </div>
    </div>
</div>

<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span>
</a>
<!--//smooth-scrolling-of-move-up-->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Custom Theme files -->

<script type="application/x-javascript">
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>

<!-- //Custom Theme files -->
<!-- js -->

<!-- //js -->
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!--//end-smoth-scrolling-->
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true // 100% fit in a container
        });
    });
</script>
<!--smooth-scrolling-of-move-up-->
<script type="text/javascript">
    $(document).ready(function () {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- script-for-menu -->
<script>
    $("span.menu").click(function () {
        $("ul.nav1").slideToggle(300, function () {
            // Animation complete.
        });
    });
</script>
<!-- /script-for-menu -->
</body>

</html>