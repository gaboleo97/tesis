<div class="modal fade" id="modal-update-product-{{$product->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="{{ $product->category_id }}">{{$product->category}}</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"> {{$category->name}}</option>
                                @endforeach
                            </select>
                        <label for="name">Producto</label>
                        <input class="form-control" type="text" name="name" id="producto" value="{{ $product->name }}">
                        <label for="content">Descripcion</label>
                        <textarea name="content" id="content" class="form-control" cols="30" rows="5" value="{{ $product->content }}" >{{ $product->content }}</textarea>
                        <label for="price">Precio</label>
                        <input class="form-control" type="number" name="price" id="price" value="{{ $product->price }}">
                        <label for="buying_price">Precio Compra</label>
                        <input class="form-control" type="number" name="buying_price" id="buying_price" value="{{ $product->buying_price }}">
                        <label for="utility">Utilidad</label>
                        <input class="form-control" type="number" name="utility" id="utility" value="{{ $product->utility }}">
                        <label for="featured">Imagen</label>
                        <input class="form-control" type="file" name="featured" id="featured" value="{{asset( $product->featured )}}">
                        <p>Imgen Actual</p>
                        <img src="{{asset( $product->featured )}}" alt="{{$product->name}}" class="img-fluid img-thumbnail text-center" width="100px">
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
