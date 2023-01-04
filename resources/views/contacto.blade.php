@extends('layouts.layout')
@section('title', 'Contacto')
@section('contenido')
    <!-- Contenido -->



    <h2>Formulario de contacto</h2>
    <form action={{route('envioMail')}} method="POST">
         {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nombre</label>
            <input name="name" type="text">
        </div>
        <div class="form-group">
            <label for="msg">Mensaje</label>
            <input name="msg" type="text">
        </div>
        <div class="form-group">
            <button type="submit" id='btn-contact' class="btn">Enviar</button>
        </div>
    </form>


    <br><br>


    <!-- Contactanos-->

    <div class="container">
        <div class="row justify-content-between">
            <h2 class="contactanos__title"> Contactanos </h2>
            <div class="col-sm-12 col-md-4 contactanos__datos">
                </h3>Datos de la empresa</h3>
                <p>Nombre: Propio Mercado Almacen</p>

                <p>Direccion: Av. San Martin 2837, buenos aires</p>

                <p>Horario: 9:00 am - 20:00 pm</p>
                <p>email: xxxx@ejemplo.com</p>
                <iframe class="contactanos__mapa"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0722187823085!2d-58.468087584801204!3d-34.6023352804599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc9ffcd2a615b%3A0xd8b90591108db340!2sAv.%20San%20Mart%C3%ADn%202837%2C%20C1416%20CSD%2C%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1638418747226!5m2!1ses-419!2sar"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>

            <div class="col-sm-12 col-md-8 contactanos__formulario">
                <form action="#" method="get">
                    <fieldset>
                        <legend> Informacion </legend>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3 col-md-6">
                                    <label for="name" class="form-label"> Nombre</label>
                                    <input type="text" class="form-control" name="name" id="" value=""
                                        placeholder="Pedro">
                                </div>
                                <div class="col-sm-3 col-md-6">
                                    <label for="lastname" class="form-label"> Apellido</label>
                                    <input type="text" class="form-control" name="lastname" id="" value=""
                                        placeholder="Perez">
                                </div>
                                <div class="col-sm-3 col-md-6">
                                    <label for="DNI" class="form-label"> DNI</label>
                                    <input type="number" class="form-control" name="DNI" id="" value=""
                                        placeholder="xxxxxxxx">
                                </div>
                                <div class="col-sm-3 col-md-6">
                                    <label for="telefono" class="form-label"> Telefono</label>
                                    <input type="number" class="form-control" name="telefono" id="" value=""
                                        placeholder="011 xxxxxxxx">
                                </div>
                                <div class="col-sm-3 col-md-6">
                                    <label for="Correo" class="form-label"> Email</label>
                                    <input type="email" class="form-control" name="correo" id="" value=""
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="col-sm-3 col-md-6">
                                    <label for="direccion" class="form-label"> Direccion</label>
                                    <input type="text" class="form-control" name="direccion" id=""
                                        value="" placeholder="calle xxxx xxxx">
                                </div>
                                <div class="col-sm-3 col-md-6">
                                    <label for="horario" class="form-label"> Horario de Retiro</label>
                                    <select class="form-select" name="horario" aria-label="Default select example">
                                        <option selected>Seleccionar</option>
                                        <option value="9:00-12:00">9:00 am - 12:00 pm</option>
                                        <option value="13:00-20:00">13:00pm - 20:00 pm</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 col-md-6">
                                    <label for="comentario" class="form-label"> Comentario</label>
                                    <textarea type="text-area" class="form-control" name="comentario" id="" value="" placeholder=""></textarea>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-primary">Limpiar</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin Contactanos-->
    <!-- Posts -->
    <div class="row justify-content-center">


        <div class="col-12">
            <!-- Paginador -->

        </div>
    </div>
@endsection

