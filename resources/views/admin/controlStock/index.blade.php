@extends('adminlte::page')
@section('title', 'Propio Mercado - Control Stock')
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('content_header')
    <h1>
        Control Stock
        <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="restar">
            <i class="fa fa-lg fa-fw fa-minus" data-toggle="modal" data-target="#modal-update-inventory-restar"></i>
        </button>
    </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Productos</h3>
                        <? dd($stock);?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="products" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Categoria</th>
                                    <th>Entradas</th>
                                    <th>Ventas</th>
                                    <th>F. Compra</th>
                                    <th>F. Vto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($stock as $product)
                                    <tr class="text-center">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->inicio }}</td>
                                        <td>{{ $product->salida }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->expiration_date }}</td>
                                        <td>{{ $product->state }}</td>
                                    </tr>
                                @endforeach
                                <!-- modal update inventory -->
                                @include('admin.controlStock.modal-update-inventory-restar')
                                <!-- /.modal update inventory-->
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Categoria</th>
                                    <th>Entradas</th>
                                    <th>Ventas</th>
                                    <th>F. Compra</th>
                                    <th>F. Vto</th>
                                    <th>Estado</th>
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
    $('#products').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>

@stop
