<!DOCTYPE HTML>
<html>

<?php

	session_start();

	if ($_SESSION["username"] == "" && $_SESSION["username"]== null) {
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../index.html'>";
session_destroy();
}?>

<head>
    <title>Grammovil App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="shortcut icon" href="lib/assets/img/iconoarriba.png" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
    <style>
        .container {
            position: relative;
        }

        .container .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            padding: 10px;
        }

        .container .image-container .image {
            height: 250px;
            width: 350px;
            border: 10px solid #fff;
            box-shadow: 0 5px rgba(0, 0, 0, .1);
            overflow: hidden;
            cursor: pointer;
        }

        .container .image-container .image img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            transition: .2s linear;
        }

        .container .image-container .image:hover img {
            transform: scale(1, 1);
        }

        .container .popup-image {
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, .9);
            height: 100%;
            width: 100%;
            z-index: 100;
            display: none;
        }

        .container .popup-image span {
            position: absolute;
            top: 0;
            right: 10px;
            font-size: 60px;
            font-weight: bolder;
            color: #fff;
            cursor: pointer;
            z-index: 100;
        }

        .container .popup-image img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 5px solid #fff;
            border-radius: 5px;
            width: 750px;
            object-fit: cover;
        }

        @media (max-width:768px) {
            .container .popup-image img {
                width: 95%;
            }
        }

        .modal-container {
            display: flex;
            background-color: rgba(0, 0, 0, 0.3);
            align-items: center;
            justify-content: center;
            position: fixed;
            pointer-events: none;
            opacity: 0;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            transition: opacity 0.3s ease;
        }

        .show {
            pointer-events: auto;
            opacity: 1;
        }

        .modal {
            background-color: #fff;
            width: 600px;
            max-width: 100%;
            padding: 30px 50px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .modal h1 {
            margin: 0;
        }

        .modal p {
            opacity: 0.7;
            font-size: 14px;
        }

        #close {
            background-color: #47a386;
            border: 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            color: #fff;
            font-size: 14px;
        }

        .danger {
            background-color: #e6dfff;
            border-left: 6px solid #4259a5;
        }
    </style>
</head>




<body class="is-preload">
<div style='color:black !important;' id="modal_container" class="modal-container">
    <div class="modal">
        <h1 style='color:dimgray !important; font-size: 27px;'>Lo marcado en rojo es el número de tag se encuentra
            en la parte trasera de tu credencial.</h1>
        <p>
            <img style='width: 70%; margin-top:3%;' src="images/tag.png" alt="" />
        </p>
        <button id="close">Cerrar</button>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Wrapper -->
<script>
    $(document).ready(function () {
        $('.zoom').hover(function () {
            $(this).addClass('transition');
        }, function () {
            $(this).removeClass('transition');
        });
    });
</script>
<div id="wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <span class="logo"><img height="100px" src="images/Recurso 6 (2).png" alt="" /></span>
        <h1>¡Petición de vacaciones!</h1>
        <p>Bienvenido a tu portal de consulta.</p>
    </header>

    <!-- Main -->
    <div id="main">

        <!-- Second Section -->
        <section id="second" class="main special">
            <header class="major">
                <h2 id="nombre">--</h2>

                <div id='avisoG' style='display:none;' class="danger">
                    <p><strong>Gramito te escucha ha recibido tu mensaje!</strong> Hola Fernando espero que te encuentres muy bien para tu problema
                        con la antigüedad se tendría que checar directamente con Roberto Arreola de Nóminas en las oficinas de RH esperamos con ansias tu visita, buen turno!.</p>
                </div>

                <!-- <div class="danger">
                  <p><strong>Aviso!</strong> Gramito les recuerda que tienen que pasar el día jueves 30 al comedor todos los cumpleañeros
                  de este mes, felicidades a todos! los esperamos.</p>
                </div>-->

                <div class="danger">
                    <p><strong>Gramito te escucha</strong> Les agradece por compartir sus problemas y situaciones en las que se encuentran, su voz es muy importante y les ayudaremos a solucionar cada unos de sus problemas, muchas gracias :) .</p>
                </div>

                <ul class="alt">
                    <li>Línea o área: <span id="linea">0</span> </li>
                    <li>
                        <div class="col-6 col-12-xsmall">
                            <label>Ingresa tu número de tag para desbloquear tu caja ahorro,pendiente
                                préstamo y fondo de ahorro</label>
                            <input type="text" name="demo-name" id="numerotag" value=""
                                   placeholder="Numero de tag" />
                            <button style='margin-top:15px;' class="primary"
                                    onclick="ordenTag();">Desbloquear</button>

                            <button id="open" style='margin-top:15px; background-color: lightcoral;'
                                    class="primary">¿Cuál es mi tag?</button>
                        </div>
                    </li>
                </ul>
            </header>

            <ul class="statistics">
                <li class="style4">
                    <img src="images/vacaciones (1).png">
                    <strong id="vacaciones">0</strong> Vacaciones
                </li>

                <li class="style5">
                    <img src="images/idea.png">
                    <strong id="puntosKaizen">0</strong> Puntos Kaizen.
                </li>

                <li class="style1">
                    <img src="images/calendario (1).png">
                    <strong id="antiguedad">0</strong> Antigüedad
                </li>
            </ul>

            <ul class="statistics">
                <li class="style1">
                    <img src="images/hucha (1).png">
                    <strong id="caja">Bloqueado</strong> Caja Ahorro.
                </li>
                <li class="style2">
                    <img src="images/prestamo (1).png">
                    <strong id="prestamos">Bloqueado</strong> Pendiente Prestamo.
                </li>
                <li class="style3">
                    <img src="images/ahorro.png">
                    <strong id="fondoAhorro">Bloqueado</strong> Fondo Ahorro
                </li>
            </ul>
        </section>

        <!-- Get Started -->
        <section id="cta" class="main special">
            <header class="major">
                <h2>Oprime el icono para descargar la pre nómina actual y tu bono de puntualidad.</h2>
            </header>

            <ul class="statistics">
                <li class="style1">
                    <a href='documentos/prenomina.pdf' download><img src="images/pdf.png"></a>
                    <strong></strong> Descarga tu pre nómina<p id="fechaMensaje" style='margin-bottom:10px !important; color: white;font-size:15px;'></p>
                </li>
                <li class="style2">
                    <a href='documentos/bonoAsistencia.pdf' download><img src="images/pdf.png"></a>
                    <strong></strong><div id='mensajeVista'></div><p id="fechaMensajeBono" style='margin-bottom:10px !important; color: white;font-size:15px;'></p>
                </li>
            </ul>


        </section>


        <!-- Second Section -->
        <section id="second" class="main special">
            <header class="major">
                <h2>Solicitar Cartas.</h2>
            </header>
            <ul class="statistics">
                <li class="style1">
                    <img style="width: 64px;" src="images/chupete.png">
                    <strong style='font-size: 1.6rem !important;' >Carta Guarderia</strong><button
                        style='margin-top:15px;' class="primary" onclick="carta('guarderia');">Solicitar</button>
                </li>
                <li class="style2">
                    <img style="width: 64px;" src="images/calidad.png">
                    <strong style='font-size: 1.6rem !important;' >Carta de
                        Recomendacion</strong><button style='margin-top:15px;' class="primary"
                                                      onclick="carta('recomendacion');">Solicitar</button>
                </li>
                <li class="style3">
                    <img style="width: 64px;" src="images/progreso.png">
                    <strong style='font-size: 1.6rem !important;' >Constancia Laboral</strong><button
                        style='margin-top:15px;' class="primary" onclick="carta('laboral');">Solicitar</button>
                </li>
                <li class="style4">
                    <img style="width: 64px;" src="images/casa.png">
                    <strong style='font-size: 1.6rem !important;' >Carta Infonavit</strong><button
                        style='margin-top:15px;' class="primary" onclick="carta('infonavit');">Solicitar</button>
                </li>
            </ul>
            <div id="cargaRegistro"></div>
            <div id='registrado' style="display: none;">
                <center><img style="width: 124px; margin-bottom: 20px;" src="images/voto-positivo.png"></center>
                <h3 style='color:green;'>Se registro correctamente su peticion favor de pasar a Recursos Humanos con
                    Jonathan Cañizo.</h3>
            </div>
        </section>


        <section id="cta" class="main special">
            <header class="major">
                <h2>GPS</h2>
                <p>Puedes revisar la tienda de GPS para canjear los puntos o igual puedes ingresar
                    a Suggestion System para agregar ideas que tengas de manera digital.<br><span style='color: orange;'>La primer semana de cada
                        mes se hará la actualización de puntos kaizen del mes anterior.</span></p>
            </header>

            <ul class="statistics">
                <li class="style1">
                    <a href='https://arketipo.mx/Ideas/IOS/Catalogo/'><img
                            src="images/computadora-portatil (1).png"></a>
                    <strong style='font-size: 1.6rem !important;' >Tienda</strong>
                </li>
                <li class="style5">
                    <a href='https://arketipo.mx/Ideas/IOS/login.php'><img src="images/idea.png"></a>
                    <strong style='font-size: 1.6rem !important;' id="puntos">Suggestion System</strong>
                </li>
            </ul>

        </section>


        <!-- Get Started -->
        <section id="cta" class="main special">
            <header class="major">
                <h2>Grammer News</h2>

                <h2>Orgullo Grammer</h2>
                <img id="1" style='width: 70%;' alt="" />
                <p id='nombreOrg'></p>

                <h2>Líneas Ganadoras del mes.</h2>
                <img id="2" style='width: 70%;' alt="" />
                <hr>
                <img id="3" style='width: 70%;' alt="" />
                <hr>
                <img id="4" style='width: 70%;' alt="" />
                <hr>
                <img id="5" style='width: 70%;' alt="" />
                <hr>

                <div class="container">
                    <h1>Comunicados de Grammer</h1>

                    <div class="image-container">
                        <div class="image"><img id="6"></div>
                        <div class="image"><img id="7"></div>
                        <div class="image"><img id="8"></div>
                        <div class="image"><img id="9"></div>
                    </div>

                    <div class="popup-image">
                        <span>&times;</span>
                        <img id="10" alt="">
                    </div>
                </div>

                <iframe id='video' style="width:80%; margin-top:30px" height="315" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>

            </header>
        </section>

        <!-- Get Started -->
        <section id="cta" class="main special">
            <header class="major">
                <img height="180px" src="images/gramitoseguridadcabeza.png" alt="" />
                <h2>Gramito te escucha</h2>
                <p>Quieres reportar un problema laboral o hacer un comentario sobre algo que te moleste,
                    solamente ingresa tus datos aquí y se les mandará un mensaje al equipo de recursos humanos.</p>

                <ul class="alt">
                    <li>
                        <div class="col-6 col-12-xsmall">
                            <p style='margin-bottom:10px !important;'>Quieres que tu opinión, queja o problema sea anónimo, solo oprime el botón de abajo.</p>
                            <button style='margin-top:5px;' class="primary" onclick="anonima();">Hacer
                                Anónima</button>
                        </div>
                    </li>
                </ul>
            </header>

            <section id='tele'>
                <form>
                    <div class="row gtr-uniform">
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="demo-name" id="nombre2" value="" placeholder="Nombre" />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <input type="text" name="demo-email" id="area" value="" placeholder="Area" />
                        </div>
                        <div class="col-12">
                                <textarea name="demo-message" id="problema" placeholder="Ingresa el problema"
                                          rows="6"></textarea>
                        </div>

                    </div>
                </form>

                <div class="col-12">
                    <ul class="actions">
                        <li><button class="primary" onclick="enviar();">Enviar</button></li>
                    </ul>
                </div>
            </section>
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
                <dt>RH </dt>
                <dd> +52 (42) 36 44 60</dd>
                <dt>Vigilancia </dt>
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

<script>

    const open = document.getElementById('open');
    const modal_container = document.getElementById('modal_container');
    const close = document.getElementById('close');

    open.addEventListener('click', () => {
        modal_container.classList.add('show');
    });

    close.addEventListener('click', () => {
        modal_container.classList.remove('show');
    });

    document.querySelectorAll('.image-container img').forEach(image => {
        image.onclick = () => {
            document.querySelector('.popup-image').style.display = 'block';
            document.querySelector('.popup-image img').src = image.getAttribute('src');
        }
    });

    document.querySelector('.popup-image span').onclick = () => {
        document.querySelector('.popup-image').style.display = 'none';
    }
</script>

<script>
    var id = "<?php echo $_SESSION["username"] ?>";
    var tag;
    var text;


    if(id=='00016069'){
        document.getElementById('avisoG').style.display = 'block';
    }



    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);


        var cadena = results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));

        var arrTerminos = cadena.split(',');


        return arrTerminos[0];
    }

    $.getJSON('https://arketipo.mx/GrammerApp/inicio/DaoUsuario.php?usuario=' + id, function (data) {
        text = data.data[0].NomUser;
        const myArray = text.split(" ");
        let word = myArray[0] + ' ' + myArray[1];

        document.getElementById('nombre').innerHTML = word;
        document.getElementById('nombre2').value = word;
        document.getElementById('linea').innerHTML = data.data[0].NombreCC;
        document.getElementById('area').value = data.data[0].NombreCC;
        tag = data.data[0].IdTag;
        orden(data.data[0].IdTag);
    });

    $.getJSON('https://arketipo.mx/GrammerApp/inicio/kaizen.php?usuario=' + id, function (data) {

        document.getElementById('puntosKaizen').innerHTML = data.data[0].Puntos;
    });

    $.getJSON('https://arketipo.mx/Test/GrammerApp/inicio/DaoPrenomina.php', function (data) {
        for (var i = 0; i < data.data.length; i++) {
            if (data.data[i].Tipo == 'pdf') {
                if (data.data[i].Nombre == 'bonoAsistencia'){
                    document.getElementById('fechaMensajeBono').innerHTML = "Ultima fecha de actualizacion es " + data.data[i].Fecha;
                    document.getElementById("mensajeVista").innerHTML=data.data[i].Mensaje;
                }
                if (data.data[i].Nombre == 'prenomina'){
                    document.getElementById('fechaMensaje').innerHTML = "Ultima fecha de actualizacion es " + data.data[i].Fecha;
                }}

            if (data.data[i].Tipo == 'video') {
                document.getElementById('video').src = data.data[i].Mensaje;
            }

            if (data.data[i].IdArchivo == '17') {
                document.getElementById('1').src = "images/" + data.data[i].Nombre + ".jpg";
                document.getElementById('nombreOrg').innerHTML = data.data[i].Mensaje;
            }

            if (data.data[i].IdArchivo == '18') {
                document.getElementById('2').src = "images/" + data.data[i].Nombre + ".png";
            }

            if (data.data[i].IdArchivo == '19') {
                document.getElementById('3').src = "images/" + data.data[i].Nombre + ".png";
            }

            if (data.data[i].IdArchivo == '20') {
                document.getElementById('4').src = "images/" + data.data[i].Nombre + ".png";
            }

            if (data.data[i].IdArchivo == '21') {
                document.getElementById('5').src = "images/" + data.data[i].Nombre + ".png";
            }



            if (data.data[i].IdArchivo == '5') {
                document.getElementById('6').src = "images/" + data.data[i].Nombre + ".png";
            }

            if (data.data[i].IdArchivo == '6') {
                document.getElementById('7').src = "images/" + data.data[i].Nombre + ".png";
            }

            if (data.data[i].IdArchivo == '7') {
                document.getElementById('8').src = "images/" + data.data[i].Nombre + ".png";
            }

            if (data.data[i].IdArchivo == '8') {
                document.getElementById('9').src = "images/" + data.data[i].Nombre + ".png";
                document.getElementById('10').src = "images/" + data.data[i].Nombre + ".png";
            }
        }
    });

    function orden(tag) {
        $.getJSON('https://arketipo.mx/GrammerApp/inicio/DaoVacaciones.php?usuario=' + id, function (data) {
            document.getElementById('vacaciones').innerHTML = data.data[0].DiasVacaciones;

            var fechaAux = data.data[0].FechaIngreso;
            let divicionFecha = fechaAux.split('-');
            ano = divicionFecha[0];
            mes = divicionFecha[1];
            dia = divicionFecha[2];

            if (mes == '01') {
                mes = 'enero';
            }
            if (mes == '02') {
                mes = 'febrero';
            }
            if (mes == '03') {
                mes = 'marzo';
            }
            if (mes == '04') {
                mes = 'abril';
            }
            if (mes == '05') {
                mes = 'mayo';
            }
            if (mes == '06') {
                mes = 'junio';
            }
            if (mes == '07') {
                mes = 'julio';
            }
            if (mes == '08') {
                mes = 'agosto';
            }
            if (mes == '09') {
                mes = 'septiembre';
            }
            if (mes == '10') {
                mes = 'octubre';
            }
            if (mes == '11') {
                mes = 'noviembre';
            }
            if (mes == '12') {
                mes = 'diciembre';
            }

            document.getElementById('antiguedad').innerHTML = dia + " de " + mes + " del " + ano;
        });
    }

    function ordenTag() {

        var tagIngreso = document.getElementById('numerotag').value;

        if (tagIngreso == tag) {
            $.getJSON('https://arketipo.mx/GrammerApp/inicio/DaoCajaAhorro.php?usuario=' + tag, function (data) {

                document.getElementById('nombre').innerHTML = text;
                document.getElementById('nombre2').value = text;
                document.getElementById('caja').innerHTML = '0';
                document.getElementById('prestamos').innerHTML = '0';

                document.getElementById('caja').innerHTML = data.data[0].AhorroTotal;
                document.getElementById('prestamos').innerHTML = data.data[0].PendientePrestamo;
                document.getElementById('fondoAhorro').innerHTML = data.data[0].FondoAhorro;
            });
        } else {
            alert('Este numero de tag no pertenece a tu cuenta');
        }


    }

    function carta(tipo) {

        document.getElementById('cargaRegistro').innerHTML = '<div class="loading"><center><img src="images/cargando.gif" height="150px"><br/>Un momento, por favor...</center></div>';

        const data = new FormData();

        data.append('nomina', id);

        fetch('DaoEstatus.php', {
            method: 'POST',
            body: data
        })
            .then(function (response) {
                if (response.ok) {
                    correo(id, tipo);
                } else {
                    throw "Error en la llamada Ajax";
                }

            })
            .then(function (texto) {
                console.log(texto);
            })
            .catch(function (err) {
                console.log(err);
            });

    }

    function correo(nomina, tipo) {

        var link = "https://arketipo.mx/GrammerApp/inicio/pdf.php?usuario=" + id + "&tipo=" + tipo;

        const data = new FormData();

        data.append('NominaUsuario', nomina);
        data.append('Tipo', tipo);
        data.append('Link', link);

        fetch('https://arketipo.mx/testphpmailGrammer.php', {
            method: 'POST',
            body: data
        })
            .then(function (response) {
                if (response.ok) {
                    document.getElementById('cargaRegistro').style.display = 'none';
                    document.getElementById('registrado').style.display = 'block';
                } else {
                    throw "Error en la llamada Ajax";
                }

            })
            .then(function (texto) {
                console.log(texto);
            })
            .catch(function (err) {
                console.log(err);
            });


    }

    function anonima() {
        document.getElementById('nombre2').value = 'Anonima';
        document.getElementById('area').value = 'Anonima';
    }


</script>

</body>

</html>