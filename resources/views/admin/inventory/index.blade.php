@extends('adminlte::page')
@section('title', 'Propio Mercado - Inventario')
@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('content_header')
    <h1>
        Productos
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-inventory">
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
                        <h3 class="card-title">Listado de Productos en Inventario</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="inventory" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORIA</th>
                                    <th>PRODUCTO</th>
                                    <th>DESCRIPCION</th>
                                    <th>PRECIO</th>
                                    <th>CANTIDAD</th>
                                    <th>INVENTARIO</th>
                                    <th>IMAGEN</th>
                                    <th>ENTRADA</th>
                                    <th>EXPIRACION</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->amount }}</td>
                                        <td>{{ $product->inventory }}</td>
                                        <td><img src="{{asset( $product->featured ) }}" alt="{{ $product->name }}" class="img-fluid img-thumbnail text-center" width="100px"></td>
                                        <td>{{ $product->admission }}</td>
                                        <td>{{ $product->expiration }}</td>
                                        <td>
                                            <nobr>
                                            <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-pen" data-toggle="modal" data-target="#modal-update-product-{{$product->id}}"></i>
                                            </button>

                                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                                </button>
                                            </form>
                                        </nobr>
                                        </td>
                                    </tr>

                                    <!-- modal update inventory -->
                                    @include('admin.inventory.modal-update-inventory')
                                    <!-- /.modal update invetory-->
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>CATEGORIA</th>
                                    <th>PRODUCTO</th>
                                    <th>DESCRIPCION</th>
                                    <th>PRECIO</th>
                                    <th>CANTIDAD</th>
                                    <th>INVENTARIO</th>
                                    <th>IMAGEN</th>
                                    <th>ENTRADA</th>
                                    <th>EXPIRACION</th>
                                    <th>ACCIONES</th>
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
    <div class="modal fade" id="modal-create-inventory">
        <div class="modal-dialog">
            <div class="modal-content bg-default">
                <div class="modal-header">
                    <h4 class="modal-title">Crear Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.invertory.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="amount">Cantidad</label>
                            <input class="form-control" type="number" name="amount" id="amount">
                            <label for="inventory">Inventario</label>
                            <input class="form-control" type="number" name="inventory" id="inventory">
                            <label for="admission">Entrada</label>
                            <input class="form-control" type="date" name="admission" id="admission">
                            <label for="expiration">Expiracion</label>
                            <input class="form-control" type="date" name="expiration" id="expiration">
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
    <script>
        $(document).ready(function() {
            $('#inventory').DataTable({
                "order": [
                    [3, "desc"]
                ]
            });
        });
    </script>
@stop
