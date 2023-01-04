<div class="modal fade" id="modal-update-inventory-{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Inventario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.products.addInventory', $product->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                            <select class="form-control" readonly name="category_id" id="category_id">
                                <option value="{{ $product->category_id }}">{{$product->category->name}}</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"> {{$category->name}}</option>
                                @endforeach
                            </select>
                        <label for="name">Producto</label>
                        <input class="form-control" readonly type="text" name="name" id="producto" value="{{ $product->name }}">
                        <?php $validador = 0 ?>

                        @foreach ($inventories as $inventory)
                        @if ($inventory->product_id === $product->id)
                        <?php $validador = 1 ?>
                        <label for="stockOld">Existencia</label>
                        <input class="form-control" readonly type="number" name="stockOld" id="stockOld" value="{{ $inventory->stock }}">
                        @endif
                        @endforeach

                        @if($validador == 0)
                        <label for="stockOld">Existencia</label>
                        <input class="form-control" readonly type="number" name="stockOld" id="stockOld" value="0">
                        @endif

                        <label for="stock">Cantidad</label>
                        <input class="form-control" type="number" name="stock" id="stock" value="">
                        <label for="expiration_date">Expiracion</label>
                        <input class="form-control" type="date" name="expiration_date" id="expiration_date" value="">
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
