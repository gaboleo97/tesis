<div class="modal fade" id="modal-update-inventory-restar">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Restar Inventario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.controlStock.updateStock') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="producto">Producto</label>
                        <select class="form-control" name="producto" id="producto">
                            <option value="">Seleccione</option>
                            @foreach ($products as $product)
                            <option value="{{$product->id}}"> {{$product->name}}</option>
                            @endforeach
                        </select>
                        <label for="stock">Ventas</label>
                        <input class="form-control" type="number" name="stock" id="stock" value="">
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
