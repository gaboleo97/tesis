@extends('adminlte::page')

@section('title', 'Propio Mercado - Home')
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->

    <link rel="stylesheet" href="{{ asset('vendor/css/tables/datatable/datatables.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('vendor/almasaeed2010/adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/almasaeed2010/adminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('vendor/almasaeed2010/adminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminLte/dist/css/adminlte.min.css') }}">

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
@stop

@section('content_header')
    <h1>HOME</h1>
@stop

@section('content')
    <!--Tabla productos vencidos -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Productos Vencidos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="PVencidos" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>F. Compra</th>
                                    <th>F. Vto</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productosVencidos as $product)
                                    <tr class="text-center">
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->cantidad }}</td>
                                        <td>{{ $product->admission }}</td>
                                        <td>{{ $product->expiration_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>F. Compra</th>
                                    <th>F. Vto</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- Tabla productos vencidos end-->



    <!-- Tabla productos proximos a vencer -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Productos Proximos a Vencer</h3>
                        <br>
                        <a class="btn btn-danger" id="EVencidos">Eliminar Vencidos</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="PPVencer" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>F. Compra</th>
                                    <th>F. Vto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosProximosVencer as $product)
                                    <tr class="text-center">
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->cantidad }}</td>
                                        <td>{{ $product->admission }}</td>
                                        <td>{{ $product->expiration_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>F. Compra</th>
                                    <th>F. Vto</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- Tabla productos proximos a vencer end -->

  <!-- Tabla productos Bajo Stock menor a 10 -->
  <section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Productos con Bajo Stock</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="PBS" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>F. Vto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productosStockBajo as $product)
                                <tr class="text-center">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->expiration_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Stock</th>
                                <th>F. Vto</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- Tabla productos Bajo Stock menor a 10 end -->

<!-- Tabla productos mas vendidos ultimo mes 30 dias -->
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Productos mas Vendidos Ultimo Mes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="PMVUM" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Ventas</th>
                                <th>F. Vto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productosMasVendidos as $product)
                                <tr class="text-center">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->vendido }}</td>
                                    <td>{{ $product->expiration_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Ventas</th>
                                <th>F. Vto</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- Tabla productos mas vendidos ultimo mes 30 dias end -->

<!-- Tabla todos los productos -->
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Todos los Productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="TPR" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Inventario</th>
                                <th>Ventas</th>
                                <th>Vencidos</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productosGeneral as $product)
                                <tr class="text-center">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->content }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->salida }}</td>
                                    <td>{{ $product->vencidos }}</td>
                                    <td>{{ $product->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Inventario</th>
                                <th>Ventas</th>
                                <th>Vencidos</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- Tabla productos mas vendidos ultimo mes 30 dias end -->

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
        $('#PVencidos').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    </script>

    <script>
        $('#PPVencer').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    </script>

<script>
    $('#PBS').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>

<script>
    $('#PMVUM').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>

<script>
    $('#TPR').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>

    <script>
        $('#EVencidos').on("click", function(e) {
            e.stopPropagation();
            var token = $("input[name='_token']").val();

            confirm('Confirmar Accion');
            $.ajax({

                url: "{{ route('admin.deleteVencidos') }}", // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: {
                    _token: token
                }, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                success: function(data) // A function to be called if request succeeds
                {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }

            });
        });
    </script>
@endsection
