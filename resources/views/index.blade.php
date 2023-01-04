@extends('layouts.layout')
@section('title', 'Home')
@section('contenido')
    <!-- Contenido -->
    <!-- Carousel Principal-->

    <section class="container-fluid carouselPrincipal">
        <div class="row justify-content-center">
            <div id="carouselExampleIndicators" class="col-sm-12 carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../images/banner9.png" class="carouselPrincipal__item--img d-block w-100 img-fluid"
                            alt="banner 0">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/banner1 2.png" class="carouselPrincipal__item--img d-block w-100 img-fluid"
                            alt="banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/banner2.png" class="carouselPrincipal__item--img d-block w-100 img-fluid"
                            alt="banner 2">
                    </div>
                    <div class="carousel-item">
                        <img src="../images/banner3.png" class="carouselPrincipal__item--img d-block w-100 img-fluid"
                            alt="banner 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- Fin Carousel Principal-->
    <br>
<!-- Nosotros -->
    <section class="mb20">
        <div class="container nosotros">
            <div class="row justify-content-between">
              <h2 class="nosotros__titulo">¿Quienes Somos?</h2>
              <div class="col-md-9 col-sm-12">
                  <p class="nosotros__parrafo">Propio Mercado almacen, somos una empresa familiar ubicada en la paternal - CABA - Buenos Aires, nuestro ideal esta basado en el concepto de el buen trato hacia nuestros clientes y colegas de trabajo, comenzo como un pequeño sueño y poco a poco se fue cumpliento y hemos ido creciendo, somos oriundos de Venezuela y llevamos a nuestros clientes y amigos un poco de nuestra cultura.</p>
              </div>
              <div class="col-md-3 col-sm-12">
                <img class="img-fluid nosotros__img" src="../images/quienes-somos.png" alt="quienes-somos">
              </div>
            </div>
          </div>
    </section>
<!-- Nosotros fin -->

    <!-- Banners-->
    <Section class="container-fluid banner mb20">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 banner--1">
                <picture class="banner__img"">
                    <a href="https://www.rappi.com.ar/tiendas/167409-propio-mercado-cte" target="_blank" rel="noopener noreferrer">
                        <img class="img-fluid banner__img--1" src="../images/banner-rappi.png" alt="Banner 1">
                    </a>

                </picture>
            </div>
            <div class="col-md-6 col-sm-12 banner--2">
                <picture class="banner__img">
                    <img class="img-fluid banner__img--2" src="../images/banner-2.png" alt="Banner 2">
                </picture>
            </div>
        </div>
    </Section>
    <!-- Fin Banners-->

    <!-- Contactanos-->
    <section>
        <div class="container">
            <div class="row justify-content-between text'center">
                <h2 class="text-center"> Nuestra Sucursal</h2>
                <div class="col-sm-12 col-md-12 text-center">
                    <p>Abierto de Lunes a Domingo</p>

                    <p>Direccion: Av. San Martin 2837, buenos aires</p>

                    <p>Horario: Lunes a Sabado 9h - 20h | Domingo 9h - 14h</p>
                    <p>Escribenos: <a href="https://api.whatsapp.com/send?phone=541150174517&text=%C2%A1Hola%20somos%20Propio%20Mercado!%20%C2%BFEn%20qu%C3%A9%20podemos%20ayudarte?" target="_blank" class="icon-whatsapp"><img src="{{asset('./images/whatsapp.png')}}" style="width: 50px; height:50px" alt="logo whatsapp"></a></p>
                    <iframe class="contactanos__mapa"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0722187823085!2d-58.468087584801204!3d-34.6023352804599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc9ffcd2a615b%3A0xd8b90591108db340!2sAv.%20San%20Mart%C3%ADn%202837%2C%20C1416%20CSD%2C%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1638418747226!5m2!1ses-419!2sar"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Fin Contactanos-->
    </div>
@endsection
