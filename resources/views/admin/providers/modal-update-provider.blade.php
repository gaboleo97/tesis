<div class="modal fade" id="modal-update-provider-{{$provider->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Proveedores</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.providers.update', $provider->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $provider->name }}">
                        <label for="business">Empresa</label>
                        <input class="form-control" type="text" name="business" id="business" value="{{ $provider->business }}">
                        <label for="description">Descripcion</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="5" value="{{ $provider->description }}">{{ $provider->description }}</textarea>
                        <label for="brand">Marca</label>
                        <input class="form-control" type="text" name="brand" id="brand" value="{{ $provider->brand }}">
                        <label for="phone">Telefono</label>
                        <input class="form-control" type="number" name="phone" id="phone" value="{{ $provider->phone }}">
                        <label for="distribution_days[]">Dias de Distribucion</label>
                        <br>
                        <!-- input class="form-control" type="text" name="distribution_days" id="distribution_days" -->
                        <input type="checkbox" name="distribution_days[]" value="Lunes" id="Lunes" />
                        <label for="Lunes">Lunes</label>
                        <input type="checkbox" name="distribution_days[]" value="Martes" id="Martes" />
                        <label for="Martes">Martes</label>
                        <input type="checkbox" name="distribution_days[]" value="Miercoles" id="Miercoles" />
                        <label for="Miercoles">Miercoles</label>
                        <input type="checkbox" name="distribution_days[]" value="Jueves" id="Jueves" />
                        <label for="Jueves">Jueves</label>
                        <input type="checkbox" name="distribution_days[]" value="Viernes" id="Viernes" />
                        <label for="Viernes">Viernes</label>



                        <br>
                        <label for="dispatch_times">Tiempos de Despacho</label>
                        <select class="form-control" name="dispatch_times" id="dispatch_times">
                            <option value="{{ $provider->dispatch_times }}">{{ $provider->dispatch_times }}</option>
                            @for ($i = 1; $i <= 30; $i++)
                            <option value="{{$i}} Días""> {{$i}} Días</option>
                            @endfor
                        </select>

                        <br>
                        <label for="paydays[]">Dias de Pago</label>
                        <br>
                        <input type="checkbox" name="paydays[]" value="Lunes" id="Lunes" />
                        <label for="Lunes">Lunes</label>
                        <input type="checkbox" name="paydays[]" value="Martes" id="Martes" />
                        <label for="Martes">Martes</label>
                        <input type="checkbox" name="paydays[]" value="Miercoles" id="Miercoles" />
                        <label for="Miercoles">Miercoles</label>
                        <input type="checkbox" name="paydays[]"" value="Jueves" id="Jueves" />
                        <label for="Jueves">Jueves</label>
                        <input type="checkbox" name="paydays[]" value="Viernes" id="Viernes" />
                        <label for="Viernes">Viernes</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
