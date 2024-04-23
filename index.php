<?php
function fetchWithBearerAuthorization($url, $token)
{
    // Configuración de la solicitud cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar la solicitud
    $response = curl_exec($ch);

    // Verificar si hubo errores
    if ($response === false) {
        return 'Error al realizar la solicitud: ' . curl_error($ch);
    } else {
        // Procesar la respuesta
        $responseData = json_decode($response, true);
        if ($responseData === null) {
            return 'Error al decodificar la respuesta JSON';
        } else {
            //return $responseData;
            return $response;
        }
    }

    // Cerrar la sesión cURL
    curl_close($ch);
}

// Uso de la función
$url = 'https://ciisa.coningenio.cl/v1/about-us/';
$token = 'ciisa';
$responseData = fetchWithBearerAuthorization($url, $token);

// Convertir la respuesta a JSON
$jsonResponse = json_encode($responseData);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body id="inicio">
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">

        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/img/logo/logo-grande.png" style="height: 48px;" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- hero -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/imagen1.jpg" style="width: 100%;height: 500px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/imagen2.jpg" style="width: 100%;height: 500px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/img/imagen3.jpg" style="width: 100%;height: 500px;" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Sección Nosotros -->
    <section id="nosotros" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Nosotros</h2>
                    <h3 id="misionTitulo" class="loading">Mishión</h3>
                    <p>Nuestra misión es ofrecer soluciones digitales innovadoras y de alta calidad que impulsen el
                        éxito de nuestros clientes, ayudándolos a alcanzar sus objetivos empresariales a través de la
                        tecnología y la creatividad.</p>
                    <h3>Visión</h3>
                    <p>Nos visualizamos como líderes en el campo de la consultoría y desarrollo de software, reconocidos
                        por nuestra excelencia en el servicio al cliente, nuestra capacidad para adaptarnos a las
                        necesidades cambiantes del mercado y nuestra contribución al crecimiento y la transformación
                        digital de las empresas.</p>
                </div>
                <div class="col-md-6">
                    <img src="assets/img/punitos.png" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Servicios -->
    <section id="servicios" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Nuestros Servicios</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Consultoría digital</h5>
                            <p class="card-text">Identificamos las fallas y conectamos los puntos entre tu negocio y tu
                                estrategia digital. Nuestro equipo experto cuenta con años de experiencia en la
                                definición de estrategias y hojas de ruta en función de tus objetivos específicos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Soluciones multiexperiencia</h5>
                            <p class="card-text">Deleitamos a las personas usuarias con experiencias interconectadas a
                                través de aplicaciones web, móviles, interfaces conversacionales, digital twin, IoT y
                                AR. Su arquitectura puede adaptarse y evolucionar para adaptarse a los cambios de tu
                                organización.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Evolución de ecosistemas</h5>
                            <p class="card-text">Ayudamos a las empresas a evolucionar y ejecutar sus aplicaciones de
                                forma eficiente, desplegando equipos especializados en la modernización y el
                                mantenimiento de ecosistemas técnicos. Creando soluciones robustas en tecnologías de
                                vanguardia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Soluciones Low-Code</h5>
                            <p class="card-text">Traemos el poder de las soluciones low-code y no-code para ayudar a
                                nuestros clientes a acelerar su salida al mercado y añadir valor. Aumentamos la
                                productividad y la calidad, reduciendo los requisitos de cualificación de los
                                desarrolladores.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Formulario -->
    <section id="contacto" class="py-5">
        <div class="container">
            <h2 class="text-center">Contáctanos</h2>
            <form>
                <div id="mensajeRetornoFormulario" style="color: red; text-align: center;">Error:...</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Nombre</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected>Seleccione Servicio</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label for="floatingSelect">Seleccione Servicio</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Mensaje</label>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="captcha">
                                    <label class="form-check-label" for="captcha">No soy un robot</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary w-100">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>




            </form>
        </div>
    </section>

    <section class="bg-dark">
        <footer class="container text-white py-4">
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/img/logo/con-ingenio-solo-blanco.png" style="width: 100px;" alt="">
                    ConIngenio.cl <br>
                    Eslogan de la empresa
                </div>
                <div class="col-md-4">
                    <h4>Ubícanos en</h4>
                    <p>Oficina: Av. Providencia 1234, Oficina 601 <br>
                        Providencia, Santiago <br>
                        Chile
                    </p>
                    <hr>
                    <p>Teléfono: +56 2 1234 5678</p>
                    <hr>
                    <p>Email: info@coningenio.cl</p>
                </div>
                <div class="col-md-4">
                    <h4>Redes Sociales</h4>
                    <p>Facebook</p>
                    <p>Instagram</p>
                    <p>Chile</p>
                </div>
            </div>
        </footer>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        var responseData = JSON.parse(<?php echo $jsonResponse; ?>);

        /*setTimeout(function() {
            cargarTextos('esp');
        }, 2000);*/

        setTimeout(() => cargarTextos('esp'), 2000);

        function cargarTextos(_idioma) {
            const misionTitulo = document.getElementById('misionTitulo');
            misionTitulo.innerText = responseData['data']['mision']['titulo'][_idioma];
            console.log('Esta función se ejecuta después de 2 segundos.');

        }
    </script>
</body>

</html>