<!DOCTYPE HTML>
<html>
<!--
<?php

	session_start();

	if ($_SESSION["token"] == "" && $_SESSION["token"]== null) {
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../login.html'>";
session_destroy();
}?> -->

<head>
    <title>Petición Vacaciones</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="shortcut icon" href="lib/assets/img/iconoarriba.png"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
    </noscript>
</head>

<body class="is-preload">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<div id="wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <span class="logo"><img height="100px" src="images/Recurso 6 (2).png" alt=""/></span>
        <h1>Fila virtual</h1>
        <p>Bienvenido a tu portal de consulta.</p>
    </header>

    <!-- Main -->
    <div id="main">
        <!-- Second Section -->
        <section id="second" class="main special">
            <header class="major">
                <h1 id="-">Tiempo Estimado : </h1>
                <h1 id="contador">05:00</h1>
                <h2 id="nombre">Estas actualmente en el <span>85</span></h2>
            </header>
            <h3>Antes de entrar al sistema prepara el tu turno,operacion y tus fechas a pedir recuerda que una vez
                adentro del sistema tienes un tiempo maximo de 5 minutos.</h3>
            <ul class="statistics">
                <li class="style1">
                    <img style="width: 160px" src="images/giphy.gif">
                    <strong id="caja">Fila actual</strong> <span style="font-size: 30px">80</span>.
                </li>
            </ul>
            <p>Puedes salir de la pagina solo recuerda tenerla en segundo plano y no cerrarla</p>
        </section>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <section>
            <h2>Información</h2>
            <dl class="alt">
                <dt>Dirección</dt>
                <dd>Av. de la luz #24 int.&bull; 3 y 4 &bull; Acceso III</dd>
                <dd>Parque Ind. Benito Juárez &bull;76120 &bull;
                <dd>Querétaro, Qro. México</dd>
                <dt>RH</dt>
                <dd> +52 (42) 36 44 60</dd>
                <dt>Vigilancia</dt>
                <dd> +52 (42) 38 44 00</dd>
                <dt>Servicio Medico</dt>
                <dd> +52 (42) 38 44 64</dd>
            </dl>
            <ul class="icons">
                <li><a href="https://es-la.facebook.com/grammerqueretaro/"
                       class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
                <li><a href="https://www.instagram.com/grammerqro/" class="icon brands fa-instagram alt"><span
                        class="label">Instagram</span></a></li>
                <li><a href="https://mx.linkedin.com/in/grammer-quer%C3%A9taro-b04b6611b"
                       class="icon brands fa-linkedin alt"><span class="label">LinkeIn</span></a></li>
            </ul>
        </section>
        <p class="copyright">&copy; Grammer Automotive Puebla S.A de C.V.: <a href="#">Grammer Queretaro</a>.</p>
    </footer>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="script.js"></script>
<script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
        integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
        data-cf-beacon='{"rayId":"7cd6c8fc89644871","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
        crossorigin="anonymous"></script>

<script>

    function countdown(minutes) {
        var seconds = minutes * 60;
        var contadorElement = document.getElementById("contador");

        var timer = setInterval(function () {
            var minutesRemaining = Math.floor(seconds / 60);
            var secondsRemaining = seconds % 60;

            // Formateo para mostrar siempre 2 dígitos en los minutos y segundos
            var formattedMinutes = String(minutesRemaining).padStart(2, "0");
            var formattedSeconds = String(secondsRemaining).padStart(2, "0");

            // Actualizar el contenido del elemento contador
            contadorElement.textContent = formattedMinutes + ":" + formattedSeconds;

            // Verificar si el tiempo ha llegado a cero
            if (seconds <= 0) {
                clearInterval(timer);
                contadorElement.textContent = "Espere un momento esta apunto de entrar";
            }

            seconds--;
        }, 1000);
    }

    var Turno = '<?php echo $_SESSION["turno"];?>';
    var Token = '<?php echo $_SESSION["token"];?>';

    $.getJSON('https://arketipo.mx/public_html/RH/Vacaciones/dao/DaoConsultaTurno.php', function (data) {
        if (data.data[0].Turno != "No") {
            if (data.data[0].Turno == Turno) {
                window.location.href = 'registro.html?token=' + data.data[0].Token;
            }
        } else {
        }
    });

    $.getJSON('https://arketipo.mx/public_html/RH/Vacaciones/dao/DaoContadorFila.php', function (data) {
        countdown(data.data[0].Conteo * 5);
    });

</script>

</body>

</html>