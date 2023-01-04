@extends('adminlte::page')
@section('title', 'Propio Mercado - Productos')
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('content_header')
    <h1>
        Productos
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-product">
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
                        <h3 class="card-title">Listado de Productos</h3>
                        <? dd($inventories);?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="products" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Inventario</th>
                                    <th>P.Compra</th>
                                    <th>P.Venta</th>
                                    <th>Utilidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                    <tr class="text-center">
                                        <td>{{ $product->id }}</td>
                                        <td><img src="{{asset( $product->featured ) }}" alt="{{ $product->name }}" class="img-fluid img-thumbnail text-center" width="100px"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>@foreach ($inventories as $inventory)
                                            @if ($inventory->product_id == $product->id )
                                            {{ $inventory->stock }}
                                            @endif
                                        @endforeach</td>
                                        <td>{{ $product->buying_price }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->utility }}</td>
                                        <td>

                                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-pen" data-toggle="modal" data-target="#modal-update-product-{{$product->id}}"></i>
                                            </button>
                                            <button class="btn btn-xs btn-default text-success mx-1 shadow" title="sumar">
                                                <i class="fa fa-lg fa-fw fa-plus" data-toggle="modal" data-target="#modal-update-inventory-{{$product->id}}"></i>
                                            </button>
                                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- modal update Products -->
                                    @include('admin.products.modal-update-product')
                                    <!-- /.modal update Products-->
                                       <!-- modal update inventory -->
                                       @include('admin.products.modal-update-inventory')
                                       <!-- /.modal update inventory-->
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Inventario</th>
                                    <th>P.Compra</th>
                                    <th>P.Venta</th>
                                    <th>Utilidad</th>
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
    <div class="modal fade" id="modal-create-product">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">-- Elegir Categoria --</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"> {{$category->name}}</option>
                                @endforeach
                            </select>
                            <label for="name">Producto</label>
                            <input class="form-control" type="text" name="name" id="producto">
                            <label for="content">Descripcion</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="5"></textarea>
                            <label for="price">Precio</label>
                            <input class="form-control" type="number" name="price" id="price">
                            <label for="buying_price">Precio Compra</label>
                            <input class="form-control" type="number" name="buying_price" id="buying_price">
                            <label for="utility">Utilidad</label>
                            <input class="form-control" type="number" name="utility" id="utility">
                            <label for="featured">Imagen</label>
                            <input class="form-control" type="file" name="featured" id="featured">
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
    $('#products').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
    });
</script>

@stop
