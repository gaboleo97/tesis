@extends('layouts.layout')
@section('title', 'Productos')

@section('contenido')
    <!-- Contenido -->
   <!-- Posts -->
   <div class="row justify-content-center">
    <div class="col-12">
        <div class="row">
            <!-- Post 1 -->
            @foreach ($products as $product)
            <div class="col-md-3 col-12 justify-content-center mb-5">
                <div class="card m-auto" style="width: 18rem;">
                    <img class="card-img-top" src="{{asset($product->featured)}}" alt="{{$product->name}}">

                    <div class="card-body">
                        <small class="card-txt-category">Categoría: {{$product->category->name}}</small>
                        <h5 class="card-title my-2">{{$product->name}}</h5>
                        <div class="d-card-text">
                            {{$product->content}}
                        </div>
                        <!-- <a href="#" class="post-link"><b>Leer más</b></a> -->
                        <hr>
                        <div class="row">
                            <div class="col-6 text-left">
                                <span class="card-txt-author">Propio Mercado</span>
                            </div>
                            <div class="col-6 text-right">
                                <span class="card-txt-date">{{$product->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="col-12">
        <!-- Paginador -->

    </div>
</div>
@endsection

