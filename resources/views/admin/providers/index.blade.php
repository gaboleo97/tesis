@extends('adminlte::page')
@section('title', 'Propio Mercado - Proveedores')
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('content_header')
    <h1>
        Proveedores
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-provider">
            Crear
        </button>
    </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Proveedores</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="providers" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Descripción</th>
                                    <th>Marca</th>
                                    <th>Telefono</th>
                                    <th>Días de Distribucion</th>
                                    <th>Tiempos Despacho</th>
                                    <th>Días de Pago</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                    <tr class="text-center">
                                        <td>{{ $provider->id }}</td>
                                        <td>{{ $provider->name }}</td>
                                        <td>{{ $provider->business }}</td>
                                        <td>{{ $provider->description }}</td>
                                        <td>{{ $provider->brand }}</td>
                                        <td>{{ $provider->phone }}</td>
                                        <td>{{ $provider->distribution_days }}</td>
                                        <td>{{ $provider->dispatch_times }}</td>
                                        <td>{{ $provider->paydays }}</td>
                                        <td>
                                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-pen" data-toggle="modal"
                                                data-target="#modal-update-provider-{{ $provider->id }}"></i></button>
                                            <form action="{{ route('admin.providers.delete', $provider->id) }}"
                                                method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>

                                    <!-- modal update category -->
                                    @include('admin.providers.modal-update-provider')
                                    <!-- /.modal update category-->
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Descripción</th>
                                    <th>Marca</th>
                                    <th>Telefono</th>
                                    <th>Días de Distribucion</th>
                                    <th>Tiempos Despacho</th>
                                    <th>Días de Pago</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <!-- modal -->
    <div class="modal fade" id="modal-create-provider">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Proveedor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.providers.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" name="name" id="name">
                            <label for="business">Empresa</label>
                            <input class="form-control" type="text" name="business" id="business">
                            <label for="description">Descripcion</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                            <label for="brand">Marca</label>
                            <input class="form-control" type="text" name="brand" id="brand">
                            <label for="phone">Telefono</label>
                            <input class="form-control" type="number" name="phone" id="phone">
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
                                <option value="">-- Elegir Tiempo --</option>
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
    <!-- /.modal -->



@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
{{-- vendor files --}}
<!--script src="//{{ asset('vendor/js/tables/datatable/pdfmake.min.js') }}"></script-->
<script src="{{ asset('vendor/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendor/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('vendor/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendor/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendor/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
{{-- Page js files --}}
<script src="{{ asset('vendor/almasaeed2010/adminLte/plugins/pdfmake/pdfmake.min.js') }}"></script>

<script src="{{ asset('resources/js/scripts/datatables/datatable.js') }}"></script>



<script>
    $('#providers').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>

@stop
