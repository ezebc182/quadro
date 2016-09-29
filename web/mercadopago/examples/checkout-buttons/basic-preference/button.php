<?php
require_once "../../../lib/mercadopago.php";

$mp = new MP("6931456949649423", "pEJjNh4jF3pIvrOJLLSFBEB19R3L7Ko8");

$preference_data = array(
    "items" => array(
        array(
            "title" => "Title of what you are paying for",
            "currency_id" => "USD",
            "category_id" => "Category",
            "quantity" => 1,
            "unit_price" => 10.2
        )
    )
);

$preference = $mp->create_preference($preference_data);
?>

<!doctype html>
<html>
    <head>
        <title>MercadoPago SDK - Create Preference and Show Checkout Example</title>
    </head>
    <body>
       	<a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall">Pay</a>
        <script type="text/javascript" src="http://mp-tools.mlstatic.com/buttons/render.js"></script>
    </body>
</html>
